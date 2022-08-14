<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ActivityLog;
use App\Models\Transaction;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

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
        })->where('updated_at', '>=', $date)->orderBy('updated_at', 'desc')->get()->unique('activity_id');

        $lastAct = [];
        foreach($activity as $a){
            $getLastAct = ActivityLog::where('activity_id', $a->activity_id)->get();
            if( $getLastAct[count($getLastAct) - 1]->category == 'cash-approved-findir' || 
                $getLastAct[count($getLastAct) - 1]->category == 'cash-approved-excdir' ||
                $getLastAct[count($getLastAct) - 1]->category == 'cash-rejected' ||
                $getLastAct[count($getLastAct) - 1]->category == 'operational-approved-findir' || 
                $getLastAct[count($getLastAct) - 1]->category == 'operational-approved-excdir' ||
                $getLastAct[count($getLastAct) - 1]->category == 'operational-rejected' ||
                $getLastAct[count($getLastAct) - 1]->category == 'escrow-approved-findir' || 
                $getLastAct[count($getLastAct) - 1]->category == 'escrow-approved-excdir' ||
                $getLastAct[count($getLastAct) - 1]->category == 'escrow-rejected' ||
                $getLastAct[count($getLastAct) - 1]->category == 'report-approved' ||
                $getLastAct[count($getLastAct) - 1]->category == 'report-rejected' )
            {
                array_push($lastAct, $getLastAct[count($getLastAct) - 1]);
            }
        }

        $tempActTrans = [];
        foreach($lastAct as $la){
            $transaction = Transaction::where([
                ['is_active',1],
                ['type',2],
                ['uuid', $la->activity_id],
            ])->where(function($query){
                $query->where('status', '3')
                ->orWhere('status', '5');
            })->get()->unique('uuid');
            if(count($transaction) != 0){
                array_push($tempActTrans, [$transaction, $la->user_id, $la->updated_at]);
            }
        }

        $tempActReport = [];
        foreach($lastAct as $la){
            $report = Report::where([
                ['is_active',1],
                ['type',2],
                ['uuid', $la->activity_id],
            ])->where(function($query){
                $query->where('status', '2')
                ->orWhere('status', '3');
            })->get();
            if(count($report) != 0){
                array_push($tempActReport, [$report, $la->user_id, $la->updated_at]);
            }
        }

        $arrActivityTrans = [];
        foreach($tempActTrans as $tat){
            if(count($tat) != 0){
                foreach($tat[0] as $t){
                    if($t->status == 3 || $t->status == 5){
                        $fetchUserTrans = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$tat[1]);
                        $dataUserTrans = $fetchUserTrans->json()['data'];
                        array_push($arrActivityTrans, ["uuid" => $t->uuid, "token" => $t->token, "status" => $t->status, "category" => $t->category, "user" => $dataUserTrans, "updated_at" => $tat[2]]);
                    }
                }
            }
        }

        $arrActivityReport = [];
        foreach($tempActReport as $tar){
            if(count($tar) != 0){
                foreach($tar[0] as $t){
                    if($t->status == 2 || $t->status == 3){
                        $fetchUserRep = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$tar[1]);
                        $dataUserRep = $fetchUserRep->json()['data'];
                        array_push($arrActivityReport, ["uuid" => $t->uuid, "report" => $t->report_type, "status" => $t->status, "user" => $dataUserRep, "updated_at" => $tar[2]]);
                    }
                }
            }
        }
        
        $this->notifTrans = $arrActivityTrans;
        $this->notifReport = $arrActivityReport;

        view()->composer('layouts.app-findiv', function($view) {
            $dataUser = session('user')['data'];
            $view->with(['notifTrans' => $this->notifTrans, "notifReport" => $this->notifReport, "dataUser" => $dataUser]);
        });
    }
}
