<?php

namespace App\Http\Livewire\FinanceDivision;

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
    public $allEmployee;
    public $sumDebit = 0;
    public $sumCredit = 0;
    public $currDate;

    public function mount(){
        $this->allProject = Project::where('is_active', 1)->with(["projectCategory", "projectLocation"])->get();
        $this->allReferral = Account::where('is_active', 1)->orderBy('referral', 'asc')->get();
        $this->allEmployee = session('allUser')['data']['data']['data'];
        
        if(old('transDebit')){
            foreach(old('transDebit') as $index => $od){
                $this->transDebit[$index] = ['descriptionDebit' => $od['descriptionDebit'], 'referralDebit' => $od['referralDebit'], 'debit' => $od['debit']];
            }
        }else{
            $this->transDebit[] = ['descriptionDebit' => '', 'referralDebit' => '', 'debit' => ''];
        }

        if(old('transCredit')){
            foreach(old('transCredit') as $index => $oc){
                $this->transCredit[$index] = ['descriptionCredit' => $oc['descriptionCredit'], 'referralCredit' => $oc['referralCredit'], 'credit' => $oc['credit']];
            }
        }else{
            $this->transCredit[] = ['descriptionCredit' => '', 'referralCredit' => '', 'credit' => ''];
        }
        $this->emit('refreshDropdown');
        $this->emit('refreshValidation');
        $this->emit('refreshNotification');
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
        $this->emit('refreshValidation');
        $this->emit('refreshNotification');

        return view('livewire.finance-division.create-cash');
    }

    public function addDebit(){
        $this->transDebit[] = ['descriptionDebit' => '', 'referralDebit' => '', 'debit' => ''];
        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
        $this->emit('refreshValidation');
        $this->emit('refreshNotification');
    }
    
    public function addCredit(){
        $this->transCredit[] = ['descriptionCredit' => '', 'referralCredit' => '', 'credit' => ''];
        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
        $this->emit('refreshValidation');
        $this->emit('refreshNotification');
    }

    public function removeDebit($indexDebit){
        unset($this->transDebit[$indexDebit]);
        array_values($this->transDebit);
        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
        $this->emit('refreshValidation');
        $this->emit('refreshNotification');
    }

    public function removeCredit($indexCredit){
        unset($this->transCredit[$indexCredit]);
        array_values($this->transCredit);
        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
        $this->emit('refreshValidation');
        $this->emit('refreshNotification');
    }

    public function resetcash()
    {
        $this->reset();
        $this->allProject = Project::where('is_active', 1)->with(["projectCategory", "projectLocation"])->get();
        $this->allReferral = Account::where('is_active', 1)->orderBy('referral', 'asc')->get();
        $this->transDebit[] = ['descriptionDebit' => '', 'referralDebit' => '', 'debit' => ''];
        $this->transCredit[] = ['descriptionCredit' => '', 'referralCredit' => '', 'credit' => ''];
        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
        $this->emit('refreshValidation');
        $this->emit('refreshNotification');
    }
}
