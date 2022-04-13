@extends('layouts.app-findiv')

@section('title', 'Edit Cash Transaction | Finance Division')

@section('page-title', 'Cash')

@section('sub-page-title', 'Edit Cash Transaction')

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
                    <div class="container-fluid" id="kt_content_container">
                        <!--begin::Layout-->
                        <div class="d-flex flex-column flex-lg-row">
                            <!--begin::Content-->
                            <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card body-->
                                    <div class="card-body p-12">
                                        @livewire('edit-cash', ['uuid' => $uuid])
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Content-->
                            <!--begin::Sidebar-->
                            <div class="flex-lg-auto min-w-lg-500px">
                                <!--begin::Card-->
                                <div class="card card-flush" data-kt-sticky="true" data-kt-sticky-name="invoice"
                                    data-kt-sticky-offset="{default: false, lg: '200px'}"
                                    data-kt-sticky-width="{lg: '500px', lg: '500px'}" data-kt-sticky-left="auto"
                                    data-kt-sticky-top="30px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                                    <div class="card-header pt-7">
                                        <div class="card-title">
                                            <h2 class="fw-bolder">Activity</h2>
                                        </div>
                                    </div>
                                    <!--begin::Card body-->
                                    <div class="card-body p-0 ps-10 pe-10 pb-10">
                                        <div class="scroll-y me-n5 pe-5 h-550px" data-kt-scroll="true"
                                            data-kt-scroll-activate="{default: false, lg: true}"
                                            data-kt-scroll-offset="5px">
                                            @if (count($activity) == 0)
                                                <div class="row mt-7">
                                                    <div class="col-lg-12">
                                                        <p><i>There are no activities for this transaction</i></p>
                                                    </div>
                                                </div>
                                            @else
                                                @foreach ($activity as $a)
                                                    <div class="row mt-7">
                                                        <div class="col-lg-1">
                                                            <div class="symbol-group symbol-hover">
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-35px symbol-circle"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-bs-original-title="{{ $a['user'][0]->email }}">
                                                                    <img class="img img-fluid"
                                                                        src="{{ asset('assets/image/avatar/150-13.jpg') }}"
                                                                        alt="image" style="max-width: 100%; height:auto;">
                                                                </div>
                                                                <!--end::User-->
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-11">
                                                            <div class="symbol-group symbol-hover">
                                                                <div>
                                                                    <p class="mb-0 fw-bolder">{{ $a['user'][0]->email }}
                                                                    </p>
                                                                    @if ($a['log']->category == 'cash-store')
                                                                        <span>Has <i class="text-dark fw-bolder">created</i>
                                                                            this
                                                                            transaction on
                                                                            {{ $a['log']->created_at }}</span>
                                                                    @elseif ($a['log']->category == 'cash-update')
                                                                        <span>Has <b><i
                                                                                    class="text-dark fw-bolder">updated</i></b>
                                                                            this transaction on
                                                                            {{ $a['log']->created_at }}</span>
                                                                    @elseif ($a['log']->category == 'cash-delete')
                                                                        <span>Has <b><i
                                                                                    class="text-dark fw-bolder">deleted</i></b>
                                                                            this transaction on
                                                                            {{ $a['log']->created_at }}</span>
                                                                    @elseif ($a['log']->category == 'cash-approved-findir')
                                                                        <span>Has <b><i
                                                                                    class="text-dark fw-bolder">approved</i></b>
                                                                            this transaction on
                                                                            {{ $a['log']->created_at }}</span>
                                                                    @elseif ($a['log']->category == 'cash-approved-excdir')
                                                                        <span>Has <b><i
                                                                                    class="text-dark fw-bolder">approved</i></b>
                                                                            this transaction on
                                                                            {{ $a['log']->created_at }}</span>
                                                                    @elseif ($a['log']->category == 'cash-rejected-findir')
                                                                        <span>Has <b><i
                                                                                    class="text-dark fw-bolder">rejected</i></b>
                                                                            this transaction on
                                                                            {{ $a['log']->created_at }}</span>
                                                                    @elseif ($a['log']->category == 'cash-rejected-excdir')
                                                                        <span>Has <b><i
                                                                                    class="text-dark fw-bolder">rejected</i></b>
                                                                            this transaction on
                                                                            {{ $a['log']->created_at }}</span>
                                                                    @elseif ($a['log']->category == 'cash-paid')
                                                                        <span>Has <b><i
                                                                                    class="text-dark fw-bolder">paid</i></b>
                                                                            this transaction on
                                                                            {{ $a['log']->created_at }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Sidebar-->
                        </div>
                        <!--end::Layout-->
                    </div>
                    <!--end::Container-->
                    <!--begin::Scrolltop-->
                    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
                        <span class="svg-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
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
                </div>
                <!--end::Content-->
                @include('layouts.footer.footer-findiv')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
@endsection

@push('js')
    <script src="{{ asset('assets/js/finance-division/create.js') }}"></script>
@endpush
