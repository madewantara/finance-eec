<?php

namespace App\Http\Livewire\FinanceDivision;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\Balance;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
    public $paidtos;
    public $balance;

    public function resetcash()
    {
        $this->reset();
        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
        $this->emit('refreshNotification');
    }

    public function submitUpdateBalance()
    {

        $nominal = (int) preg_replace("/[^0-9]/", "", $this->balance);
        Balance::where([['category', 'cash'], ['year', Carbon::now()->year]])->update(['balance' => $nominal]);
        
        $transubs = Transaction::where([
            ['is_active', 1],
            ['category', 'cash'],
            ['status', 4],
            ['debit', 0],
        ])->get();

        $curBalance = Balance::where([['category', 'cash'], ['year', Carbon::now()->year]])->pluck('balance');
        $cashBalance = $curBalance[0];
        foreach($transubs as $ts){
            $cashBalance = $cashBalance - $ts->credit;
        }

        Balance::where([['category', 'cash'], ['year', Carbon::now()->year]])->update(['balance' => $cashBalance]);

        $this->dispatchBrowserEvent('closeModal');
        $this->reset();

        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
        $this->emit('refreshNotification');

        session()->flash('success', 'Cash balance successfully updated');
    }

    public function submitfiltercash()
    {
        $this->datefilter;
        $this->accounts;
        $this->pics;
        $this->projects;
        $this->paidtos;
        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
        $this->emit('refreshNotification');
    }

    public function confirmUpdateStatus($uuid){
        $this->emit('triggerUpdateStatus', ['uuid' => $uuid]);
    }

    public function updateStatus($uuid)
    {
        Transaction::where([
            ['is_active', 1],
            ['category', 'cash'],
            ['uuid', $uuid['uuid']],
        ])->update(['status' => 4]);

        $transubs = Transaction::where([
            ['is_active', 1],
            ['category', 'cash'],
            ['status', 4],
            ['uuid', $uuid['uuid']],
            ['debit', 0],
        ])->get();

        $curBalance = Balance::where([['category', 'cash'], ['year', Carbon::now()->year]])->pluck('balance');
        $cashBalance = $curBalance[0];
        foreach($transubs as $ts){
            $cashBalance = $cashBalance - $ts->credit;
        }

        Balance::where([['category', 'cash'], ['year', Carbon::now()->year]])->update(['balance' => $cashBalance]);

        $log = ActivityLog::create([
            'user_id' => Auth::id(),
            'category' => 'cash-paid',
            'activity_id' => $uuid['uuid'],
        ]);

        session()->flash('success', 'Transaction status successfully updated to paid');
    }

    public function confirmDelete($uuid){
        $this->emit('triggerDelete', ['uuid' => $uuid]);
    }

    public function destroy($uuid)
    {
        $checkTransaction = Transaction::where([
            ['uuid', $uuid['uuid']],
            ['is_active', 1],
            ['category', 'cash']
        ])->get();

        if(empty($checkTransaction)){
            session()->flash('error','Transaction does not exists');
        }else{
            $deleteTransaction = Transaction::where([
                ['uuid', $uuid['uuid']],
                ['is_active', 1],
                ['category', 'cash'],
            ])->update(['is_active' => 0]);
    
            $log = ActivityLog::create([
                'user_id' => Auth::id(),
                'category' => 'cash-delete',
                'activity_id' => $uuid['uuid'],
            ]);
    
            session()->flash('success', 'Cash transaction successfully deleted');
        }
    }

    public function render()
    {
        $pic = Transaction::select('pic')->where('is_active', 1)->where('category', 'cash')->where('pic', '<>', NULL)->distinct()->get();
        $paidto = Transaction::select('paid_to')->where('is_active', 1)->where('category', 'cash')->where('paid_to', '<>', NULL)->distinct()->get();
        $project = Transaction::select('project_id')->where('is_active', 1)->where('category', 'cash')->where('project_id', '<>', NULL)->with('transactionProject')->distinct()->get();
        $account = Account::where('is_active', 1)->get();
        $distAllTrans = Transaction::select('uuid')->where('is_active', 1)->where('category', 'cash')->distinct()->get();
        $cashBalance = Balance::where([['category', 'cash'], ['year', Carbon::now()->year]])->get();
        $this->balance = 'Rp. 0';

        if($this->search){
            $data = Transaction::select('uuid')->where('is_active', 1)->where('category', 'cash')->where(function($query){
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
                $model = Transaction::where('is_active', 1)->where('category', 'cash')->where('uuid', $tr)->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->get();
                $transUuid = [];
                array_push($transUuid, $model);
                array_push($dataTrans, $transUuid);
            }

            $transactionObj = collect($dataTrans);
            $items = $transactionObj->forPage($this->page, $this->pagesize);
            $transaction = new LengthAwarePaginator($items, $transactionObj->count(), $this->pagesize, $this->page);
        } 
        elseif($this->datefilter || $this->accounts || $this->pics || $this->projects || $this->paidtos){
            $data = Transaction::select('uuid')->where('is_active', 1)->where('category', 'cash')->where(function($query){
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
            })->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->distinct()->get();

            $tempTrans = [];
            foreach($data as $t){
                array_push($tempTrans, $t->uuid);
            }

            $dataTrans = [];
            foreach($tempTrans as $tr){
                $model = Transaction::where('is_active', 1)->where('category', 'cash')->where('uuid', $tr)->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->get();
                $transUuid = [];
                array_push($transUuid, $model);
                array_push($dataTrans, $transUuid);
            }

            $transactionObj = collect($dataTrans);
            $items = $transactionObj->forPage($this->page, $this->pagesize);
            $transaction = new LengthAwarePaginator($items, $transactionObj->count(), $this->pagesize, $this->page);
        }
        else{
            $data = Transaction::select('uuid')->where('is_active', 1)->where('category', 'cash')->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->distinct()->get();
            
            $tempTrans = [];
            foreach($data as $t){
                array_push($tempTrans, $t->uuid);
            }

            $dataTrans = [];
            foreach($tempTrans as $tr){
                $model = Transaction::where('is_active', 1)->where('category', 'cash')->where('uuid', $tr)->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->get();
                $transUuid = [];
                array_push($transUuid, $model);
                array_push($dataTrans, $transUuid);
            }

            $transactionObj = collect($dataTrans);
            $items = $transactionObj->forPage($this->page, $this->pagesize);
            $transaction = new LengthAwarePaginator($items, $transactionObj->count(), $this->pagesize, $this->page);
        }

        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
        $this->emit('refreshNotification');

        return view('livewire.finance-division.filter-index-cash', ['transaction' => $transaction, 'account' => $account, 'pic' => $pic, 'paidto' => $paidto, 'project' => $project, 'distAllTrans' => $distAllTrans, 'cashBalance' => $cashBalance]);
    }
}