<?php

namespace App\Http\Livewire\ExecutiveDirector;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Account;
use App\Models\ActivityLog;

class FilterIndexAccount extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search; 
    public $pagesize = 10; 
    public $filtercategory;
    public $uuid;

    public function resetcategory()
    {
        $this->reset();
        $this->emit('refreshFilterCategory');
        $this->emit('refreshNotification');
        $this->emit('refreshDropdown');
    }

    public function submitfiltercategory()
    {
        $this->filtercategory;
    }

    public function render()
    {
        $allAccount = Account::where('is_active', 1)->orderBy('referral', 'asc')->get();
        $category = Account::select('category')->where('is_active', 1)->distinct()->get();
        if($this->filtercategory){
            $account = Account::where('is_active', 1)->where('category', $this->filtercategory)->where(function($query){
                $query->where('referral', 'like', '%'.$this->search.'%')
                ->orWhere('name', 'like', '%'.$this->search.'%');
            })->orderBy('category', 'asc')->orderBy('referral', 'asc')->paginate($this->pagesize);
        }
        else{
            $account = Account::where('is_active', 1)->where(function($query){
                $query->where('referral', 'like', '%'.$this->search.'%')
                ->orWhere('name', 'like', '%'.$this->search.'%')
                ->orWhere('category', 'like', '%'.$this->search.'%');
            })->orderBy('category', 'asc')->orderBy('referral', 'asc')->paginate($this->pagesize);
        }
        $this->emit('refreshFilterCategory');
        $this->emit('refreshNotification');
        $this->emit('refreshDropdown');

        return view('livewire.executive-director.filter-index-account', ['account' => $account, 'category' => $category, 'allAccount' => $allAccount]);
    }
}
