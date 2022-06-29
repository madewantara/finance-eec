<?php

namespace App\Exports\ExecutiveDirector;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Report;
use App\Models\Balance;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Models\ActivityLog;
use App\Models\Signature;

class ReportExport implements FromView
{
    public function __construct($validated)
    {
        $this->validated = $validated;
    }

    public function view(): View
    {
        $logReport = ActivityLog::where([
            ['activity_id', $this->validated['uuid']],
            ['category', 'report-approved'],
        ])->orderBy('id', 'desc')->first();
        $signatureReport = [];
        if(!empty($logReport)){
            $fetchUserReport = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$logReport->user_id);
            $dataUserReport = $fetchUserReport->json()['data'];
            $signatureReport = ["user" => $dataUserReport, "signature" => Signature::where('user_id', $logReport->user_id)->get()];
        }

        $todayDate = Carbon::now()->format('Y-m-d');
        $todayDateInd = Carbon::parse(Carbon::now())->locale('id');
        $todayDateInd->settings(['formatFunction' => 'translatedFormat']);
        $report = Report::where([['is_active', 1],['uuid', $this->validated['uuid']]])->first();
        $year = $report->year;

        if($report->report_type == 1){
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
                ['type', 2],
                ['status', 4],
            ])
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $stockc = Transaction::where([
                ['is_active', 1],
                ['referral_id', Account::where([['is_active', 1], ['referral', '14.10']])->pluck('id')->pop()],
                ['type', 2],
                ['status', 4],
            ])
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('credit');

            $biayamuka = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])->where(function($query){
                $query->where('referral_id', Account::where([['is_active', 1], ['referral', '15.10']])->pluck('id')->pop())
                ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '15.15']])->pluck('id')->pop());
            })
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $pajakmuka = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '17.10']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '17.22']])->pluck('id')->pop()])
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $minpajak = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '26.10']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '26.70']])->pluck('id')->pop()])
            ->where('referral_id', '<>', Account::where([['is_active', 1], ['referral', '26.20']])->pluck('id')->pop())
            ->where('referral_id', '<>', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $testd = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '171.01']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $testc = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '171.01']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('credit');

            $toolsd = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '171.02']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $toolsc = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '171.02']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('credit');

            $tanah = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '18.10']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $bangunan = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', )
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $kendaraand = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '18.30']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $kendaraanc = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '18.30']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('credit');

            $inventarisd = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '18.40']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $inventarisc = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '18.40']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('credit');

            $amortisasi = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where(function($query){
                $query->where('referral_id', Account::where([['is_active', 1], ['referral', '18.21']])->pluck('id')->pop())
                ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '18.31']])->pluck('id')->pop())
                ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '18.41']])->pluck('id')->pop());
            })
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $hutangusahac = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '21.10']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('credit');

            $hutangusahad = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '21.10']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $hutangbankc = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where(function($query){
                $query->where('referral_id', Account::where([['is_active', 1], ['referral', '22.10']])->pluck('id')->pop())
                ->orWhereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '22.20']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '22.30']])->pluck('id')->pop()]);
            })
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('credit');

            $hutangbankd = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where(function($query){
                $query->where('referral_id', Account::where([['is_active', 1], ['referral', '22.10']])->pluck('id')->pop())
                ->orWhereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '22.20']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '22.30']])->pluck('id')->pop()]);
            })
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $hutangbiayac = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '23.10']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('credit');

            $hutangbiayad = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '23.10']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $hutangpajakc = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('credit');

            $hutangpajakd = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $hutanglainc = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where(function($query){
                $query->where('referral_id', Account::where([['is_active', 1], ['referral', '22.15']])->pluck('id')->pop())
                ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '22.40']])->pluck('id')->pop());
            })
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('credit');

            $hutanglaind = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where(function($query){
                $query->where('referral_id', Account::where([['is_active', 1], ['referral', '22.15']])->pluck('id')->pop())
                ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '22.40']])->pluck('id')->pop());
            })
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $hutangleasingc = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '24.10']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('credit');

            $hutangleasingd = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '24.10']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $hutangpanjangc = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '25.10']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('credit');

            $hutangpanjangd = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '25.10']])->pluck('id')->pop())
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $modalc = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where(function($query){
                $query->where('referral_id', Account::where([['is_active', 1], ['referral', '31.20']])->pluck('id')->pop())
                ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '31.30']])->pluck('id')->pop());
            })
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('credit');

            $modald = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where(function($query){
                $query->where('referral_id', Account::where([['is_active', 1], ['referral', '31.20']])->pluck('id')->pop())
                ->orWhere('referral_id', Account::where([['is_active', 1], ['referral', '31.30']])->pluck('id')->pop());
            })
            ->whereBetween('date', ['0000-01-01', $year.'-12-31'])
            ->sum('debit');

            $inputditahan = Project::where('is_active', 1)
            ->whereBetween('start_date', ['0000-01-01', $year-1 .'-12-31'])
            ->get();

            $nettditahan = 0;
            foreach ($inputditahan as $input) {
                if ($input->category_id == 4 || $input->category_id == 6) {
                    $nettditahan = $nettditahan + $input->contract - ($input->contract*0.02);
                }
                else {
                    $nettditahan = $nettditahan + $input->contract - ($input->contract*0.015);
                }
            }

            $outputditahan = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '51.10.01']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '51.50.07']])->pluck('id')->pop()])
            ->whereBetween('date', ['0000-01-01', $year-1 .'-12-31'])
            ->sum('debit');
            $marginditahan = $nettditahan - $outputditahan;

            $biayaoperasionalditahan = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
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
            ->whereBetween('date', ['0000-01-01', $year-1 .'-12-31'])
            ->sum('debit');

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

            return view('executive-director.report.balancesheetExcel', [
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
                'year' => $year,
                'todayDate' => $todayDate,
                'todayDateInd' => $todayDateInd,
                'signatureReport' => $signatureReport,
            ]);
        }
        else{
            $input = Project::where('is_active', 1)
            ->whereBetween('start_date', [$year.'-01-01', $year.'-12-31'])
            ->get();
            $nett = 0;
            foreach ($input as $input) {
                if ($input->category_id == 4 || $input->category_id == 6) {
                    $nett = $nett + $input->contract - ($input->contract*0.02);
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

            $karyawan = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '52.10']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '52.19']])->pluck('id')->pop()])
            ->whereBetween('date', [$year.'-01-01', $year.'-12-31'])
            ->sum('debit');

            $kantor = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '52.20']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '52.99']])->pluck('id')->pop()])
            ->where('referral_id', '<>', Account::where([['is_active', 1], ['referral', '52.29']])->pluck('id')->pop())
            ->where('referral_id', '<>', Account::where([['is_active', 1], ['referral', '52.50']])->pluck('id')->pop())
            ->whereBetween('date', [$year.'-01-01', $year.'-12-31'])
            ->sum('debit');

            $pemasaran = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '52.50']])->pluck('id')->pop())
            ->whereBetween('date', [$year.'-01-01', $year.'-12-31'])
            ->sum('debit');

            $adm = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
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
            ->whereBetween('date', [$year.'-01-01', $year.'-12-31'])
            ->sum('debit');

            $penyusutan = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->whereBetween('referral_id', [Account::where([['is_active', 1], ['referral', '53.10']])->pluck('id')->pop(), Account::where([['is_active', 1], ['referral', '53.20']])->pluck('id')->pop()])
            ->whereBetween('date', [$year.'-01-01', $year.'-12-31'])
            ->sum('debit');

            $pajak = Transaction::where([['is_active', 1], ['type', 2], ['status', 4]])
            ->where('referral_id', Account::where([['is_active', 1], ['referral', '26.60']])->pluck('id')->pop())
            ->whereBetween('date', [$year.'-01-01', $year.'-12-31'])
            ->sum('debit');
            
            return view('executive-director.report.profitledgerExcel', [
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
                'todayDate' => $todayDate,
                'todayDateInd' => $todayDateInd,
                'signatureReport' => $signatureReport,
            ]);
        }
    }
}
