<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Balance;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\ActivityLog;
use App\Models\User;

class FindirReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('finance.director');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('finance-director.report.index');
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
    public function show($uuid)
    {
        $report = Report::where([['is_active', 1], ['uuid', $uuid]])->first();
        
        $log = ActivityLog::where('activity_id', $uuid)->where(function($query){
            $query->where('category', 'report-store')
                ->orWhere('category', 'report-update')
                ->orWhere('category', 'report-delete')
                ->orWhere('category', 'report-approved');
            })->get();
        
        $user = [];
        foreach($log as $l){
            array_push($user, User::where('id',$l->user_id)->get());
        }

        $activity = [];
        for($i=0;$i<count($log);$i++){
            array_push($activity, ['log' => $log[$i], 'user' => $user[$i]]);
        }

        return view('finance-director.report.show', compact('report', 'activity', 'uuid'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request){
        $validated = $request->validate([
            'export_format' => 'required',
            'uuid' => 'required',
        ]);

        $report = Report::where([['is_active', 1],['uuid', $validated['uuid']]])->first();

        if($validated['export_format'] == 'pdf'){
            if($report->report_type == 1){
                $year = date("Y", strtotime($report->end_date));
                $kas = Balance::where('year', $year)
                ->where('category', 'cash')
                ->pluck('balance')
                ->pop();

                $bank = Balance::where('year', $year)
                ->where('category', '<>', 'cash')
                ->sum('balance');

                $stockd = Transaction::where([
                    ['is_active', 1],
                    ['referral_id', Account::where([['is_active', 1], ['referral', '14.10']])->pluck('id')->pop()],
                    ['type', 2]
                ])->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $stockc = Transaction::where([
                    ['is_active', 1],
                    ['referral_id', Account::where([['is_active', 1], ['referral', '14.10']])->pluck('id')->pop()],
                    ['type', 2]
                ])->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('credit');

                $biayamuka = Transaction::where([['is_active', 1], ['type', 2]])->where(function($query){
                    $query->where('referral_id', Account::where([['is_active', 1], ['referral', '15.10']])->pluck('id')->pop())
                    ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '15.15']])->pluck('id')->pop());})
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $pajakmuka = Transaction::where([['is_active', 1], ['type', 2]])
                ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '17.10']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '17.22']])->pluck('id')->pop()])
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $minpajak = Transaction::where([['is_active', 1], ['type', 2]])
                ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '26.10']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '26.70']])->pluck('id')->pop()])
                ->where('referral_id', '<>', Account::where([['is_active', 1], ['referral', '26.20']])->pluck('id')->pop())
                ->where('referral_id', '<>', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $testd = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '171.01']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $testc = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '171.01']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('credit');

                $toolsd = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '171.02']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $toolsc = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '171.02']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('credit');

                $tanah = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '18.10']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $bangunan = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', )
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $kendaraand = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '18.30']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $kendaraanc = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '18.30']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('credit');

                $inventarisd = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '18.40']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $inventarisc = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '18.40']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('credit');

                $amortisasi = Transaction::where([['is_active', 1], ['type', 2]])
                ->where(function($query){
                    $query->where('referral_id', Account::where([['is_active', 1], ['referral', '18.21']])->pluck('id')->pop())
                    ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '18.31']])->pluck('id')->pop())
                    ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '18.41']])->pluck('id')->pop());
                })
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $hutangusahac = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '21.10']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('credit');

                $hutangusahad = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '21.10']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $hutangbankc = Transaction::where([['is_active', 1], ['type', 2]])
                ->where(function($query){
                    $query->where('referral_id', Account::where([['is_active', 1], ['referral', '22.10']])->pluck('id')->pop())
                    ->orWhereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '22.20']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '22.30']])->pluck('id')->pop()]);
                })
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('credit');

                $hutangbankd = Transaction::where([['is_active', 1], ['type', 2]])
                ->where(function($query){
                    $query->where('referral_id', Account::where([['is_active', 1], ['referral', '22.10']])->pluck('id')->pop())
                    ->orWhereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '22.20']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '22.30']])->pluck('id')->pop()]);
                })
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $hutangbiayac = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '23.10']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('credit');

                $hutangbiayad = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '23.10']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $hutangpajakc = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('credit');

                $hutangpajakd = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $hutanglainc = Transaction::where([['is_active', 1], ['type', 2]])
                ->where(function($query){
                    $query->where('referral_id', Account::where([['is_active', 1], ['referral', '22.15']])->pluck('id')->pop())
                    ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '22.40']])->pluck('id')->pop());
                })
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('credit');

                $hutanglaind = Transaction::where([['is_active', 1], ['type', 2]])
                ->where(function($query){
                    $query->where('referral_id', Account::where([['is_active', 1], ['referral', '22.15']])->pluck('id')->pop())
                    ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '22.40']])->pluck('id')->pop());
                })
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $hutangleasingc = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '24.10']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('credit');

                $hutangleasingd = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '24.10']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $hutangpanjangc = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '25.10']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('credit');

                $hutangpanjangd = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '25.10']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $modalc = Transaction::where([['is_active', 1], ['type', 2]])
                ->where(function($query){
                    $query->where('referral_id', Account::where([['is_active', 1], ['referral', '31.20']])->pluck('id')->pop())
                    ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '31.30']])->pluck('id')->pop());
                })
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('credit');

                $modald = Transaction::where([['is_active', 1], ['type', 2]])
                ->where(function($query){
                    $query->where('referral_id', Account::where([['is_active', 1], ['referral', '31.20']])->pluck('id')->pop())
                    ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '31.30']])->pluck('id')->pop());
                })
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                // Yang ini mau tanya
                $inputditahan = DB::table('project')
                ->whereBetween('startdate', ['0000-01-01', $year-1 .'-12-31'])
                ->where('id', '<>', 1)
                ->get();

                $nettditahan = 0;
                foreach ($inputditahan as $input) {
                    if ($input->category == 'Maintenance') {
                        $nettditahan = $nettditahan + $input->contract - ($input->contract*0.02);
                    }
                    else {
                        $nettditahan = $nettditahan + $input->contract - ($input->contract*0.015);
                    }
                }
                // End

                // Yang mau di tanya dibagian date
                $outputditahan = Transaction::where([['is_active', 1], ['type', 2]])
                ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '51.10.01']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '51.50.07']])->pluck('id')->pop()])
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', ['0000-01-01', $year-1 .'-12-31'])
                ->sum('debit');
                $marginditahan = $nettditahan - $outputditahan;

                $biayaoperasionalditahan = Transaction::where([['is_active', 1], ['type', 2]])
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
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', ['0000-01-01', $year-1 .'-12-31'])
                ->sum('debit');
                // End

                // Yang ini mau tanya
                $input = DB::table('project')
                ->whereBetween('startdate', [$year.'-01-01', $year.'-12-31'])
                ->where('id', '<>', 1)
                ->get();
                $nett = 0;
                foreach ($input as $input) {
                    if ($input->category == 'Maintenance') {
                        $nett= $nett + $input->contract - ($input->contract*0.02);
                    }
                    else {
                        $nett = $nett + $input->contract - ($input->contract*0.015);
                    }
                }
                // End

                $output = Transaction::where([['is_active', 1], ['type', 2]])
                ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '51.10.01']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '51.50.07']])->pluck('id')->pop()])
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');
                $margin = $nett - $output;

                $biayaoperasional = Transaction::where([['is_active', 1], ['type', 2]])
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
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');
                
                return view('balancesheet', [
                    'kas' => $kas,
                    'bank' => $bank,
                    'stock' => $stockd - $stockc,
                    'biayamuka' => $biayamuka,
                    'pajakmuka' => $pajakmuka - $minpajak,
                    'aktivalancar' => $kas + $bank + $stockd - $stockc + $biayamuka + $pajakmuka - $minpajak,
                    'test' => $testd - $testc,
                    'tools' => $toolsd - $toolsc,
                    'aktivalain' => $testd - $testc + $toolsd - $toolsc,
                    'tanah' => $tanah,
                    'bangunan' => $bangunan,
                    'kendaraan' => $kendaraand - $kendaraanc,
                    'inventaris' => $inventarisd - $inventarisc,
                    'amortisasi' => $amortisasi,
                    'aktivatetap' => $tanah + $bangunan + $kendaraand - $kendaraanc + $inventarisd - $inventarisc - $amortisasi,
                    'hutangusaha' => $hutangusahac - $hutangusahad,
                    'hutangbank' => $hutangbankc - $hutangbankd,
                    'hutangbiaya' => $hutangbiayac - $hutangbiayad,
                    'hutangpajak' => $hutangpajakc - $hutangpajakd,
                    'hutanglain' => $hutanglainc - $hutanglaind,
                    'hutanglancar' => $hutangusahac - $hutangusahad + $hutangbankc - $hutangbankd + $hutangbiayac - $hutangbiayad + $hutangpajakc - $hutangpajakd + $hutanglainc - $hutanglaind,
                    'hutangleasing' => $hutangleasingc - $hutangleasingd,
                    'hutangpanjang' => $hutangpanjangc - $hutangpanjangd,
                    'hutangjangkapanjang' => $hutangleasingc - $hutangleasingd + $hutangpanjangc - $hutangpanjangd,
                    'modal' => $modalc - $modald,
                    'labaditahan' => $marginditahan - $biayaoperasionalditahan,
                    'laba' => $margin - $biayaoperasional,
                    'modaldanlaba' => $modalc - $modald + $marginditahan - $biayaoperasionalditahan + $margin - $biayaoperasional,
                    'title' => $title, 
                    'year' => $year,
                ]);
            }
            else{
                // Yang ini mau tanya
                $input = DB::table('project')
                ->whereBetween('startdate', [$year.'-01-01', $year.'-12-31'])
                ->where('id', '<>', 1)
                ->get();
                $nett = 0;
                foreach ($input as $input) {
                    if ($input->category == 'Maintenance') {
                        $nett = $nett + $input->contract - ($input->contract*0.02);
                    }
                    else {
                        $nett = $nett + $input->contract - ($input->contract*0.015);
                    }
                }
                // End

                $output = Transaction::where([['is_active', 1], ['type', 2]])
                ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '51.10.01']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '51.50.07']])->pluck('id')->pop()])
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');
                $margin = $nett - $output;

                $karyawan = Transaction::where([['is_active', 1], ['type', 2]])
                ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '52.10']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '52.19']])->pluck('id')->pop()])
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $kantor = Transaction::where([['is_active', 1], ['type', 2]])
                ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '52.20']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '52.99']])->pluck('id')->pop()])
                ->where('referral_id', '<>', Account::where([['is_active', 1], ['referral', '52.29']])->pluck('id')->pop())
                ->where('referral_id', '<>', Account::where([['is_active', 1], ['referral', '52.50']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $pemasaran = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '52.50']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $adm = Transaction::where([['is_active', 1], ['type', 2]])
                ->where(function($query){
                    $query->where('referral_id', Account::where([['is_active', 1], ['referral', '62.15']])->pluck('id')->pop())
                    ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.20']])->pluck('id')->pop())
                    ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.30']])->pluck('id')->pop())
                    ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.35']])->pluck('id')->pop())
                    ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.40']])->pluck('id')->pop())
                    ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '62.99']])->pluck('id')->pop())
                    ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '53.99']])->pluck('id')->pop())
                    ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '52.29']])->pluck('id')->pop());
                })
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $penyusutan = Transaction::where([['is_active', 1], ['type', 2]])
                ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '53.10']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '53.20']])->pluck('id')->pop()])
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');

                $pajak = Transaction::where([['is_active', 1], ['type', 2]])
                ->where('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop())
                ->where(function($query){
                    $query->where('status', 3)
                    ->orWhere('status', 4);
                })
                ->whereBetween('date', [$report->start_date, $report->end_date])
                ->sum('debit');
                
                return view('profitledger', [
                    'year' => $year,
                    'pendapatan' => $nett,
                    'biayalangsung' => $output,
                    'gross' => $margin,
                    'karyawan' => $karyawan,
                    'kantor' => $kantor,
                    'pemasaran' => $pemasaran,
                    'adm' => $adm,
                    'penyusutan' => $penyusutan,
                    'operasional' => $karyawan + $kantor + $pemasaran + $adm + $penyusutan,
                    'pajak' => $pajak,
                ]);
            }
        }
    }
}
