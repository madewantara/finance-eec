<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Exports\ExecutiveDirector\AccountExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class ExedirAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('executive.director');
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

        return view('executive-director.account.index', compact('allCategory', 'account', 'categories', 'countCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
            
            $pdf = PDF::loadView('executive-director.account.pdf', ['arrayData' => $arrayData, 'todayDate' => $todayDate]);
            $filename = $todayDate .' Financial Account.pdf';
            return $pdf->download($filename);
        }
    }
}
