@extends('layouts.app-findiv')

@section('title')
    {{ $project[0]->name . ' | Finance Division' }}
@endsection

@section('page-title')
    <a href="{{ route('findiv.project-index') }}" class="text-dark text-hover-primary">Project</a>
@endsection

@section('sub-page-title')
    {{ $project[0]->name }}
@endsection

@section('active-icon', 'active-sidebar-icon')

@section('active-link', 'active-sidebar-link')

@push('css')
    <link href="{{ asset('asset/css/finance-division/datatables.bundle.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
    @if (Session::has('success'))
        <div class="position-relative">
            <div class="position-fixed bottom-0 end-0" style="bottom: 2% !important; right: 1% !important; z-index:2;">
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.4" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)"
                                fill="currentColor"></rect>
                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)"
                                fill="currentColor"></rect>
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
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Navbar-->
            <div class="card mb-6 mb-xl-9">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                        <!--begin::Image-->
                        <div
                            class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                            @if ($project[0]->projectCategory->category == 'New Radar')
                                <div class="symbol bg-light" style="width: 100%; height: 100%">
                                    <span class="symbol-label bg-success text-inverse-primary fw-bolder"
                                        style="width:100%; height:100%; font-size:60px;">{{ strtoupper($project[0]->name[0]) }}</span>
                                </div>
                            @elseif($project[0]->projectCategory->category == 'Preventive Maintenance')
                                <div class="symbol bg-light" style="width: 100%; height: 100%">
                                    <span class="symbol-label bg-warning text-inverse-primary fw-bolder"
                                        style="width:100%; height:100%; font-size:60px;">{{ strtoupper($project[0]->name[0]) }}</span>
                                </div>
                            @elseif($project[0]->projectCategory->category == 'Corrective Maintenance')
                                <div class="symbol bg-light" style="width: 100%; height: 100%">
                                    <span class="symbol-label text-inverse-primary fw-bolder"
                                        style="background-color: #f6910d; width:100%; height:100%; font-size:60px;">{{ strtoupper($project[0]->name[0]) }}</span>
                                </div>
                            @elseif($project[0]->projectCategory->category == 'Radar Reinstallation')
                                <div class="symbol bg-light" style="width: 100%; height: 100%">
                                    <span class="symbol-label text-inverse-primary fw-bolder"
                                        style="background-color:#9f4398; width:100%; height:100%; font-size:60px;">{{ strtoupper($project[0]->name[0]) }}</span>
                                </div>
                            @elseif($project[0]->projectCategory->category == 'Radar Spare Part')
                                <div class="symbol bg-light" style="width: 100%; height: 100%">
                                    <span class="symbol-label text-inverse-primary fw-bolder"
                                        style="background-color:#00647b; width:100%; height:100%; font-size:60px;">{{ strtoupper($project[0]->name[0]) }}</span>
                                </div>
                            @else
                                <div class="symbol bg-light" style="width: 100%; height: 100%">
                                    <span class="symbol-label bg-danger text-inverse-primary fw-bolder"
                                        style="width:100%; height:100%; font-size:60px;">{{ strtoupper($project[0]->name[0]) }}</span>
                                </div>
                            @endif
                        </div>
                        <!--end::Image-->
                        <!--begin::Wrapper-->
                        <div class="flex-grow-1">
                            <!--begin::Head-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::Details-->
                                <div class="d-flex flex-column">
                                    <!--begin::Status-->
                                    <div class="d-flex align-items-center mb-1">
                                        <a href="{{ route('findiv.project-detail', ['uuid' => $uuid]) }}"
                                            class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">{{ $project[0]->name }}</a>
                                        @if ($project[0]->status == 1)
                                            <span class="badge badge-light me-2">To
                                                Do</span>
                                            @if ($project[0]->priority == 0)
                                                <span></span>
                                            @elseif ($project[0]->priority == 1)
                                                <span class="badge badge-light fw-bolder text-white"
                                                    style="background-color: #3498DB;">
                                                    High</span>
                                            @elseif($project[0]->priority == 2)
                                                <span class="badge badge-light fw-bolder text-white"
                                                    style="background-color:#40e0d0;">
                                                    Medium</span>
                                            @else
                                                <span class="badge badge-light fw-bolder text-white"
                                                    style="background-color: #F08080;">
                                                    Low</span>
                                            @endif
                                        @elseif($project[0]->status == 2)
                                            <span class="badge badge-light-primary me-auto">In
                                                Progress</span>
                                        @else
                                            <span class="badge badge-light-success me-auto">Completed</span>
                                        @endif
                                    </div>
                                    <!--end::Status-->

                                    <!--begin::Description-->
                                    <div class="d-flex flex-wrap fw-bold mb-4 fs-5 text-gray-400">
                                        {{ $project[0]->projectCategory->category }}
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Head-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap justify-content-start">
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap">
                                    <!--begin::Stat-->
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bolder">
                                                {{ date('F j, Y', strtotime($project[0]->start_date)) }}
                                            </div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-7 text-gray-400">Start Date</div>
                                        <!--end::Label-->
                                    </div>
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bolder">
                                                {{ date('F j, Y', strtotime($project[0]->end_date)) }}
                                            </div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-7 text-gray-400">End Date</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <!--begin::Users-->
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::User-->
                                        <div class="symbol symbol-35px symbol-circle me-3" data-bs-toggle="tooltip" title=""
                                            data-bs-original-title={{ $project[0]->project_manager }}"
                                            style="float:left;">
                                            <span
                                                class="symbol-label bg-warning text-inverse-warning fw-bolder">{{ strtoupper($project[0]->project_manager[0]) }}</span>
                                        </div>
                                        <!--end::User-->
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bolder counted">{{ $project[0]->project_manager }}</div>
                                        </div>
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-7 text-gray-400">Project
                                            Manager
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Users-->
                                </div>
                                <div class="d-flex flex-wrap">
                                    <!--begin::Stat-->
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bolder counted">
                                                Rp.
                                                {{ number_format($project[0]->contract, 0, ',', '.') }}
                                            </div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-7 text-gray-400">Contract
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <!--begin::Stat-->
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            @if ($project[0]->projectCategory->category == 'New Radar')
                                                <div class="fs-4 fw-bolder counted">
                                                    Rp.
                                                    {{ number_format($project[0]->contract - $project[0]->contract * 0.015, 0, ',', '.') }}
                                                </div>
                                            @elseif($project[0]->projectCategory->category == 'Preventive Maintenance')
                                                <div class="fs-4 fw-bolder counted">
                                                    Rp.
                                                    {{ number_format($project[0]->contract - $project[0]->contract * 0.02, 0, ',', '.') }}
                                                </div>
                                            @elseif($project[0]->projectCategory->category == 'Corrective Maintenance')
                                                <div class="fs-4 fw-bolder counted">
                                                    Rp.
                                                    {{ number_format($project[0]->contract - $project[0]->contract * 0.02, 0, ',', '.') }}
                                                </div>
                                            @elseif($project[0]->projectCategory->category == 'Radar Reinstallation')
                                                <div class="fs-4 fw-bolder counted">
                                                    Rp.
                                                    {{ number_format($project[0]->contract - $project[0]->contract * 0.015, 0, ',', '.') }}
                                                </div>
                                            @elseif($project[0]->projectCategory->category == 'Radar Spare Part')
                                                <div class="fs-4 fw-bolder counted">
                                                    Rp.
                                                    {{ number_format($project[0]->contract - $project[0]->contract * 0.015, 0, ',', '.') }}
                                                </div>
                                            @else
                                                <div class="fs-4 fw-bolder counted">
                                                    Rp.
                                                    {{ number_format($project[0]->contract - $project[0]->contract * 0.015, 0, ',', '.') }}
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-7 text-gray-400">Nett Contract
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <!--begin::Stat-->
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bolder counted" data-kt-countup="true"
                                                data-kt-countup-value="15000" data-kt-countup-prefix="$">
                                                Rp.
                                                {{ number_format($sumProjectExpanse, 0, ',', '.') }}</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-7 text-gray-400">Budget Spent
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <!--begin::Stat-->
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            @if ($project[0]->projectCategory->category == 'New Radar')
                                                <div class="fs-4 fw-bolder counted">
                                                    Rp.
                                                    {{ number_format($project[0]->contract - $project[0]->contract * 0.015 - $sumProjectExpanse, 0, ',', '.') }}
                                                </div>
                                            @elseif($project[0]->projectCategory->category == 'Preventive Maintenance')
                                                <div class="fs-4 fw-bolder counted">
                                                    Rp.
                                                    {{ number_format($project[0]->contract - $project[0]->contract * 0.02 - $sumProjectExpanse, 0, ',', '.') }}
                                                </div>
                                            @elseif($project[0]->projectCategory->category == 'Corrective Maintenance')
                                                <div class="fs-4 fw-bolder counted">
                                                    Rp.
                                                    {{ number_format($project[0]->contract - $project[0]->contract * 0.02 - $sumProjectExpanse, 0, ',', '.') }}
                                                </div>
                                            @elseif($project[0]->projectCategory->category == 'Radar Reinstallation')
                                                <div class="fs-4 fw-bolder counted">
                                                    Rp.
                                                    {{ number_format($project[0]->contract - $project[0]->contract * 0.015 - $sumProjectExpanse, 0, ',', '.') }}
                                                </div>
                                            @elseif($project[0]->projectCategory->category == 'Radar Spare Part')
                                                <div class="fs-4 fw-bolder counted">
                                                    Rp.
                                                    {{ number_format($project[0]->contract - $project[0]->contract * 0.015 - $sumProjectExpanse, 0, ',', '.') }}
                                                </div>
                                            @else
                                                <div class="fs-4 fw-bolder counted">
                                                    Rp.
                                                    {{ number_format($project[0]->contract - $project[0]->contract * 0.015 - $sumProjectExpanse, 0, ',', '.') }}
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-7 text-gray-400">Margin Budget
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                </div>
                                <!--end::Stats-->

                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Details-->
                    <div class="separator"></div>
                    <!--begin::Nav-->
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder"
                        role="tablist">
                        <!--begin::Nav item-->
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary py-5 me-6 active" data-bs-toggle="tab" role="tab"
                                aria-selected="true" href="#overview">Overview</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary py-5 me-6" data-bs-toggle="tab" role="tab"
                                aria-selected="false" href="#budget">Budget</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary py-5 me-6" data-bs-toggle="tab" role="tab"
                                aria-selected="false" href="#files">Files</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary py-5 me-6" data-bs-toggle="tab" role="tab"
                                aria-selected="false" href="#activity">Activity</a>
                        </li>
                        <!--end::Nav item-->
                    </ul>
                    <!--end::Nav-->
                </div>
            </div>
            <!--end::Navbar-->
            <div class="tab-content">
                <!--begin::overview-->
                <div class="tab-pane fade active show" role="tabpanel" id="overview">
                    <div class="row g-6 g-xl-9 justify-content-center">
                        <!--begin::Col-->
                        <div class="col-lg-6">
                            <!--begin::Card-->
                            <div class="card card-flush h-lg-100">
                                <!--begin::Card header-->
                                <div class="card-header mt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title flex-column">
                                        <h3 class="fw-bolder mb-1">Latest Files</h3>
                                        <div class="fs-6 text-gray-400">Total {{ count($arrFiles) }} files</div>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body p-9 pt-3">
                                    <!--begin::Files-->
                                    <div class="d-flex flex-column mb-9">
                                        @if (!empty($arrFiles))
                                            @foreach (array_slice($arrFiles, 0, 5) as $index => $af)
                                                <!--begin::File-->
                                                <div class="d-flex align-items-center mb-5">
                                                    <!--begin::Icon-->
                                                    <div class="symbol symbol-30px me-5">
                                                        @if (pathinfo($af['name'], PATHINFO_EXTENSION) == 'jpg' || pathinfo($af['name'], PATHINFO_EXTENSION) == 'png' || pathinfo($af['name'], PATHINFO_EXTENSION) == 'jpeg')
                                                            <i class="bi bi-file-earmark-image-fill text-success attach-cash"
                                                                style="font-size: 300%;margin-bottom:5%;"></i>
                                                        @elseif(pathinfo($af['name'], PATHINFO_EXTENSION) == 'doc' || pathinfo($af['name'], PATHINFO_EXTENSION) == 'docx')
                                                            <i class="bi bi-file-earmark-word-fill text-primary attach-cash"
                                                                style="font-size: 300%;margin-bottom:5%;"></i>
                                                        @elseif(pathinfo($af['name'], PATHINFO_EXTENSION) == 'pdf')
                                                            <i class="bi bi-file-earmark-pdf-fill text-danger attach-cash"
                                                                style="font-size: 300%;margin-bottom:5%;"></i>
                                                        @endif
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Details-->
                                                    <div class="fw-bold">
                                                        @if (pathinfo($af['name'], PATHINFO_EXTENSION) == 'jpg' || pathinfo($af['name'], PATHINFO_EXTENSION) == 'png' || pathinfo($af['name'], PATHINFO_EXTENSION) == 'jpeg')
                                                            <a href="#" data-bs-toggle="modal"
                                                                class="fs-6 fw-bolder text-dark text-hover-primary"
                                                                data-bs-target="#fileModal{{ $index }}">{{ $af['name'] }}</a>
                                                        @elseif(pathinfo($af['name'], PATHINFO_EXTENSION) == 'doc' || pathinfo($af['name'], PATHINFO_EXTENSION) == 'docx')
                                                            <a href="#" data-bs-toggle="modal"
                                                                class="fs-6 fw-bolder text-dark text-hover-primary"
                                                                data-bs-target="#fileModal{{ $index }}">{{ $af['name'] }}</a>
                                                        @elseif(pathinfo($af['name'], PATHINFO_EXTENSION) == 'pdf')
                                                            <a class="fs-6 fw-bolder text-dark text-hover-primary"
                                                                target="_blank"
                                                                href="{{ asset('storage/' . ucfirst($af['category']) . '/' . $af['uuid'] . '/' . $af['name']) }}">{{ $af['name'] }}</a>
                                                        @endif
                                                        @if ($af['category'] == 'cash')
                                                            <div class="text-gray-400">Cash Transaction</div>
                                                        @elseif($af['category'] == 'operational')
                                                            <div class="text-gray-400">Mandiri Operational Transaction
                                                            </div>
                                                        @else
                                                            <div class="text-gray-400">Mandiri Escrow Transaction</div>
                                                        @endif
                                                    </div>
                                                    <!--end::Details-->
                                                    <div class="modal fade" id="fileModal{{ $index }}"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-fullscreen">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalLabel">
                                                                        {{ $af['name'] }}
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    @if (pathinfo($af['name'], PATHINFO_EXTENSION) == 'doc' || pathinfo($af['name'], PATHINFO_EXTENSION) == 'docx')
                                                                        <iframe
                                                                            src='https://view.officeapps.live.com/op/embed.aspx?src={{ asset('storage/' . ucfirst($af['category']) . '/' . $af['uuid'] . '/' . $af['name']) }}'
                                                                            width='100%' height='100%'
                                                                            frameborder='0'></iframe>
                                                                    @elseif(pathinfo($af['name'], PATHINFO_EXTENSION) == 'jpg' || pathinfo($af['name'], PATHINFO_EXTENSION) == 'png' || pathinfo($af['name'], PATHINFO_EXTENSION) == 'jpeg')
                                                                        <img class="img img-fluid"
                                                                            src="{{ asset('storage/' . ucfirst($af['category']) . '/' . $af['uuid'] . '/' . $af['name']) }}"
                                                                            alt="{{ $af['name'] }}"
                                                                            style="max-width: 100%; height: auto;">
                                                                    @endif
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <a type="button" class="btn btn-primary"
                                                                        href="{{ asset('storage/' . ucfirst($af['category']) . '/' . $af['uuid'] . '/' . $af['name']) }}"
                                                                        download="">Download</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div
                                                class="container d-flex align-items-center justify-content-center h-150px">
                                                <div class="text-muted fw-bolder fst-italic mt-5">
                                                    There are no files
                                                </div>
                                            </div>
                                        @endif
                                        <!--end::File-->
                                    </div>
                                    <!--end::Files-->
                                </div>
                                <!--end::Card body -->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-6">
                            <!--begin::Card-->
                            <div class="card card-flush h-lg-100">
                                <!--begin::Card header-->
                                <div class="card-header mt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title flex-column">
                                        <h3 class="fw-bolder mb-1">Latest Transaction</h3>
                                        <div class="fs-6 text-gray-400">Total {{ count($arrLastTrans) }} transactions
                                        </div>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card toolbar-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-column p-9 pt-3 mb-9">
                                    @if (count($arrLastTrans) == 0)
                                        <div class="container d-flex align-items-center justify-content-center h-150px">
                                            <div class="text-muted fw-bolder fst-italic mt-5">
                                                There are no transactions
                                            </div>
                                        </div>
                                    @else
                                        @foreach (array_slice($arrLastTrans, 0, 5) as $index => $alt)
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-5">
                                                <!--begin::Avatar-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Image-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        @if ($alt[0]->category == 'cash')
                                                            <span
                                                                class="symbol-label bg-success text-inverse-primary fw-bolder">C</span>
                                                        @elseif($alt[0]->category == 'operational')
                                                            <span
                                                                class="symbol-label bg-primary text-inverse-primary fw-bolder">O</span>
                                                        @else
                                                            <span
                                                                class="symbol-label bg-danger text-inverse-primary fw-bolder">E</span>
                                                        @endif
                                                    </div>
                                                    <!--end::Image-->
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="fw-bold">
                                                    @if ($alt[0]->category == 'cash')
                                                        <a href="{{ route('findiv.cash-detail', ['uuid' => $alt[0]->uuid]) }}"
                                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary">Cash
                                                            Transaction - {{ $alt[0]->token }}</a>
                                                    @elseif($alt[0]->category == 'operational')
                                                        <a href="{{ route('findiv.operational-detail', ['uuid' => $alt[0]->uuid]) }}"
                                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary">Mandiri
                                                            Operational Transaction - {{ $alt[0]->token }}</a>
                                                    @else
                                                        <a href="{{ route('findiv.escrow-detail', ['uuid' => $alt[0]->uuid]) }}"
                                                            class="fs-5 fw-bolder text-gray-900 text-hover-primary">Mandiri
                                                            Escrow Transaction - {{ $alt[0]->token }}</a>
                                                    @endif
                                                    <div class="text-gray-400">Total transaction : Rp.
                                                        {{ number_format($totalProjTrans[$index], 0, ',', '.') }}</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Item-->
                                        @endforeach
                                    @endif
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-6">
                            <!--begin::Card-->
                            <div class="card card-flush h-lg-100">
                                <!--begin::Card header-->
                                <div class="card-header mt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title flex-column">
                                        <h3 class="fw-bolder mb-1">Latest Activity</h3>
                                        <div class="fs-6 text-gray-400">Total {{ count($lastProjActivity) }} activities
                                        </div>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card toolbar-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-column p-9 pt-3 mb-9">
                                    <!--begin::Item-->
                                    @if (count($lastProjActivity) == 0)
                                        <div class="container d-flex align-items-center justify-content-center h-300px">
                                            <div class="text-muted fw-bolder fst-italic mt-5">
                                                There are no activities
                                            </div>
                                        </div>
                                    @else
                                        @foreach (array_slice($lastProjActivity, 0, 6) as $lpa)
                                            <div class="d-flex align-items-center mb-5">
                                                <!--begin::Avatar-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Image-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        @if (explode('-', trim($lpa[1]))[0] == 'cash')
                                                            <span
                                                                class="symbol-label bg-success text-inverse-primary fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                        @elseif(explode('-', trim($lpa[1]))[0] == 'operational')
                                                            <span
                                                                class="symbol-label bg-primary text-inverse-primary fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                        @elseif(explode('-', trim($lpa[1]))[0] == 'escrow')
                                                            <span
                                                                class="symbol-label bg-danger text-inverse-primary fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                        @endif
                                                    </div>
                                                    <!--end::Image-->
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="fw-bold">
                                                    <div class="fs-5 fw-bolder text-gray-900 text-dark">
                                                        @if ($lpa[1] == 'cash-store')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">created</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                {{ ucfirst(explode('-', trim($lpa[1]))[0]) }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'cash-update')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">updated</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                {{ ucfirst(explode('-', trim($lpa[1]))[0]) }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'cash-delete')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">deleted</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                {{ ucfirst(explode('-', trim($lpa[1]))[0]) }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'cash-approved-findir')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">approved</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                {{ ucfirst(explode('-', trim($lpa[1]))[0]) }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'cash-approved-excdir')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">approved</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                {{ ucfirst(explode('-', trim($lpa[1]))[0]) }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'cash-rejected')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">rejected</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                {{ ucfirst(explode('-', trim($lpa[1]))[0]) }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'cash-paid')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">paid</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                {{ ucfirst(explode('-', trim($lpa[1]))[0]) }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'operational-store')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">created</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'operational-update')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">updated</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'operational-delete')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">deleted</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'operational-approved-findir')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">approved</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'operational-approved-excdir')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">approved</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'operational-rejected')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">rejected</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'operational-paid')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">paid</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'escrow-store')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">created</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'escrow-update')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">updated</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'escrow-delete')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">deleted</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'escrow-approved-findir')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">approved</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'escrow-approved-excdir')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">approved</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'escrow-rejected')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">rejected</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                            </div>
                                                        @elseif ($lpa[1] == 'escrow-paid')
                                                            <div class="text-gray-900 fs-6">Has <i
                                                                    class="text-dark fw-bolder">paid</i>
                                                                this
                                                                transaction on
                                                                {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                            </div>
                                                            <div class="text-gray-400 fs-7">
                                                                Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                        @endforeach
                                    @endif
                                    <!--end::Item-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-6">
                            <!--begin::Card-->
                            <div class="card card-flush h-lg-100">
                                <!--begin::Card header-->
                                <div class="card-header mt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title flex-column">
                                        <h3 class="fw-bolder mb-1">Project Location</h3>
                                        <div class="fs-6 text-gray-400">
                                            {{ $projLocation[0]->projectLocation->address }}
                                        </div>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card toolbar-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-column p-9 pt-3 mb-9">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-5">
                                        <iframe frameborder="0" style="border:0; width:100%; height:300px;"
                                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyByJlvTK9VH2qqkHo3IEDfcApNbNXb4Xz4&q={{ $projLocation[0]->projectLocation->latitude }},{{ $projLocation[0]->projectLocation->longitude }}"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                    </div>
                </div>
                <!--end::overview-->
                {{-- begin::budget --}}
                <div class="tab-pane fade" role="tabpanel" id="budget">
                    @livewire('finance-division.filter-project-budget', ['uuid' => $uuid]);
                </div>
                {{-- end::budget --}}
                {{-- begin::files --}}
                <div class="tab-pane fade" role="tabpanel" id="files">
                    <div class="d-flex flex-wrap flex-stack my-5">
                        <!--begin::Heading-->
                        <h3 class="fw-bolder my-2">Project Files
                            <span class="fs-6 text-gray-400 fw-bold ms-1">{{ count($arrFiles) }} Files</span>
                        </h3>
                        <!--end::Heading-->
                    </div>
                    <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
                        @if (count($arrFiles) == 0)
                            <div class="col-md-12">
                                <div class="container card d-flex align-items-center justify-content-center h-150px">
                                    <div class="card-body">
                                        <div class="text-muted fw-bolder fst-italic mt-10">
                                            There are no files
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach ($arrFiles as $index => $af)
                                <!--begin::Col-->
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <!--begin::Card-->
                                    <div class="card h-100">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                                            <!--begin::Name-->
                                            @if (pathinfo($af['name'], PATHINFO_EXTENSION) == 'jpg' || pathinfo($af['name'], PATHINFO_EXTENSION) == 'png' || pathinfo($af['name'], PATHINFO_EXTENSION) == 'jpeg')
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#allFileModal{{ $index }}"
                                                    class="text-gray-800 d-flex flex-column"
                                                    class="text-gray-800 d-flex flex-column">
                                                    <!--begin::Image-->
                                                    <div class="symbol symbol-60px mb-5">
                                                        <i class="bi bi-file-earmark-image-fill text-success"
                                                            style="font-size: 300%;margin-bottom:5%;"></i>
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Title-->
                                                    <div class="fs-5 fw-bolder mb-2 text-hover-primary">
                                                        {{ $af['name'] }}
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                            @elseif(pathinfo($af['name'], PATHINFO_EXTENSION) == 'doc' || pathinfo($af['name'], PATHINFO_EXTENSION) == 'docx')
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#allFileModal{{ $index }}"
                                                    class="text-gray-800 d-flex flex-column">
                                                    <!--begin::Image-->
                                                    <div class="symbol symbol-60px mb-5">
                                                        <i class="bi bi-file-earmark-word-fill text-primary"
                                                            style="font-size: 300%;margin-bottom:5%;"></i>
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Title-->
                                                    <div class="fs-5 fw-bolder mb-2 text-hover-primary">
                                                        {{ $af['name'] }}
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                            @elseif(pathinfo($af['name'], PATHINFO_EXTENSION) == 'pdf')
                                                <a href="{{ asset('storage/' . ucfirst($af['category'] . '/' . $af['uuid'] . '/' . $af['name'])) }}"
                                                    class="text-gray-800 d-flex flex-column" target="_blank">
                                                    <!--begin::Image-->
                                                    <div class="symbol symbol-60px mb-5">
                                                        <i class="bi bi-file-earmark-pdf-fill text-danger"
                                                            style="font-size: 300%;margin-bottom:5%;"></i>
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Title-->
                                                    <div class="fs-5 fw-bolder mb-2 text-hover-primary">
                                                        {{ $af['name'] }}
                                                    </div>
                                                    <!--end::Title-->
                                                </a>
                                            @endif

                                            <!--end::Name-->
                                            @if ($af['category'] == 'cash')
                                                <!--begin::Description-->
                                                <div class="fs-7 fw-bold text-gray-400">Cash transaction</div>
                                                <!--end::Description-->
                                            @elseif ($af['category'] == 'operational')
                                                <!--begin::Description-->
                                                <div class="fs-7 fw-bold text-gray-400">Mandiri operational transaction
                                                </div>
                                                <!--end::Description-->
                                            @else
                                                <!--begin::Description-->
                                                <div class="fs-7 fw-bold text-gray-400">Mandiri escrow transaction</div>
                                                <!--end::Description-->
                                            @endif
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                    <div class="modal fade" id="allFileModal{{ $index }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-fullscreen">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">
                                                        {{ $af['name'] }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    @if (pathinfo($af['name'], PATHINFO_EXTENSION) == 'doc' || pathinfo($af['name'], PATHINFO_EXTENSION) == 'docx')
                                                        <iframe
                                                            src='https://view.officeapps.live.com/op/embed.aspx?src={{ asset('storage/' . ucfirst($af['category']) . '/' . $af['uuid'] . '/' . $af['name']) }}'
                                                            width='100%' height='100%' frameborder='0'></iframe>
                                                    @elseif(pathinfo($af['name'], PATHINFO_EXTENSION) == 'jpg' || pathinfo($af['name'], PATHINFO_EXTENSION) == 'png' || pathinfo($af['name'], PATHINFO_EXTENSION) == 'jpeg')
                                                        <img class="img img-fluid"
                                                            src="{{ asset('storage/' . ucfirst($af['category']) . '/' . $af['uuid'] . '/' . $af['name']) }}"
                                                            alt="{{ $af['name'] }}"
                                                            style="max-width: 100%; height: auto;">
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a type="button" class="btn btn-primary"
                                                        href="{{ asset('storage/' . ucfirst($af['category']) . '/' . $af['uuid'] . '/' . $af['name']) }}"
                                                        download="">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Col-->
                            @endforeach
                        @endif
                    </div>
                </div>
                {{-- end::files --}}
                {{-- begin::activity --}}
                <div class="tab-pane fade" role="tabpanel" id="activity">
                    <div class="card">
                        <!--begin::Card head-->
                        <div class="card-header card-header-stretch">
                            <!--begin::Title-->
                            <div class="card-title d-flex align-items-center">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-primary me-3 lh-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path opacity="0.3"
                                            d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                            fill="black"></path>
                                        <path
                                            d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                            fill="black"></path>
                                        <path
                                            d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                            fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <h3 class="fw-bolder m-0 text-gray-800">All time activities</h3>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Card head-->
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Tab Content-->
                            <div class="tab-content">
                                <!--begin::Tab panel-->
                                <div class="card-body p-0">
                                    <!--begin::Timeline-->
                                    <div class="scroll-y me-n5 p-5 h-500px" data-kt-scroll="true"
                                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-offset="5px">
                                        <!--begin::Timeline-->
                                        <div class="timeline">
                                            @if (count($lastProjActivity) == 0)
                                                <div
                                                    class="container d-flex align-items-center justify-content-center h-150px">
                                                    <div class="text-muted fw-bolder fst-italic mt-5">
                                                        There are no activities
                                                    </div>
                                                </div>
                                            @else
                                                @foreach ($lastProjActivity as $lpa)
                                                    <!--begin::Timeline item-->
                                                    <div class="timeline-item">
                                                        <!--begin::Timeline line-->
                                                        <div class="timeline-line w-40px border-gray-500"></div>
                                                        <!--end::Timeline line-->
                                                        <!--begin::Timeline icon-->
                                                        <div class="timeline-icon symbol symbol-circle symbol-40px">
                                                            @if (explode('-', trim($lpa[1]))[1] == 'store')
                                                                <div class="symbol-label bg-light-primary">
                                                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen055.svg-->
                                                                    <span
                                                                        class="svg-icon svg-icon-gray-700 svg-icon-2"><svg
                                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path opacity="0.3" fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z"
                                                                                fill="currentColor" />
                                                                            <path
                                                                                d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z"
                                                                                fill="currentColor" />
                                                                            <path
                                                                                d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z"
                                                                                fill="currentColor" />
                                                                        </svg></span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                            @elseif(explode('-', trim($lpa[1]))[1] == 'update')
                                                                <div class="symbol-label bg-light-warning">
                                                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen019.svg-->
                                                                    <span
                                                                        class="svg-icon svg-icon-gray-700 svg-icon-2"><svg
                                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path
                                                                                d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                                                fill="currentColor" />
                                                                            <path opacity="0.3"
                                                                                d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                                                fill="currentColor" />
                                                                        </svg></span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                            @elseif(explode('-', trim($lpa[1]))[1] == 'delete')
                                                                <div class="symbol-label bg-light-danger">
                                                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen027.svg-->
                                                                    <span
                                                                        class="svg-icon svg-icon-2 svg-icon-gray-700"><svg
                                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path
                                                                                d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                                fill="currentColor" />
                                                                            <path opacity="0.5"
                                                                                d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                                fill="currentColor" />
                                                                            <path opacity="0.5"
                                                                                d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                                fill="currentColor" />
                                                                        </svg></span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                            @elseif(explode('-', trim($lpa[1]))[1] == 'approved')
                                                                <div class="symbol-label bg-success">
                                                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen043.svg-->
                                                                    <span class="svg-icon svg-icon-white svg-icon-2"><svg
                                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                                height="20" rx="10" fill="currentColor" />
                                                                            <path
                                                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                                fill="currentColor" />
                                                                        </svg></span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                            @elseif(explode('-', trim($lpa[1]))[1] == 'rejected')
                                                                <div class="symbol-label bg-danger">
                                                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/abstract/abs012.svg-->
                                                                    <span class="svg-icon svg-icon-white svg-icon-2"><svg
                                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path opacity="0.3"
                                                                                d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z"
                                                                                fill="currentColor" />
                                                                            <path
                                                                                d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z"
                                                                                fill="currentColor" />
                                                                        </svg></span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                            @elseif(explode('-', trim($lpa[1]))[1] == 'paid')
                                                                <div class="symbol-label bg-primary">
                                                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/finance/fin008.svg-->
                                                                    <span class="svg-icon svg-icon-white svg-icon-2"><svg
                                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path opacity="0.3"
                                                                                d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z"
                                                                                fill="currentColor" />
                                                                            <path opacity="0.3"
                                                                                d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z"
                                                                                fill="currentColor" />
                                                                            <path
                                                                                d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z"
                                                                                fill="currentColor" />
                                                                        </svg></span>
                                                                    <!--end::Svg Icon-->
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <!--end::Timeline icon-->
                                                        <!--begin::Timeline content-->
                                                        <div class="timeline-content mb-10 mt-n2">
                                                            <!--begin::Timeline heading-->
                                                            <div class="overflow-auto pe-3">
                                                                @if ($lpa[1] == 'cash-store')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">created</i>
                                                                        <a href="{{ route('findiv.cash-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        cash transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Created at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'cash-update')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">updated</i>
                                                                        <a href="{{ route('findiv.cash-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        cash transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Updated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'cash-delete')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">delated</i>
                                                                        <span class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</span>
                                                                        cash transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Delated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'cash-approved-findir')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">approved</i>
                                                                        <a href="{{ route('findiv.cash-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        cash transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Updated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'cash-approved-excdir')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">approved</i>
                                                                        <a href="{{ route('findiv.cash-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        cash transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Updated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'cash-rejected')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">rejected</i>
                                                                        <a href="{{ route('findiv.cash-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        cash transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Updated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'cash-paid')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">paid</i>
                                                                        <a href="{{ route('findiv.cash-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        cash transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Updated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'operational-store')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">created</i>
                                                                        <a href="{{ route('findiv.operational-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        mandiri operational transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Created at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'operational-update')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">updated</i>
                                                                        <a href="{{ route('findiv.operational-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        mandiri operational transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Updated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'operational-delete')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">delated</i>
                                                                        <span class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</span>
                                                                        mandiri operational transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Delated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'operational-approved-findir')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">approved</i>
                                                                        <a href="{{ route('findiv.operational-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        mandiri operational transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Updated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'operational-approved-excdir')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">approved</i>
                                                                        <a href="{{ route('findiv.operational-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        mandiri operational transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Updated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'operational-rejected')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">rejected</i>
                                                                        <a href="{{ route('findiv.operational-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        mandiri operational transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Updated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'operational-paid')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">paid</i>
                                                                        <a href="{{ route('findiv.operational-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        mandiri operational transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Updated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'escrow-store')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">created</i>
                                                                        <a href="{{ route('findiv.escrow-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        mandiri escrow transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Created at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'escrow-update')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">updated</i>
                                                                        <a href="{{ route('findiv.escrow-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        mandiri escrow transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Updated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'escrow-delete')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">delated</i>
                                                                        <span class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</span>
                                                                        mandiri escrow transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Delated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'escrow-approved-findir')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">approved</i>
                                                                        <a href="{{ route('findiv.escrow-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        mandiri escrow transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Updated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'escrow-approved-excdir')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">approved</i>
                                                                        <a href="{{ route('findiv.escrow-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        mandiri escrow transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Updated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'escrow-rejected')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">rejected</i>
                                                                        <a href="{{ route('findiv.escrow-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        mandiri escrow transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Updated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @elseif ($lpa[1] == 'escrow-paid')
                                                                    <!--begin::Title-->
                                                                    <div class="fs-5 fw-bold mb-2">Has <i
                                                                            class="text-dark fw-bolder">paid</i>
                                                                        <a href="{{ route('findiv.escrow-detail', ['uuid' => $lpa[4]]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">#{{ $lpa[3] }}</a>
                                                                        mandiri escrow transaction
                                                                    </div>
                                                                    <!--end::Title-->
                                                                    <!--begin::Description-->
                                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                                        <!--begin::Info-->
                                                                        <div class="text-muted me-2 fs-7">Updated at
                                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                                            by
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::User-->
                                                                        <div class="symbol symbol-circle symbol-25px"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-boundary="window"
                                                                            data-bs-placement="top"
                                                                            title="{{ $lpa[0] }}"
                                                                            data-bs-original-title="{{ $lpa[0] }}">
                                                                            <span
                                                                                class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </div>
                                                                    <!--end::Description-->
                                                                @endif
                                                            </div>
                                                            <!--end::Timeline heading-->
                                                        </div>
                                                        <!--end::Timeline content-->
                                                    </div>
                                                    <!--end::Timeline item-->
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <!--end::Timeline-->
                                </div>
                                <!--end::Tab panel-->
                            </div>
                            <!--end::Tab Content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
                {{-- end::activity --}}
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->


    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black">
                </rect>
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black"></path>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
@endsection

@push('js')
    <script src="{{ asset('assets/js/finance-division/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/finance-division/list.js') }}"></script>
@endpush
