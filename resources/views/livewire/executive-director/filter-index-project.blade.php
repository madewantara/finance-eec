<div>
    @if (Session::has('success'))
        <div class="position-relative">
            <div class="position-fixed bottom-0 end-0" style="bottom: 2% !important; right: 1% !important; z-index:2;">
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path opacity="0.3"
                                d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                fill="currentColor"></path>
                            <path
                                d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                    <div>
                        {{ Session::get('success') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                        style="5px !important;"></button>
                </div>
            </div>
        </div>
    @elseif (Session::has('error'))
        <div class="position-relative">
            <div class="position-fixed bottom-0 end-0" style="bottom: 2% !important; right: 1% !important; z-index:2;">
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                    <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.4" x="2" y="2" width="20" height="20"
                                rx="10" fill="currentColor"></rect>
                            <rect x="11" y="14" width="7" height="2" rx="1"
                                transform="rotate(-90 11 14)" fill="currentColor"></rect>
                            <rect x="11" y="17" width="2" height="2" rx="1"
                                transform="rotate(-90 11 17)" fill="currentColor"></rect>
                        </svg>
                    </span>
                    <div>
                        {{ Session::get('error') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                        style="top:5px;"></button>
                </div>
            </div>
        </div>
    @endif
    <div class="row g-6 g-xl-9 mt-1">
        <div class="col-lg-12 col-xxl-12">
            <!--begin::Card-->
            <div class="card h-100">
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <!--begin::Heading-->
                    <div class="fs-2hx fw-bolder">Project Priority Recommendation</div>
                    <div class="fs-4 fw-bold text-gray-400 mb-7">For all <span class="text-gray-700">To Do</span>
                        project
                        status
                    </div>
                    <!--end::Heading-->
                    <!--begin::Wrapper-->
                    <div class="row">
                        <div class="col-lg-4 col-xxl-4">
                            <div class="fs-3 fw-bolder mb-6" style="color: #3498DB">High</div>
                            <div class="scroll-y h-250px" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-offset="5px">
                                @if (count($projHigh) != 0)
                                    @foreach ($projHigh as $ph)
                                        <div class="fs-6 d-flex justify-content-between my-4 me-5">
                                            <a href="{{ route('exedir.project-detail', ['uuid' => $ph->uuid]) }}"
                                                class="fw-bold text-dark text-hover-primary">
                                                {{ $ph->name }}
                                            </a>
                                            <div class="d-flex fw-bolder">
                                                <span class="badge badge-light fw-bolder text-white"
                                                    style="background-color: #3498DB;">
                                                    High</span>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                    @endforeach
                                @else
                                    <div class="fs-6 my-4 me-5">
                                        <div class="fw-bolder text-muted fst-italic">There are no high priority
                                            projects</div>
                                    </div>
                                    <div class="separator separator-dashed"></div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="fs-3 fw-bolder mb-6" style="color: #40e0d0;">Medium</div>
                            <div class="scroll-y h-250px" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-offset="5px">
                                @if (count($projMed) != 0)
                                    @foreach ($projMed as $pm)
                                        <div class="fs-6 d-flex justify-content-between my-4 me-5">
                                            <a href="{{ route('exedir.project-detail', ['uuid' => $pm->uuid]) }}"
                                                class="fw-bold text-dark text-hover-primary">{{ $pm->name }}</a>
                                            <div class="d-flex fw-bolder">
                                                <span class="badge badge-light fw-bolder text-white"
                                                    style="background-color:#40e0d0;">
                                                    Medium</span>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                    @endforeach
                                @else
                                    <div class="fs-6 my-4 me-5">
                                        <div class="fw-bolder text-muted fst-italic">There are no medium priority
                                            projects</div>
                                    </div>
                                    <div class="separator separator-dashed"></div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-xxl-4">
                            <div class="fs-3 fw-bolder mb-6" style="color: #F08080">Low</div>
                            <div class="scroll-y h-250px" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-offset="5px">
                                @if (count($projLow) != 0)
                                    @foreach ($projLow as $pl)
                                        <div class="fs-6 d-flex justify-content-between my-4 me-5">
                                            <a href="{{ route('exedir.project-detail', ['uuid' => $pl->uuid]) }}"
                                                class="fw-bold text-dark text-hover-primary">{{ $pl->name }}</a>
                                            <div class="d-flex fw-bolder">
                                                <span class="badge badge-light fw-bolder text-white"
                                                    style="background-color: #F08080;">
                                                    Low</span>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                    @endforeach
                                @else
                                    <div class="fs-6 my-4 me-5">
                                        <div class="fw-bolder text-muted fst-italic">There are no low priority
                                            projects</div>
                                    </div>
                                    <div class="separator separator-dashed"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
    </div>

    <!--begin::Toolbar-->
    <div class="d-flex flex-wrap flex-stack my-5">
        <!--begin::Heading-->
        <h2 class="fs-2 fw-bold my-2">Projects
            <span class="fs-6 text-gray-400 ms-1">by Status</span>
        </h2>
        <!--end::Heading-->
        <!--begin::Controls-->
        <div class="d-flex flex-wrap my-1">
            <!--begin::Select wrapper-->
            <!--begin::Card toolbar-->
            <div class="m-0 me-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProject">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <rect fill="#000000" x="4" y="11" width="16" height="2"
                                rx="1" />
                            <rect fill="#000000" opacity="0.5"
                                transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)"
                                x="4" y="11" width="16" height="2" rx="1" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Add Project
                </button>
            </div>
            <!--end::Card toolbar-->
            <div class="m-0 me-3" wire:ignore>
                <!--begin::Select-->
                <select name="pagesize" id="pagesize"
                    class="form-control form-select form-control-solid bg-body border-body fw-bolder w-75px"
                    wire:model="pagesize" data-pharaonic="select2" data-component-id="{{ $this->id }}"
                    style="margin-top: 3px; height: 43px;">
                    <option value="6" selected>6</option>
                    <option value="12">12</option>
                    <option value="24">24</option>
                    <option value="60">60</option>
                </select>
                <!--end::Select-->
            </div>
            <!--end::Select wrapper-->
            <!--begin::Select wrapper-->
            <div class="m-0 me-3" wire:ignore>
                <!--begin::Select-->
                <select name="status" id="status"
                    class="form-control form-select form-control-solid bg-body border-body fw-bolder w-100px"
                    wire:model="status" data-pharaonic="select2" data-component-id="{{ $this->id }}"
                    style="margin-top: 3px; height: 43px;">
                    <option></option>
                    <option value="1">To Do</option>
                    <option value="2">In Progress</option>
                    <option value="3">Completed</option>
                </select>
                <!--end::Select-->
            </div>
            <!--end::Select wrapper-->
            <div class="m-0">
                <div class="d-flex align-items-center position-relative">
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                    <input type="text" name="search" class="form-control w-250px ps-14 border-transparent"
                        wire:model="search" placeholder="Search Project" />
                </div>
            </div>
        </div>
        <!--end::Controls-->
    </div>
    <!--end::Toolbar-->

    <!-- Modal Create-->
    <div wire:ignore.self class="modal fade" id="addProject" tabindex="-1" aria-labelledby="addProject"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeproject" id="addproj" novalidate autocomplete="off">
                        <!--begin::Input group-->
                        <div class="fv-row row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-3 align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold"><span class="required">Name</span></label>
                                <div class="text-muted fw-bold fst-italic mb-2" style="font-size: 9px;">
                                    Make sure project category, name and period don't same with other.
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control form-control-solid fw-bold @error('name') is-invalid @enderror"
                                    placeholder="Project name" name="name" id="name"
                                    wire:model.defer="name" @error('name') style="border-color: #f1416c;" @enderror
                                    required />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--begin::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-3 align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold"><span class="required">Category</span></label>
                                <!--end::Label-->
                                <div class="text-muted fw-bold fst-italic mb-2" style="font-size: 9px;">
                                    Don't forget to enter the project name.
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-9">
                                <!--begin::Input-->
                                <select
                                    class="form-control form-select form-control-solid fw-bolder custom-select @error('category') is-invalid border-danger @enderror"
                                    data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                    wire:model.defer="category" id="category" name="category" required>
                                    <option></option>
                                    <option value="1">Radar Upgrade</option>
                                    <option value="2">Radar Spare Part</option>
                                    <option value="3">Radar Reinstallation</option>
                                    <option value="4">Preventive Maintenance</option>
                                    <option value="5">New Radar</option>
                                    <option value="6">Corrective Maintenance</option>
                                </select>
                                <!--end::Input-->
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-3 align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold"><span class="required">Period</span></label>
                                <!--end::Label-->
                                <div class="text-muted fw-bold fst-italic mb-2" style="font-size: 9px;">
                                    It will contains start date and end date project.
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-9">
                                <!--begin::Input-->
                                <input
                                    class="form-control form-control-solid fw-bold @error('period') is-invalid @enderror"
                                    placeholder="Pick a project period" id="period" name="period" type="text"
                                    wire:model.defer="period" @error('period') style="border-color: #f1416c;" @enderror
                                    required>
                                <!--end::Input-->
                                @error('period')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-3 align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold"><span class="required">Location</span></label>
                                <!--end::Label-->
                                <div class="text-muted fw-bold fst-italic mb-2" style="font-size: 9px;">
                                    More detail is better for place accuracy in google maps. (At least contains city and
                                    country).
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control form-control-solid fw-bold @error('location') is-invalid @enderror"
                                    placeholder="Project location" name="location" id="location"
                                    wire:model.defer="location"
                                    @error('location') style="border-color: #f1416c;" @enderror required />
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--begin::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-3 align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold"><span class="required">Contract</span></label>
                                <!--end::Label-->
                                <div class="text-muted fw-bold fst-italic mb-2" style="font-size: 9px;">
                                    Please fill with project contract before tax.
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-9">
                                <input type="text" type-currency="IDR"
                                    class="form-control form-control-solid @error('contract') is-invalid @enderror"
                                    placeholder="Project contract" name="contract" wire:model.defer="contract"
                                    @error('contract') style="border-color: #f1416c;" @enderror required>
                                @error('contract')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-3 align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold"><span class="required">Project
                                        Manager</span></label>
                                <!--end::Label-->
                                <div class="text-muted fw-bold fst-italic mb-2" style="font-size: 9px;">
                                    Project manager will be lead this project.
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-9">
                                <select
                                    class="form-control form-select form-control-solid fw-bolder custom-select @error('projectManager') is-invalid border-danger @enderror"
                                    data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                    wire:model.defer="projectManager" id="projectManager" name="projectManager"
                                    required>
                                    <option></option>
                                    @foreach ($dataUser as $du)
                                        <option value="{{ $du['nip'] }}">{{ $du['fullname'] }} -
                                            {{ $du['position'] }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                                @error('projectManager')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--begin::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-3 align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold"><span class="required">Status</span></label>
                                <!--end::Label-->
                                <div class="text-muted fw-bold fst-italic mb-2" style="font-size: 9px;">
                                    Don't forget to update project status.
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-9">
                                <!--begin::Input-->
                                <select
                                    class="form-control form-select form-control-solid fw-bolder custom-select @error('statusProj') is-invalid border-danger @enderror"
                                    data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                    wire:model.defer="statusProj" id="statusProj" name="statusProj" required>
                                    <option></option>
                                    <option value="1">To Do</option>
                                    <option value="2">On Progress</option>
                                    <option value="3">Completed</option>
                                </select>
                                <!--end::Input-->
                                @error('statusProj')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="addproj">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--begin::Row-->
    <div class="row g-6 g-xl-9">
        <!--begin::Col-->
        @if (count($projCategory) == 0)
            <div class="col-md-12">
                <div class="container card d-flex align-items-center justify-content-center h-150px">
                    <div class="card-body">
                        <div class="text-muted fw-bolder fst-italic mt-10">
                            There are no projects
                        </div>
                    </div>
                </div>
            </div>
        @else
            @foreach ($projCategory as $key => $p)
                <div class="col-md-6 col-xl-4">
                    <!--begin::Card-->
                    <div class="card border-hover-primary h-100">
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
                                    @elseif($p->projectCategory->category == 'Radar Reinstallation')
                                        <span class="symbol-label text-inverse-primary fw-bolder"
                                            style="background-color:#9f4398;">{{ strtoupper($p->name[0]) }}</span>
                                    @elseif($p->projectCategory->category == 'Radar Spare Part')
                                        <span class="symbol-label text-inverse-primary fw-bolder"
                                            style="background-color:#00647b;">{{ strtoupper($p->name[0]) }}</span>
                                    @else
                                        <span
                                            class="symbol-label bg-danger text-inverse-primary fw-bolder">{{ strtoupper($p->name[0]) }}</span>
                                    @endif
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::Car Title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm px-4 py-2 me-2"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                    data-kt-menu-flip="top-end">
                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                    <i class="bi bi-three-dots fs-5 pe-0"></i>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    <div class="menu-item ps-3" style="margin-right: -1.75rem !important">
                                        <button type="button" class="btn-delete menu-link fw-bold px-3"
                                            wire:click="edit('{{ $p->uuid }}')">Edit</button>
                                    </div>
                                    <div class="menu-item px-3 mb-2">
                                        <button type="submit" class="btn-delete menu-link fw-bold px-3"
                                            wire:click="confirmDelete('{{ $p->uuid }}')">Delete</button>
                                    </div>
                                </div>
                                <!--end::Menu-->
                                @if ($p->status == 1)
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
                                @elseif($p->status == 2)
                                    <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">In
                                        Progress</span>
                                @else
                                    <span
                                        class="badge badge-light-success fw-bolder me-auto px-4 py-3">Completed</span>
                                @endif
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end:: Card header-->
                        <!--begin:: Card body-->
                        <div class="card-body p-9">
                            <!--begin::Name-->
                            <a href="{{ route('exedir.project-detail', ['uuid' => $p->uuid]) }}"
                                class="fs-3 fw-bolder text-dark text-hover-primary project-name">{{ $p->projectCategory->category }}
                                - {{ $p->name }}</a>
                            <!--end::Name-->
                            <!--begin::Description-->
                            <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">
                                {{ $p->projectCategory->category }}</p>
                            <!--end::Description-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap mb-5">
                                <!--begin::Due-->
                                <div
                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                    <div class="fs-6 text-gray-800 fw-bolder">Start Date :
                                        {{ date('F j, Y', strtotime($p->start_date)) }} <br>
                                        End Date : {{ date('F j, Y', strtotime($p->end_date)) }}</div>
                                    <div class="fw-bold text-gray-400">Project Period</div>
                                </div>
                                <!--end::Due-->
                                <!--begin::Budget-->
                                <div class="d-flex flex-row">
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3 me-3">
                                        @if ($p->projectCategory->category == 'New Radar')
                                            <div class="fs-6 text-gray-800 fw-bolder">Rp.
                                                {{ number_format($p->contract - $p->contract * 0.015, 0, ',', '.') }}
                                            </div>
                                        @elseif($p->projectCategory->category == 'Preventive Maintenance')
                                            <div class="fs-6 text-gray-800 fw-bolder">Rp.
                                                {{ number_format($p->contract - $p->contract * 0.02, 0, ',', '.') }}
                                            </div>
                                        @elseif($p->projectCategory->category == 'Corrective Maintenance')
                                            <div class="fs-6 text-gray-800 fw-bolder">Rp.
                                                {{ number_format($p->contract - $p->contract * 0.02, 0, ',', '.') }}
                                            </div>
                                        @elseif($p->projectCategory->category == 'Radar Reinstallation')
                                            <div class="fs-6 text-gray-800 fw-bolder">Rp.
                                                {{ number_format($p->contract - $p->contract * 0.015, 0, ',', '.') }}
                                            </div>
                                        @elseif($p->projectCategory->category == 'Radar Spare Part')
                                            <div class="fs-6 text-gray-800 fw-bolder">Rp.
                                                {{ number_format($p->contract - $p->contract * 0.015, 0, ',', '.') }}
                                            </div>
                                        @else
                                            <div class="fs-6 text-gray-800 fw-bolder">Rp.
                                                {{ number_format($p->contract - $p->contract * 0.015, 0, ',', '.') }}
                                            </div>
                                        @endif
                                        <div class="fw-bold text-gray-400">Nett Contract</div>
                                    </div>
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                        @if ($p->projectCategory->category == 'New Radar')
                                            <div class="fs-6 text-gray-800 fw-bolder">Rp.
                                                {{ number_format($p->contract - $p->contract * 0.015 - $arrhighProjectExpanse[$key], 0, ',', '.') }}
                                            </div>
                                        @elseif($p->projectCategory->category == 'Preventive Maintenance')
                                            <div class="fs-6 text-gray-800 fw-bolder">Rp.
                                                {{ number_format($p->contract - $p->contract * 0.02 - $arrhighProjectExpanse[$key], 0, ',', '.') }}
                                            </div>
                                        @elseif($p->projectCategory->category == 'Corrective Maintenance')
                                            <div class="fs-6 text-gray-800 fw-bolder">Rp.
                                                {{ number_format($p->contract - $p->contract * 0.02 - $arrhighProjectExpanse[$key], 0, ',', '.') }}
                                            </div>
                                        @elseif($p->projectCategory->category == 'Radar Reinstallation')
                                            <div class="fs-6 text-gray-800 fw-bolder">Rp.
                                                {{ number_format($p->contract - $p->contract * 0.015 - $arrhighProjectExpanse[$key], 0, ',', '.') }}
                                            </div>
                                        @elseif($p->projectCategory->category == 'Radar Spare Part')
                                            <div class="fs-6 text-gray-800 fw-bolder">Rp.
                                                {{ number_format($p->contract - $p->contract * 0.015 - $arrhighProjectExpanse[$key], 0, ',', '.') }}
                                            </div>
                                        @else
                                            <div class="fs-6 text-gray-800 fw-bolder">Rp.
                                                {{ number_format($p->contract - $p->contract * 0.015 - $arrhighProjectExpanse[$key], 0, ',', '.') }}
                                            </div>
                                        @endif
                                        <div class="fw-bold text-gray-400">Margin Budget</div>
                                    </div>
                                </div>
                                <!--end::Budget-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Progress-->
                            <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip"
                                title="@if ($p->status == 1) Not started yet @elseif($p->status == 2) On going @else Done @endif"
                                data-bs-original-title="@if ($p->status == 1) Not started yet @elseif($p->status == 2) On going @else Done @endif">
                                @if ($p->status == 1)
                                    <div class="rounded h-4px" role="progressbar" style="width: 0%"
                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                @elseif($p->status == 2)
                                    <div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                @else
                                    <div class="bg-success rounded h-4px" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                @endif
                            </div>
                            <!--end::Progress-->
                            <!--begin::Users-->
                            <div class="symbol-group symbol-hover">
                                <!--begin::User-->
                                <div class="symbol-group symbol-hover">
                                    <!--begin::User-->
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                        data-bs-original-title="{{ $projMan[$key]['fullname'] }}">
                                        <img class="img img-fluid" src="{{ $projMan[$key]['avatar'] }}"
                                            alt="image" style="max-width: 100%;">
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Users-->
                        </div>
                        <!--end:: Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!-- Modal Update-->
                <div wire:ignore.self class="modal fade" id="updateProject" tabindex="-1"
                    aria-labelledby="updateProject" aria-hidden="true" data-bs-backdrop="static"
                    data-bs-keyboard="false">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    wire:click.prevent="cancel()"></button>
                            </div>
                            <div class="modal-body">
                                <form wire:submit.prevent="updateproject" id="editproj" novalidate
                                    autocomplete="off">
                                    <!--begin::Input group-->
                                    <div class="fv-row row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-3 align-items-center">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold"><span class="required">Name</span></label>
                                            <div class="text-muted fw-bold fst-italic mb-2" style="font-size: 9px;">
                                                Don't forget to enter the project name.
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-9">
                                            <input type="text"
                                                class="form-control form-control-solid fw-bold @error('name') is-invalid @enderror"
                                                placeholder="Project name" name="name" id="name"
                                                wire:model.defer="name"
                                                @error('name') style="border-color: #f1416c;" @enderror required />
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--begin::Input group-->

                                    <!--begin::Input group-->
                                    <div class="fv-row row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-3 align-items-center">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold"><span class="required">Category</span></label>
                                            <!--end::Label-->
                                            <div class="text-muted fw-bold fst-italic mb-2" style="font-size: 9px;">
                                                Project category determine the percentage of tax.
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <select
                                                class="form-control form-select form-control-solid fw-bolder custom-select @error('category') is-invalid border-danger @enderror"
                                                data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                                wire:model.defer="category" id="categoryUpt" name="category"
                                                required>
                                                <option></option>
                                                <option value="1">Radar Upgrade</option>
                                                <option value="2">Radar Spare Part</option>
                                                <option value="3">Radar Reinstallation</option>
                                                <option value="4">Preventive Maintenance</option>
                                                <option value="5">New Radar</option>
                                                <option value="6">Corrective Maintenance</option>
                                            </select>
                                            <!--end::Input-->
                                            @error('category')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="fv-row row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-3 align-items-center">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold"><span class="required">Period</span></label>
                                            <!--end::Label-->
                                            <div class="text-muted fw-bold fst-italic mb-2" style="font-size: 9px;">
                                                It will contains start date and end date project.
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input
                                                class="form-control form-control-solid fw-bold @error('period') is-invalid @enderror"
                                                placeholder="Pick a project period" id="period" name="period"
                                                type="text" wire:model.defer="period"
                                                @error('period') style="border-color: #f1416c;" @enderror required>
                                            <!--end::Input-->
                                            @error('period')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="fv-row row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-3 align-items-center">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold"><span class="required">Location</span></label>
                                            <!--end::Label-->
                                            <div class="text-muted fw-bold fst-italic mb-2" style="font-size: 9px;">
                                                More detail is better for place accuracy in google maps. (At least
                                                contains city and
                                                country).
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-9">
                                            <input type="text"
                                                class="form-control form-control-solid fw-bold @error('location') is-invalid @enderror"
                                                placeholder="Project location" name="location" id="location"
                                                wire:model.defer="location"
                                                @error('location') style="border-color: #f1416c;" @enderror required />
                                            @error('location')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--begin::Input group-->

                                    <!--begin::Input group-->
                                    <div class="fv-row row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-3 align-items-center">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold"><span class="required">Contract</span></label>
                                            <!--end::Label-->
                                            <div class="text-muted fw-bold fst-italic mb-2" style="font-size: 9px;">
                                                Fill project contract before tax.
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-9">
                                            <input type="text" type-currency="IDR"
                                                class="form-control form-control-solid @error('contract') is-invalid @enderror"
                                                placeholder="Project contract" name="contract"
                                                wire:model.defer="contract"
                                                @error('contract') style="border-color: #f1416c;" @enderror required>
                                            @error('contract')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="fv-row row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-3 align-items-center">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold"><span class="required">Project
                                                    Manager</span></label>
                                            <!--end::Label-->
                                            <div class="text-muted fw-bold fst-italic mb-2" style="font-size: 9px;">
                                                Project manager will be lead this project.
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-9">
                                            <select
                                                class="form-control form-select form-control-solid fw-bolder custom-select @error('projectManager') is-invalid border-danger @enderror"
                                                data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                                wire:model.defer="projectManager" id="projectManagerUpt"
                                                name="projectManager" required>
                                                <option></option>
                                                @foreach ($dataUser as $du)
                                                    <option value="{{ $du['nip'] }}"
                                                        @if ($du['nip'] == $this->projectManager) selected @endif>
                                                        {{ $du['fullname'] }} -
                                                        {{ $du['position'] }}</option>
                                                @endforeach
                                            </select>
                                            <!--end::Input-->
                                            @error('projectManager')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--begin::Input group-->

                                    <!--begin::Input group-->
                                    <div class="fv-row row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-3 align-items-center">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold"><span class="required">Status</span></label>
                                            <!--end::Label-->
                                            <div class="text-muted fw-bold fst-italic mb-2" style="font-size: 9px;">
                                                Don't forget to update project status.
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <select
                                                class="form-control form-select form-control-solid fw-bolder custom-select @error('statusProj') is-invalid border-danger @enderror"
                                                data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                                wire:model.defer="statusProj" id="statusProjUpt" name="statusProj"
                                                required>
                                                <option></option>
                                                <option value="1">To Do</option>
                                                <option value="2">On Progress</option>
                                                <option value="3">Completed</option>
                                            </select>
                                            <!--end::Input-->
                                            @error('statusProj')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    wire:click.prevent="cancel()">Close</button>
                                <button type="submit" class="btn btn-primary" form="editproj">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
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

@push('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/pharaonic/pharaonic.select2.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('input[name="period"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                },
                autoApply: true,
                autoClose: true,
            }).on('click', function() {
                $('.daterangepicker').click(function(e) {
                    e.stopPropagation();
                });
            });
            $('input[name="period"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' -> ' + picker.endDate.format(
                    'YYYY-MM-DD'));
                @this.set('period', picker.startDate.format('YYYY-MM-DD') + ' -> ' + picker.endDate
                    .format(
                        'YYYY-MM-DD'), true);
            })
            $('input[name="period"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                @this.set('period', '', true);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#status').select2({
                placeholder: "All",
                closeOnSelect: true,
                allowClear: true,
                minimumResultsForSearch: -1,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#status').select2({
                    placeholder: "All",
                    closeOnSelect: true,
                    allowClear: true,
                    minimumResultsForSearch: -1,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#pagesize').select2({
                closeOnSelect: true,
                minimumResultsForSearch: -1,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#pagesize').select2({
                    closeOnSelect: true,
                    minimumResultsForSearch: -1,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#statusProj').select2({
                placeholder: "Select status",
                closeOnSelect: true,
                allowClear: true,
                minimumResultsForSearch: -1,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#statusProj').select2({
                    placeholder: "Select status",
                    closeOnSelect: true,
                    allowClear: true,
                    minimumResultsForSearch: -1,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#projectManager').select2({
                placeholder: "Select Project Manager",
                closeOnSelect: true,
                allowClear: true,
                minimumResultsForSearch: -1,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#projectManager').select2({
                    placeholder: "Select Project Manager",
                    closeOnSelect: true,
                    allowClear: true,
                    minimumResultsForSearch: -1,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#category').select2({
                placeholder: "Select category",
                closeOnSelect: true,
                allowClear: true,
                minimumResultsForSearch: -1,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#category').select2({
                    placeholder: "Select category",
                    closeOnSelect: true,
                    allowClear: true,
                    minimumResultsForSearch: -1,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#statusProjUpt').select2({
                placeholder: "Select status",
                closeOnSelect: true,
                allowClear: true,
                minimumResultsForSearch: -1,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#statusProjUpt').select2({
                    placeholder: "Select status",
                    closeOnSelect: true,
                    allowClear: true,
                    minimumResultsForSearch: -1,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#projectManagerUpt').select2({
                placeholder: "Select Project Manager",
                closeOnSelect: true,
                allowClear: true,
                minimumResultsForSearch: -1,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#projectManagerUpt').select2({
                    placeholder: "Select Project Manager",
                    closeOnSelect: true,
                    allowClear: true,
                    minimumResultsForSearch: -1,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#categoryUpt').select2({
                placeholder: "Select category",
                closeOnSelect: true,
                allowClear: true,
                minimumResultsForSearch: -1,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#categoryUpt').select2({
                    placeholder: "Select category",
                    closeOnSelect: true,
                    allowClear: true,
                    minimumResultsForSearch: -1,
                });
            });
        });
    </script>
    <script type="text/javascript">
        document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
            element.addEventListener('keyup', function(e) {
                let cursorPostion = this.selectionStart;
                let value = parseInt(this.value.replace(/[^,\d]/g, ''));
                let originalLenght = this.value.length;
                if (isNaN(value)) {
                    this.value = "";
                } else {
                    this.value = value.toLocaleString('id-ID', {
                        currency: 'IDR',
                        style: 'currency',
                        minimumFractionDigits: 0
                    });
                    cursorPostion = this.value.length - originalLenght + cursorPostion;
                    this.setSelectionRange(cursorPostion, cursorPostion);
                }
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshNominal', function() {
                document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
                    element.addEventListener('keyup', function(e) {
                        let cursorPostion = this.selectionStart;
                        let value = parseInt(this.value.replace(/[^,\d]/g, ''));
                        let originalLenght = this.value.length;
                        if (isNaN(value)) {
                            this.value = "";
                        } else {
                            this.value = value.toLocaleString('id-ID', {
                                currency: 'IDR',
                                style: 'currency',
                                minimumFractionDigits: 0
                            });
                            cursorPostion = this.value.length - originalLenght +
                                cursorPostion;
                            this.setSelectionRange(cursorPostion, cursorPostion);
                        }
                    });
                });
            });
        });
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);

        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshNotification', function() {
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function() {
                        $(this).remove();
                    });
                }, 5000);
            });
        });
    </script>
    <script>
        window.livewire.on('closeProject', function() {
            $('#addProject').modal('hide');
        })
    </script>
    <script>
        window.livewire.on('closeProject', function() {
            $('#updateProject').modal('hide');
        })
    </script>
    <script>
        window.livewire.on('openEditProject', function() {
            $('#updateProject').modal('show');
        })
    </script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function(event) {
            @this.on('triggerDelete', uuid => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "If you delete this project, it will be permanently deleted.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#e4e6ef',
                    cancelButtonText: '<span style="color:#7e8299">Cancel</span>',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.value) {
                        @this.call('destroy', uuid)
                    }
                });
            });
        })
    </script>
@endpush
