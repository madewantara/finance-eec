<?php

namespace App\Http\Livewire\ExecutiveDirector;

use Livewire\Component;
use App\Models\Balance;
use App\Models\Transaction;
use App\Models\ActivityLog;
use App\Models\Report;
use Carbon\Carbon;

class EditTransactionDashboard extends Component
{
    public $approveAct = 3; 
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
        $this->approveAct = 3;
    }

    public function editCash($uuid)
    {
        $this->updateMode = true;
        $this->approveAct = 3;
        $this->uuid = $uuid;

        $this->emit('openEditCashTrans');
    }

    public function editOperational($uuid)
    {
        $this->updateMode = true;
        $this->approveAct = 3;
        $this->uuid = $uuid;

        $this->emit('openEditOperationalTrans');
    }

    public function editEscrow($uuid)
    {
        $this->updateMode = true;
        $this->approveAct = 3;
        $this->uuid = $uuid;

        $this->emit('openEditEscrowTrans');
    }

    public function editReport($uuid)
    {
        $this->updateMode = true;
        $this->approveAct = 3;
        $this->uuid = $uuid;

        $this->emit('openEditReport');
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

        if($validated['approveAct'] == 3){
            $log = ActivityLog::create([
                'user_id' => session('user')['nip'],
                'category' => 'cash-approved-excdir',
                'activity_id' => $this->uuid,
            ]);

            session()->flash('success', 'Transaction status successfully updated to approved by executive director');
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

        if($validated['approveAct'] == 3){
            $log = ActivityLog::create([
                'user_id' => session('user')['nip'],
                'category' => 'operational-approved-excdir',
                'activity_id' => $this->uuid,
            ]);

            session()->flash('success', 'Transaction status successfully updated to approved by executive director');
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

        if($validated['approveAct'] == 3){
            $log = ActivityLog::create([
                'user_id' => session('user')['nip'],
                'category' => 'escrow-approved-excdir',
                'activity_id' => $this->uuid,
            ]);

            session()->flash('success', 'Transaction status successfully updated to approved by executive director');
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

    public function approveReport()
    {
        $validated = $this->validate();
        
        Report::where([
            ['is_active', 1],
            ['type', 2],
            ['uuid', $this->uuid],
        ])->update(['status' => $validated['approveAct']]);

        if($validated['approveAct'] == 3){
            $log = ActivityLog::create([
                'user_id' => session('user')['nip'],
                'category' => 'report-approved',
                'activity_id' => $this->uuid,
            ]);

            session()->flash('success', 'Report status successfully updated to approved');
        }else{
            $log = ActivityLog::create([
                'user_id' => session('user')['nip'],
                'category' => 'report-rejected',
                'activity_id' => $this->uuid,
            ]);

            session()->flash('success', 'Report status successfully updated to rejected');
        }
    
        $this->resetInputFields();
        $this->emit('closeReportApproval');
        $this->emit('refreshNotification');
    }

    public function render()
    {
        $cashBalance = Balance::where([['year', Carbon::now()->year], ['category', 'cash']])->first();
        $optBalance = Balance::where([['year', Carbon::now()->year], ['category', 'operational']])->first();
        $escBalance = Balance::where([['year', Carbon::now()->year], ['category', 'escrow']])->first();
        $reportBs = Report::where([['is_active', 1], ['type', 2], ['report_type', 1]])->get();
        $reportPl = Report::where([['is_active', 1], ['type', 2], ['report_type', 2]])->get();

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
        
        $repPen = Report::where([
                ['is_active', 1],
                ['type', 2],
                ['status', 1],
            ])->get();
        $repAcc = Report::where([
                ['is_active', 1],
                ['type', 2],
                ['status', 3],
            ])->get();
        $repRej = Report::where([
                ['is_active', 1],
                ['type', 2],
                ['status', 2],
            ])->get();

        $needApprovedCash = Transaction::where([
            ['is_active', 1],
            ['category', 'cash'],
            ['type', 2],
            ['status', 2],
            ['debit', 0]
        ])->get()->unique('uuid');

        $needApprovedOpt = Transaction::where([
            ['is_active', 1],
            ['category', 'operational'],
            ['type', 2],
            ['status', 2],
            ['debit', 0]
        ])->get()->unique('uuid');

        $needApprovedEsc = Transaction::where([
            ['is_active', 1],
            ['category', 'escrow'],
            ['type', 2],
            ['status', 2],
            ['debit', 0]
        ])->get()->unique('uuid');

        $needApprovedRep = Report::where([
            ['is_active', 1],
            ['type', 2],
            ['status', 1],
        ])->get();

        $this->emit('refreshNotification');

        return view('livewire.executive-director.edit-transaction-dashboard',
            [
                'cashBalance' => $cashBalance, 
                'optBalance' => $optBalance, 
                'escBalance' => $escBalance, 
                'reportBs' => $reportBs, 
                'reportPl' => $reportPl, 
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
                'repPen' => $repPen, 
                'repAcc' => $repAcc, 
                'repRej' => $repRej, 
                'needApprovedCash' => $needApprovedCash, 
                'needApprovedOpt' => $needApprovedOpt, 
                'needApprovedEsc' => $needApprovedEsc,
                'needApprovedRep' => $needApprovedRep,
            ]    
        );
    }
}
