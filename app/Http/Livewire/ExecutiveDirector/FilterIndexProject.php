<?php

namespace App\Http\Livewire\ExecutiveDirector;

use Livewire\Component;
use App\Models\Project;
use App\Models\LocationProject;
use App\Models\ActivityLog;
use App\Models\Transaction;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class FilterIndexProject extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $status = "";
    public $search = "";
    public $pagesize = "6";
    public $arrhighProjectExpanse;
    public $uuid;
    public $name;
    public $category;
    public $period;
    public $location;
    public $contract;
    public $statusProj;
    public $projectManager;
    public $updateMode = false;

    protected $rules = [
        'name' => 'required',
        'category' => 'required',
        'period' => 'required',
        'location' => 'required',
        'contract' => 'required',
        'statusProj' => 'required',
        'projectManager' => 'required',
    ];

    protected $messages = [
        'name.required' => '*Name is required',
        'category.required' => '*Category is required',
        'period.required' => '*Period is required',
        'location.required' => '*Location is required',
        'contract.required' => '*Contract is required',
        'statusProj.required' => '*Status is required',
        'projectManager.required' => '*Project manager is required',
    ];

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required',
            'category' => 'required',
            'period' => 'required',
            'location' => 'required',
            'contract' => 'required',
            'statusProj' => 'required',
            'projectManager' => 'required',
        ]);
    }

    public function resetInputFields()
    {
        $this->name = "";
        $this->category = "";
        $this->period = "";
        $this->location = "";
        $this->contract = "";
        $this->statusProj = "";
        $this->projectManager = "";
    }

    public function storeproject()
    {
        $validated = $this->validate();

        $perDate = explode(' -> ', $validated['period']);
        $startDate = $perDate[0];
        $endDate = $perDate[1];

        $contract = (int) preg_replace("/[^0-9]/", "", $validated['contract']);

        $fetchLocation = Http::get('https://maps.googleapis.com/maps/api/place/textsearch/json', [
            'key' => 'AIzaSyDi6oRMzsrth0JpkfYQQzwnv7FCvYfWwKA',
            'query' => $validated['location'],
        ]);
        if(count($fetchLocation->json()['results']) != 0){
            $latitude = $fetchLocation->json()['results'][0]['geometry']['location']['lat'];
            $longitude = $fetchLocation->json()['results'][0]['geometry']['location']['lng'];
        }else{
            $latitude = '-6.1609206';
            $longitude = '106.8527180';
        }

        $checkProject = Project::where([
                        ['is_active', 1],
                        ['start_date', $startDate],
                        ['end_date', $endDate],
                        ['category_id', $validated['category']],
                        ['name', $validated['name']],
                        ['status', $validated['statusProj']],
                    ])->first();

        if($checkProject){
            $this->emit('closeProject');
            $this->emit('refreshValidation');
            $this->emit('refreshNotification');
            $this->emit('refreshDropdown');

            session()->flash('error', 'Project already exist.');
        } else{
            $projectUuid = Str::uuid()->toString();
            $locUuid = Str::uuid()->toString();
            
            $checkLocProject = LocationProject::where([
                ['latitude', $latitude],
                ['longitude', $longitude],
            ])->first();

            if($checkLocProject){
                $getLocId = $checkLocProject;
            } else{
                $locProject = LocationProject::create([
                    'uuid' => $locUuid,
                    'address' => $validated['location'],
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ]);
    
                $getLocId = LocationProject::where('uuid', $locUuid)->first();
            }

            $project = Project::create([
                'uuid' => $projectUuid,
                'name' => $validated['name'],
                'location_id' => $getLocId->id,
                'category_id' => $validated['category'],
                'status' => $validated['statusProj'],
                'contract' => $contract,
                'project_manager' => $validated['projectManager'],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'is_active' => 1,
            ]);
    
            $log = ActivityLog::create([
                'user_id' => session('user')['nip'],
                'category' => 'project-store',
                'activity_id' => $projectUuid,
            ]);
    
            $this->resetInputFields();
            $this->emit('closeProject');
            $this->emit('refreshValidation');
            $this->emit('refreshNotification');
            $this->emit('refreshDropdown');
            
            session()->flash('success', 'Project successfully added.');
            return redirect(request()->header('Referer'));
        }
    }

    public function edit($uuid)
    {
        $this->updateMode = true;
        $project = Project::where('uuid',$uuid)->with('projectLocation', 'projectCategory')->first();
        $this->name = $project->name;
        $this->category = $project->category_id;
        $this->period = $project->start_date.' -> '.$project->end_date;
        $this->location = $project->projectLocation->address;
        $this->contract = 'Rp '.number_format($project->contract, 0, ',', '.');
        $this->statusProj = $project->status;
        $this->projectManager = $project->project_manager;
        $this->uuid = $uuid;

        $this->emit('openEditProject');
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        $this->resetValidation();
    }

    public function updateproject()
    {
        $validated = $this->validate();

        $perDate = explode(' -> ', $validated['period']);
        $startDate = $perDate[0];
        $endDate = $perDate[1];

        $contract = (int) preg_replace("/[^0-9]/", "", $validated['contract']);

        $fetchLocation = Http::get('https://maps.googleapis.com/maps/api/place/textsearch/json', [
            'key' => 'AIzaSyDi6oRMzsrth0JpkfYQQzwnv7FCvYfWwKA',
            'query' => $validated['location'],
        ]);

        if(count($fetchLocation->json()['results']) != 0){
            $latitude = $fetchLocation->json()['results'][0]['geometry']['location']['lat'];
            $longitude = $fetchLocation->json()['results'][0]['geometry']['location']['lng'];
        }else{
            $latitude = '-6.1609206';
            $longitude = '106.8527180';
        }

        $checkProject = Project::where([
            ['is_active', 1],
            ['start_date', $startDate],
            ['end_date', $endDate],
            ['category_id', $validated['category']],
            ['name', $validated['name']],
            ['status', $validated['statusProj']],
        ])->first();

        if($checkProject){
            $this->emit('closeProject');
            $this->emit('refreshValidation');
            $this->emit('refreshNotification');
            $this->emit('refreshDropdown');

            session()->flash('error', 'Project already exist.');
        } else{
            $curProject = Project::where([
                            ['is_active', 1],
                            ['uuid', $this->uuid],
                        ])->update(['is_active' => 0]);
            
            $projectUuid = Str::uuid()->toString();
            $locUuid = Str::uuid()->toString();
            
            $checkLocProject = LocationProject::where([
                ['latitude', $latitude],
                ['longitude', $longitude],
            ])->first();

            if($checkLocProject){
                $getLocId = $checkLocProject;
            } else{
                $locProject = LocationProject::create([
                    'uuid' => $locUuid,
                    'address' => $validated['location'],
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ]);
    
                $getLocId = LocationProject::where('uuid', $locUuid)->first();
            }

            $project = Project::create([
                'uuid' => $projectUuid,
                'name' => $validated['name'],
                'location_id' => $getLocId->id,
                'category_id' => $validated['category'],
                'status' => $validated['statusProj'],
                'contract' => $contract,
                'project_manager' => $validated['projectManager'],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'is_active' => 1,
            ]);

            $getNoUptProj = Project::where('uuid', $this->uuid)->first();
            $getLastProj = Project::where('uuid', $projectUuid)->first();
            $updateTrans = Transaction::where('project_id', $getNoUptProj->id)->update(['project_id' => $getLastProj->id]);
            
            $dataLog = ActivityLog::where([
                        ['activity_id', $this->uuid],
                        ['category', 'like', '%project%'],
                    ])->get();

            foreach($dataLog as $dl){
                ActivityLog::create([
                    'user_id' => $dl->user_id,
                    'category' => $dl->category,
                    'activity_id' => $projectUuid,
                ]);
            }

            $log = ActivityLog::create([
                'user_id' => session('user')['nip'],
                'category' => 'project-update',
                'activity_id' => $projectUuid,
            ]);
    
            $this->updateMode = false;
            $this->resetInputFields();
            $this->emit('closeProject');
            $this->emit('refreshDropdown');
            $this->emit('refreshNotification');

            session()->flash('success', 'Project successfully updated.');
            return redirect(request()->header('Referer'));
        }
    }

    public function confirmDelete($uuid){
        $this->emit('triggerDelete', ['uuid' => $uuid]);
    }

    public function destroy($uuid)
    {
        $checkProject = Project::where([
            ['uuid', $uuid['uuid']],
            ['is_active', 1],
        ])->get();

        if(empty($checkProject)){
            session()->flash('error','Project does not exists');
        }else{
            $deleteProject = Project::where([
                ['uuid', $uuid['uuid']],
                ['is_active', 1],
            ])->update(['is_active' => 0]);
            
            $projTrans = Transaction::where([
                ['project_id', $checkProject[0]->id],
                ['is_active', 1],
            ])->get()->unique('token');
            
            if(count($projTrans) != 0){
                foreach($projTrans as $pt){
                    if($pt->category == 'cash'){
                        $addLogTrans = ActivityLog::create([
                            'user_id' => session('user')['nip'],
                            'category' => 'cash-delete',
                            'activity_id' => $pt->uuid,
                        ]);
                    }
                    elseif($pt->category == 'operational'){
                        $addLogTrans = ActivityLog::create([
                            'user_id' => session('user')['nip'],
                            'category' => 'operational-delete',
                            'activity_id' => $pt->uuid,
                        ]);
                    }
                    elseif($pt->category == 'escrow'){
                        $addLogTrans = ActivityLog::create([
                            'user_id' => session('user')['nip'],
                            'category' => 'escrow-delete',
                            'activity_id' => $pt->uuid,
                        ]);
                    }
                }

                $deleteTrans = Transaction::where([
                    ['project_id', $checkProject[0]->id],
                    ['is_active', 1],
                ])->update(['is_active' => 0]);
            }

    
            $log = ActivityLog::create([
                'user_id' => session('user')['nip'],
                'category' => 'project-delete',
                'activity_id' => $uuid['uuid'],
            ]);
    
            session()->flash('success', 'Project successfully deleted');
            return redirect(request()->header('Referer'));
        }
    }

    public function render()
    {
        $allProj = Project::where('is_active', 1)->get();
        $projHigh = Project::where([['is_active',1],['status', 1],['priority', 1]])->get();
        $projMed = Project::where([['is_active',1],['status', 1],['priority', 2]])->get();
        $projLow = Project::where([['is_active',1],['status', 1],['priority', 3]])->get();
        $projCategory = Project::where([['is_active',1], ['status', 'like', '%'.$this->status.'%'], ['name', 'like', '%'.$this->search.'%']])->with("projectCategory")->orderBy('created_at', 'desc')->paginate($this->pagesize);
        $arrhighProjectExpanse = $this->arrhighProjectExpanse;
        $fetchAllUser = Http::withHeaders([
            'Authorization' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkYXRhIjp7ImlkIjoiYjg4YTkxNjUtOTRmZS00MWE0LWI1YmItODY5OTdhYTllMThhIiwiZW1haWwiOiJockBnbWFpbC5jb20iLCJyb2xlcyI6W3siaWQiOjMsInJvbGUiOiJodW1hbiByZXNvdXJjZSJ9LHsiaWQiOjUsInJvbGUiOiJlbXBsb3llZSJ9XX0sImlhdCI6MTY1MDQ2ODY3OH0.1nFrYhiNA7hzf_Hg09PhVmCji1CaFqnyvPUNCQjpXR0'
        ])->get('https://persona-gateway.herokuapp.com/auth/employee?limit=9999&offset=0&keyword=');
        $dataUser = $fetchAllUser->json()['data']['data'];

        $projMan = [];
        foreach($projCategory as $pc){
            $fetchUserById = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$pc->project_manager);
            $dataUserById = $fetchUserById->json()['data'];
            array_push($projMan, $dataUserById);
        }

        $this->emit('refreshValidation');
        $this->emit('refreshNotification');
        $this->emit('refreshDropdown');
        
        return view('livewire.executive-director.filter-index-project', ['projCategory' => $projCategory, 'allProj' => $allProj, 'projHigh' => $projHigh, 'projMed' => $projMed, 'projLow' => $projLow, 'arrhighProjectExpanse' => $arrhighProjectExpanse, 'dataUser' => $dataUser, 'projMan' => $projMan]);
    }
}
