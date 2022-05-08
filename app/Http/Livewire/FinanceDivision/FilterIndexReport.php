<?php

namespace App\Http\Livewire\FinanceDivision;

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
    public $startDate; 
    public $endDate; 
    public $type; 
    public $status; 
    public $reportCat;
    public $date; 
    public $typeReport = 1; 
    public $reportType = 1; 
    public $pagesize = 10; 
    public $updateMode = false;

    protected $rules = [
        'date' => 'required',
        'reportType' => 'required',
        'typeReport' => 'required',
    ];

    protected $messages = [
        'date.required' => '*Date range is required.',
        'reportType.required' => '*Report type is required.',
        'typeReport.required' => '*Type is required.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetInputFields()
    {
        $this->date = '';
        $this->typeReport = 1;
        $this->reportType = 1;
    }

    public function storereport()
    {
        $validated = $this->validate();

        $dateRange = explode(' -> ', $validated['date']);
        $startDate = $dateRange[0];
        $endDate = $dateRange[1];

        $checkReport = Report::where([
                        ['is_active', 1],
                        ['start_date', $startDate],
                        ['end_date', $endDate],
                        ['report_type', $validated['reportType']],
                    ])->first();

        if($checkReport){
            session()->flash('error', 'Report already exist.');
        } else{
            $reportUuid = Str::uuid()->toString();
    
            $report = Report::create([
                'uuid' => $reportUuid,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'report_type' => $validated['reportType'],
                'type' => $validated['typeReport'],
                'status' => 1,
                'is_active' => 1,
            ]);
    
            $log = ActivityLog::create([
                'user_id' => Auth::id(),
                'category' => 'report-store',
                'activity_id' => $reportUuid,
            ]);
    
            $this->resetInputFields();
            $this->emit('closeReport');
            $this->emit('refreshDropdown');
            $this->emit('refreshNotification');
    
            session()->flash('success', 'Report successfully added.');
        }
    }

    public function edit($uuid)
    {
        $this->updateMode = true;
        $report = Report::where('uuid',$uuid)->first();
        $this->date = $report->start_date.' -> '.$report->end_date;
        $this->typeReport = $report->type;
        $this->reportType = $report->report_type;
        $this->uuid = $uuid;

        $this->emit('openEditReport');
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->reset();
    }

    public function updatereport()
    {
        $validated = $this->validate();

        $dateRange = explode(' -> ', $validated['date']);
        $startDate = $dateRange[0];
        $endDate = $dateRange[1];

        $checkReport = Report::where([
                            ['is_active', 1],
                            ['start_date', $startDate],
                            ['end_date', $endDate],
                            ['report_type', $validated['reportType']]
                        ])->first();

        if($checkReport){
            session()->flash('error', 'Report already exist.');

            $this->resetInputFields();
            $this->emit('closeReport');
            $this->emit('refreshDropdown');
            $this->emit('refreshNotification');
        }else{
            $curReport = Report::where([
                            ['is_active', 1],
                            ['uuid', $this->uuid],
                        ])->update(['is_active' => 0]);
            
            $reportUuid = Str::uuid()->toString();
    
            $report = Report::create([
                'uuid' => $reportUuid,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'report_type' => $validated['reportType'],
                'type' => $validated['typeReport'],
                'status' => 1,
                'is_active' => 1,
            ]);
            
            $dataLog = ActivityLog::where([
                        ['activity_id', $this->uuid],
                        ['category', 'like', '%report%'],
                    ])->get();

            foreach($dataLog as $dl){
                ActivityLog::create([
                    'user_id' => $dl->user_id,
                    'category' => $dl->category,
                    'activity_id' => $reportUuid,
                ]);
            }

            $log = ActivityLog::create([
                'user_id' => Auth::id(),
                'category' => 'report-update',
                'activity_id' => $reportUuid,
            ]);
    
            $this->updateMode = false;
            session()->flash('success', 'Report successfully updated.');
    
            $this->resetInputFields();
            $this->emit('closeReport');
            $this->emit('refreshDropdown');
            $this->emit('refreshNotification');
        }
    }

    public function confirmDelete($uuid){
        $this->emit('triggerDelete', ['uuid' => $uuid]);
    }

    public function destroy($uuid)
    {
        $checkReport = Report::where([
            ['uuid', $uuid['uuid']],
            ['is_active', 1],
        ])->get();

        if(empty($checkReport)){
            session()->flash('error','Report does not exists');
        }else{
            $deleteReport = Report::where([
                ['uuid', $uuid['uuid']],
                ['is_active', 1],
            ])->update(['is_active' => 0]);
    
            $log = ActivityLog::create([
                'user_id' => Auth::id(),
                'category' => 'report-delete',
                'activity_id' => $uuid['uuid'],
            ]);
    
            session()->flash('success', 'Report successfully deleted');
        }
    }

    public function render()
    {
        $allreport = Report::where('is_active', 1)->get();

        $report = Report::where('is_active', 1)->where(function($query){
            if($this->type){
                $query->where('type', $this->type);
            }
            if($this->status){
                $query->where('status', $this->status);
            }
            if($this->reportCat){
                $query->where('report_type', $this->reportCat);
            }
            if($this->startDate){
                $query->where('start_date', $this->startDate);
            }
            if($this->endDate){
                $query->where('end_date', $this->endDate);
            }
        })->orderBy('updated_at', 'desc')->paginate($this->pagesize);

        $this->emit('refreshDropdown');
        $this->emit('refreshNotification');

        return view('livewire.finance-division.filter-index-report',['report' => $report, 'allReport' => $allreport]);
    }
}
