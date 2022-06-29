<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Transaction;
use App\Models\CategoryProject;
use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class FindirProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('finance.director');
        $this->middleware('signature.findir');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::where('is_active', 1)->with("projectCategory")->orderBy('created_at', 'desc')->get();
        $status = Project::select('status')->where('is_active', 1)->distinct()->get();
        $totalContract = Project::where('is_active', 1)->sum('contract');
        $avgContract = Project::where('is_active', 1)->avg('contract');
        $minContract = Project::where('is_active', 1)->min('contract');
        $maxContract = Project::where('is_active', 1)->max('contract');

        $projectActive = Project::where('is_active', 1)->where(function($query){
            $query->where('status', 1)
            ->orWhere('status', 2);
        })->with('projectTransaction')->orderBy('id', 'desc')->get();
        $pm = [];
        foreach($projectActive as $pa){
            $fetchUserById = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$pa['project_manager']);
            $dataUser = $fetchUserById->json()['data'];
            array_push($pm, $dataUser);
        }

        $projectActiveLim = Project::where('is_active', 1)->where(function($query){
            $query->where('status', 1)
            ->orWhere('status', 2);
        })->orderBy('id', 'desc')->limit(4)->get();
        $pmLim = [];
        foreach($projectActiveLim as $pal){
            $fetchUserById = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$pal['project_manager']);
            $dataUser = $fetchUserById->json()['data'];
            array_push($pmLim, $dataUser);
        }

        $projLocation = Project::where('is_active', 1)->where(function($query){
            $query->where('status', 1)
            ->orWhere('status', 2);
        })->with('projectLocation')->get();

        $allProjLoc = [];
        foreach($projLocation as $pl){
            array_push($allProjLoc, ['name' => $pl->name, 'lat' => $pl->projectLocation->latitude, 'long' => $pl->projectLocation->longitude]);
        }

        $tempArrExp = [];
        foreach($project as $p){
            $expensePerProj = Transaction::where([
                ['is_active', 1],
                ['type', 2],
                ['project_id', $p->id],
            ])->get();
            array_push($tempArrExp, $expensePerProj);
        }

        $tempSumExp = [];
        foreach($tempArrExp as $tae){
            $tempSumExpProj = [];
            foreach($tae as $t){
                if($t->credit == 0){
                    array_push($tempSumExpProj, $t->debit);
                }
            }

            if(!count($tae) == 0){
                array_push($tempSumExp, $tempSumExpProj);
            }else{
                array_push($tempSumExp, []);
            }
        }
        
        $sumhighProjectExpanse = 0;
        $arrhighProjectExpanse = [];
        foreach($tempSumExp as $tse){
            if(!empty($tse)){
                foreach ($tse as $t){
                    $sumhighProjectExpanse = $sumhighProjectExpanse + $t;
                }
            }else{
                $sumhighProjectExpanse = 0;
            }
            array_push($arrhighProjectExpanse, $sumhighProjectExpanse);
            $sumhighProjectExpanse = 0;
        }
        
        if(count($arrhighProjectExpanse) != 0){
            $highProjectExpanse = $arrhighProjectExpanse[0];
            for($i=1;$i<count($arrhighProjectExpanse);$i++){
                if($arrhighProjectExpanse[$i] > $highProjectExpanse){
                    $highProjectExpanse = $arrhighProjectExpanse[$i];
                }
            }

            $lowProjectExpanse = $arrhighProjectExpanse[0];
            for($i=1;$i<count($arrhighProjectExpanse);$i++){
                if($arrhighProjectExpanse[$i] < $lowProjectExpanse){
                    $lowProjectExpanse = $arrhighProjectExpanse[$i];
                }
            }
        } else{
            $highProjectExpanse = 0;
            $lowProjectExpanse = 0;
        }

        $projPerStat = [];
        foreach($status as $s){
            array_push($projPerStat, ["status" => $s->status, "amount" => count(Project::where([['status', $s->status], ['is_active', 1]])->get())]);
        }

        // Start K-Means Clustering
        $initCluster = array();
        $projectPriority = Project::where([['is_active', 1], ['status', 1]])->get();
        $amountData = count($projectPriority);
        $date = strtotime(Carbon::now()->format('Y-m-d'));
        $itr = 0;
        
        $projPoint = [];
        if($amountData != 0){
            $point = 0;
            foreach($projectPriority as $key => $pp){
                $accStrDate = (strtotime(($pp->start_date)) - $date)/86400;
                if($accStrDate <= 30){
                    $point = $point + 3;
                }
                elseif($accStrDate > 30 && $accStrDate <= 90){
                    $point = $point + 2;
                }
                elseif($accStrDate > 90){
                    $point = $point + 1;
                }

                $accDuration = (abs(strtotime($pp->start_date) - strtotime($pp->end_date)))/86400;
                if($accDuration <= 15){
                    $point = $point + 1;
                }
                elseif($accDuration > 15 && $accDuration <= 30){
                    $point = $point + 2;
                }
                elseif($accDuration > 30){
                    $point = $point + 3;
                }

                if($pp->contract <= 5000000000){
                    $point = $point + 1;
                }
                elseif($pp->contract > 5000000000 && $pp->contract <= 10000000000){
                    $point = $point + 2;
                }
                elseif($pp->contract > 10000000000){
                    $point = $point + 3;
                }

                if($pp->category_id <= 2){
                    $point = $point + 1;
                }
                if($pp->category_id > 2 && $pp->category_id <=4){
                    $point = $point + 2;
                }
                if($pp->category_id >4){
                    $point = $point + 3;
                }
                
                if(array_search($point, array_column($projPoint, 'point')) === false){
                    array_push($projPoint, ["key" => $key, "point" => $point]);
                }
                $point = 0;
            }
        }

        for($i=0; $i<=count($projPoint)-2; $i++){
            for($j=$i+1; $j<=count($projPoint)-1; $j++){
                if($projPoint[$i]['point'] < $projPoint[$j]['point']){
                    $temp = $projPoint[$j];
                    $projPoint[$j] = $projPoint[$i];
                    $projPoint[$i] = $temp;
                    $temp = '';
                }
            }
        }
        
        if($amountData == 0){
            $centroid1[$itr] = array(0,0,0,0);
            $centroid2[$itr] = array(0,0,0,0);
            $centroid3[$itr] = array(0,0,0,0);
        }
        elseif($amountData == 1){
            $centroid1[$itr] = array((strtotime(($projectPriority[$projPoint[0]['key']]->start_date)) - $date)/86400, abs(strtotime($projectPriority[$projPoint[0]['key']]->start_date) - strtotime($projectPriority[$projPoint[0]['key']]->end_date))/86400, $projectPriority[$projPoint[0]['key']]->category_id, $projectPriority[$projPoint[0]['key']]->contract);
            $centroid2[$itr] = array(0,0,0,0);
            $centroid3[$itr] = array(0,0,0,0);
        }
        elseif($amountData == 2){
            $centroid1[$itr] = array((strtotime(($projectPriority[$projPoint[0]['key']]->start_date)) - $date)/86400, abs(strtotime($projectPriority[$projPoint[0]['key']]->start_date) - strtotime($projectPriority[$projPoint[0]['key']]->end_date))/86400, $projectPriority[$projPoint[0]['key']]->category_id, $projectPriority[$projPoint[0]['key']]->contract);
            $centroid2[$itr] = array((strtotime(($projectPriority[$projPoint[1]['key']]->start_date)) - $date)/86400, abs(strtotime($projectPriority[$projPoint[1]['key']]->start_date) - strtotime($projectPriority[$projPoint[1]['key']]->end_date))/86400, $projectPriority[$projPoint[1]['key']]->category_id, $projectPriority[$projPoint[1]['key']]->contract);
            $centroid3[$itr] = array(0,0,0,0);
        }
        else{
            $centroid1[$itr] = array((strtotime(($projectPriority[$projPoint[0]['key']]->start_date)) - $date)/86400, abs(strtotime($projectPriority[$projPoint[0]['key']]->start_date) - strtotime($projectPriority[$projPoint[0]['key']]->end_date))/86400, $projectPriority[$projPoint[0]['key']]->category_id, $projectPriority[$projPoint[0]['key']]->contract);
            $centroid2[$itr] = array((strtotime(($projectPriority[$projPoint[(int) ceil(count($projPoint)/2)]['key']]->start_date)) - $date)/86400, abs(strtotime($projectPriority[$projPoint[(int) ceil(count($projPoint)/2)]['key']]->start_date) - strtotime($projectPriority[$projPoint[(int) ceil(count($projPoint)/2)]['key']]->end_date))/86400, $projectPriority[$projPoint[(int) ceil(count($projPoint)/2)]['key']]->category_id, $projectPriority[$projPoint[(int) ceil(count($projPoint)/2)]['key']]->contract);
            $centroid3[$itr] = array((strtotime(($projectPriority[$projPoint[count($projPoint)-1]['key']]->start_date)) - $date)/86400, abs(strtotime($projectPriority[$projPoint[count($projPoint)-1]['key']]->start_date) - strtotime($projectPriority[$projPoint[count($projPoint)-1]['key']]->end_date))/86400, $projectPriority[$projPoint[count($projPoint)-1]['key']]->category_id, $projectPriority[$projPoint[count($projPoint)-1]['key']]->contract);
        }

        $status = 'false';
        $result = array();
        while ($status == 'false'){
            foreach($projectPriority as $p){
                $resultC1 = sqrt(pow(((strtotime(($p->start_date)) - $date)/86400) - $centroid1[$itr][0],2) + 
                                     pow((abs(strtotime($p->start_date) - strtotime($p->end_date))/86400) - $centroid1[$itr][1], 2) +
                                     pow($p->category_id - $centroid1[$itr][2], 2) + 
                                     pow($p->contract - $centroid1[$itr][3], 2));
                $resultC2 = sqrt(pow(((strtotime(($p->start_date)) - $date)/86400) - $centroid2[$itr][0],2) + 
                                     pow((abs(strtotime($p->start_date) - strtotime($p->end_date))/86400) - $centroid2[$itr][1], 2) +
                                     pow($p->category_id - $centroid2[$itr][2], 2) + 
                                     pow($p->contract - $centroid2[$itr][3], 2));
                $resultC3 = sqrt(pow(((strtotime(($p->start_date)) - $date)/86400) - $centroid3[$itr][0],2) + 
                                     pow((abs(strtotime($p->start_date) - strtotime($p->end_date))/86400) - $centroid3[$itr][1], 2) +
                                     pow($p->category_id - $centroid3[$itr][2], 2) + 
                                     pow($p->contract - $centroid3[$itr][3], 2));
                if($resultC1<$resultC2 && $resultC1<$resultC3){
                    array_push($result, 1);
                    Project::where([
                        ['is_active', 1],
                        ['status',1],
                        ['uuid', $p->uuid],
                    ])->update(['priority' => 1]);
                }
                elseif($resultC2<$resultC1 && $resultC2<$resultC3){
                    array_push($result, 2);
                    Project::where([
                        ['is_active', 1],
                        ['status',1],
                        ['uuid', $p->uuid],
                    ])->update(['priority' => 2]);
                }
                else{
                    array_push($result, 3);
                    Project::where([
                        ['is_active', 1],
                        ['status',1],
                        ['uuid', $p->uuid],
                    ])->update(['priority' => 3]);
                }
            }

            $itr += 1;
            $priority = Project::where('is_active', 1)->where('status', 1)->pluck('priority');
            if($initCluster != $result){
                $status == 'false';
                $initCluster = $result;
                $result = array();
            }
            else{
                $status == 'true';
                break;
            }

            //New Centroid 1
            $dataC1Contract = Project::select('contract')->where([['is_active',1],['status',1],['priority',1]])->avg('contract');
            $dataC1Category = Project::select('category_id')->where([['is_active',1],['status',1],['priority',1]])->avg('category_id');
            $dataC1 = Project::where([['is_active',1],['status',1],['priority',1]])->get();
            $startDate1 = array();
            $duration1 = array();
            foreach($dataC1 as $dc1){
                array_push($startDate1, (strtotime(($dc1->start_date)) - $date)/86400);
                array_push($duration1, abs(strtotime($dc1->start_date) - strtotime($dc1->end_date))/86400);
            }
            if(count($dataC1) == 0){
                $dataC1StartDate = 0;
                $dataC1Duration = 0;
            } else{
                $dataC1StartDate = array_sum($startDate1)/count($startDate1);
                $dataC1Duration = array_sum($duration1)/count($duration1);
            }

            //New Centroid 2
            $dataC2Contract = Project::select('contract')->where([['is_active',1],['status',1],['priority',2]])->avg('contract');
            $dataC2Category = Project::select('category_id')->where([['is_active',1],['status',1],['priority',2]])->avg('category_id');
            $dataC2 = Project::where([['is_active',1],['status',1],['priority',2]])->get();
            $startDate2 = array();
            $duration2 = array();
            foreach($dataC2 as $dc2){
                array_push($startDate2, (strtotime(($dc2->start_date)) - $date)/86400);
                array_push($duration2, abs(strtotime($dc2->start_date) - strtotime($dc2->end_date))/86400);
            }
            if(count($dataC2) == 0){
                $dataC2StartDate = 0;
                $dataC2Duration = 0;
            } else{
                $dataC2StartDate = array_sum($startDate2)/count($startDate2);
                $dataC2Duration = array_sum($duration2)/count($duration2);
            }

            //New Centroid 3
            $dataC3Contract = Project::select('contract')->where([['is_active',1],['status',1],['priority',3]])->avg('contract');
            $dataC3Category = Project::select('category_id')->where([['is_active',1],['status',1],['priority',3]])->avg('category_id');
            $dataC3 = Project::where([['is_active',1],['status',1],['priority',3]])->get();
            $startDate3 = array();
            $duration3 = array();
            foreach($dataC3 as $dc3){
                array_push($startDate3, (strtotime(($dc3->start_date)) - $date)/86400);
                array_push($duration3, abs(strtotime($dc3->start_date) - strtotime($dc3->end_date))/86400);
            }
            if(count($dataC3) == 0){
                $dataC3StartDate = 0;
                $dataC3Duration = 0;
            } else{
                $dataC3StartDate = array_sum($startDate3)/count($startDate3);
                $dataC3Duration = array_sum($duration3)/count($duration3);
            }

            $centroid1[$itr] = array($dataC1StartDate, $dataC1Duration, $dataC1Category, $dataC1Contract);
            $centroid2[$itr] = array($dataC2StartDate, $dataC2Duration, $dataC2Category, $dataC2Contract);
            $centroid3[$itr] = array($dataC3StartDate, $dataC3Duration, $dataC3Category, $dataC3Contract);
        }
        //End K-Means Clustering

        return view('finance-director.project.index', compact('project', 'projPerStat', 'totalContract', 'avgContract', 'maxContract', 'minContract', 'projectActive', 'pm', 'projectActiveLim', 'pmLim', 'highProjectExpanse', 'lowProjectExpanse', 'arrhighProjectExpanse', 'projLocation','allProjLoc'));
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
        $project = Project::where('is_active', 1)->where('uuid', $uuid)->with('projectCategory')->get();
        $projLocation = Project::where('is_active', 1)->where('uuid', $uuid)->with('projectLocation')->get();
        $lastTrans = Transaction::select('uuid')->where([
            ['is_active', 1],
            ['type', 2],
            ['project_id', $project[0]->id],
        ])->orderBy('updated_at', 'desc')->distinct()->get();
        
        $fetchProjMan = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$project[0]->project_manager);
        $projMan = $fetchProjMan->json()['data'];

        $arrLastTrans = [];
        foreach($lastTrans as $lt){
            array_push($arrLastTrans, Transaction::where([
                ['is_active', 1],
                ['type', 2],
                ['uuid', $lt->uuid],
                ['debit', 0],
            ])->get());
        }

        $totalProjTrans = [];
        foreach($arrLastTrans as $alt){
            $sumTrans = 0;
            foreach($alt as $a){
                $sumTrans = $sumTrans + $a->credit;
            }
            array_push($totalProjTrans, $sumTrans);
            $sumTrans = 0;
        }

        $projFiles = Transaction::select('uuid')->where([
                ['is_active', 1],
                ['type', 2],
                ['project_id', $project[0]->id],
            ])->with('transactionFiles')->distinct()->get();
        
        $arrFiles = [];
        foreach($projFiles as $pf){
            if(empty($pf->transactionFiles)){
                continue;
            }else{
                foreach($pf->transactionFiles as $pt){
                    array_push($arrFiles, ['uuid' => $pt->transaction_id, 'category' => $pt->category, 'name' => $pt->name]);
                }
            }
        }
        krsort($arrFiles);
        
        $expensePerProj = Transaction::where([
            ['is_active', 1],
            ['type', 2],
            ['project_id', $project[0]->id],
        ])->get();

        $tempSumExp = [];
        foreach($expensePerProj as $epp){
            if($epp->credit == 0){
                array_push($tempSumExp, $epp->debit);
            }
        }
        
        $sumProjectExpanse = 0;
        foreach($tempSumExp as $tse){
            if($tse == 0){
                $sumProjectExpanse = 0;
            }else{
                $sumProjectExpanse = $sumProjectExpanse + $tse;
            }
        }

        $projActivity = Transaction::where([
            ['is_active', 1],
            ['type', 2],
            ['project_id', $project[0]->id],
        ])->get()->unique('uuid');

        $arrProjActivity = [];
        foreach($projActivity as $pa){
            array_push($arrProjActivity, ["activity" => ActivityLog::where([
                ['activity_id', $pa->uuid],
                ['category', 'like', '%'.$pa->category.'%'],
            ])->get(), "token" => $pa->token, "uuid" => $pa->uuid]);
        }

        array_push($arrProjActivity, ["activity" => ActivityLog::where([['activity_id', $uuid], ['category', 'like', '%project%']])->get(), "token" => "", "uuid" => ""]);

        $lastProjActivity = [];
        foreach($arrProjActivity as $apa){
            foreach($apa['activity'] as $a){
                $fetchUserById = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$a->user_id);
                $dataUser = $fetchUserById->json()['data'];
                array_push($lastProjActivity, [$dataUser['fullname'], $a->category, $a->updated_at, $apa['token'], $apa['uuid'], $dataUser['avatar']]);
            }
        }

        for($i=0; $i<=count($lastProjActivity)-2; $i++){
            for($j=$i+1; $j<=count($lastProjActivity)-1; $j++){
                if(strtotime($lastProjActivity[$j][2]) < strtotime($lastProjActivity[$i][2])){
                    $temp = $lastProjActivity[$j];
                    $lastProjActivity[$j] = $lastProjActivity[$i];
                    $lastProjActivity[$i] = $temp;
                    $temp = '';
                }
            }
        }
        krsort($lastProjActivity);

        return view('finance-director.project.show', compact('project', 'projLocation', 'uuid', 'sumProjectExpanse', 'arrFiles', 'arrLastTrans', 'totalProjTrans', 'lastProjActivity', 'projMan'));
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
}
