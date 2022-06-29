<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ActivityLog;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

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
            ->orWhere('category', 'escrow-update')
            ->orWhere('category', 'cash-paid')
            ->orWhere('category', 'operational-paid')
            ->orWhere('category', 'escrow-paid');
        })->where('updated_at', '>=', $date)->orderBy('updated_at', 'desc')->get()->unique('activity_id');
        
        $lastAct = [];
        foreach($activity as $a){
            $getLastAct = ActivityLog::where('activity_id', $a->activity_id)->get();
            if($getLastAct[count($getLastAct) - 1]->category == 'cash-store' || 
                $getLastAct[count($getLastAct) - 1]->category == 'operational-store' ||
                $getLastAct[count($getLastAct) - 1]->category == 'escrow-store' ||
                $getLastAct[count($getLastAct) - 1]->category == 'cash-update' ||
                $getLastAct[count($getLastAct) - 1]->category == 'operational-update' ||
                $getLastAct[count($getLastAct) - 1]->category == 'escrow-update' ||
                $getLastAct[count($getLastAct) - 1]->category == 'cash-paid' ||
                $getLastAct[count($getLastAct) - 1]->category == 'operational-paid' ||
                $getLastAct[count($getLastAct) - 1]->category == 'escrow-paid')
            {
                array_push($lastAct, $getLastAct[count($getLastAct) - 1]);
            }
        }

        $tempAct = [];
        foreach($lastAct as $la){
            $transaction = Transaction::where([
                ['is_active',1],
                ['type',2],
                ['uuid', $la->activity_id],
            ])->where(function($query){
                $query->where('status', 1)
                ->orWhere('status', 4);
            })->get()->unique('uuid');
            if(count($transaction) != 0){
                array_push($tempAct, [$transaction, $la->user_id, $la->updated_at]);
            }
        }

        $arrActivity = [];
        foreach($tempAct as $ta){
            if(count($ta) != 0){
                foreach($ta[0] as $t){
                    if($t->status == 1 || $t->status == 4){
                        $fetchUserNotif = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$ta[1]);
                        $dataUserNotif = $fetchUserNotif->json()['data'];
                        array_push($arrActivity, ["uuid" => $t->uuid, "token" => $t->token, "category" => $t->category, "user" => $dataUserNotif, "updated_at" => $ta[2], "status" => $t->status]);
                    }
                }
            }
        }

        $this->notification = $arrActivity;

        view()->composer('layouts.app-findir', function($view) {
            $userId = session('user')['nip'];
            $fetchUserById = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$userId);
            $dataUser = $fetchUserById->json()['data'];

            $view->with(['notification' => $this->notification, "dataUser" => $dataUser]);
        });
    }
}
