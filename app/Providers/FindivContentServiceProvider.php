<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ActivityLog;
use App\Models\Transaction;
use App\Models\Report;
use Carbon\Carbon;

class FindivContentServiceProvider extends ServiceProvider
{
    public $notifTrans;
    public $notifReport;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $date = Carbon::now()->subDays(7);

        $activity = ActivityLog::where(function($query){
            $query->where('category', 'like', '%approved%')
            ->orWhere('category', 'like', '%rejected%');
        })->where('updated_at', '>=', $date)->orderBy('updated_at', 'desc')->get();

        $tempActTrans = [];
        foreach($activity as $a){
            $transaction = Transaction::where([
                ['is_active',1],
                ['type',2],
                ['uuid', $a->activity_id],
            ])->where(function($query){
                $query->where('status', '3')
                ->orWhere('status', '5');
            })->get()->unique('uuid');
            if(count($transaction) != 0){
                array_push($tempActTrans, [$transaction, $a->user_id, $a->updated_at]);
            }
        }

        $tempActReport = [];
        foreach($activity as $a){
            $report = Report::where([
                ['is_active',1],
                ['type',2],
                ['uuid', $a->activity_id],
            ])->where(function($query){
                $query->where('status', '2')
                ->orWhere('status', '3');
            })->get();
            if(count($report) != 0){
                array_push($tempActReport, [$report, $a->user_id, $a->updated_at]);
            }
        }

        $arrActivityTrans = [];
        foreach($tempActTrans as $tat){
            if(count($tat) != 0){
                foreach($tat[0] as $t){
                    if($t->status == 3 || $t->status == 5){
                        array_push($arrActivityTrans, ["uuid" => $t->uuid, "token" => $t->token, "status" => $t->status, "category" => $t->category, "user_id" => $tat[1], "updated_at" => $tat[2]]);
                    }
                }
            }
        }

        $arrActivityReport = [];
        foreach($tempActReport as $tar){
            if(count($tar) != 0){
                foreach($tar[0] as $t){
                    if($t->status == 2 || $t->status == 3){
                        array_push($arrActivityReport, ["uuid" => $t->uuid, "report" => $t->report_type, "status" => $t->status, "user_id" => $tar[1], "updated_at" => $tar[2]]);
                    }
                }
            }
        }
        
        $this->notifTrans = $arrActivityTrans;
        $this->notifReport = $arrActivityReport;

        view()->composer('layouts.app-findiv', function($view) {
            $view->with(['notifTrans' => $this->notifTrans, "notifReport" => $this->notifReport]);
        });
    }
}
