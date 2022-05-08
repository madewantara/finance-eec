@extends('layouts.app-findir')

@section('title')
    {{ $project[0]->name . ' | Finance Director' }}
@endsection

@section('page-title')
    <a href="{{ route('findir.project-index') }}" class="text-dark text-hover-primary">Project</a>
@endsection

@section('sub-page-title')
    {{ $project[0]->name }}
@endsection

@section('active-icon', 'active-sidebar-icon')

@section('active-link', 'active-sidebar-link')

@push('css')
    <link href="{{ asset('asset/css/finance-director/datatables.bundle.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
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
                                        <a href="{{ route('findir.project-detail', ['uuid' => $uuid]) }}"
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
                                                    <a href="{{ route('findir.cash-detail', ['uuid' => $alt[0]->uuid]) }}"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary">Cash
                                                        Transaction - {{ $alt[0]->token }}</a>
                                                @elseif($alt[0]->category == 'operational')
                                                    <a href="{{ route('findir.operational-detail', ['uuid' => $alt[0]->uuid]) }}"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary">Mandiri
                                                        Operational Transaction - {{ $alt[0]->token }}</a>
                                                @else
                                                    <a href="{{ route('findir.escrow-detail', ['uuid' => $alt[0]->uuid]) }}"
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
                                                    @elseif ($lpa[1] == 'cash-rejected-findir')
                                                        <div class="text-gray-900 fs-6">Has <i
                                                                class="text-dark fw-bolder">rejected</i>
                                                            this
                                                            transaction on
                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                        </div>
                                                        <div class="text-gray-400 fs-7">
                                                            {{ ucfirst(explode('-', trim($lpa[1]))[0]) }} transaction
                                                        </div>
                                                    @elseif ($lpa[1] == 'cash-rejected-excdir')
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
                                                    @elseif ($lpa[1] == 'operational-rejected-findir')
                                                        <div class="text-gray-900 fs-6">Has <i
                                                                class="text-dark fw-bolder">rejected</i>
                                                            this
                                                            transaction on
                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                        </div>
                                                        <div class="text-gray-400 fs-7">
                                                            Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                        </div>
                                                    @elseif ($lpa[1] == 'operational-rejected-excdir')
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
                                                    @elseif ($lpa[1] == 'escrow-rejected-findir')
                                                        <div class="text-gray-900 fs-6">Has <i
                                                                class="text-dark fw-bolder">rejected</i>
                                                            this
                                                            transaction on
                                                            {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }}
                                                        </div>
                                                        <div class="text-gray-400 fs-7">
                                                            Mandiri {{ explode('-', trim($lpa[1]))[0] }} transaction
                                                        </div>
                                                    @elseif ($lpa[1] == 'escrow-rejected-excdir')
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
                    @livewire('finance-director.filter-project-budget', ['uuid' => $uuid]);
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
                                                <div class="fs-5 fw-bolder mb-2 text-hover-primary">{{ $af['name'] }}
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
                                                <div class="fs-5 fw-bolder mb-2 text-hover-primary">{{ $af['name'] }}
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
                                                <div class="fs-5 fw-bolder mb-2 text-hover-primary">{{ $af['name'] }}
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
                                            <div class="fs-7 fw-bold text-gray-400">Mandiri operational transaction</div>
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
                                                        alt="{{ $af['name'] }}" style="max-width: 100%; height: auto;">
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
                                    <div class="timeline">
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
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
                                                            <span class="svg-icon svg-icon-2 svg-icon-gray-700">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z"
                                                                        fill="black"></path>
                                                                    <path
                                                                        d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z"
                                                                        fill="black"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                    @elseif(explode('-', trim($lpa[1]))[1] == 'update')
                                                        <div class="symbol-label bg-light-warning">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
                                                            <span class="svg-icon svg-icon-2 svg-icon-gray-700">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z"
                                                                        fill="black"></path>
                                                                    <path
                                                                        d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z"
                                                                        fill="black"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                    @elseif(explode('-', trim($lpa[1]))[1] == 'delete')
                                                        <div class="symbol-label bg-light-danger">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
                                                            <span class="svg-icon svg-icon-2 svg-icon-gray-700">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z"
                                                                        fill="black"></path>
                                                                    <path
                                                                        d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z"
                                                                        fill="black"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                    @elseif(explode('-', trim($lpa[1]))[1] == 'approved')
                                                        <div class="symbol-label bg-success">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
                                                            <span class="svg-icon svg-icon-2 svg-icon-white">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z"
                                                                        fill="black"></path>
                                                                    <path
                                                                        d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z"
                                                                        fill="black"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                    @elseif(explode('-', trim($lpa[1]))[1] == 'rejected')
                                                        <div class="symbol-label bg-danger">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
                                                            <span class="svg-icon svg-icon-2 svg-icon-white">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z"
                                                                        fill="black"></path>
                                                                    <path
                                                                        d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z"
                                                                        fill="black"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                    @elseif(explode('-', trim($lpa[1]))[1] == 'paid')
                                                        <div class="symbol-label bg-primary">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
                                                            <span class="svg-icon svg-icon-2 svg-icon-white">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z"
                                                                        fill="black"></path>
                                                                    <path
                                                                        d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z"
                                                                        fill="black"></path>
                                                                </svg>
                                                            </span>
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
                                                                this
                                                                cash transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Created at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                cash transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                cash transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Delated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                cash transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                cash transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
                                                                    data-bs-original-title="{{ $lpa[0] }}">
                                                                    <span
                                                                        class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                </div>
                                                                <!--end::User-->
                                                            </div>
                                                            <!--end::Description-->
                                                        @elseif ($lpa[1] == 'cash-rejected-findir')
                                                            <!--begin::Title-->
                                                            <div class="fs-5 fw-bold mb-2">Has <i
                                                                    class="text-dark fw-bolder">rejected</i>
                                                                this
                                                                cash transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
                                                                    data-bs-original-title="{{ $lpa[0] }}">
                                                                    <span
                                                                        class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                </div>
                                                                <!--end::User-->
                                                            </div>
                                                            <!--end::Description-->
                                                        @elseif ($lpa[1] == 'cash-rejected-excdir')
                                                            <!--begin::Title-->
                                                            <div class="fs-5 fw-bold mb-2">Has <i
                                                                    class="text-dark fw-bolder">rejected</i>
                                                                this
                                                                cash transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                cash transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                mandiri operational transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Created at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                mandiri operational transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                mandiri operational transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Delated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                mandiri operational transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                mandiri operational transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
                                                                    data-bs-original-title="{{ $lpa[0] }}">
                                                                    <span
                                                                        class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                </div>
                                                                <!--end::User-->
                                                            </div>
                                                            <!--end::Description-->
                                                        @elseif ($lpa[1] == 'operational-rejected-findir')
                                                            <!--begin::Title-->
                                                            <div class="fs-5 fw-bold mb-2">Has <i
                                                                    class="text-dark fw-bolder">rejected</i>
                                                                this
                                                                mandiri operational transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
                                                                    data-bs-original-title="{{ $lpa[0] }}">
                                                                    <span
                                                                        class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                </div>
                                                                <!--end::User-->
                                                            </div>
                                                            <!--end::Description-->
                                                        @elseif ($lpa[1] == 'operational-rejected-excdir')
                                                            <!--begin::Title-->
                                                            <div class="fs-5 fw-bold mb-2">Has <i
                                                                    class="text-dark fw-bolder">rejected</i>
                                                                this
                                                                mandiri operational transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                mandiri operational transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                mandiri escrow transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Created at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                mandiri escrow transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                mandiri escrow transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Delated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                mandiri escrow transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                mandiri escrow transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
                                                                    data-bs-original-title="{{ $lpa[0] }}">
                                                                    <span
                                                                        class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                </div>
                                                                <!--end::User-->
                                                            </div>
                                                            <!--end::Description-->
                                                        @elseif ($lpa[1] == 'escrow-rejected-findir')
                                                            <!--begin::Title-->
                                                            <div class="fs-5 fw-bold mb-2">Has <i
                                                                    class="text-dark fw-bolder">rejected</i>
                                                                this
                                                                mandiri escrow transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
                                                                    data-bs-original-title="{{ $lpa[0] }}">
                                                                    <span
                                                                        class="symbol-label bg-success text-inverse-warning fw-bolder">{{ ucfirst($lpa[0][0]) }}</span>
                                                                </div>
                                                                <!--end::User-->
                                                            </div>
                                                            <!--end::Description-->
                                                        @elseif ($lpa[1] == 'escrow-rejected-excdir')
                                                            <!--begin::Title-->
                                                            <div class="fs-5 fw-bold mb-2">Has <i
                                                                    class="text-dark fw-bolder">rejected</i>
                                                                this
                                                                mandiri escrow transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
                                                                this
                                                                mandiri escrow transaction</div>
                                                            <!--end::Title-->
                                                            <!--begin::Description-->
                                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                                <!--begin::Info-->
                                                                <div class="text-muted me-2 fs-7">Updated at
                                                                    {{ $lpa[2]->format('l, jS \of F Y h:i:s A') }} by
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-circle symbol-25px"
                                                                    data-bs-toggle="tooltip" data-bs-boundary="window"
                                                                    data-bs-placement="top" title="{{ $lpa[0] }}"
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
    <script src="{{ asset('assets/js/finance-director/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/finance-director/list.js') }}"></script>
@endpush
