<?php

namespace App\Http\Livewire\FinanceDivision;

use Livewire\Component;
use App\Models\Balance;
use App\Models\Transaction;
use App\Models\ActivityLog;
use Carbon\Carbon;

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
            'user_id' => session('user')['nip'],
            'category' => 'cash-paid',
            'activity_id' => $uuid['uuid'],
        ]);

        session()->flash('success', 'Transaction status successfully updated to paid');
    }

    public function updateStatusOpt($uuid)
    {
        Transaction::where([
            ['is_active', 1],
            ['category', 'operational'],
            ['uuid', $uuid['uuid']],
        ])->update(['status' => 4]);

        $transubs = Transaction::where([
            ['is_active', 1],
            ['category', 'operational'],
            ['status', 4],
            ['uuid', $uuid['uuid']],
            ['debit', 0],
        ])->get();

        $curBalance = Balance::where([['category', 'operational'], ['year', Carbon::now()->year]])->pluck('balance');
        $optBalance = $curBalance[0];
        foreach($transubs as $ts){
            $optBalance = $optBalance - $ts->credit;
        }

        Balance::where([['category', 'operational'], ['year', Carbon::now()->year]])->update(['balance' => $optBalance]);

        $log = ActivityLog::create([
            'user_id' => session('user')['nip'],
            'category' => 'operational-paid',
            'activity_id' => $uuid['uuid'],
        ]);

        session()->flash('success', 'Transaction status successfully updated to paid');
    }

    public function updateStatusEsc($uuid)
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
        $escBalance = $curBalance[0];
        foreach($transubs as $ts){
            $escBalance = $escBalance - $ts->credit;
        }

        Balance::where([['category', 'escrow'], ['year', Carbon::now()->year]])->update(['balance' => $escBalance]);

        $log = ActivityLog::create([
            'user_id' => session('user')['nip'],
            'category' => 'escrow-paid',
            'activity_id' => $uuid['uuid'],
        ]);

        session()->flash('success', 'Transaction status successfully updated to paid');
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

        $needPaidCash = Transaction::where([
            ['is_active', 1],
            ['category', 'cash'],
            ['type', 2],
            ['status', 3],
            ['debit', 0]
        ])->get()->unique('uuid');

        $needPaidOpt = Transaction::where([
            ['is_active', 1],
            ['category', 'operational'],
            ['type', 2],
            ['status', 3],
            ['debit', 0]
        ])->get()->unique('uuid');

        $needPaidEsc = Transaction::where([
            ['is_active', 1],
            ['category', 'escrow'],
            ['type', 2],
            ['status', 3],
            ['debit', 0]
        ])->get()->unique('uuid');

        $this->emit('refreshNotification');

        return view('livewire.finance-division.edit-transaction-dashboard',
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
                'needPaidCash' => $needPaidCash, 
                'needPaidOpt' => $needPaidOpt, 
                'needPaidEsc' => $needPaidEsc
            ]    
        );
    }
}
