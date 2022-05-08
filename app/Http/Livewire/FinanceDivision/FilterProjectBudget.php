<?php

namespace App\Http\Livewire\FinanceDivision;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;

class FilterProjectBudget extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public $pagesize = 5; 
    public $uuid;

    public function render()
    {
        $project = Project::where('is_active', 1)->where('uuid', $this->uuid)->get();
        $uuidTrans = Transaction::select('uuid')->where('is_active', 1)->where('type', 2)->where('project_id', $project[0]->id)->where(function($query){
            $query->where('date', 'like', '%'.$this->search.'%')
            ->orWhere('token', 'like', '%'.$this->search.'%')
            ->orWhere('description', 'like', '%'.$this->search.'%')
            ->orWhere('paid_to', 'like', '%'.$this->search.'%')
            ->orWhereHas('transactionAccount', function($acc){
                $acc->where('referral', 'like', '%'.$this->search.'%');
            });
        })->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->distinct()->get();

        $arrAllTrans = [];
        foreach($uuidTrans as $ut){
            array_push($arrAllTrans, Transaction::where('is_active', 1)->where('type', 2)->where('project_id', $project[0]->id)->where('uuid', $ut->uuid)->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->get());
        }

        $transactionObj = collect($arrAllTrans);
        $items = $transactionObj->forPage($this->page, $this->pagesize);
        $transaction = new LengthAwarePaginator($items, $transactionObj->count(), $this->pagesize, $this->page);

        return view('livewire.finance-division.filter-project-budget', ['transaction' => $transaction, 'uuidTrans' => $uuidTrans]);
    }
}
