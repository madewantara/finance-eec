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
use Carbon\Carbon;

class FilterIndexEscrow extends Component
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
    public $types;
    public $statuss;
    public $balance;

    public function resetescrow()
    {
        $this->reset();
        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
        $this->emit('refreshNotification');
    }

    public function submitUpdateBalance()
    {
        $nominal = (int) preg_replace("/[^0-9]/", "", $this->balance);
        Balance::where([['category', 'escrow'], ['year', Carbon::now()->year]])->update(['balance' => $nominal]);

        $transubs = Transaction::where([
            ['is_active', 1],
            ['category', 'escrow'],
            ['status', 4],
            ['debit', 0],
        ])->get();

        $curBalance = Balance::where([['category', 'escrow'], ['year', Carbon::now()->year]])->pluck('balance');
        $escrowBalance = $curBalance[0];
        foreach($transubs as $ts){
            $escrowBalance = $escrowBalance - $ts->credit;
        }

        Balance::where([['category', 'escrow'], ['year', Carbon::now()->year]])->update(['balance' => $escrowBalance]);

        $this->dispatchBrowserEvent('closeModal');
        $this->reset();

        $this->emit('refreshDropdown');
        $this->emit('refreshNominal');
        $this->emit('refreshNotification');

        session()->flash('success', 'Mandiri escrow balance successfully updated');
    }

    public function submitfilterescrow()
    {
        $this->datefilter;
        $this->accounts;
        $this->pics;
        $this->projects;
        $this->paidtos;
        $this->types;
        $this->statuss;
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
            ['category', 'escrow'],
            ['uuid', $uuid['uuid']],
        ])->update(['status' => 4]);

        $transubs = Transaction::where([
            ['is_active', 1],
            ['category', 'escrow'],
            ['status', 4],
            ['uuid', $uuid['uuid']],
            ['debit', 0],
        ])->get();

        $curBalance = Balance::where([['category', 'escrow'], ['year', Carbon::now()->year]])->pluck('balance');
        $escrowBalance = $curBalance[0];
        foreach($transubs as $ts){
            $escrowBalance = $escrowBalance - $ts->credit;
        }

        Balance::where([['category', 'escrow'], ['year', Carbon::now()->year]])->update(['balance' => $escrowBalance]);

        $log = ActivityLog::create([
            'user_id' => session('user')['nip'],
            'category' => 'escrow-paid',
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
            ['category', 'escrow']
        ])->get();

        if(empty($checkTransaction)){
            session()->flash('error','Transaction does not exists');
        }else{
            $deleteTransaction = Transaction::where([
                ['uuid', $uuid['uuid']],
                ['is_active', 1],
                ['category', 'escrow'],
            ])->update(['is_active' => 0]);
    
            $log = ActivityLog::create([
                'user_id' => session('user')['nip'],
                'category' => 'escrow-delete',
                'activity_id' => $uuid['uuid'],
            ]);
    
            session()->flash('success', 'Mandiri escrow transaction successfully deleted');
        }
    }

    public function render()
    {
        $pic = Transaction::select('pic')->where('is_active', 1)->where('category', 'escrow')->where('pic', '<>', NULL)->distinct()->get();
        $paidto = Transaction::select('paid_to')->where('is_active', 1)->where('category', 'escrow')->where('paid_to', '<>', NULL)->distinct()->get();
        $project = Transaction::select('project_id')->where('is_active', 1)->where('category', 'escrow')->where('project_id', '<>', NULL)->with('transactionProject')->distinct()->get();
        $account = Account::where('is_active', 1)->orderBy('referral', 'asc')->get();
        $distAllTrans = Transaction::select('uuid')->where('is_active', 1)->where('category', 'escrow')->distinct()->get();
        $escrowBalance = Balance::where([['category', 'escrow'], ['year', Carbon::now()->year]])->get();
        $this->balance = 'Rp. 0';

        if($this->search){
            $data = Transaction::select('uuid')->where('is_active', 1)->where('category', 'escrow')->where(function($query){
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
                $model = Transaction::where('is_active', 1)->where('category', 'escrow')->where('uuid', $tr)->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->get();
                $transUuid = [];
                array_push($transUuid, $model);
                array_push($dataTrans, $transUuid);
            }

            $transactionObj = collect($dataTrans);
            $items = $transactionObj->forPage($this->page, $this->pagesize);
            $transaction = new LengthAwarePaginator($items, $transactionObj->count(), $this->pagesize, $this->page);
        } 
        elseif($this->datefilter || $this->accounts || $this->pics || $this->projects || $this->paidtos || $this->types || $this->statuss){
            $data = Transaction::select('uuid')->where('is_active', 1)->where('category', 'escrow')->where(function($query){
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
                if($this->types){
                    $query->whereIn('type', $this->types);
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
                $model = Transaction::where('is_active', 1)->where('category', 'escrow')->where('uuid', $tr)->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->get();
                $transUuid = [];
                array_push($transUuid, $model);
                array_push($dataTrans, $transUuid);
            }

            $transactionObj = collect($dataTrans);
            $items = $transactionObj->forPage($this->page, $this->pagesize);
            $transaction = new LengthAwarePaginator($items, $transactionObj->count(), $this->pagesize, $this->page);
        }
        else{
            $data = Transaction::select('uuid')->where('is_active', 1)->where('category', 'escrow')->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->distinct()->get();
            
            $tempTrans = [];
            foreach($data as $t){
                array_push($tempTrans, $t->uuid);
            }

            $dataTrans = [];
            foreach($tempTrans as $tr){
                $model = Transaction::where('is_active', 1)->where('category', 'escrow')->where('uuid', $tr)->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->get();
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

        return view('livewire.finance-division.filter-index-escrow', ['transaction' => $transaction, 'account' => $account, 'pic' => $pic, 'paidto' => $paidto, 'project' => $project, 'distAllTrans' => $distAllTrans, 'escrowBalance' => $escrowBalance]);
    }
}
