<?php

namespace App\Http\Livewire\FinanceDivision;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;

class FilterIndexProject extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $status = "";
    public $search = "";
    public $pagesize = "6";
    public $arrhighProjectExpanse;

    public function render()
    {
        $allProj = Project::where('is_active', 1)->get();
        $projHigh = Project::where([['is_active',1],['status', 1],['priority', 1]])->get();
        $projMed = Project::where([['is_active',1],['status', 1],['priority', 2]])->get();
        $projLow = Project::where([['is_active',1],['status', 1],['priority', 3]])->get();
        $projCategory = Project::where([['is_active',1], ['status', 'like', '%'.$this->status.'%'], ['name', 'like', '%'.$this->search.'%']])->with("projectCategory")->orderBy('created_at', 'desc')->paginate($this->pagesize);
        $arrhighProjectExpanse = $this->arrhighProjectExpanse;
        $dataUser = session('allUser')['data']['data']['data'];

        $projMan = [];
        foreach($projCategory as $pc){
            foreach($dataUser as $du){
                if($pc->project_manager == $du['nip']){
                    array_push($projMan, $du);
                }
            }
        }

        $this->emit('refreshDropdown');
        
        return view('livewire.finance-division.filter-index-project', ['projCategory' => $projCategory, 'allProj' => $allProj, 'projHigh' => $projHigh, 'projMed' => $projMed, 'projLow' => $projLow, 'arrhighProjectExpanse' => $arrhighProjectExpanse, 'projMan' => $projMan]);
    }
}
