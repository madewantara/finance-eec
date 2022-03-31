<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;
use App\Exports\CashExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class FindivCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allTransactionex = Transaction::where('is_active', 1)->get();
        $picex = Transaction::select('pic')->where('is_active', 1)->distinct()->get();
        $projectex = Transaction::select('project_id')->where('is_active', 1)->with('transactionProject')->distinct()->get();
        $accountex = Account::where('is_active', 1)->get();

        return view('finance-division.cash.index', compact('allTransactionex', 'picex', 'projectex', 'accountex'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finance-division.cash.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        return view('finance-division.cash.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        return view('finance-division.cash.edit');
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
            $filename = $todayDate .' Cash Transaction.xlsx';
            return Excel::download(new CashExport($request), $filename);
        }

        if($request->format == 'csv'){
            $filename = $todayDate .' Cash Transaction.csv';
            return Excel::download(new CashExport($request), $filename);
        }
        
        if($request->format == 'pdf'){
            $transaction = Transaction::where('is_active', 1)->where('status', 3)->where(function($query) use($request){
                if($request->datefilterex){
                    $expDate = explode(' -> ', $request->datefilterex);
                    $query->whereBetween('date', [$expDate[0],$expDate[1]]);
                }
                if($request->accountsex){
                    $query->whereIn('referral_id', $request->accountsex);
                }
                if($request->picsex){
                    $query->whereIn('pic', $request->picsex);
                }
                if($request->projectsex){
                    $query->whereIn('project_id', $request->projectsex);
                }
            })->with(['transactionAccount', 'transactionProject', 'transactionFiles'])->get();

            $arrayData = array();
            $result = array('Date', 'Token', 'Description', 'Referral', 'Debit', 'Credit', 'PIC', 'Project');
            $dataTa = array();

            foreach($transaction as $t){
                if(empty($t->transactionProject)){
                    $result = array(
                        'Date' => $t->date,
                        'Token' => $t->token,
                        'Description' => $t->description,
                        'Referral' => $t->transactionAccount[0]->referral.' - '.$t->transactionAccount[0]->name,
                        'Debit' => $t->debit,
                        'Credit' => $t->credit,
                        'PIC' => '-',
                        'Project' => '-',
                    );
                }else{
                    $result = array(
                        'Date' => $t->date,
                        'Token' => $t->token,
                        'Description' => $t->description,
                        'Referral' => $t->transactionAccount[0]->referral.' - '.$t->transactionAccount[0]->name,
                        'Debit' => $t->debit,
                        'Credit' => $t->credit,
                        'PIC' => $t->pic,
                        'Project' => $t->transactionProject->name,
                    );
                }
                array_push($arrayData, $result);
            }
                
            $pdf = PDF::loadView('finance-division.cash.pdf', ['arrayData' => $arrayData, 'todayDate' => $todayDate]);
            $pdf->setPaper('A4', 'landscape');
            $filename = $todayDate .' Cash Transaction.pdf';
            return $pdf->download($filename);
        }
    }
}
