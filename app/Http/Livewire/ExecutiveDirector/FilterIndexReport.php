<?php

namespace App\Http\Livewire\ExecutiveDirector;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Report;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FilterIndexReport extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $uuid; 
    public $yearFil;
    public $status; 
    public $reportCat;
    public $pagesize = 10; 
    public $approveAct = 3; 

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

    public function edit($uuid)
    {
        $this->updateMode = true;
        $this->approveAct = 3;
        $this->uuid = $uuid;

        $this->emit('openEditRep');
    }

    public function approveRep()
    {
        $validated = $this->validate();

        Report::where([
            ['is_active', 1],
            ['type', 2],
            ['status', '1'],
            ['uuid', $this->uuid],
        ])->update(['status' => $validated['approveAct']]);

        if($validated['approveAct'] == 3){
            $log = ActivityLog::create([
                'user_id' => Auth::id(),
                'category' => 'report-approved',
                'activity_id' => $this->uuid,
            ]);

            session()->flash('success', 'Report status successfully updated to approved');
        }else{
            $log = ActivityLog::create([
                'user_id' => Auth::id(),
                'category' => 'report-rejected',
                'activity_id' => $this->uuid,
            ]);

            session()->flash('success', 'Report status successfully updated to rejected');
        }
    
        $this->resetInputFields();
        $this->emit('closeApproval');
        $this->emit('refreshDropdown');
        $this->emit('refreshNotification');
    }

    public function render()
    {
        $allreport = Report::where('is_active', 1)->where('type', 2)->get();

        $report = Report::where('is_active', 1)->where('type', 2)->where(function($query){
            if($this->status){
                $query->where('status', $this->status);
            }
            if($this->reportCat){
                $query->where('report_type', $this->reportCat);
            }
            if($this->yearFil){
                $query->where('year', 'like', '%'.$this->yearFil.'%');
            }
        })->orderBy('updated_at', 'desc')->paginate($this->pagesize);

        $this->emit('refreshDropdown');
        $this->emit('refreshNotification');

        return view('livewire.executive-director.filter-index-report', ['report' => $report, 'allReport' => $allreport]);
    }
}
