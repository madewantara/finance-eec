<div>
    <div class="row g-6 g-xl-9 mt-1" wire:poll.keep-alive>
        <div class="col-lg-12 col-xxl-12">
            <!--begin::Card-->
            <div class="card h-100">
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <!--begin::Heading-->
                    <div class="fs-2hx fw-bolder">Project Priority Recommendation</div>
                    <div class="fs-4 fw-bold text-gray-400 mb-7">For all <span class="text-gray-700">To Do</span> project
                        status
                    </div>
                    <!--end::Heading-->
                    <!--begin::Wrapper-->
                    <div class="row">
                        <div class="col-lg-4 col-xxl-4">
                            <div class="fs-3 fw-bolder mb-6" style="color: #3498DB">High</div>
                            @foreach ($projHigh as $ph)
                                <div class="fs-6 d-flex justify-content-between my-4 me-5">
                                    <div class="fw-bold">{{ $ph->name }}</div>
                                    <div class="d-flex fw-bolder">
                                        <span class="badge badge-light fw-bolder text-white"
                                            style="background-color: #3498DB;">
                                            High</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed"></div>
                            @endforeach
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="fs-3 fw-bolder mb-6" style="color: #40e0d0;">Medium</div>
                            @foreach ($projMed as $pm)
                                <div class="fs-6 d-flex justify-content-between my-4 me-5">
                                    <div class="fw-bold">{{ $pm->name }}</div>
                                    <div class="d-flex fw-bolder">
                                        <span class="badge badge-light fw-bolder text-white"
                                            style="background-color:#40e0d0;">
                                            Medium</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed"></div>
                            @endforeach
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="fs-3 fw-bolder mb-6" style="color: #F08080">Low</div>
                            @foreach ($projLow as $pl)
                                <div class="fs-6 d-flex justify-content-between my-4 me-5">
                                    <div class="fw-bold">{{ $pl->name }}</div>
                                    <div class="d-flex fw-bolder">
                                        <span class="badge badge-light fw-bolder text-white"
                                            style="background-color: #F08080;">
                                            Low</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
    </div>

    <!--begin::Toolbar-->
    <div class="d-flex flex-wrap flex-stack my-5" wire:poll.keep-alive>
        <!--begin::Heading-->
        <h2 class="fs-2 fw-bold my-2">Projects
            <span class="fs-6 text-gray-400 ms-1">by Status</span>
        </h2>
        <!--end::Heading-->
        <!--begin::Controls-->
        <div class="d-flex flex-wrap my-1">
            <!--begin::Select wrapper-->
            <div class="m-0 me-1">
                <!--begin::Select-->
                <select name="pagesize" id="pagesize"
                    class="form-select form-select-sm bg-body border-body fw-bolder w-125px" wire:model="pagesize"
                    style="margin-top: 3px; height: 43px;">
                    <option value="5" selected>5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
                <!--end::Select-->
            </div>
            <!--end::Select wrapper-->
            <!--begin::Select wrapper-->
            <div class="m-0 me-1">
                <!--begin::Select-->
                <select name="status" id="status"
                    class="form-select form-select-sm bg-body border-body fw-bolder w-125px" wire:model="status"
                    style="margin-top: 3px; height: 43px;">
                    <option value="" selected>
                        All</option>
                    <option value="1">To Do</option>
                    <option value="2">In Progress</option>
                    <option value="3">Completed</option>
                </select>
                <!--end::Select-->
            </div>
            <!--end::Select wrapper-->
            <div class="m-0">
                <div class="d-flex align-items-center position-relative my-1">
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path
                                    d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                    fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                    </span>
                    <input type="text" name="search" class="form-control w-250px ps-14" wire:model="search"
                        placeholder="Search Project" />
                </div>
            </div>
        </div>
        <!--end::Controls-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Row-->
    <div class="row g-6 g-xl-9">
        <!--begin::Col-->
        @foreach ($projCategory as $p)
            <div class="col-md-6 col-xl-4">
                <!--begin::Card-->
                <a href="{{ route('findiv.project-detail', ['uuid' => $p->uuid]) }}"
                    class="card border-hover-primary h-100">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-9">
                        <!--begin::Card Title-->
                        <div class="card-title m-0">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px w-50px bg-light">
                                @if ($p->projectCategory->category == 'New Radar')
                                    <span
                                        class="symbol-label bg-success text-inverse-primary fw-bolder">{{ strtoupper($p->name[0]) }}</span>
                                @elseif($p->projectCategory->category == 'Preventive Maintenance')
                                    <span
                                        class="symbol-label bg-warning text-inverse-primary fw-bolder">{{ strtoupper($p->name[0]) }}</span>
                                @elseif($p->projectCategory->category == 'Corrective Maintenance')
                                    <span class="symbol-label text-inverse-primary fw-bolder"
                                        style="background-color: #f6910d">{{ strtoupper($p->name[0]) }}</span>
                                @elseif($p->projectCategory->category == 'Reinstallation')
                                    <span class="symbol-label text-inverse-primary fw-bolder"
                                        style="background-color:#9f4398;">{{ strtoupper($p->name[0]) }}</span>
                                @else
                                    <span
                                        class="symbol-label bg-danger text-inverse-primary fw-bolder">{{ strtoupper($p->name[0]) }}</span>
                                @endif
                            </div>
                            <!--end::Avatar-->
                        </div>
                        <!--end::Car Title-->
                        <!--begin::Card toolbar-->
                        @if ($p->status == 1)
                            <div class="card-toolbar">
                                <span class="badge badge-light fw-bolder me-auto px-4 py-3">To
                                    Do</span>
                                @if ($p->priority == 0)
                                    <span></span>
                                @elseif ($p->priority == 1)
                                    <span class="badge badge-light fw-bolder ms-2 me-auto px-4 py-3 text-white"
                                        style="background-color: #3498DB;">
                                        High</span>
                                @elseif($p->priority == 2)
                                    <span class="badge badge-light fw-bolder ms-2 me-auto px-4 py-3 text-white"
                                        style="background-color:#40e0d0;">
                                        Medium</span>
                                @else
                                    <span class="badge badge-light fw-bolder ms-2 me-auto px-4 py-3 text-white"
                                        style="background-color: #F08080;">
                                        Low</span>
                                @endif
                            </div>
                        @elseif($p->status == 2)
                            <div class="card-toolbar">
                                <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">In
                                    Progress</span>
                            </div>
                        @else
                            <div class="card-toolbar">
                                <span class="badge badge-light-success fw-bolder me-auto px-4 py-3">Completed</span>
                            </div>
                        @endif
                        <!--end::Card toolbar-->
                    </div>
                    <!--end:: Card header-->
                    <!--begin:: Card body-->
                    <div class="card-body p-9">
                        <!--begin::Name-->
                        <div class="fs-3 fw-bolder text-dark project-name">{{ $p->name }}</div>
                        <!--end::Name-->
                        <!--begin::Description-->
                        <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">
                            {{ $p->projectCategory->category }}</p>
                        <!--end::Description-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap mb-5">
                            <!--begin::Due-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                <div class="fs-6 text-gray-800 fw-bolder">Start Date :
                                    {{ date('F j, Y', strtotime($p->start_date)) }} <br>
                                    End Date : {{ date('F j, Y', strtotime($p->end_date)) }}</div>
                                <div class="fw-bold text-gray-400">Project Period</div>
                            </div>
                            <!--end::Due-->
                            <!--begin::Budget-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                <div class="fs-6 text-gray-800 fw-bolder">Rp.
                                    {{ number_format($p->contract, 0, ',', '.') }}</div>
                                <div class="fw-bold text-gray-400">Budget</div>
                            </div>
                            <!--end::Budget-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Progress-->
                        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title=""
                            data-bs-original-title="This project 50% completed">
                            <div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%"
                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <!--end::Progress-->
                        <!--begin::Users-->
                        <div class="symbol-group symbol-hover">
                            <!--begin::User-->
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Emma Smith">
                                <span
                                    class="symbol-label bg-primary text-inverse-primary fw-bolder">{{ strtoupper($p->name[0]) }}</span>
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Users-->
                    </div>
                    <!--end:: Card body-->
                </a>
                <!--end::Card-->
            </div>
        @endforeach
        <!--end::Col-->
    </div>
    <!--end::Row-->
    <!--begin::Pagination-->
    <div class="d-flex flex-stack flex-wrap pt-10">
        <div class="fs-6 fw-bold text-gray-700">Showing {{ count($projCategory) }} of {{ count($allProj) }}
            entries
        </div>
        <!--begin::Pages-->
        {{ $projCategory->links() }}
        <!--end::Pages-->
    </div>
</div>
