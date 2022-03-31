<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class FilterIndexCash extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search; 
    public $pagesize = 10; 
    public $accounts;
    public $datefilter;
    public $pics;
    public $projects;

    public function resetcash()
    {
        $this->reset();
        $this->emit('refreshDropdown');
    }

    public function submitfiltercash()
    {
        $this->datefilter;
        $this->accounts;
        $this->pics;
        $this->projects;
        $this->emit('refreshDropdown');
    }

    public function render()
    {
        $allTransaction = Transaction::where('is_active', 1)->get();
        $pic = Transaction::select('pic')->where('is_active', 1)->distinct()->get();
        $project = Transaction::select('project_id')->where('is_active', 1)->with('transactionProject')->distinct()->get();
        $account = Account::where('is_active', 1)->get();

        $transaction = Transaction::where('is_active', 1)->where(function($query){
            if($this->datefilter){
                $expDate = explode(' -> ', $this->datefilter);
                $query->whereBetween('date', [$expDate[0],$expDate[1]]);
            }
            if($this->accounts){
                $query->whereIn('referral_id', $this->accounts);
            }
            if($this->pics){
                $query->whereIn('pic', $this->pics);
            }
            if($this->projects){
                $query->whereIn('project_id', $this->projects);
            }
            if(empty($this->datefilter) && empty($this->accounts) && empty($this->pics) && empty($this->projects)){
                $query->where('date', 'like', '%'.$this->search.'%')
                ->orWhere('token', 'like', '%'.$this->search.'%')
                ->orWhere('description', 'like', '%'.$this->search.'%')
                ->orWhere('pic', 'like', '%'.$this->search.'%')
                ->orWhereHas('transactionAccount', function($acc){
                    $acc->where('referral', 'like', '%'.$this->search.'%');
                })
                ->orWhereHas('transactionProject', function($pro){
                    $pro->where('name', 'like', '%'.$this->search.'%');
                });
            }
        })->with(['transactionAccount', 'transactionProject', 'transactionFiles'])->paginate($this->pagesize);
        
        return view('livewire.filter-index-cash', ['transaction' => $transaction, 'allTransaction' => $allTransaction, 'account' => $account, 'pic' => $pic, 'project' => $project]);
    }
}