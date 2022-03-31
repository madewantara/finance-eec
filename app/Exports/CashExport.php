<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Transaction;

class CashExport implements FromView
{
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $transaction = Transaction::where('is_active', 1)->where('status', 3)->where(function($query){
            if($this->request->datefilterex){
                $expDate = explode(' -> ', $this->request->datefilterex);
                $query->whereBetween('date', [$expDate[0],$expDate[1]]);
            }
            if($this->request->accountsex){
                $query->whereIn('referral_id', $this->request->accountsex);
            }
            if($this->request->picsex){
                $query->whereIn('pic', $this->request->picsex);
            }
            if($this->request->projectsex){
                $query->whereIn('project_id', $this->request->projectsex);
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
                    'Referral' => $t->transactionAccount[0]->name,
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
                    'Referral' => $t->transactionAccount[0]->name,
                    'Debit' => $t->debit,
                    'Credit' => $t->credit,
                    'PIC' => $t->pic,
                    'Project' => $t->transactionProject->name,
                );
            }
            array_push($arrayData, $result);
        }
        
        if($this->request->format == 'excel'){
            return view('finance-division.cash.excel', ['arrayData' => $arrayData]);
        }
        elseif($this->request->format == 'csv'){
            return view('finance-division.cash.csv', ['arrayData' => $arrayData]);
        }
    }
}
