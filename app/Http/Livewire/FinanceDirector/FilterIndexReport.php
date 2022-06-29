<?php

namespace App\Http\Livewire\FinanceDirector;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Report;
use App\Models\ActivityLog;
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

        return view('livewire.finance-director.filter-index-report', ['report' => $report, 'allReport' => $allreport]);
    }
}
