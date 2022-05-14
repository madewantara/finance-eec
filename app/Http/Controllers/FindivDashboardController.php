<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\Account;

class FindivDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('finance.division');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projLocation = Project::where('is_active', 1)->where(function($query){
            $query->where('status', 1)
            ->orWhere('status', 2);
        })->with('projectLocation')->get();
        
        $activeProj = Project::where('is_active', 1)->where(function($query){
            $query->where('status', 1)
            ->orWhere('status', 2);
        })->with('projectLocation', 'projectCategory')->get();

        $allProjLoc = [];
        foreach($projLocation as $pl){
            array_push($allProjLoc, ['name' => $pl->name, 'lat' => $pl->projectLocation->latitude, 'long' => $pl->projectLocation->longitude]);
        }

        $year = Carbon::now()->year;
        //Profit current years
        $input = Project::where('is_active', 1)
            ->whereBetween('start_date', [$year.'-01-01', $year.'-12-31'])
            ->get();

        $nett = 0;
        foreach ($input as $input) {
            if ($input->category_id == 4 || $input->category_id == 6) {
                $nett= $nett + $input->contract - ($input->contract*0.02);
            }
            else {
                $nett = $nett + $input->contract - ($input->contract*0.015);
            }
        }

        $output = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
        ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '51.10.01']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '51.50.07']])->pluck('id')->pop()])
        ->whereBetween('date', [$year.'-01-01', $year.'-12-31'])
        ->sum('debit');
        $margin = $nett - $output;

        $biayaoperasional = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
        ->where(function($query){
            $query->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '52.10']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '53.99']])->pluck('id')->pop()])
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.15']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.20']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.30']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.35']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.40']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.99']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop());
        })
        ->whereBetween('date', [$year.'-01-01', $year.'-12-31'])
        ->sum('debit');

        $pajak = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop())
                ->whereBetween('date', [$year.'-01-01', $year.'-12-31'])
                ->sum('debit');

        $profit = $margin - $biayaoperasional - $pajak;

        //Profit 1 years ago
        $input1 = Project::where('is_active', 1)
            ->whereBetween('start_date', [($year-1).'-01-01', ($year-1).'-12-31'])
            ->get();

        $nett1 = 0;
        foreach ($input1 as $input1) {
            if ($input1->category_id == 4 || $input1->category_id == 6) {
                $nett1= $nett1 + $input1->contract - ($input1->contract*0.02);
            }
            else {
                $nett1 = $nett1 + $input1->contract - ($input1->contract*0.015);
            }
        }

        $output1 = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
        ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '51.10.01']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '51.50.07']])->pluck('id')->pop()])
        ->whereBetween('date', [($year-1).'-01-01', ($year-1).'-12-31'])
        ->sum('debit');
        $margin1 = $nett1 - $output1;

        $biayaoperasional1 = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
        ->where(function($query){
            $query->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '52.10']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '53.99']])->pluck('id')->pop()])
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.15']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.20']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.30']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.35']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.40']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.99']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop());
        })
        ->whereBetween('date', [($year-1).'-01-01', ($year-1).'-12-31'])
        ->sum('debit');

        $pajak1 = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop())
                ->whereBetween('date', [$year.'-01-01', $year.'-12-31'])
                ->sum('debit');

        $profit1 = $margin1 - $biayaoperasional1 - $pajak1;

        //Profit 2 years ago
        $input2 = Project::where('is_active', 1)
            ->whereBetween('start_date', [($year-2).'-01-01', ($year-2).'-12-31'])
            ->get();

        $nett2 = 0;
        foreach ($input2 as $input2) {
            if ($input2->category_id == 4 || $input2->category_id == 6) {
                $nett2= $nett2 + $input2->contract - ($input2->contract*0.02);
            }
            else {
                $nett2 = $nett2 + $input2->contract - ($input2->contract*0.015);
            }
        }

        $output2 = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
        ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '51.10.01']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '51.50.07']])->pluck('id')->pop()])
        ->whereBetween('date', [($year-2).'-01-01', ($year-2).'-12-31'])
        ->sum('debit');
        $margin2 = $nett2 - $output2;

        $biayaoperasional2 = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
        ->where(function($query){
            $query->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '52.10']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '53.99']])->pluck('id')->pop()])
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.15']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.20']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.30']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.35']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.40']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.99']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop());
        })
        ->whereBetween('date', [($year-2).'-01-01', ($year-2).'-12-31'])
        ->sum('debit');

        $pajak2 = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop())
                ->whereBetween('date', [$year.'-01-01', $year.'-12-31'])
                ->sum('debit');

        $profit2 = $margin2 - $biayaoperasional2 - $pajak2;

        //Profit 3 years ago
        $input3 = Project::where('is_active', 1)
            ->whereBetween('start_date', [($year-3).'-01-01', ($year-3).'-12-31'])
            ->get();

        $nett3 = 0;
        foreach ($input3 as $input3) {
            if ($input3->category_id == 4 || $input3->category_id == 6) {
                $nett3= $nett3 + $input3->contract - ($input3->contract*0.02);
            }
            else {
                $nett3 = $nett3 + $input3->contract - ($input3->contract*0.015);
            }
        }

        $output3 = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
        ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '51.10.01']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '51.50.07']])->pluck('id')->pop()])
        ->whereBetween('date', [($year-3).'-01-01', ($year-3).'-12-31'])
        ->sum('debit');
        $margin3 = $nett3 - $output3;

        $biayaoperasional3 = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
        ->where(function($query){
            $query->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '52.10']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '53.99']])->pluck('id')->pop()])
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.15']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.20']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.30']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.35']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.40']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.99']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop());
        })
        ->whereBetween('date', [($year-3).'-01-01', ($year-3).'-12-31'])
        ->sum('debit');

        $pajak3 = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop())
                ->whereBetween('date', [$year.'-01-01', $year.'-12-31'])
                ->sum('debit');

        $profit3 = $margin3 - $biayaoperasional3 - $pajak3;

        //Profit 4 years ago
        $input4 = Project::where('is_active', 1)
            ->whereBetween('start_date', [($year-4).'-01-01', ($year-4).'-12-31'])
            ->get();

        $nett4 = 0;
        foreach ($input4 as $input4) {
            if ($input4->category_id == 4 || $input4->category_id == 6) {
                $nett4= $nett4 + $input4->contract - ($input4->contract*0.02);
            }
            else {
                $nett4 = $nett4 + $input4->contract - ($input4->contract*0.015);
            }
        }

        $output4 = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
        ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '51.10.01']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '51.50.07']])->pluck('id')->pop()])
        ->whereBetween('date', [($year-4).'-01-01', ($year-4).'-12-31'])
        ->sum('debit');
        $margin4 = $nett4 - $output4;

        $biayaoperasional4 = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
        ->where(function($query){
            $query->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '52.10']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '53.99']])->pluck('id')->pop()])
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.15']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.20']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.30']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.35']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.40']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.99']])->pluck('id')->pop())
            ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop());
        })
        ->whereBetween('date', [($year-4).'-01-01', ($year-4).'-12-31'])
        ->sum('debit');

        $pajak4 = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop())
                ->whereBetween('date', [$year.'-01-01', $year.'-12-31'])
                ->sum('debit');

        $profit4 = $margin4 - $biayaoperasional4 - $pajak4;

        $tempProfit = [$profit4,$profit3,$profit2,$profit1,$profit];
        $profitYear = implode(",", $tempProfit);

        return view('finance-division.dashboard', compact('projLocation','allProjLoc', 'activeProj', 'profitYear', 'tempProfit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
