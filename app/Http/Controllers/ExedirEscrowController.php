<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionFile;
use App\Models\Account;
use App\Models\Balance;
use App\Models\ActivityLog;
use App\Exports\ExecutiveDirector\EscrowExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Arr;
use Storage;
use Illuminate\Support\Facades\Http;
use App\Models\Signature;

class ExedirEscrowController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('executive.director');
        $this->middleware('signature.exedir');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $picex = Transaction::select('pic')->where([['category', 'escrow'],['is_active', 1],['type', 2],['pic', '<>', NULL]])->distinct()->get();
        $paidtoex = Transaction::select('paid_to')->where('is_active', 1)->where('type', 2)->where('category', 'escrow')->where('paid_to', '<>', NULL)->distinct()->get();
        $projectex = Transaction::select('project_id')->where([['category', 'escrow'],['is_active', 1],['type', 2],['project_id', '<>', NULL]])->with('transactionProject')->distinct()->get();
        $accountex = Account::where('is_active', 1)->orderBy('referral', 'asc')->get();

        return view('executive-director.escrow.index', compact('picex', 'projectex', 'accountex', 'paidtoex'));
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
            ['category', 'escrow'],
            ['is_active', 1],
            ['type', 2],
            ['uuid', $uuid],
        ])->with(['transactionFiles', 'transactionAccount', 'transactionProject'])->get();

        $report = TransactionFile::where([
            ['category', 'escrow'],
            ['transaction_id', $transaction[0]->uuid],
            ['type', 1],
        ])->get();

        $attach = TransactionFile::where([
            ['category', 'escrow'],
            ['transaction_id', $transaction[0]->uuid],
            ['type', 2],
        ])->get();

        $log = ActivityLog::where('activity_id', $transaction[0]->uuid)->where(function($query){
            $query->where('category', 'escrow-store')
                ->orWhere('category', 'escrow-update')
                ->orWhere('category', 'escrow-delete')
                ->orWhere('category', 'escrow-approved-findir')
                ->orWhere('category', 'escrow-approved-excdir')
                ->orWhere('category', 'escrow-rejected')
                ->orWhere('category', 'escrow-paid');
            })->get();
        
        $user = [];
        foreach($log as $l){
            $fetchUserById = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$l->user_id);
            $dataUser = $fetchUserById->json()['data'];
            array_push($user, $dataUser);
        }

        $activity = [];
        for($i=0;$i<count($log);$i++){
            array_push($activity, ['log' => $log[$i], 'user' => $user[$i]]);
        }

        return view('executive-director.escrow.show', compact('transaction', 'report', 'attach', 'activity'));
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
            $filename = $todayDate .' Mandiri Escrow Transaction.xlsx';
            return Excel::download(new EscrowExport($request), $filename);
        }

        if($request->format == 'csv'){
            $filename = $todayDate .' Mandiri Escrow Transaction.csv';
            return Excel::download(new EscrowExport($request), $filename);
        }
        
        if($request->format == 'pdf'){
            $transaction = Transaction::select('uuid')->where('is_active', 1)->where('type', 2)->where('category', 'escrow')->where('status', 4)->where(function($query) use($request){
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
                $model = Transaction::where('is_active', 1)->where('type', 2)->where('category', 'escrow')->where('uuid', $tr)->where('status', 4)->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->get();
                $transUuid = [];
                array_push($transUuid, $model);
                array_push($dataTrans, $transUuid);
            }
                
            $pdf = PDF::loadView('executive-director.escrow.pdf', ['dataTrans' => $dataTrans, 'todayDate' => $todayDate]);
            $pdf->setPaper('A4', 'landscape');
            $filename = $todayDate .' Mandiri Escrow Transaction.pdf';
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
            ['category', 'escrow'],
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

        $logEscrowStore = ActivityLog::where([
            ['activity_id', $uuid],
            ['category', 'escrow-store'],
        ])->orderBy('id', 'desc')->first();
        $signatureFindivStore = [];
        if(!empty($logEscrowStore)){
            $fetchUserFindivStore = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$logEscrowStore->user_id);
            $dataUserFindivStore = $fetchUserFindivStore->json()['data'];
            $signatureFindivStore = ["user" => $dataUserFindivStore, "signature" => Signature::where('user_id', $logEscrowStore->user_id)->get()];
        }

        $logEscrowPaid = ActivityLog::where([
            ['activity_id', $uuid],
            ['category', 'escrow-paid'],
        ])->orderBy('id', 'desc')->first();
        $signatureFindivPaid = [];
        if(!empty($logEscrowPaid)){
            $fetchUserFindivPaid = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$logEscrowPaid->user_id);
            $dataUserFindivPaid = $fetchUserFindivPaid->json()['data'];
            $signatureFindivPaid = ["user" => $dataUserFindivPaid, "signature" => Signature::where('user_id', $logEscrowPaid->user_id)->get()];
        }

        $logApprovedFindir = ActivityLog::where([
            ['activity_id', $uuid],
            ['category', 'escrow-approved-findir'],
        ])->orderBy('id', 'desc')->first();
        $signatureFindir = [];
        if(!empty($logApprovedFindir)){
            $fetchUserFindir = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$logApprovedFindir->user_id);
            $dataUserFindir = $fetchUserFindir->json()['data'];
            $signatureFindir = ["user" => $dataUserFindir, "signature" => Signature::where('user_id', $logApprovedFindir->user_id)->get()];
        }

        $logApprovedExedir = ActivityLog::where([
            ['activity_id', $uuid],
            ['category', 'escrow-approved-excdir'],
        ])->orderBy('id', 'desc')->first();
        $signatureExedir = [];
        if(!empty($logApprovedExedir)){
            $fetchUserExedir = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$logApprovedExedir->user_id);
            $dataUserExedir = $fetchUserExedir->json()['data'];
            $signatureExedir = ["user" => $dataUserExedir, "signature" => Signature::where('user_id', $logApprovedExedir->user_id)->get()];
        }

        $pdf = PDF::loadView('executive-director.escrow.pdfDetail', ['transactionDebit' => $transactionDebit, 'sum' => $sum, 'inWords' => $inWords, 'todayDate' => $todayDate, 'signatureFindivStore' => $signatureFindivStore, 'signatureFindivPaid' => $signatureFindivPaid, 'signatureFindir' => $signatureFindir, 'signatureExedir' => $signatureExedir]);
        $pdf->setPaper('A4', 'landscape');
        $filename = $todayDate.' ('.$transactionDebit[0]->token.') Mandiri Escrow Transaction.pdf';
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
