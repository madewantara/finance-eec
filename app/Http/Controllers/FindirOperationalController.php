<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionFile;
use App\Models\Account;
use App\Models\Balance;
use App\Models\ActivityLog;
use App\Models\User;
use App\Exports\FinanceDirector\OperationalExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Arr;
use Storage;

class FindirOperationalController extends Controller
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
        $picex = Transaction::select('pic')->where([['category', 'operational'],['is_active', 1],['type', 2],['pic', '<>', NULL]])->distinct()->get();
        $paidtoex = Transaction::select('paid_to')->where('is_active', 1)->where('type', 2)->where('category', 'operational')->where('paid_to', '<>', NULL)->distinct()->get();
        $projectex = Transaction::select('project_id')->where([['category', 'operational'],['is_active', 1],['type', 2],['project_id', '<>', NULL]])->with('transactionProject')->distinct()->get();
        $accountex = Account::where('is_active', 1)->get();

        return view('finance-director.operational.index', compact('picex', 'projectex', 'accountex', 'paidtoex'));
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
        $transaction = Transaction::where([
            ['category', 'operational'],
            ['is_active', 1],
            ['type', 2],
            ['uuid', $uuid],
        ])->with(['transactionFiles', 'transactionAccount', 'transactionProject'])->get();

        $report = TransactionFile::where([
            ['category', 'operational'],
            ['transaction_id', $transaction[0]->uuid],
            ['type', 1],
        ])->get();

        $attach = TransactionFile::where([
            ['category', 'operational'],
            ['transaction_id', $transaction[0]->uuid],
            ['type', 2],
        ])->get();

        $log = ActivityLog::where('activity_id', $transaction[0]->uuid)->where(function($query){
            $query->where('category', 'operational-store')
                ->orWhere('category', 'operational-update')
                ->orWhere('category', 'operational-delete')
                ->orWhere('category', 'operational-approved-findir')
                ->orWhere('category', 'operational-approved-excdir')
                ->orWhere('category', 'operational-rejected')
                ->orWhere('category', 'operational-paid');
            })->get();
        
        $user = [];
        foreach($log as $l){
            array_push($user, User::where('id',$l->user_id)->get());
        }

        $activity = [];
        for($i=0;$i<count($log);$i++){
            array_push($activity, ['log' => $log[$i], 'user' => $user[$i]]);
        }

        return view('finance-director.operational.show', compact('transaction', 'report', 'attach', 'activity'));
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
    * @return \Illuminate\Support\Collection
    */
    public function export(Request $request) 
    {
        $todayDate = Carbon::now()->format('Y-m-d');

        if($request->format == 'excel'){
            $filename = $todayDate .' Mandiri Operational Transaction.xlsx';
            return Excel::download(new OperationalExport($request), $filename);
        }

        if($request->format == 'csv'){
            $filename = $todayDate .' Mandiri Operational Transaction.csv';
            return Excel::download(new OperationalExport($request), $filename);
        }
        
        if($request->format == 'pdf'){
            $transaction = Transaction::select('uuid')->where('is_active', 1)->where('type', 2)->where('category', 'operational')->where('status', 4)->where(function($query) use($request){
                    if($request->datefilterex){
                        $expDate = explode(' -> ', $request->datefilterex);
                        $query->whereBetween('date', [$expDate[0],$expDate[1]]);
                    }
                    if($request->accountsex){
                        $query->whereIn('referral_id', $request->accountsex);
                    }
                    if($request->picsex){
                        $query->whereIn('pic', $request->picsex);
                    }
                    if($request->paidtosex){
                        $query->whereIn('paid_to', $request->paidtosex);
                    }
                    if($request->projectsex){
                        $query->whereIn('project_id', $request->projectsex);
                    }
                })->with(['transactionAccount', 'transactionProject', 'transactionFiles'])->orderBy('updated_at', 'desc')->distinct()->get();

            $tempTrans = [];
            foreach($transaction as $t){
                array_push($tempTrans, $t->uuid);
            }

            $dataTrans = [];
            foreach($tempTrans as $tr){
                $model = Transaction::where('is_active', 1)->where('type', 2)->where('category', 'operational')->where('uuid', $tr)->where('status', 4)->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->get();
                $transUuid = [];
                array_push($transUuid, $model);
                array_push($dataTrans, $transUuid);
            }
                
            $pdf = PDF::loadView('finance-director.operational.pdf', ['dataTrans' => $dataTrans, 'todayDate' => $todayDate]);
            $pdf->setPaper('A4', 'landscape');
            $filename = $todayDate .' Mandiri Operational Transaction.pdf';
            return $pdf->download($filename);
        }
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportDetail($uuid) 
    {
        $todayDate = Carbon::now()->format('Y-m-d');

        $transactionDebit = Transaction::where([
            ['category', 'operational'],
            ['is_active', 1],
            ['type', 2],
            ['uuid', $uuid],
            ['credit', 0],
        ])->with(['transactionAccount', 'transactionProject'])->get();

        if(count($transactionDebit) == 1){
            $sum = $transactionDebit[0]->debit;
        }else{
            for ($i = 0; $i < (count($transactionDebit) - 1); $i++){
                $sum = $transactionDebit[$i]->debit + $transactionDebit[$i + 1]->debit;
            }
        }
        $inWords = $this->inWords($sum);

        $pdf = PDF::loadView('finance-director.operational.pdfDetail', ['transactionDebit' => $transactionDebit, 'sum' => $sum, 'inWords' => $inWords, 'todayDate' => $todayDate]);
        $pdf->setPaper('A4', 'landscape');
        $filename = $todayDate.' ('.$transactionDebit[0]->token.') Mandiri Operational Transaction.pdf';
        return $pdf->download($filename);
    }

    private function nominal($number) {
		$number = abs($number);
		$char = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($number < 12) {
			$temp = " ". $char[$number];
		} else if ($number <20) {
			$temp = $this->nominal($number - 10). " belas";
		} else if ($number < 100) {
			$temp = $this->nominal($number/10)." puluh". $this->nominal($number % 10);
		} else if ($number < 200) {
			$temp = " seratus" . $this->nominal($number - 100);
		} else if ($number < 1000) {
			$temp = $this->nominal($number/100) . " ratus" . $this->nominal($number % 100);
		} else if ($number < 2000) {
			$temp = " seribu" . $this->nominal($number - 1000);
		} else if ($number < 1000000) {
			$temp = $this->nominal($number/1000) . " ribu" . $this->nominal($number % 1000);
		} else if ($number < 1000000000) {
			$temp = $this->nominal($number/1000000) . " juta" . $this->nominal($number % 1000000);
		} else if ($number < 1000000000000) {
			$temp = $this->nominal($number/1000000000) . " milyar" . $this->nominal(fmod($number,1000000000));
		} else if ($number < 1000000000000000) {
			$temp = $this->nominal($number/1000000000000) . " trilyun" . $this->nominal(fmod($number,1000000000000));
		}     
		return $temp;
	}
 
	private function inWords($number) {
		if($number<0) {
			$result = "minus ". trim($this->nominal($number));
		} else {
			$result = trim($this->nominal($number));
		}     		
		return $result;
	}
}
