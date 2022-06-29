<?php

namespace App\Http\Livewire\FinanceDirector;

use Livewire\Component;
use App\Models\Balance;
use App\Models\Transaction;
use App\Models\ActivityLog;
use Carbon\Carbon;

class EditTransactionDashboard extends Component
{
    public $approveAct = 2; 
    public $uuid; 

    protected $rules = [
        'approveAct' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetInputFields()
    {
        $this->approveAct = 2;
    }

    public function editCash($uuid)
    {
        $this->updateMode = true;
        $this->approveAct = 2;
        $this->uuid = $uuid;

        $this->emit('openEditCashTrans');
    }

    public function editOperational($uuid)
    {
        $this->updateMode = true;
        $this->approveAct = 2;
        $this->uuid = $uuid;

        $this->emit('openEditOperationalTrans');
    }

    public function editEscrow($uuid)
    {
        $this->updateMode = true;
        $this->approveAct = 2;
        $this->uuid = $uuid;

        $this->emit('openEditEscrowTrans');
    }

    public function approveCashTrans()
    {
        $validated = $this->validate();

        Transaction::where([
            ['is_active', 1],
            ['type', 2],
            ['category', 'cash'],
            ['uuid', $this->uuid],
        ])->update(['status' => $validated['approveAct']]);

        if($validated['approveAct'] == 2){
            $log = ActivityLog::create([
                'user_id' => session('user')['nip'],
                'category' => 'cash-approved-findir',
                'activity_id' => $this->uuid,
            ]);

            session()->flash('success', 'Transaction status successfully updated to approved by finance director');
        }else{
            $log = ActivityLog::create([
                'user_id' => session('user')['nip'],
                'category' => 'cash-rejected',
                'activity_id' => $this->uuid,
            ]);

            session()->flash('success', 'Transaction status successfully updated to rejected');
        }
    
        $this->resetInputFields();
        $this->emit('closeCashApproval');
        $this->emit('refreshNotification');
    }

    public function approveOperationalTrans()
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
                'user_id' => session('user')['nip'],
                'category' => 'operational-approved-findir',
                'activity_id' => $this->uuid,
            ]);

            session()->flash('success', 'Transaction status successfully updated to approved by finance director');
        }else{
            $log = ActivityLog::create([
                'user_id' => session('user')['nip'],
                'category' => 'operational-rejected',
                'activity_id' => $this->uuid,
            ]);

            session()->flash('success', 'Transaction status successfully updated to rejected');
        }
    
        $this->resetInputFields();
        $this->emit('closeOperationalApproval');
        $this->emit('refreshNotification');
    }

    public function approveEscrowTrans()
    {
        $validated = $this->validate();
        
        Transaction::where([
            ['is_active', 1],
            ['type', 2],
            ['category', 'escrow'],
            ['uuid', $this->uuid],
        ])->update(['status' => $validated['approveAct']]);

        if($validated['approveAct'] == 2){
            $log = ActivityLog::create([
                'user_id' => session('user')['nip'],
                'category' => 'escrow-approved-findir',
                'activity_id' => $this->uuid,
            ]);

            session()->flash('success', 'Transaction status successfully updated to approved by finance director');
        }else{
            $log = ActivityLog::create([
                'user_id' => session('user')['nip'],
                'category' => 'escrow-rejected',
                'activity_id' => $this->uuid,
            ]);

            session()->flash('success', 'Transaction status successfully updated to rejected');
        }
    
        $this->resetInputFields();
        $this->emit('closeEscrowApproval');
        $this->emit('refreshNotification');
    }

    public function render()
    {
        $cashBalance = Balance::where([['year', Carbon::now()->year], ['category', 'cash']])->first();
        $optBalance = Balance::where([['year', Carbon::now()->year], ['category', 'operational']])->first();
        $escBalance = Balance::where([['year', Carbon::now()->year], ['category', 'escrow']])->first();

        $cashTransPen = Transaction::select('uuid')->where([
                ['is_active', 1],
                ['category', 'cash'],
                ['type', 2],
            ])->where(function($query){
                $query->where('status', 1)
                ->orWhere('status', 2);
            })->distinct()->get();
        $cashTransAcc = Transaction::select('uuid')->where([
                ['is_active', 1],
                ['category', 'cash'],
                ['type', 2],
                ['status', 3]
            ])->distinct()->get();
        $cashTransRej = Transaction::select('uuid')->where([
                ['is_active', 1],
                ['category', 'cash'],
                ['type', 2],
                ['status', 5]
            ])->distinct()->get();
        $cashTransPaid = Transaction::select('uuid')->where([
                ['is_active', 1],
                ['category', 'cash'],
                ['type', 2],
                ['status', 4]
            ])->distinct()->get();

        $optTransPen = Transaction::select('uuid')->where([
                ['is_active', 1],
                ['category', 'operational'],
                ['type', 2],
            ])->where(function($query){
                $query->where('status', 1)
                ->orWhere('status', 2);
            })->distinct()->get();
        $optTransAcc = Transaction::select('uuid')->where([
                ['is_active', 1],
                ['category', 'operational'],
                ['type', 2],
                ['status', 3]
            ])->distinct()->get();
        $optTransRej = Transaction::select('uuid')->where([
                ['is_active', 1],
                ['category', 'operational'],
                ['type', 2],
                ['status', 5]
            ])->distinct()->get();
        $optTransPaid = Transaction::select('uuid')->where([
                ['is_active', 1],
                ['category', 'operational'],
                ['type', 2],
                ['status', 4]
            ])->distinct()->get();

        $escTransPen = Transaction::select('uuid')->where([
                ['is_active', 1],
                ['category', 'escrow'],
                ['type', 2],
            ])->where(function($query){
                $query->where('status', 1)
                ->orWhere('status', 2);
            })->distinct()->get();
        $escTransAcc = Transaction::select('uuid')->where([
                ['is_active', 1],
                ['category', 'escrow'],
                ['type', 2],
                ['status', 3]
            ])->distinct()->get();
        $escTransRej = Transaction::select('uuid')->where([
                ['is_active', 1],
                ['category', 'escrow'],
                ['type', 2],
                ['status', 5]
            ])->distinct()->get();
        $escTransPaid = Transaction::select('uuid')->where([
                ['is_active', 1],
                ['category', 'escrow'],
                ['type', 2],
                ['status', 4]
            ])->distinct()->get();

        $needApprovedCash = Transaction::where([
            ['is_active', 1],
            ['category', 'cash'],
            ['type', 2],
            ['status', 1],
            ['debit', 0]
        ])->get()->unique('uuid');

        $needApprovedOpt = Transaction::where([
            ['is_active', 1],
            ['category', 'operational'],
            ['type', 2],
            ['status', 1],
            ['debit', 0]
        ])->get()->unique('uuid');

        $needApprovedEsc = Transaction::where([
            ['is_active', 1],
            ['category', 'escrow'],
            ['type', 2],
            ['status', 1],
            ['debit', 0]
        ])->get()->unique('uuid');

        $this->emit('refreshNotification');

        return view('livewire.finance-director.edit-transaction-dashboard',
            [
                'cashBalance' => $cashBalance, 
                'optBalance' => $optBalance, 
                'escBalance' => $escBalance, 
                'cashTransPen' => $cashTransPen, 
                'cashTransAcc' => $cashTransAcc, 
                'cashTransRej' => $cashTransRej, 
                'cashTransPaid' => $cashTransPaid, 
                'optTransPen' => $optTransPen, 
                'optTransAcc' => $optTransAcc, 
                'optTransRej' => $optTransRej, 
                'optTransPaid' => $optTransPaid, 
                'escTransPen' => $escTransPen, 
                'escTransAcc' => $escTransAcc, 
                'escTransRej' => $escTransRej, 
                'escTransPaid' => $escTransPaid, 
                'needApprovedCash' => $needApprovedCash, 
                'needApprovedOpt' => $needApprovedOpt, 
                'needApprovedEsc' => $needApprovedEsc
            ]    
        );
    }
}
