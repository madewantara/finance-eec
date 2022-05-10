@extends('layouts.app-findiv')

@section('title', 'Project | Finance Division')

@section('page-title') <a href="{{ route('findiv.project-index') }}" class="text-dark text-hover-primary">Project</a>
@endsection

@section('sub-page-title', 'Project List')

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
            <div class="row g-6 g-xl-9">
                <div class="col-lg-12">
                    <!--begin::Tables Widget 9-->
                    <div class="card card-xxl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">EEC Indonesia Active Project</span>
                                <span class="text-muted mt-1 fw-bold fs-7">Total {{ count($allProjLoc) }} Projects</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3 h-500px">
                            <div id="map" style="width: 100%; height:96%;"></div>
                        </div>
                        <!--begin::Body-->
                    </div>
                    <!--end::Tables Widget 9-->
                </div>
            </div>
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
                                <div class="d-flex flex-center h-200px w-200px">
                                    <div id="piechart"
                                        style="display: block; box-sizing: border-box; height: auto; width: 100%;">
                                    </div>
                                </div>
                                <!--end::Chart-->
                                <!--begin::Labels-->
                                <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
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
                                <div class="fw-bold">Highest Project Spent</div>
                                <div class="d-flex fw-bolder">
                                    Rp. {{ number_format($highProjectExpanse, 0, ',', '.') }}
                                </div>
                            </div>
                            <div class="separator separator-dashed"></div>
                            <div class="fs-6 d-flex justify-content-between my-4">
                                <div class="fw-bold">Lowest Project Spent</div>
                                <div class="d-flex fw-bolder">
                                    Rp. {{ number_format($lowProjectExpanse, 0, ',', '.') }}
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
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder text-dark">{{ $pa->project_manager }}
                                        </div>
                                        <a href="{{ route('findiv.project-detail', ['uuid' => $pa->uuid]) }}"
                                            class="fw-bold text-muted text-hover-primary">{{ $pa->name }}</a>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                        title="{{ $pa->project_manager }}   "
                                        data-bs-original-title="{{ $pa->project_manager }}">
                                        <span
                                            class="symbol-label bg-warning text-inverse-warning fw-bolder">{{ strtoupper($pa->project_manager[0]) }}</span>
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
            @livewire('finance-division.filter-index-project', ['arrhighProjectExpanse' => $arrhighProjectExpanse])
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
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
                                                    <img alt="Pic" src="/metronic8/demo6/assets/media/avatars/300-6.jpg">
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-6">
                                                    <!--begin::Name-->
                                                    <div class="d-flex align-items-center fs-5 fw-bolder text-dark">
                                                        @if (!empty($p->project_manager))
                                                            {{ $p->project_manager }}
                                                        @else
                                                            Anonymous
                                                        @endif
                                                        @if ($p->status == 1)
                                                            <span class="badge badge-light fs-8 fw-bold ms-2">To
                                                                Do</span>
                                                        @elseif($p->status == 2)
                                                            <span class="badge badge-light-primary fs-8 fw-bold ms-2">In
                                                                Progress</span>
                                                        @else
                                                            <span
                                                                class="badge badge-light-success fs-8 fw-bold ms-2">Completed</span>
                                                        @endif
                                                    </div>
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
                                                    <a href="{{ route('findiv.project-detail', ['uuid' => $p->uuid]) }}"
                                                        class="fs-5 fw-bolder text-dark text-hover-primary">{{ $p->name }}
                                                    </a>
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
                            <!--begin::Actions-->
                            <div class="text-center">
                                <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Close</button>
                            </div>
                            <!--end::Actions-->
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
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyDi6oRMzsrth0JpkfYQQzwnv7FCvYfWwKA" type="text/javascript">
    </script>
    <script type="text/javascript">
        var locations = {!! json_encode($allProjLoc) !!};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: new google.maps.LatLng(-0.5093411, 117.0354433),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i].lat, locations[i].long),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i].name);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    </script>
@endpush
