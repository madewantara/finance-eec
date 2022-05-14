<?php

namespace App\Http\Livewire\FinanceDirector;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\Balance;
use App\Models\ActivityLog;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FilterIndexOperational extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search; 
    public $pagesize = 10; 
    public $accounts;
    public $datefilter;
    public $pics;
    public $projects;
    public $paidtos;
    public $statuss;
    public $approveAct = 2; 
    public $uuid; 

    protected $rules = [
        'approveAct' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetoperational()
    {
        $this->reset();
        $this->emit('refreshDropdown');
        $this->emit('refreshNotification');
        $this->emit('closeApproval');
    }

    public function submitfilteroperational()
    {
        $this->datefilter;
        $this->accounts;
        $this->pics;
        $this->projects;
        $this->paidtos;
        $this->statuss;
        $this->emit('refreshDropdown');
        $this->emit('refreshNotification');
        $this->emit('closeApproval');
    }

    public function resetInputFields()
    {
        $this->approveAct = 2;
    }

    public function edit($uuid)
    {
        $this->updateMode = true;
        $this->approveAct = 2;
        $this->uuid = $uuid;

        $this->emit('openEditTrans');
    }

    public function approveTrans()
    {
        $validated = $this->validate();

        Transaction::where([
            ['is_active', 1],
            ['type', 2],
            ['category', 'operational'],
            ['uuid', $this->uuid],
        ])->update(['status' => $validated['approveAct']]);

        if($validated['approveAct'] == 2){
            $log = ActivityLog::create([
                'user_id' => Auth::id(),
                'category' => 'operational-approved-findir',
                'activity_id' => $this->uuid,
            ]);

            session()->flash('success', 'Transaction status successfully updated to approved by finance director');
        }else{
            $log = ActivityLog::create([
                'user_id' => Auth::id(),
                'category' => 'operational-rejected',
                'activity_id' => $this->uuid,
            ]);

            session()->flash('success', 'Transaction status successfully updated to rejected');
        }
    
        $this->resetInputFields();
        $this->emit('closeApproval');
        $this->emit('refreshDropdown');
        $this->emit('refreshNotification');
    }

    public function render()
    {
        $pic = Transaction::select('pic')->where('is_active', 1)->where('type', 2)->where('category', 'operational')->where('pic', '<>', NULL)->distinct()->get();
        $paidto = Transaction::select('paid_to')->where('is_active', 1)->where('type', 2)->where('category', 'operational')->where('paid_to', '<>', NULL)->distinct()->get();
        $project = Transaction::select('project_id')->where('is_active', 1)->where('type', 2)->where('category', 'operational')->where('project_id', '<>', NULL)->with('transactionProject')->distinct()->get();
        $account = Account::where('is_active', 1)->get();
        $distAllTrans = Transaction::select('uuid')->where('is_active', 1)->where('type', 2)->where('category', 'operational')->distinct()->get();
        $operationalBalance = Balance::where([['category', 'operational'], ['year', Carbon::now()->year]])->get();

        if($this->search){
            $data = Transaction::select('uuid')->where('is_active', 1)->where('type', 2)->where('category', 'operational')->where(function($query){
                $query->where('date', 'like', '%'.$this->search.'%')
                ->orWhere('token', 'like', '%'.$this->search.'%')
                ->orWhere('description', 'like', '%'.$this->search.'%')
                ->orWhere('pic', 'like', '%'.$this->search.'%')
                ->orWhere('paid_to', 'like', '%'.$this->search.'%')
                ->orWhereHas('transactionAccount', function($acc){
                    $acc->where('referral', 'like', '%'.$this->search.'%');
                })
                ->orWhereHas('transactionProject', function($pro){
                    $pro->where('name', 'like', '%'.$this->search.'%');
                });
            })->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->distinct()->get();
            
            $tempTrans = [];
            foreach($data as $t){
                array_push($tempTrans, $t->uuid);
            }

            $dataTrans = [];
            foreach($tempTrans as $tr){
                $model = Transaction::where('is_active', 1)->where('type', 2)->where('category', 'operational')->where('uuid', $tr)->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->get();
                $transUuid = [];
                array_push($transUuid, $model);
                array_push($dataTrans, $transUuid);
            }

            $transactionObj = collect($dataTrans);
            $items = $transactionObj->forPage($this->page, $this->pagesize);
            $transaction = new LengthAwarePaginator($items, $transactionObj->count(), $this->pagesize, $this->page);
        } 
        elseif($this->datefilter || $this->accounts || $this->pics || $this->projects || $this->paidtos || $this->statuss){
            $data = Transaction::select('uuid')->where('is_active', 1)->where('type', 2)->where('category', 'operational')->where(function($query){
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
                if($this->paidtos){
                    $query->whereIn('paid_to', $this->paidtos);
                }
                if($this->statuss){
                    $query->whereIn('status', $this->statuss);
                }
            })->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->distinct()->get();

            $tempTrans = [];
            foreach($data as $t){
                array_push($tempTrans, $t->uuid);
            }

            $dataTrans = [];
            foreach($tempTrans as $tr){
                $model = Transaction::where('is_active', 1)->where('type', 2)->where('category', 'operational')->where('uuid', $tr)->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->get();
                $transUuid = [];
                array_push($transUuid, $model);
                array_push($dataTrans, $transUuid);
            }

            $transactionObj = collect($dataTrans);
            $items = $transactionObj->forPage($this->page, $this->pagesize);
            $transaction = new LengthAwarePaginator($items, $transactionObj->count(), $this->pagesize, $this->page);
        }
        else{
            $data = Transaction::select('uuid')->where('is_active', 1)->where('type', 2)->where('category', 'operational')->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->distinct()->get();
            
            $tempTrans = [];
            foreach($data as $t){
                array_push($tempTrans, $t->uuid);
            }

            $dataTrans = [];
            foreach($tempTrans as $tr){
                $model = Transaction::where('is_active', 1)->where('type', 2)->where('category', 'operational')->where('uuid', $tr)->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->get();
                $transUuid = [];
                array_push($transUuid, $model);
                array_push($dataTrans, $transUuid);
            }

            $transactionObj = collect($dataTrans);
            $items = $transactionObj->forPage($this->page, $this->pagesize);
            $transaction = new LengthAwarePaginator($items, $transactionObj->count(), $this->pagesize, $this->page);
        }

        $this->emit('refreshDropdown');
        $this->emit('refreshNotification');
        $this->emit('closeApproval');

        return view('livewire.finance-director.filter-index-operational', ['transaction' => $transaction, 'account' => $account, 'pic' => $pic, 'paidto' => $paidto, 'project' => $project, 'distAllTrans' => $distAllTrans, 'operationalBalance' => $operationalBalance]);
    }
}
