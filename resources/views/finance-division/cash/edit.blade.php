@extends('layouts.app-findiv')

@section('title', 'Edit Cash Transaction | Finance Division')

@section('page-title') <a href="{{ route('findiv.cash-index') }}" class="text-dark text-hover-primary">Cash Journal</a>
@endsection

@section('sub-page-title', 'Edit Cash Transaction')

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
        <div class="container-fluid" id="kt_content_container">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card body-->
                        <div class="card-body p-12">
                            @livewire('finance-division.edit-cash', ['uuid' => $uuid])
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content-->
                <!--begin::Sidebar-->
                <div class="flex-lg-auto w-lg-450px">
                    <!--begin::Card-->
                    <div class="card card-flush" data-kt-sticky="true" data-kt-sticky-name="invoice"
                        data-kt-sticky-offset="{default: false, lg: '200px'}"
                        data-kt-sticky-width="{lg: '450px', lg: '450px'}" data-kt-sticky-left="auto"
                        data-kt-sticky-top="30px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                        <div class="card-header pt-7">
                            <div class="card-title">
                                <h2 class="fw-bolder">Activity</h2>
                            </div>
                        </div>
                        <div class="separator separator-dashed border-gray-200"></div>
                        <!--begin::Card body-->
                        <div class="card-body p-0 ps-10 pe-10 pb-10">
                            <div class="scroll-y me-n5 pe-5 h-550px" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-offset="5px">
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
                                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                        title="" data-bs-original-title="{{ $a['user'][0]->email }}">
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
                                                                {{ $a['log']->created_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'cash-update')
                                                            <span>Has <b><i class="text-dark fw-bolder">updated</i></b>
                                                                this transaction on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'cash-delete')
                                                            <span>Has <b><i class="text-dark fw-bolder">deleted</i></b>
                                                                this transaction on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'cash-approved-findir')
                                                            <span>Has <b><i class="text-dark fw-bolder">approved</i></b>
                                                                this transaction on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'cash-approved-excdir')
                                                            <span>Has <b><i class="text-dark fw-bolder">approved</i></b>
                                                                this transaction on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'cash-rejected-findir')
                                                            <span>Has <b><i class="text-dark fw-bolder">rejected</i></b>
                                                                this transaction on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'cash-rejected-excdir')
                                                            <span>Has <b><i class="text-dark fw-bolder">rejected</i></b>
                                                                this transaction on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'cash-paid')
                                                            <span>Has <b><i class="text-dark fw-bolder">paid</i></b>
                                                                this transaction on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
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
@endsection

@push('js')
    <script src="{{ asset('assets/js/finance-division/create.js') }}"></script>
@endpush
