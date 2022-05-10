<?php

namespace App\Exports\FinanceDirector;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Transaction;

class EscrowExport implements FromView
{
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $transaction = Transaction::select('uuid')->where('is_active', 1)->where('type', 2)->where('category', 'escrow')->where('status', 4)->where(function($query){
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
                if($this->request->paidtosex){
                    $query->whereIn('paid_to', $this->request->paidtosex);
                }
                if($this->request->projectsex){
                    $query->whereIn('project_id', $this->request->projectsex);
                }
            })->with(['transactionAccount', 'transactionProject', 'transactionFiles'])->orderBy('updated_at', 'desc')->distinct()->get();

        $tempTrans = [];
        foreach($transaction as $t){
            array_push($tempTrans, $t->uuid);
        }

        $dataTrans = [];
        foreach($tempTrans as $tr){
            $model = Transaction::where('is_active', 1)->where('type', 2)->where('category', 'escrow')->where('uuid', $tr)->where('status', 4)->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->get();
            $transUuid = [];
            array_push($transUuid, $model);
            array_push($dataTrans, $transUuid);
        }

        $arrayData = array();
        $result = array('Date', 'Token', 'Description', 'Referral', 'Debit', 'Credit', 'Paid To', 'PIC', 'Project');

        foreach($dataTrans as $trans){
            foreach ($trans[0] as $t){
                if(empty($t->transactionProject)){
                    $result = array(
                        'Date' => $t->date,
                        'Token' => $t->token,
                        'Description' => $t->description,
                        'Referral' => $t->transactionAccount[0]->referral." - ".$t->transactionAccount[0]->name,
                        'Debit' => $t->debit,
                        'Credit' => $t->credit,
                        'Paid To' => $t->paid_to,
                        'PIC' => '-',
                        'Project' => '-',
                    );
                }else{
                    $result = array(
                        'Date' => $t->date,
                        'Token' => $t->token,
                        'Description' => $t->description,
                        'Referral' => $t->transactionAccount[0]->referral." - ".$t->transactionAccount[0]->name,
                        'Debit' => $t->debit,
                        'Credit' => $t->credit,
                        'Paid To' => $t->paid_to,
                        'PIC' => $t->pic,
                        'Project' => $t->transactionProject->name,
                    );
                }
                array_push($arrayData, $result);
            }
        }
        
        if($this->request->format == 'excel'){
            return view('finance-director.escrow.excel', ['dataTrans' => $dataTrans]);
        }
        elseif($this->request->format == 'csv'){
            return view('finance-director.escrow.csv', ['arrayData' => $arrayData]);
        }
    }
}
