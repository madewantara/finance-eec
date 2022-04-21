<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\CategoryProject;
use Carbon\Carbon;

class FindivProjectController extends Controller
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
        $project = Project::with("projectCategory")->get();
        $status = Project::select('status')->distinct()->get();
        $totalContract = Project::sum('contract');
        $avgContract = Project::avg('contract');
        $minContract = Project::min('contract');
        $maxContract = Project::max('contract');
        $projectActive = Project::where('status', 1)->orWhere('status', 2)->with('projectTransaction')->orderBy('id', 'desc')->get();
        $projectActiveLim = Project::where('status', 1)->orWhere('status', 2)->orderBy('id', 'desc')->limit(4)->get();

        $projPerStat = [];
        foreach($status as $s){
            array_push($projPerStat, ["status" => $s->status, "amount" => count(Project::where('status', $s->status)->get())]);
        }

        // Start K-Means Clustering
        $initCluster = array();
        $projectPriority = Project::where('status', 1)->get();
        $amountData = count($projectPriority);
        $date = strtotime(Carbon::now()->format('Y-m-d'));
        $itr = 0;
        if($amountData == 1){
            $centroid1[$itr] = array((strtotime(($projectPriority->start_date)) - $date)/86400, abs(strtotime($projectPriority->start_date) - strtotime($projectPriority->end_date))/86400, $projectPriority->category_id, $projectPriority->contract);
            $centroid2[$itr] = array(0,0,0,0);
            $centroid3[$itr] = array(0,0,0,0);
        }
        elseif($amountData == 2){
            $centroid1[$itr] = array((strtotime(($projectPriority[0]->start_date)) - $date)/86400, abs(strtotime($projectPriority[0]->start_date) - strtotime($projectPriority[0]->end_date))/86400, $projectPriority[0]->category_id, $projectPriority[0]->contract);
            $centroid2[$itr] = array((strtotime(($projectPriority[1]->start_date)) - $date)/86400, abs(strtotime($projectPriority[1]->start_date) - strtotime($projectPriority[1]->end_date))/86400, $projectPriority[1]->category_id, $projectPriority[1]->contract);
            $centroid3[$itr] = array(0,0,0,0);
        }
        else{
            $indexCen2 = round($amountData/2);
            $centroid1[$itr] = array((strtotime(($projectPriority[0]->start_date)) - $date)/86400, abs(strtotime($projectPriority[0]->start_date) - strtotime($projectPriority[0]->end_date))/86400, $projectPriority[0]->category_id, $projectPriority[0]->contract);
            $centroid2[$itr] = array((strtotime(($projectPriority[$indexCen2-1]->start_date)) - $date)/86400, abs(strtotime($projectPriority[$indexCen2-1]->start_date) - strtotime($projectPriority[$indexCen2-1]->end_date))/86400, $projectPriority[$indexCen2-1]->category_id, $projectPriority[$indexCen2-1]->contract);
            $centroid3[$itr] = array((strtotime(($projectPriority[$amountData-1]->start_date)) - $date)/86400, abs(strtotime($projectPriority[$amountData-1]->start_date) - strtotime($projectPriority[$amountData-1]->end_date))/86400, $projectPriority[$amountData-1]->category_id, $projectPriority[$amountData-1]->contract);
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
                        ['status',1],
                        ['uuid', $p->uuid],
                    ])->update(['priority' => 1]);
                }
                elseif($resultC2<$resultC1 && $resultC2<$resultC3){
                    array_push($result, 2);
                    Project::where([
                        ['status',1],
                        ['uuid', $p->uuid],
                    ])->update(['priority' => 2]);
                }
                else{
                    array_push($result, 3);
                    Project::where([
                        ['status',1],
                        ['uuid', $p->uuid],
                    ])->update(['priority' => 3]);
                }
            }

            $itr += 1;
            $priority = Project::where('status', 1)->pluck('priority');
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
            $dataC1Contract = Project::select('contract')->where([['status',1],['priority',1]])->avg('contract');
            $dataC1Category = Project::select('category_id')->where([['status',1],['priority',1]])->avg('category_id');
            $dataC1 = Project::where([['status',1],['priority',1]])->get();
            $startDate1 = array();
            $duration1 = array();
            foreach($dataC1 as $dc1){
                array_push($startDate1, (strtotime(($dc1->start_date)) - $date)/86400);
                array_push($duration1, abs(strtotime($dc1->start_date) - strtotime($dc1->end_date))/86400);
            }
            $dataC1StartDate = array_sum($startDate1)/count($startDate1);
            $dataC1Duration = array_sum($duration1)/count($duration1);

            //New Centroid 2
            $dataC2Contract = Project::select('contract')->where([['status',1],['priority',2]])->avg('contract');
            $dataC2Category = Project::select('category_id')->where([['status',1],['priority',2]])->avg('category_id');
            $dataC2 = Project::where([['status',1],['priority',2]])->get();
            $startDate2 = array();
            $duration2 = array();
            foreach($dataC2 as $dc2){
                array_push($startDate2, (strtotime(($dc2->start_date)) - $date)/86400);
                array_push($duration2, abs(strtotime($dc2->start_date) - strtotime($dc2->end_date))/86400);
            }
            $dataC2StartDate = array_sum($startDate2)/count($startDate2);
            $dataC2Duration = array_sum($duration2)/count($duration2);

            //New Centroid 3
            $dataC3Contract = Project::select('contract')->where([['status',1],['priority',3]])->avg('contract');
            $dataC3Category = Project::select('category_id')->where([['status',1],['priority',3]])->avg('category_id');
            $dataC3 = Project::where([['status',1],['priority',3]])->get();
            $startDate3 = array();
            $duration3 = array();
            foreach($dataC3 as $dc3){
                array_push($startDate3, (strtotime(($dc3->start_date)) - $date)/86400);
                array_push($duration3, abs(strtotime($dc3->start_date) - strtotime($dc3->end_date))/86400);
            }
            $dataC3StartDate = array_sum($startDate3)/count($startDate3);
            $dataC3Duration = array_sum($duration3)/count($duration3);

            $centroid1[$itr] = array($dataC1StartDate, $dataC1Duration, $dataC1Category, $dataC1Contract);
            $centroid2[$itr] = array($dataC2StartDate, $dataC2Duration, $dataC2Category, $dataC2Contract);
            $centroid3[$itr] = array($dataC3StartDate, $dataC3Duration, $dataC3Category, $dataC3Contract);
        }
        //End K-Means Clustering

        return view('finance-division.project.index', compact('project', 'projPerStat', 'totalContract', 'avgContract', 'maxContract', 'minContract', 'projectActive', 'projectActiveLim'));
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
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $project = Project::where('uuid', $uuid)->with('projectCategory')->get();
        $projLocation = Project::where('uuid', $uuid)->with('projectLocation')->get();
        return view('finance-division.project.show', compact('project', 'projLocation', 'uuid'));
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
