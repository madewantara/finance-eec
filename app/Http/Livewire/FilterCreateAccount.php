<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Account;

class FilterCreateAccount extends Component
{
    public $search;
    public $accounts;
    public $filter;

    public function render()
    {   
        $filter = $this->filter;
        $search = $this->search;

        if(empty($filter)){
            $this->accounts = Account::where('name', 'LIKE', '%'.$search.'%')->get();
        }
        else{
            if($filter == 'all'){
                $this->accounts = Account::where('name', 'LIKE', '%'.$search.'%')->get();
            }
            else{
                if(empty($search)){
                    $this->accounts = Account::where('category', $filter)->get();
                }
                else{
                    $this->accounts = Account::where([
                        ['category', $filter],
                        ['name', 'LIKE', '%'.$search.'%']
                    ])->get();
                }
            }
        }

        return view('livewire.filter-create-account');
    }
}