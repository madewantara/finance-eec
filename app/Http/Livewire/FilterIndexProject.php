<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class FilterIndexProject extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $status = "";
    public $search = "";
    public $pagesize = "5";

    public function render()
    {
        $allProj = Project::all();
        $projHigh = Project::where([['status', 1],['priority', 1]])->get();
        $projMed = Project::where([['status', 1],['priority', 2]])->get();
        $projLow = Project::where([['status', 1],['priority', 3]])->get();
        $projCategory = Project::where([['status', 'like', '%'.$this->status.'%'], ['name', 'like', '%'.$this->search.'%']])->with("projectCategory")->paginate($this->pagesize);
        return view('livewire.filter-index-project', ['projCategory' => $projCategory, 'allProj' => $allProj, 'projHigh' => $projHigh, 'projMed' => $projMed, 'projLow' => $projLow]);
    }
}
