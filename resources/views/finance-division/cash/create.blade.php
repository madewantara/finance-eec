@extends('layouts.app-findiv')

@section('title', 'Cash | Finance Division')

@section('page-title', 'Cash')

@section('sub-page-title', 'Cash Transaction List')

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
                <div class="container" id="kt_content_container">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-lg-row">
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Card body-->
                                <div class="card-body p-12">
                                    @livewire('create-cash')
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Sidebar-->
                        <div class="flex-lg-auto min-w-lg-300px">
                            <!--begin::Card-->
                            <div class="card" data-kt-sticky="true" data-kt-sticky-name="invoice"
                                data-kt-sticky-offset="{default: false, lg: '200px'}"
                                data-kt-sticky-width="{lg: '250px', lg: '300px'}" data-kt-sticky-left="auto"
                                data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                                <!--begin::Card body-->
                                <div class="card-body p-10">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-bolder fs-6 text-gray-700">Currency</label>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select name="currnecy" aria-label="Select a Timezone" data-control="select2"
                                            data-placeholder="Select currency" class="form-select form-select-solid">
                                            <option value=""></option>
                                            <option data-kt-flag="flags/united-states.svg" value="USD">
                                                <b>USD</b>&#160;-&#160;USA dollar
                                            </option>
                                            <option data-kt-flag="flags/united-kingdom.svg" value="GBP">
                                                <b>GBP</b>&#160;-&#160;British pound
                                            </option>
                                            <option data-kt-flag="flags/australia.svg" value="AUD">
                                                <b>AUD</b>&#160;-&#160;Australian dollar
                                            </option>
                                            <option data-kt-flag="flags/japan.svg" value="JPY">
                                                <b>JPY</b>&#160;-&#160;Japanese yen
                                            </option>
                                            <option data-kt-flag="flags/sweden.svg" value="SEK">
                                                <b>SEK</b>&#160;-&#160;Swedish krona
                                            </option>
                                            <option data-kt-flag="flags/canada.svg" value="CAD">
                                                <b>CAD</b>&#160;-&#160;Canadian dollar
                                            </option>
                                            <option data-kt-flag="flags/switzerland.svg" value="CHF">
                                                <b>CHF</b>&#160;-&#160;Swiss franc
                                            </option>
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed mb-8"></div>
                                    <!--end::Separator-->
                                    <!--begin::Input group-->
                                    <div class="mb-8">
                                        <!--begin::Option-->
                                        <label
                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                            <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Payment
                                                method</span>
                                            <input class="form-check-input" type="checkbox" checked="checked"
                                                value="" />
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label
                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                            <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Late
                                                fees</span>
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label
                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                            <span
                                                class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Notes</span>
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed mb-8"></div>
                                    <!--end::Separator-->
                                    <!--begin::Actions-->
                                    <div class="mb-0">
                                        <!--begin::Row-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col">
                                                <a href="#"
                                                    class="btn btn-light btn-active-light-primary w-100">Preview</a>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col">
                                                <a href="#"
                                                    class="btn btn-light btn-active-light-primary w-100">Download</a>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <button type="submit" href="#" class="btn btn-primary w-100"
                                            id="kt_invoice_submit_button">
                                            <!--begin::Svg Icon | path: icons/duotone/Map/Direction2.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M14,13.381038 L14,3.47213595 L7.99460483,15.4829263 L14,13.381038 Z M4.88230018,17.2353996 L13.2844582,0.431083506 C13.4820496,0.0359007077 13.9625881,-0.12427877 14.3577709,0.0733126292 C14.5125928,0.15072359 14.6381308,0.276261584 14.7155418,0.431083506 L23.1176998,17.2353996 C23.3152912,17.6305824 23.1551117,18.1111209 22.7599289,18.3087123 C22.5664522,18.4054506 22.3420471,18.4197165 22.1378777,18.3482572 L14,15.5 L5.86212227,18.3482572 C5.44509941,18.4942152 4.98871325,18.2744737 4.84275525,17.8574509 C4.77129597,17.6532815 4.78556182,17.4288764 4.88230018,17.2353996 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(14.000087, 9.191034) rotate(-315.000000) translate(-14.000087, -9.191034)" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Send Invoice
                                        </button>
                                    </div>
                                    <!--end::Actions-->
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