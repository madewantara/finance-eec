<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Account;
use App\Models\Project;
use Carbon\Carbon;

class CreateCash extends Component
{
    public $transDebit = [];
    public $transCredit = [];
    public $allProject;
    public $allReferral;
    public $sumDebit = 0;
    public $sumCredit = 0;
    public $currDate;

    public function mount(){
        $this->allProject = Project::with(["projectCategory", "projectLocation"])->get();
        $this->allReferral = Account::where('is_active', 1)->get();
        $this->transDebit[] = ['descriptionDebit' => '', 'referralDebit' => '', 'debit' => 'Rp. 0'];
        $this->transCredit[] = ['descriptionCredit' => '', 'referralCredit' => '', 'credit' => 'Rp. 0'];
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
        return view('livewire.create-cash');
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
