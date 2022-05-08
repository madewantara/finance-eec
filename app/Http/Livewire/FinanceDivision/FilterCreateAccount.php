<?php

namespace App\Http\Livewire\FinanceDivision;

use Livewire\Component;
use App\Models\Account;

class FilterCreateAccount extends Component
{
    public $search;
    public $accounts;
    public $category = 'all';

    public function submitfilteraccount($chocategory)
    {
        $this->category = $chocategory;
    }

    public function render()
    {   
        $account = Account::where('is_active', 1)->get();
        $countAccount = count($account);
        $categories = Account::where('is_active', 1)->distinct()->pluck('category')->toArray();
        $countCategory = array();
        foreach($categories as $c){
            $count = count(Account::where([
                ['is_active', 1],
                ['category', $c]
            ])->get());
            array_push($countCategory, $count);
        }

        if(empty($this->category)){
            $this->accounts = Account::where('is_active', 1)->where('name', 'LIKE', '%'.$this->search.'%')->get();
        }
        else{
            if($this->category == 'all'){
                $this->accounts = Account::where('is_active', 1)->where('name', 'LIKE', '%'.$this->search.'%')->get();
            }
            else{
                if(empty($this->search)){
                    $this->accounts = Account::where('is_active', 1)->where('category', $this->category)->get();
                }
                else{
                    $this->accounts = Account::where([
                        ['is_active', 1],
                        ['category', $this->category],
                        ['name', 'LIKE', '%'.$this->search.'%']
                    ])->get();
                }
            }
        }

        return view('livewire.finance-division.filter-create-account', ['countAccount' => $countAccount, 'categories' => $categories, 'countCategory' => $countCategory]);
    }
}