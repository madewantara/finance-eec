<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ActivityLog;
use App\Models\Transaction;
use Carbon\Carbon;

class FindirContentServiceProvider extends ServiceProvider
{
    public $notification;

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
            $query->where('category', 'cash-store')
            ->orWhere('category', 'operational-store')
            ->orWhere('category', 'escrow-store')
            ->orWhere('category', 'cash-update')
            ->orWhere('category', 'operational-update')
            ->orWhere('category', 'escrow-update');
        })->where('updated_at', '>=', $date)->orderBy('updated_at', 'desc')->get();
        
        $tempAct = [];
        foreach($activity as $a){
            $transaction = Transaction::where([
                ['is_active',1],
                ['type',2],
                ['status', 1],
                ['uuid', $a->activity_id],
            ])->get()->unique('uuid');
            array_push($tempAct, [$transaction, $a->user_id, $a->updated_at]);
        }

        $arrActivity = [];
        foreach($tempAct as $ta){
            if(count($ta) != 0){
                foreach($ta[0] as $t){
                    if($t->status == 1){
                        array_push($arrActivity, ["uuid" => $t->uuid, "token" => $t->token, "category" => $t->category, "user_id" => $ta[1], "updated_at" => $ta[2]]);
                    }
                }
            }
        }

        $this->notification = $arrActivity;

        view()->composer('layouts.app-findir', function($view) {
            $view->with(['notification' => $this->notification]);
        });
    }
}
