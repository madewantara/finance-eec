<?php

namespace App\Http\Livewire\FinanceDirector;

use Livewire\Component;
use App\Models\Balance;
use App\Models\Transaction;
use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EditTransactionDashboard extends Component
{
    public function confirmUpdateStatusCash($uuid){
        $this->emit('triggerUpdateStatusCash', ['uuid' => $uuid]);
    }

    public function confirmUpdateStatusOpt($uuid){
        $this->emit('triggerUpdateStatusOpt', ['uuid' => $uuid]);
    }

    public function confirmUpdateStatusEsc($uuid){
        $this->emit('triggerUpdateStatusEsc', ['uuid' => $uuid]);
    }

    public function updateStatusCash($uuid)
    {
        Transaction::where([
            ['is_active', 1],
            ['type', 2],
            ['category', 'cash'],
            ['uuid', $uuid['uuid']],
        ])->update(['status' => 2]);

        $log = ActivityLog::create([
            'user_id' => Auth::id(),
            'category' => 'cash-approved-findir',
            'activity_id' => $uuid['uuid'],
        ]);

        session()->flash('success', 'Transaction status successfully updated to approved by finance director');
    }

    public function updateStatusOpt($uuid)
    {
        Transaction::where([
            ['is_active', 1],
            ['type', 2],
            ['category', 'operational'],
            ['uuid', $uuid['uuid']],
        ])->update(['status' => 2]);

        $log = ActivityLog::create([
            'user_id' => Auth::id(),
            'category' => 'operational-approved-findir',
            'activity_id' => $uuid['uuid'],
        ]);

        session()->flash('success', 'Transaction status successfully updated to approved by finance director');
    }

    public function updateStatusEsc($uuid)
    {
        Transaction::where([
            ['is_active', 1],
            ['type', 2],
            ['category', 'escrow'],
            ['uuid', $uuid['uuid']],
        ])->update(['status' => 2]);

        $log = ActivityLog::create([
            'user_id' => Auth::id(),
            'category' => 'escrow-approved-findir',
            'activity_id' => $uuid['uuid'],
        ]);

        session()->flash('success', 'Transaction status successfully updated to approved by finance director');
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
