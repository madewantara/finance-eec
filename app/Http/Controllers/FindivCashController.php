<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CashRequest;
use App\Models\Transaction;
use App\Models\TransactionFile;
use App\Models\Account;
use App\Models\Balance;
use App\Models\ActivityLog;
use App\Models\User;
use App\Exports\CashExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Storage;

class FindivCashController extends Controller
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
        $picex = Transaction::select('pic')->where([['category', 'cash'],['is_active', 1],['pic', '<>', NULL]])->distinct()->get();
        $paidtoex = Transaction::select('paid_to')->where('is_active', 1)->where('category', 'cash')->where('paid_to', '<>', NULL)->distinct()->get();
        $projectex = Transaction::select('project_id')->where([['category', 'cash'],['is_active', 1],['project_id', '<>', NULL]])->with('transactionProject')->distinct()->get();
        $accountex = Account::where('is_active', 1)->get();

        return view('finance-division.cash.index', compact('picex', 'projectex', 'accountex', 'paidtoex'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finance-division.cash.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CashRequest $request)
    {
        $validated = $request->validated();

        $checkExist = Transaction::where([
            ['category', 'cash'],
            ['is_active', 1],
            ['token', $validated['token']],
        ])->first();

        if($checkExist){
            return redirect()->back()->withError('Cash transaction already exists');
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
                'category' => 'cash',
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
                'category' => 'cash',
            ]);
        }

        $report = $request->file('report');
        if($report){
            $reportName = $report->getClientOriginalName();
            $reportStore = TransactionFile::create([
                'transaction_id' => $transactionUuid,
                'category' => 'cash',
                'type' => 1,
                'name' => $reportName,
            ]);
            $reportPath = $report->storeAs('public/Cash/'.$transactionUuid, $reportName);
        }

        $arrAttachments = json_decode($validated['arrattachments']);
        if($request->file('attach')){
            foreach($request->file('attach') as $attach){
                $attachName = $attach->getClientOriginalName();
                foreach($arrAttachments as $atc){
                    if($attachName == $atc){
                        $attachStore = TransactionFile::create([
                            'transaction_id' => $transactionUuid,
                            'category' => 'cash',
                            'type' => 2,
                            'name' => $attachName,
                        ]);
                        $attachPath = $attach->storeAs('public/Cash/'.$transactionUuid, $attachName);
                    }
                }          
            }
        }

        $log = ActivityLog::create([
            'user_id' => Auth::id(),
            'category' => 'cash-store',
            'activity_id' => $transactionUuid,
        ]);

        return redirect()->route('findiv.cash-index')->withSuccess('Cash transaction successfully added');
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
            ['category', 'cash'],
            ['is_active', 1],
            ['uuid', $uuid],
        ])->with(['transactionFiles', 'transactionAccount', 'transactionProject'])->get();

        $report = TransactionFile::where([
            ['category', 'cash'],
            ['transaction_id', $transaction[0]->uuid],
            ['type', 1],
        ])->get();

        $attach = TransactionFile::where([
            ['category', 'cash'],
            ['transaction_id', $transaction[0]->uuid],
            ['type', 2],
        ])->get();

        $log = ActivityLog::where('activity_id', $transaction[0]->uuid)->where(function($query){
            $query->where('category', 'cash-store')
                ->orWhere('category', 'cash-update')
                ->orWhere('category', 'cash-delete')
                ->orWhere('category', 'cash-approved-findir')
                ->orWhere('category', 'cash-approved-excdir')
                ->orWhere('category', 'cash-rejected-findir')
                ->orWhere('category', 'cash-rejected-excdir')
                ->orWhere('category', 'cash-paid');
            })->get();
        
        $user = [];
        foreach($log as $l){
            array_push($user, User::where('id',$l->user_id)->get());
        }

        $activity = [];
        for($i=0;$i<count($log);$i++){
            array_push($activity, ['log' => $log[$i], 'user' => $user[$i]]);
        }

        return view('finance-division.cash.show', compact('transaction', 'report', 'attach', 'activity'));
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
            $query->where('category', 'cash-store')
                ->orWhere('category', 'cash-update')
                ->orWhere('category', 'cash-delete')
                ->orWhere('category', 'cash-approved-findir')
                ->orWhere('category', 'cash-approved-excdir')
                ->orWhere('category', 'cash-rejected-findir')
                ->orWhere('category', 'cash-rejected-excdir')
                ->orWhere('category', 'cash-paid');
            })->get();
        
        $user = [];
        foreach($log as $l){
            array_push($user, User::where('id',$l->user_id)->get());
        }

        $activity = [];
        for($i=0;$i<count($log);$i++){
            array_push($activity, ['log' => $log[$i], 'user' => $user[$i]]);
        }

        return view('finance-division.cash.edit', compact('activity', 'uuid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(CashRequest $request, $uuid)
    {
        $validated = $request->validated();

        $checkExist = NULL;
        if($validated['token'] != $validated['oldToken']){
            $checkExist = Transaction::where([
                ['category', 'cash'],
                ['is_active', 1],
                ['token', $validated['token']],
            ])->first();
        }
        
        if($checkExist) {
            return redirect()->back()->with('token', true)->withError('Cash transaction already exists');
        }

        $curTrans = Transaction::where([
            ['category', 'cash'],
            ['is_active', 1],
            ['token', $validated['oldToken']],
        ])->update(['is_active' => 0]);

        $transUuid = Str::uuid()->toString();

        $dataLog = ActivityLog::where('activity_id', $uuid)->where(function($query){
                    $query->where('category', 'cash-store')
                        ->orWhere('category', 'cash-update')
                        ->orWhere('category', 'cash-delete')
                        ->orWhere('category', 'cash-approved-findir')
                        ->orWhere('category', 'cash-approved-excdir')
                        ->orWhere('category', 'cash-rejected-findir')
                        ->orWhere('category', 'cash-rejected-excdir')
                        ->orWhere('category', 'cash-paid');
                    })->get();
        
        foreach($dataLog as $dl){
            ActivityLog::create([
                'user_id' => $dl->user_id,
                'category' => $dl->category,
                'activity_id' => $transUuid,
            ]);
        }

        $oldTrans = Transaction::where([
            ['category', 'cash'],
            ['is_active', 0],
            ['token', $validated['oldToken']],
            ['uuid', $uuid],
        ])->get();

        $oldReport = TransactionFile::where([
            ['category', 'cash'],
            ['transaction_id', $oldTrans[0]->uuid],
            ['type', 1],
        ])->get();
        
        $oldAttach = TransactionFile::where([
            ['category', 'cash'],
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
                    'category' => 'cash',
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
                    'category' => 'cash',
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
                    'category' => 'cash',
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
                    'category' => 'cash',
                ]);
            }
        }

        $report = $request->file('report');
        if(Arr::exists($validated, 'report')){
            $reportName = $report->getClientOriginalName();
            $reportStore = TransactionFile::create([
                'transaction_id' => $transUuid,
                'category' => 'cash',
                'type' => 1,
                'name' => $reportName,
            ]);
            $reportPath = $report->storeAs('public/Cash/'.$transUuid, $reportName);
        }else{
            $reportStore = TransactionFile::create([
                'transaction_id' => $transUuid,
                'category' => 'cash',
                'type' => 1,
                'name' => $oldReport[0]->name,
            ]);
            Storage::copy('public/Cash/'.$oldTrans[0]->uuid.'/'.$oldReport[0]->name, 'public/Cash/'.$transUuid.'/'.$oldReport[0]->name);
        }

        $arrAttachments = json_decode($validated['arrattachments']);
        if(Arr::exists($validated, 'attach')){
            foreach($request->file('attach') as $attach){
                $attachName = $attach->getClientOriginalName();
                foreach($arrAttachments as $atc){
                    if($attachName == $atc){
                        $checkExistTempAttach = TransactionFile::where([
                            'transaction_id' => $transUuid,
                            'category' => 'cash',
                            'type' => 2,
                            'name' => $attachName,
                        ])->get();

                        if(count($checkExistTempAttach) == 0){
                            $attachStore = TransactionFile::create([
                                'transaction_id' => $transUuid,
                                'category' => 'cash',
                                'type' => 2,
                                'name' => $attachName,
                            ]);
                        }

                        if(Storage::exists('public/Cash/'.$transUuid.'/'.$attachName)) {
                            continue;
                        }else{
                            $attachPath = $attach->storeAs('public/Cash/'.$transUuid, $attachName);
                        }
                    }
                }         
            }
            foreach($oldAttach as $oa){
                foreach($arrAttachments as $atc){
                    if($oa->name == $atc){
                        $checkExistTempAttach = TransactionFile::where([
                            'transaction_id' => $transUuid,
                            'category' => 'cash',
                            'type' => 2,
                            'name' => $oa->name,
                        ])->get();
                        
                        if(count($checkExistTempAttach) == 0){
                            $attachStore = TransactionFile::create([
                                'transaction_id' => $transUuid,
                                'category' => 'cash',
                                'type' => 2,
                                'name' => $oa->name,
                            ]);
                        }

                        if(Storage::exists('public/Cash/'.$transUuid.'/'.$oa->name)) {
                            continue;
                        }else{
                            Storage::copy('public/Cash/'.$oldTrans[0]->uuid.'/'.$oa->name, 'public/Cash/'.$transUuid.'/'.$oa->name);
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
                            'category' => 'cash',
                            'type' => 2,
                            'name' => $oa->name,
                        ])->get();
                        
                        if(count($checkExistTempAttach) == 0){
                            $attachStore = TransactionFile::create([
                                'transaction_id' => $transUuid,
                                'category' => 'cash',
                                'type' => 2,
                                'name' => $oa->name,
                            ]);
                        }

                        if(Storage::exists('public/Cash/'.$transUuid.'/'.$oa->name)) {
                            continue;
                        }else{
                            Storage::copy('public/Cash/'.$oldTrans[0]->uuid.'/'.$oa->name, 'public/Cash/'.$transUuid.'/'.$oa->name);
                        }
                    }
                }
            }
        }

        $log = ActivityLog::create([
            'user_id' => Auth::id(),
            'category' => 'cash-update',
            'activity_id' => $transUuid,
        ]);

        return redirect()->route('findiv.cash-index')->withSuccess('Cash transaction successfully updated');
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
            $filename = $todayDate .' Cash Transaction.xlsx';
            return Excel::download(new CashExport($request), $filename);
        }

        if($request->format == 'csv'){
            $filename = $todayDate .' Cash Transaction.csv';
            return Excel::download(new CashExport($request), $filename);
        }
        
        if($request->format == 'pdf'){
            $transaction = Transaction::where('is_active', 1)->where('status', 3)->where(function($query) use($request){
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
            })->with(['transactionAccount', 'transactionProject', 'transactionFiles'])->orderBy('id', 'desc')->distinct()->get();

            $tempTrans = [];
            foreach($transaction as $t){
                array_push($tempTrans, $t->uuid);
            }

            $dataTrans = [];
            foreach($tempTrans as $tr){
                $model = Transaction::where('is_active', 1)->where('category', 'cash')->where('uuid', $tr)->with(['transactionAccount', 'transactionProject'])->orderBy('id', 'desc')->get();
                $transUuid = [];
                array_push($transUuid, $model);
                array_push($dataTrans, $transUuid);
            }
                
            $pdf = PDF::loadView('finance-division.cash.pdf', ['dataTrans' => $dataTrans, 'todayDate' => $todayDate]);
            $pdf->setPaper('A4', 'landscape');
            $filename = $todayDate .' Cash Transaction.pdf';
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
            ['category', 'cash'],
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

        $pdf = PDF::loadView('finance-division.cash.pdfDetail', ['transactionDebit' => $transactionDebit, 'sum' => $sum, 'inWords' => $inWords, 'todayDate' => $todayDate]);
        $pdf->setPaper('A4', 'landscape');
        $filename = $todayDate.' ('.$transactionDebit[0]->token.') Cash Transaction.pdf';
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
