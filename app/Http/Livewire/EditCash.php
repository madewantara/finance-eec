<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Account;
use App\Models\Project;
use App\Models\Transaction;
use App\Models\TransactionFile;
use Carbon\Carbon;

class EditCash extends Component
{
    use WithFileUploads;

    public $transDebit = [];
    public $transCredit = [];
    public $allProject;
    public $allReferral;
    public $sumDebit = 0;
    public $sumCredit = 0;
    public $currDate;
    public $uuid;

    public function mount(){
        $transaction = Transaction::where([
            ['category', 'cash'],
            ['is_active', 1],
            ['uuid', $this->uuid],
        ])->with(['transactionFiles', 'transactionAccount', 'transactionProject'])->get();

        $report = TransactionFile::where([
            ['category', 'cash'],
            ['transaction_id', $transaction[0]->uuid],
            ['type', 1],
        ])->get();

        $attach = TransactionFile::where([
            ['category', 'cash'],
            ['transaction_id', $transaction[0]->uuid],
            ['type', 2],
        ])->get();
        
        $this->date = $transaction[0]->date;
        $this->token = $transaction[0]->token;
        $this->type = $transaction[0]->type;
        $this->project = "";
        $this->pic = "";
        $this->report = "";
        $this->attach = [];
        $this->paidto = $transaction[0]->paid_to;
        $this->status = $transaction[0]->status;
        
        if($transaction[0]->transactionProject){
            $this->project = $transaction[0]->transactionProject->name;
        }
        if ($transaction[0]->pic){
            $this->pic = $transaction[0]->pic;
        }
        if (count($report) != 0){
            $this->report = $report[0]->name;
        }
        if (count($attach) != 0){
            foreach($attach as $atc){
                array_push($this->attach, $atc->name);
            }
        }

        foreach ($transaction as $t) {
            if ($t->credit == 0){
                $this->transDebit[] = ['idDebit' => $t->id, 'descriptionDebit' => $t->description, 'debit' => 'Rp. '.number_format($t->debit, 0, ',', '.'), 'referralDebit' => $t->transactionAccount[0]->name];
            }
            elseif ($t->debit == 0){
                $this->transCredit[] = ['idCredit' => $t->id, 'descriptionCredit' => $t->description, 'credit' => 'Rp. '.number_format($t->credit, 0, ',', '.'), 'referralCredit' => $t->transactionAccount[0]->name];
            }
        }

        $this->allProject = Project::with(["projectCategory", "projectLocation"])->get();
        $this->allReferral = Account::where('is_active', 1)->get();
        $this->emit('refreshDropdown');
    }

    public function render()
    {
        $length = count($this->transDebit);
        $this->sumDebit = 0;
        $arrSumDebit = [];
        foreach($this->transDebit as $td){
            array_push($arrSumDebit, (int) preg_replace("/[^0-9]/", "", $td['debit']));
        }
        foreach($arrSumDebit as $asd){
            $this->sumDebit = $this->sumDebit + $asd;
        }
        $arrSumDebit = [];

        $this->sumCredit = 0;
        $arrSumCredit = [];
        foreach($this->transCredit as $tc){
            array_push($arrSumCredit, (int) preg_replace("/[^0-9]/", "", $tc['credit']));
        }
        foreach($arrSumCredit as $asc){
            $this->sumCredit = $this->sumCredit + $asc;
        }
        $arrSumCredit = [];

        $this->currDate = Carbon::now()->format('Y-m-d');
        
        $this->emit('refreshNominal');
        $this->emit('refreshDropdown');

        return view('livewire.edit-cash');
    }

    public function addDebit(){
        $this->transDebit[] = ['descriptionDebit' => '', 'referralDebit' => '', 'debit' => 'Rp. 0'];
        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
    }
    
    public function addCredit(){
        $this->transCredit[] = ['descriptionCredit' => '', 'referralCredit' => '', 'credit' => 'Rp. 0'];
        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
    }

    public function removeDebit($indexDebit){
        unset($this->transDebit[$indexDebit]);
        array_values($this->transDebit);
        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
    }

    public function removeCredit($indexCredit){
        unset($this->transCredit[$indexCredit]);
        array_values($this->transCredit);
        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
    }

    public function resetcash()
    {
        $this->reset();
        $this->allProject = Project::with(["projectCategory", "projectLocation"])->get();
        $this->allReferral = Account::where('is_active', 1)->get();
        $this->transDebit[] = ['descriptionDebit' => '', 'referralDebit' => '', 'debit' => 'Rp. 0'];
        $this->transCredit[] = ['descriptionCredit' => '', 'referralCredit' => '', 'credit' => 'Rp. 0'];
        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
    }
}
