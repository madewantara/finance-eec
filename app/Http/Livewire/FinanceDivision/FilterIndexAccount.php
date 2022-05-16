<?php

namespace App\Http\Livewire\FinanceDivision;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Account;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

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
        $allAccount = Account::where('is_active', 1)->get();
        $category = Account::select('category')->where('is_active', 1)->distinct()->get();
        if($this->filtercategory){
            $account = Account::where('is_active', 1)->where('category', $this->filtercategory)->where(function($query){
                $query->where('referral', 'like', '%'.$this->search.'%')
                ->orWhere('name', 'like', '%'.$this->search.'%');
            })->orderBy('category', 'asc')->paginate($this->pagesize);
        }
        else{
            $account = Account::where('is_active', 1)->where(function($query){
                $query->where('referral', 'like', '%'.$this->search.'%')
                ->orWhere('name', 'like', '%'.$this->search.'%')
                ->orWhere('category', 'like', '%'.$this->search.'%');
            })->orderBy('category', 'asc')->paginate($this->pagesize);
        }
        $this->emit('refreshFilterCategory');
        $this->emit('refreshNotification');
        $this->emit('refreshDropdown');

        return view('livewire.finance-division.filter-index-account', ['account' => $account, 'category' => $category, 'allAccount' => $allAccount]);
    }

    public function confirmDelete($uuid){
        $this->emit('triggerDelete', ['uuid' => $uuid]);
    }

    public function destroy($uuid){
        $checkAccount = Account::where([
            ["uuid", $uuid['uuid']],
            ["is_active", 1],
        ])->get();

        if(empty($checkAccount)){
            session()->flash('error','Financial account does not exists');
        }
        else{
            $deleteAccount = Account::where([
                ["uuid", $uuid['uuid']],
                ["is_active", 1],
            ])->update(['is_active' => 0, 'referral' => NULL]);
    
            $log = ActivityLog::create([
                'user_id' => Auth::id(),
                'category' => 'account-delete',
                'activity_id' => $uuid['uuid'],
            ]);
            
            $this->emit('refreshFilterCategory');
            $this->emit('refreshNotification');
            $this->emit('refreshDropdown');

            session()->flash('success', 'Financial account successfully deleted');
        }
    }
}
