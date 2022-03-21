@extends('layouts.app-findiv')

@section('title', 'Project | Finance Division')

@section('page-title', 'Project')

@section('sub-page-title', 'Project List')

@push('css')
    <link href="{{ asset('asset/css/finance-division/datatables.bundle.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            @include('layouts.sidebar.sidebar-findiv')
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('layouts.header.header-findiv')
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-xxl">
                        <!--begin::Stats-->
                        <div class="row g-6 g-xl-9">
                            <div class="col-lg-6 col-xxl-4">
                                <!--begin::Card-->
                                <div class="card h-100">
                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
                                        <!--begin::Heading-->
                                        <div class="fs-2hx fw-bolder">{{ count($project) }}</div>
                                        <div class="fs-4 fw-bold text-gray-400 mb-7">Current Projects</div>
                                        <!--end::Heading-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Chart-->
                                            <div class="d-flex flex-center h-200px w-200px me-9 mb-5">
                                                <div id="piechart"
                                                    style="display: block; box-sizing: border-box; height: auto; width: 100%;">
                                                </div>
                                            </div>
                                            <!--end::Chart-->
                                            <!--begin::Labels-->
                                            <div
                                                class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                                                @foreach ($projPerStat as $pps)
                                                    @if ($pps['status'] == 1)
                                                        <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                                            <div class="bullet bg-gray-300 me-3"></div>
                                                            <div class="text-gray-400">To Do</div>
                                                            <div class="ms-auto fw-bolder text-gray-700">
                                                                {{ $pps['amount'] }}</div>
                                                        </div>
                                                    @elseif($pps['status'] == 2)
                                                        <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                                            <div class="bullet bg-primary me-3"></div>
                                                            <div class="text-gray-400">In Progress</div>
                                                            <div class="ms-auto fw-bolder text-gray-700">
                                                                {{ $pps['amount'] }}</div>
                                                        </div>
                                                    @else
                                                        <div class="d-flex fs-6 fw-bold align-items-center mb-3">
                                                            <div class="bullet bg-success me-3"></div>
                                                            <div class="text-gray-400">Completed</div>
                                                            <div class="ms-auto fw-bolder text-gray-700">
                                                                {{ $pps['amount'] }}</div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <div class="col-lg-6 col-xxl-4">
                                <!--begin::Budget-->
                                <div class="card h-100">
                                    <div class="card-body p-9">
                                        <div class="fs-2hx fw-bolder">Rp. {{ number_format($totalContract, 0, ',', '.') }}
                                        </div>
                                        <div class="fs-4 fw-bold text-gray-400 mb-7">Project Finance</div>
                                        <div class="fs-6 d-flex justify-content-between mb-4">
                                            <div class="fw-bold">Avg. Project Budget</div>
                                            <div class="d-flex fw-bolder">
                                                Rp. {{ number_format($avgContract, 0, ',', '.') }}
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                        <div class="fs-6 d-flex justify-content-between my-4">
                                            <div class="fw-bold">Highest Project Contract</div>
                                            <div class="d-flex fw-bolder">
                                                Rp. {{ number_format($maxContract, 0, ',', '.') }}
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                        <div class="fs-6 d-flex justify-content-between my-4">
                                            <div class="fw-bold">Lowest Project Contract</div>
                                            <div class="d-flex fw-bolder">
                                                Rp. {{ number_format($minContract, 0, ',', '.') }}
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                        <div class="fs-6 d-flex justify-content-between my-4">
                                            <div class="fw-bold">Highest Project expense</div>
                                            <div class="d-flex fw-bolder">
                                                Rp.
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                        <div class="fs-6 d-flex justify-content-between my-4">
                                            <div class="fw-bold">Lowest Project expense</div>
                                            <div class="d-flex fw-bolder">
                                                Rp.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Budget-->
                            </div>
                            <div class="col-lg-6 col-xxl-4">
                                <!--begin::Clients-->
                                <div class="card h-100">
                                    <div class="card-body p-9">
                                        <!--begin::Heading-->
                                        <div class="fs-2hx fw-bolder">{{ count($projectActive) }}</div>
                                        <div class="fs-4 fw-bold text-gray-400 mb-7">Active Project Manager</div>
                                        <!--end::Heading-->
                                        <!--begin::Project Manager group-->
                                        @foreach ($projectActiveLim as $pa)
                                            <div class="fs-6 d-flex justify-content-between mb-4">
                                                <div class="fw-bold">{{ $pa->name }}</div>
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                    title="" data-bs-original-title="Alan Warden">
                                                    <span
                                                        class="symbol-label bg-warning text-inverse-warning fw-bolder">A</span>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!--end::Project Manager group-->
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-primary btn-sm me-3" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_view_users">All Project Manager</a>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Clients-->
                            </div>
                        </div>
                        <!--end::Stats-->
                        @livewire('filter-index-project')
                        <!--begin::Modals-->
                        <!--begin::Modal - View Users-->
                        <div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header pb-0 border-0 justify-content-end">
                                        <!--begin::Close-->
                                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                                        transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                        transform="rotate(45 7.41422 6)" fill="black"></rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--begin::Modal header-->
                                    <!--begin::Modal body-->
                                    <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                                        <!--begin::Heading-->
                                        <div class="text-center mb-13">
                                            <!--begin::Title-->
                                            <h1 class="mb-3">Browse All Project Manager</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-bold fs-5">If you need more info, please check
                                                out on project detail.
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Users-->
                                        <div class="mb-15">
                                            <!--begin::List-->
                                            <div class="mh-375px scroll-y me-n7 pe-7">
                                                <!--begin::User-->
                                                @foreach ($projectActive as $p)
                                                    <div
                                                        class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic"
                                                                    src="/metronic8/demo6/assets/media/avatars/300-6.jpg">
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-6">
                                                                <!--begin::Name-->
                                                                <a href="#"
                                                                    class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Emma
                                                                    Smith
                                                                    @if ($p->status == 1)
                                                                        <span class="badge badge-light fs-8 fw-bold ms-2">To
                                                                            Do</span>
                                                                    @elseif($p->status == 2)
                                                                        <span
                                                                            class="badge badge-light-primary fs-8 fw-bold ms-2">In
                                                                            Progress</span>
                                                                    @else
                                                                        <span
                                                                            class="badge badge-light-success fs-8 fw-bold ms-2">Completed</span>
                                                                    @endif
                                                                </a>
                                                                <!--end::Name-->
                                                                <!--begin::Email-->
                                                                <div class="fw-bold text-muted">smith@kpmg.com</div>
                                                                <!--end::Email-->
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Stats-->
                                                        <div class="d-flex">
                                                            <!--begin::Sales-->
                                                            <div class="text-end">
                                                                <div class="fs-5 fw-bolder text-dark">{{ $p->name }}
                                                                </div>
                                                                <div class="fs-7 text-muted">
                                                                    {{ $p->projectCategory->category }}</div>
                                                            </div>
                                                            <!--end::Sales-->
                                                        </div>
                                                        <!--end::Stats-->
                                                    </div>
                                                @endforeach
                                                <!--end::User-->
                                            </div>
                                            <!--end::List-->
                                        </div>
                                        <!--end::Users-->
                                    </div>
                                    <!--end::Modal body-->
                                </div>
                                <!--end::Modal content-->
                            </div>
                            <!--end::Modal dialog-->
                        </div>
                        <!--end::Modal - View Users-->
                        <!--end::Modals-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Content-->
                @include('layouts.footer.footer-findiv')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>


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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Status', 'Project Count'],

                @php
                foreach ($projPerStat as $pps) {
                    if ($pps['status'] == 1) {
                        $status = 'To Do';
                    } elseif ($pps['status'] == 2) {
                        $status = 'In Progress';
                    } else {
                        $status = 'Completed';
                    }
                    echo "['" . $status . "', " . $pps['amount'] . '],';
                }
                @endphp
            ]);
            var options = {
                is3D: false,
                legend: 'none',
                pieHole: 0.6,
                slices: {
                    0: {
                        color: '#7e8299'
                    },
                    1: {
                        color: '#009ef7'
                    },
                    2: {
                        color: '#50cd89'
                    }
                },
                'width': 200,
                'height': 200
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
@endpush