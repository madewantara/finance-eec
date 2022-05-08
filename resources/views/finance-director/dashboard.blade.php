@extends('layouts.app-findir')

@section('title', 'Dashboard | Finance Director')

@section('body', 'id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed"')

@section('page-title') <a href="{{ route('findir.dashboard') }}" class="text-dark">
    Dashboard</a> @endsection

@section('active-icon', 'active-sidebar-icon')

@section('active-link', 'active-sidebar-link')

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
        <div id="kt_content_container" class="container">
            <!--begin::Row-->
            <div class="g-5 gx-xxl-8 mb-xl-8">
                <!--begin::Tables Widget 10-->
                <div class="card">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Profit and Lost Stats</span>
                            <span class="text-muted mt-1 fw-bold fs-7">For the last 5 years</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-3">

                    </div>
                    <!--begin::Body-->
                </div>
                <!--end::Tables Widget 10-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row gy-5 g-xl-8">
                <!--begin::Col-->
                <div class="col-xxl-4">
                    <!--begin::List Widget 9-->
                    <div class="card card-xxl-stretch">
                        <!--begin::Header-->
                        <div class="card-header align-items-center border-0 mt-3">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="fw-bolder text-dark fs-3">Active Projects</span>
                                <span class="text-gray-400 mt-2 fw-bold fs-6">Total {{ count($activeProj) }}
                                    projects</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <div class="scroll-y me-n5 pe-5 h-500px" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-offset="5px">
                                @foreach ($activeProj as $ap)
                                    <!--begin::Item-->
                                    <div class="row mb-7">
                                        <div class="col-lg-2">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40px w-40px bg-light">
                                                @if ($ap->projectCategory->category == 'New Radar')
                                                    <span
                                                        class="symbol-label bg-success text-inverse-primary fw-bolder">{{ strtoupper($ap->name[0]) }}</span>
                                                @elseif($ap->projectCategory->category == 'Preventive Maintenance')
                                                    <span
                                                        class="symbol-label bg-warning text-inverse-primary fw-bolder">{{ strtoupper($ap->name[0]) }}</span>
                                                @elseif($ap->projectCategory->category == 'Corrective Maintenance')
                                                    <span class="symbol-label text-inverse-primary fw-bolder"
                                                        style="background-color: #f6910d">{{ strtoupper($ap->name[0]) }}</span>
                                                @elseif($ap->projectCategory->category == 'Radar Reinstallation')
                                                    <span class="symbol-label text-inverse-primary fw-bolder"
                                                        style="background-color:#9f4398;">{{ strtoupper($ap->name[0]) }}</span>
                                                @elseif($ap->projectCategory->category == 'Radar Spare Part')
                                                    <span class="symbol-label text-inverse-primary fw-bolder"
                                                        style="background-color:#00647b;">{{ strtoupper($ap->name[0]) }}</span>
                                                @else
                                                    <span
                                                        class="symbol-label bg-danger text-inverse-primary fw-bolder">{{ strtoupper($ap->name[0]) }}</span>
                                                @endif
                                            </div>
                                            <!--end::Symbol-->
                                        </div>
                                        <div class="col-lg-10">
                                            <!--begin::Section-->
                                            <div class="row align-items-center mt-n2 mt-lg-n1">
                                                <!--begin::Title-->
                                                <div class="col-lg-8">
                                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                        <a href="{{ route('findir.project-detail', ['uuid' => $ap->uuid]) }}"
                                                            class="fs-5 text-gray-800 text-hover-primary fw-bolder">{{ $ap->name }}</a>
                                                        <span
                                                            class="text-gray-400 fw-bold fs-7 my-1">{{ $ap->projectCategory->category }}</span>
                                                        <span class="text-gray-400 fw-bold fs-7">By:
                                                            <span
                                                                class="text-dark fw-bold">{{ $ap->project_manager }}</span>
                                                    </div>
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Info-->
                                                <div class="col-lg-4">
                                                    <div class="text-end py-lg-0 py-2">
                                                        <span class="text-gray-800 fw-boldest fs-3">
                                                            @if ($ap->status == 1)
                                                                <span
                                                                    class="badge badge-light fw-bolder me-auto px-4 py-2 mb-2">To
                                                                    Do</span>
                                                            @elseif($ap->status == 2)
                                                                <span
                                                                    class="badge badge-light-primary fw-bolder me-auto px-4 py-2 mb-2">In
                                                                    Progress</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-light-success fw-bolder me-auto px-4 py-2 mb-2">Completed</span>
                                                            @endif
                                                        </span>
                                                        <span class="text-gray-400 fs-7 fw-bold d-block">
                                                            @if ($ap->priority == 0)
                                                                <span></span>
                                                            @elseif ($ap->priority == 1)
                                                                <span
                                                                    class="badge badge-light fw-bolder ms-2 me-auto px-4 py-2 text-white mb-2"
                                                                    style="background-color: #3498DB;">
                                                                    High</span>
                                                            @elseif($ap->priority == 2)
                                                                <span
                                                                    class="badge badge-light fw-bolder ms-2 me-auto px-4 py-2 text-white mb-2"
                                                                    style="background-color:#40e0d0;">
                                                                    Medium</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-light fw-bolder ms-2 me-auto px-4 py-2 text-white mb-2"
                                                                    style="background-color: #F08080;">
                                                                    Low</span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                @endforeach
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List Widget 9-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xxl-8">
                    <!--begin::Tables Widget 9-->
                    <div class="card card-xxl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">EEC Indonesia Project</span>
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
                <!--end::Col-->
            </div>
            <!--end::Row-->
            @livewire('finance-director.edit-transaction-dashboard')
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    <!--end::Main-->
@endsection

@push('js')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
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
