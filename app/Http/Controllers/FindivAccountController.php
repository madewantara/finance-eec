<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Str;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\CategoryRequest;
use App\Exports\AccountExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class FindivAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategory = Account::where('is_active', 1)->distinct()->pluck('category');
        return view('finance-division.account.index', compact('allCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $account = Account::where('is_active', 1)->get();
        $countAccount = count($account);
        
        $category = Account::where('is_active', 1)->distinct()->pluck('category')->toArray();
        $countCategory = array();
        $allCategory = array();
        foreach($category as $c){
            $count = count(Account::where([
                ['is_active', 1],
                ['category', $c]
            ])->get());
            array_push($countCategory, $count);
            array_push($allCategory, preg_replace('/\s+/', '', $c));
        }

        $filter = $request->filter;

        return view('finance-division.account.create', compact('category', 'allCategory', 'countCategory', 'filter', 'countAccount'));
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
        $convCategory = $newstr = preg_replace('/([a-z])([A-Z])/s','$1 $2', $validated['category']);

        $checkAccount = Account::where('is_active', 1)
                                ->where(function($query) use ($validated){
                                    $query->where('referral', $validated['referral'])
                                  ->orWhere('name', $validated['name']);
                                })->first();

        if($checkAccount){
            return redirect()->back()->with('message', 'Financial Account Already Exists');
        }

        $accountUuid = Str::uuid()->toString();
        $account = Account::create([
            'uuid' => $accountUuid,
            'referral' => $validated['referral'],
            'name' => $validated['name'],
            'category' => $convCategory,
            'is_active' => 1,
        ]);

        return redirect()->route('findiv.account-index')->with('message', 'Financial Account Successfully Added');
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
        $account = Account::where('is_active', 1)->get();
        $countAccount = count($account);

        $category = Account::where('is_active', 1)->distinct()->pluck('category')->toArray();
        $countCategory = array();
        $allCategory = array();
        foreach($category as $c){
            $count = count(Account::where([
                ['is_active', 1],
                ['category', $c]
            ])->get());
            array_push($countCategory, $count);
            array_push($allCategory, preg_replace('/\s+/', '', $c));
        }

        $filter = $request->filter;
        $data = Account::where("uuid", $uuid)->get();

        return view('finance-division.account.edit', compact('category', 'allCategory', 'countCategory', 'filter', 'countAccount', 'data', 'uuid'));
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
            return redirect()->back()->with('message', 'Financial Account Already Exists');
        }

        $curAcc = Account::where([
            ["uuid", $uuid],
            ["is_active", 1],
        ])->update(['is_active' => 0]);

        $accountUuid = Str::uuid()->toString();
        $account = Account::create([
            'uuid' => $accountUuid,
            'referral' => $validated['referral'],
            'name' => $validated['name'],
            'category' => $convCategory,
            'is_active' => 1,
        ]);

        return redirect()->route('findiv.account-index')->with('message', 'Financial Account Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $checkAccount = Account::where([
            ["uuid", $uuid],
            ["is_active", 1],
        ])->get();

        if(empty($checkAccount)){
            return redirect()->back()->with('message', 'Financial Account does not Exists');
        }

        $checkAccount = Account::where([
            ["uuid", $uuid],
            ["is_active", 1],
        ])->update(['is_active' => 0]);

        return redirect()->route('findiv.account-index')->with('message', 'Financial Account Successfully Deleted');
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
            foreach($request->exportcategory as $category){
                if(!empty($category)){
                    array_push($collectionData, $accountData->where('is_active' , 1)->where('category', $category)->distinct()->get());
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
            
            $pdf = PDF::loadView('finance-division.account.pdf', ['arrayData' => $arrayData, 'todayDate' => $todayDate]);
            $filename = $todayDate .' Financial Account.pdf';
            return $pdf->download($filename);
        }
    }
}