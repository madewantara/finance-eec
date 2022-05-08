<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Support\Str;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\CategoryRequest;
use App\Exports\FinanceDivision\AccountExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class FindivAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('finance.division');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategory = Account::where('is_active', 1)->distinct()->pluck('category');
        $categories = Account::where('is_active', 1)->distinct()->pluck('category')->toArray();
        $account = Account::where('is_active', 1)->get();
        $countAccount = count($account);
        $countCategory = array();
        foreach($categories as $c){
            $count = count(Account::where([
                ['is_active', 1],
                ['category', $c]
            ])->get());
            array_push($countCategory, $count);
        }

        return view('finance-division.account.index', compact('allCategory', 'account', 'categories', 'countCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category = Account::where('is_active', 1)->distinct()->pluck('category')->toArray();
        $allCategory = array();
        foreach($category as $c){
            array_push($allCategory, preg_replace('/\s+/', '', $c));
        }

        return view('finance-division.account.create', compact('allCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        $validated = $request->validated();
        $convCategory = preg_replace('/([a-z])([A-Z])/s','$1 $2', $validated['category']);

        $checkAccount = Account::where('is_active', 1)
                                ->where(function($query) use ($validated){
                                    $query->where('referral', $validated['referral'])
                                  ->orWhere('name', $validated['name']);
                                })->first();

        if($checkAccount){
            return redirect()->back()->withError('Financial account already exists');
        }

        $accountUuid = Str::uuid()->toString();
        $account = Account::create([
            'uuid' => $accountUuid,
            'referral' => $validated['referral'],
            'name' => $validated['name'],
            'category' => $convCategory,
            'is_active' => 1,
        ]);

        $log = ActivityLog::create([
            'user_id' => Auth::id(),
            'category' => 'account-store',
            'activity_id' => $accountUuid,
        ]);

        return redirect()->route('findiv.account-index')->withSuccess('Financial account successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $uuid)
    {
        $category = Account::where('is_active', 1)->distinct()->pluck('category')->toArray();
        $allCategory = array();
        foreach($category as $c){
            array_push($allCategory, preg_replace('/\s+/', '', $c));
        }

        $data = Account::where('is_active', 1)->where('uuid', $uuid)->get();

        $log = ActivityLog::where('activity_id', $uuid)->where(function($query){
            $query->where('category', 'system')
            ->orWhere('category', 'account-store')
            ->orWhere('category', 'account-update')
            ->orWhere('category', 'account-delete');
            })->get();
        
        $user = [];
        foreach($log as $l){
            if($l->user_id == 0){
                array_push($user, 'system');
            }
            else{
                array_push($user, User::where('id',$l->user_id)->get());
            }
        }

        $activity = [];
        for($i=0;$i<count($log);$i++){
            array_push($activity, ['log' => $log[$i], 'user' => $user[$i]]);
        }

        return view('finance-division.account.edit', compact('allCategory', 'data', 'uuid', 'activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request, $uuid)
    {
        $validated = $request->validated();
        $convCategory = $newstr = preg_replace('/([a-z])([A-Z])/s','$1 $2', $validated['category']);

        $checkAccount = Account::where('is_active', 1)
                                ->where(function($query) use ($validated){
                                    $query->where('referral', $validated['referral'])
                                  ->orWhere('name', $validated['name']);
                                })->first();
        if($checkAccount){
            return redirect()->back()->withError('Financial account already exists');
        }

        $curAcc = Account::where([
            ["uuid", $uuid],
            ["is_active", 1],
        ])->update(['is_active' => 0, 'referral' => NULL]);

        $accountUuid = Str::uuid()->toString();

        $dataLog = ActivityLog::where('activity_id', $uuid)
                    ->where(function($query){
                        $query->where('category', 'like', '%account%')
                        ->orWhere('category', 'system');
                    })->get();

        foreach($dataLog as $dl){
            ActivityLog::create([
                'user_id' => $dl->user_id,
                'category' => $dl->category,
                'activity_id' => $accountUuid,
            ]);
        }

        $account = Account::create([
            'uuid' => $accountUuid,
            'referral' => $validated['referral'],
            'name' => $validated['name'],
            'category' => $convCategory,
            'is_active' => 1,
        ]);

        $log = ActivityLog::create([
            'user_id' => Auth::id(),
            'category' => 'account-update',
            'activity_id' => $accountUuid,
        ]);

        return redirect()->route('findiv.account-index')->withSuccess('Financial account successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export(Request $request) 
    {
        $todayDate = Carbon::now()->format('Y-m-d');

        if($request->format == 'excel'){
            $filename = $todayDate .' Financial Account.xlsx';
            return Excel::download(new AccountExport($request), $filename);
        }

        if($request->format == 'csv'){
            $filename = $todayDate .' Financial Account.csv';
            return Excel::download(new AccountExport($request), $filename);
        }

        if($request->format == 'pdf'){
            $collectionData = array();
            $accountData = new Account;

            if(!empty($request->exportcategory)){
                foreach($request->exportcategory as $category){
                    if(!empty($category)){
                        array_push($collectionData, $accountData->where('is_active' , 1)->where('category', $category)->orderBy('category', 'asc')->distinct()->get());
                    }
                }

                $arrayData = array();
                $accountArray = array('Referral Code', 'Name', 'Category');
                foreach($collectionData as $account){
                    foreach($account as $acc){
                        $accountArray = array(
                            'Referral Code' => $acc->referral,
                            'Name' => $acc->name,
                            'Category' => $acc->category,
                        );
                        array_push($arrayData, $accountArray);
                    }
                }
            }
            else{
                $collectionData = $accountData->where('is_active' , 1)->orderBy('category', 'asc')->get()->toArray();
                $arrayData = array();
                $accountArray = array('Referral Code', 'Name', 'Category');
                foreach($collectionData as $account){
                    $accountArray = array(
                        'Referral Code' => $account['referral'],
                        'Name' => $account['name'],
                        'Category' => $account['category'],
                    );
                    array_push($arrayData, $accountArray);
                }
            }
            
            $pdf = PDF::loadView('finance-division.account.pdf', ['arrayData' => $arrayData, 'todayDate' => $todayDate]);
            $filename = $todayDate .' Financial Account.pdf';
            return $pdf->download($filename);
        }
    }
}