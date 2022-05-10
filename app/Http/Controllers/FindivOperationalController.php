<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Models\TransactionFile;
use App\Models\Account;
use App\Models\Balance;
use App\Models\ActivityLog;
use App\Models\User;
use App\Exports\FinanceDivision\OperationalExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Storage;

class FindivOperationalController extends Controller
{
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
        $picex = Transaction::select('pic')->where([['category', 'operational'],['is_active', 1],['pic', '<>', NULL]])->distinct()->get();
        $paidtoex = Transaction::select('paid_to')->where('is_active', 1)->where('category', 'operational')->where('paid_to', '<>', NULL)->distinct()->get();
        $projectex = Transaction::select('project_id')->where([['category', 'operational'],['is_active', 1],['project_id', '<>', NULL]])->with('transactionProject')->distinct()->get();
        $accountex = Account::where('is_active', 1)->get();

        return view('finance-division.operational.index', compact('picex', 'projectex', 'accountex', 'paidtoex'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finance-division.operational.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $validated = $request->validated();

        $checkExist = Transaction::where([
            ['category', 'operational'],
            ['is_active', 1],
            ['token', $validated['token']],
        ])->first();

        if($checkExist){
            return redirect()->back()->withError('Mandiri operational transaction already exists');
        }

        foreach($validated['transDebit'] as $td){
            if((int) preg_replace("/[^0-9]/", "", $td['debit']) == 0){
                return redirect()->back()->withError('Debit nominal must be more than Rp. 0');
            }
        }

        foreach($validated['transCredit'] as $tc){
            if((int) preg_replace("/[^0-9]/", "", $tc['credit']) == 0){
                return redirect()->back()->withError('Credit nominal must be more than Rp. 0');
            }
        }

        $transactionUuid = Str::uuid()->toString();

        foreach($validated['transDebit'] as $td){
            $transaction = Transaction::create([
                'uuid' => $transactionUuid,
                'date' => $validated['date'],
                'token' => $validated['token'],
                'description' => $td['descriptionDebit'],
                'referral_id' => $td['referralDebit'],
                'debit' => (int) preg_replace("/[^0-9]/", "", $td['debit']),
                'credit' => 0,
                'pic' => $validated['pic'],
                'paid_to' => $validated['paidto'],
                'project_id' => $validated['project'],
                'is_active' => 1,
                'type' => $validated['type'],
                'status' => 1,
                'category' => 'operational',
            ]);
        }

        foreach($validated['transCredit'] as $tc){
            $transaction = Transaction::create([
                'uuid' => $transactionUuid,
                'date' => $validated['date'],
                'token' => $validated['token'],
                'description' => $tc['descriptionCredit'],
                'referral_id' => $tc['referralCredit'],
                'credit' => (int) preg_replace("/[^0-9]/", "", $tc['credit']),
                'debit' => 0,
                'pic' => $validated['pic'],
                'paid_to' => $validated['paidto'],
                'project_id' => $validated['project'],
                'is_active' => 1,
                'type' => $validated['type'],
                'status' => 1,
                'category' => 'operational',
            ]);
        }

        $report = $request->file('report');
        if($report){
            $reportName = $report->getClientOriginalName();
            $reportStore = TransactionFile::create([
                'transaction_id' => $transactionUuid,
                'category' => 'operational',
                'type' => 1,
                'name' => $reportName,
            ]);
            $reportPath = $report->storeAs('public/Operational/'.$transactionUuid, $reportName);
        }

        $arrAttachments = json_decode($validated['arrattachments']);
        if($request->file('attach')){
            foreach($request->file('attach') as $attach){
                $attachName = $attach->getClientOriginalName();
                foreach($arrAttachments as $atc){
                    if($attachName == $atc){
                        $attachStore = TransactionFile::create([
                            'transaction_id' => $transactionUuid,
                            'category' => 'operational',
                            'type' => 2,
                            'name' => $attachName,
                        ]);
                        $attachPath = $attach->storeAs('public/Operational/'.$transactionUuid, $attachName);
                    }
                }          
            }
        }

        $log = ActivityLog::create([
            'user_id' => Auth::id(),
            'category' => 'operational-store',
            'activity_id' => $transactionUuid,
        ]);

        return redirect()->route('findiv.operational-index')->withSuccess('Mandiri operational transaction successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $transaction = Transaction::where([
            ['category', 'operational'],
            ['is_active', 1],
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
                ->orWhere('category', 'operational-rejected-findir')
                ->orWhere('category', 'operational-rejected-excdir')
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

        return view('finance-division.operational.show', compact('transaction', 'report', 'attach', 'activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $log = ActivityLog::where('activity_id', $uuid)->where(function($query){
            $query->where('category', 'operational-store')
                ->orWhere('category', 'operational-update')
                ->orWhere('category', 'operational-delete')
                ->orWhere('category', 'operational-approved-findir')
                ->orWhere('category', 'operational-approved-excdir')
                ->orWhere('category', 'operational-rejected-findir')
                ->orWhere('category', 'operational-rejected-excdir')
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

        return view('finance-division.operational.edit', compact('activity', 'uuid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $uuid)
    {
        $validated = $request->validated();

        $checkExist = NULL;
        if($validated['token'] != $validated['oldToken']){
            $checkExist = Transaction::where([
                ['category', 'operational'],
                ['is_active', 1],
                ['token', $validated['token']],
            ])->first();
        }
        
        if($checkExist) {
            return redirect()->back()->with('token', true)->withError('Mandiri operational transaction already exists');
        }

        foreach($validated['transDebit'] as $td){
            if((int) preg_replace("/[^0-9]/", "", $td['debit']) == 0){
                return redirect()->back()->withError('Debit nominal must be more than Rp. 0');
            }
        }

        foreach($validated['transCredit'] as $tc){
            if((int) preg_replace("/[^0-9]/", "", $tc['credit']) == 0){
                return redirect()->back()->withError('Credit nominal must be more than Rp. 0');
            }
        }

        $curTrans = Transaction::where([
            ['category', 'operational'],
            ['is_active', 1],
            ['token', $validated['oldToken']],
        ])->update(['is_active' => 0]);

        $transUuid = Str::uuid()->toString();

        $dataLog = ActivityLog::where('activity_id', $uuid)->where(function($query){
                    $query->where('category', 'operational-store')
                        ->orWhere('category', 'operational-update')
                        ->orWhere('category', 'operational-delete')
                        ->orWhere('category', 'operational-approved-findir')
                        ->orWhere('category', 'operational-approved-excdir')
                        ->orWhere('category', 'operational-rejected-findir')
                        ->orWhere('category', 'operational-rejected-excdir')
                        ->orWhere('category', 'operational-paid');
                    })->get();
        
        foreach($dataLog as $dl){
            ActivityLog::create([
                'user_id' => $dl->user_id,
                'category' => $dl->category,
                'activity_id' => $transUuid,
            ]);
        }

        $oldTrans = Transaction::where([
            ['category', 'operational'],
            ['is_active', 0],
            ['token', $validated['oldToken']],
            ['uuid', $uuid],
        ])->get();

        $oldReport = TransactionFile::where([
            ['category', 'operational'],
            ['transaction_id', $oldTrans[0]->uuid],
            ['type', 1],
        ])->get();
        
        $oldAttach = TransactionFile::where([
            ['category', 'operational'],
            ['transaction_id', $oldTrans[0]->uuid],
            ['type', 2],
        ])->get();

        foreach($validated['transDebit'] as $td){
            if(Arr::exists($validated, 'status')){
                $transaction = Transaction::create([
                    'uuid' => $transUuid,
                    'date' => $validated['date'],
                    'token' => $validated['token'],
                    'description' => $td['descriptionDebit'],
                    'referral_id' => $td['referralDebit'],
                    'debit' => (int) preg_replace("/[^0-9]/", "", $td['debit']),
                    'credit' => 0,
                    'pic' => $validated['pic'],
                    'paid_to' => $validated['paidto'],
                    'project_id' => $validated['project'],
                    'is_active' => 1,
                    'type' => $validated['type'],
                    'status' => $validated['status'],
                    'category' => 'operational',
                ]);
            }else{
                $transaction = Transaction::create([
                    'uuid' => $transUuid,
                    'date' => $validated['date'],
                    'token' => $validated['token'],
                    'description' => $td['descriptionDebit'],
                    'referral_id' => $td['referralDebit'],
                    'debit' => (int) preg_replace("/[^0-9]/", "", $td['debit']),
                    'credit' => 0,
                    'pic' => $validated['pic'],
                    'paid_to' => $validated['paidto'],
                    'project_id' => $validated['project'],
                    'is_active' => 1,
                    'type' => $validated['type'],
                    'status' => $oldTrans[0]->status,
                    'category' => 'operational',
                ]);
            }
        }

        foreach($validated['transCredit'] as $tc){
            if(Arr::exists($validated, 'status')){
                $transaction = Transaction::create([
                    'uuid' => $transUuid,
                    'date' => $validated['date'],
                    'token' => $validated['token'],
                    'description' => $tc['descriptionCredit'],
                    'referral_id' => $tc['referralCredit'],
                    'credit' => (int) preg_replace("/[^0-9]/", "", $tc['credit']),
                    'debit' => 0,
                    'pic' => $validated['pic'],
                    'paid_to' => $validated['paidto'],
                    'project_id' => $validated['project'],
                    'is_active' => 1,
                    'type' => $validated['type'],
                    'status' => $validated['status'],
                    'category' => 'operational',
                ]);
            }
            else{
                $transaction = Transaction::create([
                    'uuid' => $transUuid,
                    'date' => $validated['date'],
                    'token' => $validated['token'],
                    'description' => $tc['descriptionCredit'],
                    'referral_id' => $tc['referralCredit'],
                    'credit' => (int) preg_replace("/[^0-9]/", "", $tc['credit']),
                    'debit' => 0,
                    'pic' => $validated['pic'],
                    'paid_to' => $validated['paidto'],
                    'project_id' => $validated['project'],
                    'is_active' => 1,
                    'type' => $validated['type'],
                    'status' => $oldTrans[0]->status,
                    'category' => 'operational',
                ]);
            }
        }

        if(Arr::exists($validated, 'status')){
            if($validated['status'] == '4'){
                $transubs = Transaction::where([
                    ['is_active', 1],
                    ['category', 'operational'],
                    ['status', 4],
                    ['uuid', $transUuid],
                    ['debit', 0],
                ])->get();
        
                $curBalance = Balance::where('category', 'operational')->pluck('balance');
                $operationalBalance = $curBalance[0];
                foreach($transubs as $ts){
                    $operationalBalance = $operationalBalance - $ts->credit;
                }
        
                Balance::where('category', 'operational')->update(['balance' => $operationalBalance]);

                $log = ActivityLog::create([
                    'user_id' => Auth::id(),
                    'category' => 'operational-paid',
                    'activity_id' => $transUuid,
                ]);
            }
        }

        $report = $request->file('report');
        if(Arr::exists($validated, 'report')){
            $reportName = $report->getClientOriginalName();
            $reportStore = TransactionFile::create([
                'transaction_id' => $transUuid,
                'category' => 'operational',
                'type' => 1,
                'name' => $reportName,
            ]);
            $reportPath = $report->storeAs('public/Operational/'.$transUuid, $reportName);
        }else{
            if(count($oldReport) != 0){
                $reportStore = TransactionFile::create([
                    'transaction_id' => $transUuid,
                    'category' => 'operational',
                    'type' => 1,
                    'name' => $oldReport[0]->name,
                ]);
                Storage::copy('public/Operational/'.$oldTrans[0]->uuid.'/'.$oldReport[0]->name, 'public/Operational/'.$transUuid.'/'.$oldReport[0]->name);
            }
        }

        $arrAttachments = json_decode($validated['arrattachments']);
        if(Arr::exists($validated, 'attach')){
            foreach($request->file('attach') as $attach){
                $attachName = $attach->getClientOriginalName();
                foreach($arrAttachments as $atc){
                    if($attachName == $atc){
                        $checkExistTempAttach = TransactionFile::where([
                            'transaction_id' => $transUuid,
                            'category' => 'operational',
                            'type' => 2,
                            'name' => $attachName,
                        ])->get();

                        if(count($checkExistTempAttach) == 0){
                            $attachStore = TransactionFile::create([
                                'transaction_id' => $transUuid,
                                'category' => 'operational',
                                'type' => 2,
                                'name' => $attachName,
                            ]);
                        }

                        if(Storage::exists('public/Operational/'.$transUuid.'/'.$attachName)) {
                            continue;
                        }else{
                            $attachPath = $attach->storeAs('public/Operational/'.$transUuid, $attachName);
                        }
                    }
                }         
            }
            foreach($oldAttach as $oa){
                foreach($arrAttachments as $atc){
                    if($oa->name == $atc){
                        $checkExistTempAttach = TransactionFile::where([
                            'transaction_id' => $transUuid,
                            'category' => 'operational',
                            'type' => 2,
                            'name' => $oa->name,
                        ])->get();
                        
                        if(count($checkExistTempAttach) == 0){
                            $attachStore = TransactionFile::create([
                                'transaction_id' => $transUuid,
                                'category' => 'operational',
                                'type' => 2,
                                'name' => $oa->name,
                            ]);
                        }

                        if(Storage::exists('public/Operational/'.$transUuid.'/'.$oa->name)) {
                            continue;
                        }else{
                            Storage::copy('public/Operational/'.$oldTrans[0]->uuid.'/'.$oa->name, 'public/Operational/'.$transUuid.'/'.$oa->name);
                        }
                    }
                }
            }
        }else{
            foreach($oldAttach as $oa){
                foreach($arrAttachments as $atc){
                    if($oa->name == $atc){
                        $checkExistTempAttach = TransactionFile::where([
                            'transaction_id' => $transUuid,
                            'category' => 'operational',
                            'type' => 2,
                            'name' => $oa->name,
                        ])->get();
                        
                        if(count($checkExistTempAttach) == 0){
                            $attachStore = TransactionFile::create([
                                'transaction_id' => $transUuid,
                                'category' => 'operational',
                                'type' => 2,
                                'name' => $oa->name,
                            ]);
                        }

                        if(Storage::exists('public/Operational/'.$transUuid.'/'.$oa->name)) {
                            continue;
                        }else{
                            Storage::copy('public/Operational/'.$oldTrans[0]->uuid.'/'.$oa->name, 'public/Operational/'.$transUuid.'/'.$oa->name);
                        }
                    }
                }
            }
        }

        $log = ActivityLog::create([
            'user_id' => Auth::id(),
            'category' => 'operational-update',
            'activity_id' => $transUuid,
        ]);

        return redirect()->route('findiv.operational-index')->withSuccess('Mandiri operational transaction successfully updated');
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
            $transaction = Transaction::select('uuid')->where('is_active', 1)->where('category', 'operational')->where('status', 4)->where(function($query) use($request){
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
                $model = Transaction::where('is_active', 1)->where('category', 'operational')->where('uuid', $tr)->where('status', 4)->with(['transactionAccount', 'transactionProject'])->orderBy('updated_at', 'desc')->get();
                $transUuid = [];
                array_push($transUuid, $model);
                array_push($dataTrans, $transUuid);
            }
                
            $pdf = PDF::loadView('finance-division.operational.pdf', ['dataTrans' => $dataTrans, 'todayDate' => $todayDate]);
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

        $pdf = PDF::loadView('finance-division.operational.pdfDetail', ['transactionDebit' => $transactionDebit, 'sum' => $sum, 'inWords' => $inWords, 'todayDate' => $todayDate]);
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