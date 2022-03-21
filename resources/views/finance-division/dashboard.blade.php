@extends('layouts.app-findiv')

@section('title', 'Dashboard | Finance Division')

@section('body', 'id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed"')

@section('page-title', 'Dashboard')

@push('css')
    <link href="{{ asset('assets/css/finance-division/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <!--begin::Main-->
    <!--begin::Root-->
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
                    <div id="kt_content_container" class="container">
                        <!--begin::Row-->
                        <div class="row gy-5 g-xl-8">
                            <div class="col-xl-4">
                                <!--begin::Statistics Widget 5-->
                                <a href="#" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Svg Icon | path: icons/duotone/Shopping/Cart3.svg-->
                                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class="text-inverse-danger fw-bolder fs-2 mb-2 mt-5">Shopping Cart</div>
                                        <div class="fw-bold text-inverse-danger fs-7">Lands, Houses, Ranchos, Farms</div>
                                    </div>
                                    <!--end::Body-->
                                </a>
                                <!--end::Statistics Widget 5-->
                            </div>
                            <div class="col-xl-4">
                                <!--begin::Statistics Widget 5-->
                                <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Svg Icon | path: icons/duotone/Home/Building.svg-->
                                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z"
                                                        fill="#000000" />
                                                    <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1" />
                                                    <path
                                                        d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class="text-inverse-primary fw-bolder fs-2 mb-2 mt-5">Appartments</div>
                                        <div class="fw-bold text-inverse-primary fs-7">Flats, Shared Rooms, Duplex</div>
                                    </div>
                                    <!--end::Body-->
                                </a>
                                <!--end::Statistics Widget 5-->
                            </div>
                            <div class="col-xl-4">
                                <!--begin::Statistics Widget 5-->
                                <a href="#" class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Svg Icon | path: icons/duotone/Shopping/Chart-bar1.svg-->
                                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13"
                                                        rx="1.5" />
                                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8"
                                                        rx="1.5" />
                                                    <path
                                                        d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                    <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6"
                                                        rx="1.5" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class="text-inverse-success fw-bolder fs-2 mb-2 mt-5">Sales Stats</div>
                                        <div class="fw-bold text-inverse-success fs-7">50% Increased for FY20</div>
                                    </div>
                                    <!--end::Body-->
                                </a>
                                <!--end::Statistics Widget 5-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row gy-5 g-xl-8">
                            <!--begin::Col-->
                            <div class="col-xl-4">
                                <!--begin::Mixed Widget 3-->
                                <div class="card card-xl-stretch mb-xl-8">
                                    <!--begin::Beader-->
                                    <div class="card-header border-0 py-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bolder fs-3 mb-1">Sales Overview</span>
                                            <span class="text-muted fw-bold fs-7">Recent sales statistics</span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <!--begin::Menu-->
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-flip="top-end">
                                                <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--begin::Menu 1-->
                                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                                data-kt-menu="true" id="kt_menu_610d4eabd3fe3">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Menu separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Form-->
                                                <div class="px-7 py-5">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-bold">Status:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <div>
                                                            <select class="form-select form-select-solid"
                                                                data-kt-select2="true" data-placeholder="Select option"
                                                                data-dropdown-parent="#kt_menu_610d4eabd3fe3"
                                                                data-allow-clear="true">
                                                                <option></option>
                                                                <option value="1">Approved</option>
                                                                <option value="2">Pending</option>
                                                                <option value="2">In Process</option>
                                                                <option value="2">Rejected</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-bold">Member Type:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Options-->
                                                        <div class="d-flex">
                                                            <!--begin::Options-->
                                                            <label
                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                                <span class="form-check-label">Author</span>
                                                            </label>
                                                            <!--end::Options-->
                                                            <!--begin::Options-->
                                                            <label
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="2"
                                                                    checked="checked" />
                                                                <span class="form-check-label">Customer</span>
                                                            </label>
                                                            <!--end::Options-->
                                                        </div>
                                                        <!--end::Options-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-bold">Notifications:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Switch-->
                                                        <div
                                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                name="notifications" checked="checked" />
                                                            <label class="form-check-label">Enabled</label>
                                                        </div>
                                                        <!--end::Switch-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="reset"
                                                            class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                            data-kt-menu-dismiss="true">Reset</button>
                                                        <button type="submit" class="btn btn-sm btn-primary"
                                                            data-kt-menu-dismiss="true">Apply</button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Menu 1-->
                                            <!--end::Menu-->
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body p-0 d-flex flex-column">
                                        <!--begin::Stats-->
                                        <div class="card-p pt-5 bg-body flex-grow-1">
                                            <!--begin::Row-->
                                            <div class="row g-0">
                                                <!--begin::Col-->
                                                <div class="col mr-8">
                                                    <!--begin::Label-->
                                                    <div class="fs-7 text-muted fw-bold">Average Sale</div>
                                                    <!--end::Label-->
                                                    <!--begin::Stat-->
                                                    <div class="d-flex align-items-center">
                                                        <div class="fs-4 fw-bolder">$650</div>
                                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
                                                        <span class="svg-icon svg-icon-5 svg-icon-success ms-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                                    <rect fill="#000000" opacity="0.5" x="11" y="5"
                                                                        width="2" height="14" rx="1" />
                                                                    <path
                                                                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                                                                        fill="#000000" fill-rule="nonzero" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Stat-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Label-->
                                                    <div class="fs-7 text-muted fw-bold">Commission</div>
                                                    <!--end::Label-->
                                                    <!--begin::Stat-->
                                                    <div class="fs-4 fw-bolder">$233,600</div>
                                                    <!--end::Stat-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Row-->
                                            <div class="row g-0 mt-8">
                                                <!--begin::Col-->
                                                <div class="col mr-8">
                                                    <!--begin::Label-->
                                                    <div class="fs-7 text-muted fw-bold">Annual Taxes 2019</div>
                                                    <!--end::Label-->
                                                    <!--begin::Stat-->
                                                    <div class="fs-4 fw-bolder">$29,004</div>
                                                    <!--end::Stat-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Label-->
                                                    <div class="fs-7 text-muted fw-bold">Annual Income</div>
                                                    <!--end::Label-->
                                                    <!--begin::Stat-->
                                                    <div class="d-flex align-items-center">
                                                        <div class="fs-4 fw-bolder">$1,480,00</div>
                                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-down.svg-->
                                                        <span class="svg-icon svg-icon-5 svg-icon-danger ms-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                                    <rect fill="#000000" opacity="0.5" x="11" y="5"
                                                                        width="2" height="14" rx="1" />
                                                                    <path
                                                                        d="M6.70710678,18.7071068 C6.31658249,19.0976311 5.68341751,19.0976311 5.29289322,18.7071068 C4.90236893,18.3165825 4.90236893,17.6834175 5.29289322,17.2928932 L11.2928932,11.2928932 C11.6714722,10.9143143 12.2810586,10.9010687 12.6757246,11.2628459 L18.6757246,16.7628459 C19.0828436,17.1360383 19.1103465,17.7686056 18.7371541,18.1757246 C18.3639617,18.5828436 17.7313944,18.6103465 17.3242754,18.2371541 L12.0300757,13.3841378 L6.70710678,18.7071068 Z"
                                                                        fill="#000000" fill-rule="nonzero"
                                                                        transform="translate(12.000003, 14.999999) scale(1, -1) translate(-12.000003, -14.999999)" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Stat-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Stats-->
                                        <!--begin::Chart-->
                                        <div class="mixed-widget-3-chart card-rounded-bottom" data-kt-chart-color="primary"
                                            style="height: 150px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Mixed Widget 3-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-4">
                                <!--begin::Mixed Widget 4-->
                                <div class="card card-xl-stretch">
                                    <!--begin::Beader-->
                                    <div class="card-header border-0 py-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bolder fs-3 mb-1">Action Needed</span>
                                            <span class="text-muted fw-bold fs-7">Complete your profile setup</span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <!--begin::Menu-->
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-flip="top-end">
                                                <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--begin::Menu 1-->
                                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                                data-kt-menu="true" id="kt_menu_610d4eabd4b3a">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Menu separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Form-->
                                                <div class="px-7 py-5">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-bold">Status:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <div>
                                                            <select class="form-select form-select-solid"
                                                                data-kt-select2="true" data-placeholder="Select option"
                                                                data-dropdown-parent="#kt_menu_610d4eabd4b3a"
                                                                data-allow-clear="true">
                                                                <option></option>
                                                                <option value="1">Approved</option>
                                                                <option value="2">Pending</option>
                                                                <option value="2">In Process</option>
                                                                <option value="2">Rejected</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-bold">Member Type:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Options-->
                                                        <div class="d-flex">
                                                            <!--begin::Options-->
                                                            <label
                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" />
                                                                <span class="form-check-label">Author</span>
                                                            </label>
                                                            <!--end::Options-->
                                                            <!--begin::Options-->
                                                            <label
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="2"
                                                                    checked="checked" />
                                                                <span class="form-check-label">Customer</span>
                                                            </label>
                                                            <!--end::Options-->
                                                        </div>
                                                        <!--end::Options-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-bold">Notifications:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Switch-->
                                                        <div
                                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                name="notifications" checked="checked" />
                                                            <label class="form-check-label">Enabled</label>
                                                        </div>
                                                        <!--end::Switch-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="reset"
                                                            class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                            data-kt-menu-dismiss="true">Reset</button>
                                                        <button type="submit" class="btn btn-sm btn-primary"
                                                            data-kt-menu-dismiss="true">Apply</button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Menu 1-->
                                            <!--end::Menu-->
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column">
                                        <div class="flex-grow-1">
                                            <div class="mixed-widget-4-chart" data-kt-chart-color="primary"
                                                style="height: 225px"></div>
                                        </div>
                                        <div class="pt-5">
                                            <p class="text-center fs-6 pb-5">
                                                <span class="badge badge-light-danger fs-8">Notes:</span>&#160; Current
                                                sprint requires stakeholders
                                                <br />to approve newly amended policies
                                            </p>
                                            <a href="#" class="btn btn-primary w-100 py-3">Take Action</a>
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Mixed Widget 4-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-4">
                                <!--begin::Mixed Widget 5-->
                                <div class="card card-xl-stretch mb-5 mb-xl-8">
                                    <!--begin::Beader-->
                                    <div class="card-header border-0 py-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bolder fs-3 mb-1">Trends</span>
                                            <span class="text-muted fw-bold fs-7">Latest trends</span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <!--begin::Menu-->
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-flip="top-end">
                                                <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--begin::Menu 3-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                                data-kt-menu="true">
                                                <!--begin::Heading-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                        Payments</div>
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Create Invoice</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                            data-bs-toggle="tooltip"
                                                            title="Specify a target name for future usage and reference"></i></a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Generate Bill</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                    data-kt-menu-placement="right-end" data-kt-menu-flip="bottom, top">
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">Subscription</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Plans</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Billing</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Statements</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu separator-->
                                                        <div class="separator my-2"></div>
                                                        <!--end::Menu separator-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <div class="menu-content px-3">
                                                                <!--begin::Switch-->
                                                                <label
                                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form-check-input w-30px h-20px"
                                                                        type="checkbox" value="1" checked="checked"
                                                                        name="notifications" />
                                                                    <!--end::Input-->
                                                                    <!--end::Label-->
                                                                    <span
                                                                        class="form-check-label text-muted fs-6">Recuring</span>
                                                                    <!--end::Label-->
                                                                </label>
                                                                <!--end::Switch-->
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-1">
                                                    <a href="#" class="menu-link px-3">Settings</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 3-->
                                            <!--end::Menu-->
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column">
                                        <!--begin::Chart-->
                                        <div class="mixed-widget-5-chart card-rounded-top" data-kt-chart-color="danger"
                                            style="height: 150px"></div>
                                        <!--end::Chart-->
                                        <!--begin::Items-->
                                        <div class="mt-5">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <!--begin::Section-->
                                                <div class="d-flex align-items-center me-2">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-50px me-3">
                                                        <div class="symbol-label bg-light">
                                                            <img src="assets/media/svg/brand-logos/plurk.svg"
                                                                class="h-50" alt="" />
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div>
                                                        <a href="#"
                                                            class="fs-6 text-gray-800 text-hover-primary fw-bolder">Top
                                                            Authors</a>
                                                        <div class="fs-7 text-muted fw-bold mt-1">Ricky Hunt, Sandra Trepp
                                                        </div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Section-->
                                                <!--begin::Label-->
                                                <div class="badge badge-light fw-bold py-4 px-3">+82$</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-5">
                                                <!--begin::Section-->
                                                <div class="d-flex align-items-center me-2">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-50px me-3">
                                                        <div class="symbol-label bg-light">
                                                            <img src="assets/media/svg/brand-logos/figma-1.svg"
                                                                class="h-50" alt="" />
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div>
                                                        <a href="#"
                                                            class="fs-6 text-gray-800 text-hover-primary fw-bolder">Top
                                                            Sales</a>
                                                        <div class="fs-7 text-muted fw-bold mt-1">PitStop Emails</div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Section-->
                                                <!--begin::Label-->
                                                <div class="badge badge-light fw-bold py-4 px-3">+82$</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack">
                                                <!--begin::Section-->
                                                <div class="d-flex align-items-center me-2">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-50px me-3">
                                                        <div class="symbol-label bg-light">
                                                            <img src="assets/media/svg/brand-logos/vimeo.svg"
                                                                class="h-50" alt="" />
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="py-1">
                                                        <a href="#"
                                                            class="fs-6 text-gray-800 text-hover-primary fw-bolder">Top
                                                            Engagement</a>
                                                        <div class="fs-7 text-muted fw-bold mt-1">KT.com</div>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Section-->
                                                <!--begin::Label-->
                                                <div class="badge badge-light fw-bold py-4 px-3">+82$</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Mixed Widget 5-->
                            </div>
                            <!--end::Col-->
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
                                            <span class="fw-bolder text-dark fs-3">My Competitors</span>
                                            <span class="text-gray-400 mt-2 fw-bold fs-6">More than 400+ new members</span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <!--begin::Menu-->
                                            <button type="button"
                                                class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-flip="top-end">
                                                <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick
                                                        Actions</div>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Customer</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                    data-kt-menu-placement="right-start" data-kt-menu-flip="bottom, top">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Member Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Contact</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate
                                                            Reports</a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->
                                            <!--end::Menu-->
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-5">
                                        <!--begin::Item-->
                                        <div class="d-flex mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-60px symbol-2by3 flex-shrink-0 me-4">
                                                <img src="assets/media/stock/600x400/img-3.jpg" class="mw-100"
                                                    alt="" />
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                    <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Cup
                                                        &amp; Green</a>
                                                    <span class="text-gray-400 fw-bold fs-7 my-1">Study highway
                                                        types</span>
                                                    <span class="text-gray-400 fw-bold fs-7">By:
                                                        <a href="#" class="text-primary fw-bold">CoreAd</a></span>
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Info-->
                                                <div class="text-end py-lg-0 py-2">
                                                    <span class="text-gray-800 fw-boldest fs-3">24,900</span>
                                                    <span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-60px symbol-2by3 flex-shrink-0 me-4">
                                                <img src="assets/media/stock/600x400/img-4.jpg" class="mw-100"
                                                    alt="" />
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                    <a href="#"
                                                        class="fs-5 text-gray-800 text-hover-primary fw-bolder">Yellow
                                                        Hearts</a>
                                                    <span class="text-gray-400 fw-bold fs-7 my-1">Study highway
                                                        types</span>
                                                    <span class="text-gray-400 fw-bold fs-7">By:
                                                        <a href="#" class="text-primary fw-bold">KeenThemes</a></span>
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Info-->
                                                <div class="text-end py-lg-0 py-2">
                                                    <span class="text-gray-800 fw-boldest fs-3">70,380</span>
                                                    <span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-60px symbol-2by3 flex-shrink-0 me-4">
                                                <img src="assets/media/stock/600x400/img-5.jpg" class="mw-100"
                                                    alt="" />
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                    <a href="#"
                                                        class="fs-5 text-gray-800 text-hover-primary fw-bolder">Nike &amp;
                                                        Blue</a>
                                                    <span class="text-gray-400 fw-bold fs-7 my-1">Study highway
                                                        types</span>
                                                    <span class="text-gray-400 fw-bold fs-7">By:
                                                        <a href="#" class="text-primary fw-bold">Invision Inc.</a></span>
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Info-->
                                                <div class="text-end py-lg-0 py-2">
                                                    <span class="text-gray-800 fw-boldest fs-3">7,200</span>
                                                    <span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-60px symbol-2by3 flex-shrink-0 me-4">
                                                <img src="assets/media/stock/600x400/img-6.jpg" class="mw-100"
                                                    alt="" />
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                    <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-bolder">Red
                                                        Boots</a>
                                                    <span class="text-gray-400 fw-bold fs-7 my-1">Study highway
                                                        types</span>
                                                    <span class="text-gray-400 fw-bold fs-7">By:
                                                        <a href="#" class="text-primary fw-bold">Figma Studio</a></span>
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Info-->
                                                <div class="text-end py-lg-0 py-2">
                                                    <span class="text-gray-800 fw-boldest fs-3">36,450</span>
                                                    <span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-60px symbol-2by3 flex-shrink-0 me-4">
                                                <img src="assets/media/stock/600x400/img-7.jpg" class="mw-100"
                                                    alt="" />
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                    <a href="#"
                                                        class="fs-5 text-gray-800 text-hover-primary fw-bolder">Desserts
                                                        platter</a>
                                                    <span class="text-gray-400 fw-bold fs-7 my-1">Food trends &amp;
                                                        reviews</span>
                                                    <span class="text-gray-400 fw-bold fs-7">By:
                                                        <a href="#" class="text-primary fw-bold">Figma Studio</a></span>
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Info-->
                                                <div class="text-end py-lg-0 py-2">
                                                    <span class="text-gray-800 fw-boldest fs-3">64,753</span>
                                                    <span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
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
                                            <span class="card-label fw-bolder fs-3 mb-1">Members Statistics</span>
                                            <span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span>
                                        </h3>
                                        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-trigger="hover" title="Click to add a user">
                                            <a href="#" class="btn btn-sm btn-light btn-active-primary"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
                                                <!--begin::Svg Icon | path: icons/duotone/Communication/Add-user.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                        viewBox="0 0 24 24" version="1.1">
                                                        <path
                                                            d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path
                                                            d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->New Member
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body py-3">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table
                                                class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <tr class="fw-bolder text-muted">
                                                        <th class="w-25px">
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="1"
                                                                    data-kt-check="true"
                                                                    data-kt-check-target=".widget-9-check" />
                                                            </div>
                                                        </th>
                                                        <th class="min-w-150px">Authors</th>
                                                        <th class="min-w-140px">Company</th>
                                                        <th class="min-w-120px">Progress</th>
                                                        <th class="min-w-100px text-end">Actions</th>
                                                    </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input widget-9-check"
                                                                    type="checkbox" value="1" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-45px me-5">
                                                                    <img src="assets/media/avatars/150-11.jpg" alt="" />
                                                                </div>
                                                                <div class="d-flex justify-content-start flex-column">
                                                                    <a href="#"
                                                                        class="text-dark fw-bolder text-hover-primary fs-6">Ana
                                                                        Simmons</a>
                                                                    <span
                                                                        class="text-muted fw-bold text-muted d-block fs-7">HTML,
                                                                        JS, ReactJS</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                                class="text-dark fw-bolder text-hover-primary d-block fs-6">Intertico</a>
                                                            <span class="text-muted fw-bold text-muted d-block fs-7">Web,
                                                                UI/UX Design</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex flex-column w-100 me-2">
                                                                <div class="d-flex flex-stack mb-2">
                                                                    <span class="text-muted me-2 fs-7 fw-bold">50%</span>
                                                                </div>
                                                                <div class="progress h-6px w-100">
                                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                                        style="width: 50%" aria-valuenow="50"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                    <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px" viewBox="0 0 24 24"
                                                                            version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                                fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path
                                                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                    fill="#000000" />
                                                                                <path
                                                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                    fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                                <a href="#"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <path
                                                                                d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                            <path
                                                                                d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                                <a href="#"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                                    <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px" viewBox="0 0 24 24"
                                                                            version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                                fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path
                                                                                    d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                                    fill="#000000" fill-rule="nonzero" />
                                                                                <path
                                                                                    d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                                    fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input widget-9-check"
                                                                    type="checkbox" value="1" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-45px me-5">
                                                                    <img src="assets/media/avatars/150-3.jpg" alt="" />
                                                                </div>
                                                                <div class="d-flex justify-content-start flex-column">
                                                                    <a href="#"
                                                                        class="text-dark fw-bolder text-hover-primary fs-6">Jessie
                                                                        Clarcson</a>
                                                                    <span
                                                                        class="text-muted fw-bold text-muted d-block fs-7">C#,
                                                                        ASP.NET, MS SQL</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                                class="text-dark fw-bolder text-hover-primary d-block fs-6">Agoda</a>
                                                            <span class="text-muted fw-bold text-muted d-block fs-7">Houses
                                                                &amp; Hotels</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex flex-column w-100 me-2">
                                                                <div class="d-flex flex-stack mb-2">
                                                                    <span class="text-muted me-2 fs-7 fw-bold">70%</span>
                                                                </div>
                                                                <div class="progress h-6px w-100">
                                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                                        style="width: 70%" aria-valuenow="70"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                    <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px" viewBox="0 0 24 24"
                                                                            version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                                fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path
                                                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                    fill="#000000" />
                                                                                <path
                                                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                    fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                                <a href="#"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <path
                                                                                d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                            <path
                                                                                d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                                <a href="#"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                                    <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px" viewBox="0 0 24 24"
                                                                            version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                                fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path
                                                                                    d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                                    fill="#000000" fill-rule="nonzero" />
                                                                                <path
                                                                                    d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                                    fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input widget-9-check"
                                                                    type="checkbox" value="1" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-45px me-5">
                                                                    <img src="assets/media/avatars/150-4.jpg" alt="" />
                                                                </div>
                                                                <div class="d-flex justify-content-start flex-column">
                                                                    <a href="#"
                                                                        class="text-dark fw-bolder text-hover-primary fs-6">Lebron
                                                                        Wayde</a>
                                                                    <span
                                                                        class="text-muted fw-bold text-muted d-block fs-7">PHP,
                                                                        Laravel, VueJS</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                                class="text-dark fw-bolder text-hover-primary d-block fs-6">RoadGee</a>
                                                            <span
                                                                class="text-muted fw-bold text-muted d-block fs-7">Transportation</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex flex-column w-100 me-2">
                                                                <div class="d-flex flex-stack mb-2">
                                                                    <span class="text-muted me-2 fs-7 fw-bold">60%</span>
                                                                </div>
                                                                <div class="progress h-6px w-100">
                                                                    <div class="progress-bar bg-success" role="progressbar"
                                                                        style="width: 60%" aria-valuenow="60"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                    <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px" viewBox="0 0 24 24"
                                                                            version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                                fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path
                                                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                    fill="#000000" />
                                                                                <path
                                                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                    fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                                <a href="#"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <path
                                                                                d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                            <path
                                                                                d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                                <a href="#"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                                    <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px" viewBox="0 0 24 24"
                                                                            version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                                fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path
                                                                                    d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                                    fill="#000000" fill-rule="nonzero" />
                                                                                <path
                                                                                    d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                                    fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input widget-9-check"
                                                                    type="checkbox" value="1" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-45px me-5">
                                                                    <img src="assets/media/avatars/150-5.jpg" alt="" />
                                                                </div>
                                                                <div class="d-flex justify-content-start flex-column">
                                                                    <a href="#"
                                                                        class="text-dark fw-bolder text-hover-primary fs-6">Natali
                                                                        Goodwin</a>
                                                                    <span
                                                                        class="text-muted fw-bold text-muted d-block fs-7">Python,
                                                                        PostgreSQL, ReactJS</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                                class="text-dark fw-bolder text-hover-primary d-block fs-6">The
                                                                Hill</a>
                                                            <span
                                                                class="text-muted fw-bold text-muted d-block fs-7">Insurance</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex flex-column w-100 me-2">
                                                                <div class="d-flex flex-stack mb-2">
                                                                    <span class="text-muted me-2 fs-7 fw-bold">50%</span>
                                                                </div>
                                                                <div class="progress h-6px w-100">
                                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                                        style="width: 50%" aria-valuenow="50"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                    <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px" viewBox="0 0 24 24"
                                                                            version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                                fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path
                                                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                    fill="#000000" />
                                                                                <path
                                                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                    fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                                <a href="#"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <path
                                                                                d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                            <path
                                                                                d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                                <a href="#"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                                    <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px" viewBox="0 0 24 24"
                                                                            version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                                fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path
                                                                                    d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                                    fill="#000000" fill-rule="nonzero" />
                                                                                <path
                                                                                    d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                                    fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input widget-9-check"
                                                                    type="checkbox" value="1" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-45px me-5">
                                                                    <img src="assets/media/avatars/150-6.jpg" alt="" />
                                                                </div>
                                                                <div class="d-flex justify-content-start flex-column">
                                                                    <a href="#"
                                                                        class="text-dark fw-bolder text-hover-primary fs-6">Kevin
                                                                        Leonard</a>
                                                                    <span
                                                                        class="text-muted fw-bold text-muted d-block fs-7">HTML,
                                                                        JS, ReactJS</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#"
                                                                class="text-dark fw-bolder text-hover-primary d-block fs-6">RoadGee</a>
                                                            <span class="text-muted fw-bold text-muted d-block fs-7">Art
                                                                Director</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex flex-column w-100 me-2">
                                                                <div class="d-flex flex-stack mb-2">
                                                                    <span class="text-muted me-2 fs-7 fw-bold">90%</span>
                                                                </div>
                                                                <div class="progress h-6px w-100">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        style="width: 90%" aria-valuenow="90"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                    <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px" viewBox="0 0 24 24"
                                                                            version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                                fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path
                                                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                    fill="#000000" />
                                                                                <path
                                                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                    fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                                <a href="#"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <path
                                                                                d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                            <path
                                                                                d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                                <a href="#"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                                    <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px" viewBox="0 0 24 24"
                                                                            version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                                fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path
                                                                                    d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                                    fill="#000000" fill-rule="nonzero" />
                                                                                <path
                                                                                    d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                                    fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--begin::Body-->
                                </div>
                                <!--end::Tables Widget 9-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row g-5 g-xl-8">
                            <div class="col-xl-4">
                                <!--begin::List Widget 4-->
                                <div class="card card-xl-stretch mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bolder text-dark">Trends</span>
                                            <span class="text-muted mt-1 fw-bold fs-7">Latest tech trends</span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <!--begin::Menu-->
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-flip="top-end">
                                                <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--begin::Menu 3-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                                data-kt-menu="true">
                                                <!--begin::Heading-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                        Payments</div>
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Create Invoice</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                            data-bs-toggle="tooltip"
                                                            title="Specify a target name for future usage and reference"></i></a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Generate Bill</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                    data-kt-menu-placement="right-end" data-kt-menu-flip="bottom, top">
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">Subscription</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Plans</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Billing</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Statements</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu separator-->
                                                        <div class="separator my-2"></div>
                                                        <!--end::Menu separator-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <div class="menu-content px-3">
                                                                <!--begin::Switch-->
                                                                <label
                                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form-check-input w-30px h-20px"
                                                                        type="checkbox" value="1" checked="checked"
                                                                        name="notifications" />
                                                                    <!--end::Input-->
                                                                    <!--end::Label-->
                                                                    <span
                                                                        class="form-check-label text-muted fs-6">Recuring</span>
                                                                    <!--end::Label-->
                                                                </label>
                                                                <!--end::Switch-->
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-1">
                                                    <a href="#" class="menu-link px-3">Settings</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 3-->
                                            <!--end::Menu-->
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-5">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-sm-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/brand-logos/plurk.svg"
                                                        class="h-50 align-self-center" alt="" />
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                <div class="flex-grow-1 me-2">
                                                    <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Top
                                                        Authors</a>
                                                    <span class="text-muted fw-bold d-block fs-7">Mark, Rowling,
                                                        Esther</span>
                                                </div>
                                                <span class="badge badge-light fw-bolder my-2">+82$</span>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-sm-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/brand-logos/telegram.svg"
                                                        class="h-50 align-self-center" alt="" />
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                <div class="flex-grow-1 me-2">
                                                    <a href="#"
                                                        class="text-gray-800 text-hover-primary fs-6 fw-bolder">Popular
                                                        Authors</a>
                                                    <span class="text-muted fw-bold d-block fs-7">Randy, Steve, Mike</span>
                                                </div>
                                                <span class="badge badge-light fw-bolder my-2">+280$</span>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-sm-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/brand-logos/vimeo.svg"
                                                        class="h-50 align-self-center" alt="" />
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                <div class="flex-grow-1 me-2">
                                                    <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">New
                                                        Users</a>
                                                    <span class="text-muted fw-bold d-block fs-7">John, Pat, Jimmy</span>
                                                </div>
                                                <span class="badge badge-light fw-bolder my-2">+4500$</span>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-sm-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/brand-logos/bebo.svg"
                                                        class="h-50 align-self-center" alt="" />
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                <div class="flex-grow-1 me-2">
                                                    <a href="#"
                                                        class="text-gray-800 text-hover-primary fs-6 fw-bolder">Active
                                                        Customers</a>
                                                    <span class="text-muted fw-bold d-block fs-7">Mark, Rowling,
                                                        Esther</span>
                                                </div>
                                                <span class="badge badge-light fw-bolder my-2">+686$</span>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-sm-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/brand-logos/kickstarter.svg"
                                                        class="h-50 align-self-center" alt="" />
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                <div class="flex-grow-1 me-2">
                                                    <a href="#"
                                                        class="text-gray-800 text-hover-primary fs-6 fw-bolder">Bestseller
                                                        Theme</a>
                                                    <span class="text-muted fw-bold d-block fs-7">Disco, Retro,
                                                        Sports</span>
                                                </div>
                                                <span class="badge badge-light fw-bolder my-2">+726$</span>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-sm-center">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
                                                <span class="symbol-label">
                                                    <img src="assets/media/svg/brand-logos/fox-hub.svg"
                                                        class="h-50 align-self-center" alt="" />
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                <div class="flex-grow-1 me-2">
                                                    <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Fox
                                                        Broker App</a>
                                                    <span class="text-muted fw-bold d-block fs-7">Finance, Corporate,
                                                        Apps</span>
                                                </div>
                                                <span class="badge badge-light fw-bolder my-2">+145$</span>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 4-->
                            </div>
                            <div class="col-xl-4">
                                <!--begin::List Widget 5-->
                                <div class="card card-xl-stretch mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="card-header align-items-center border-0 mt-4">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="fw-bolder mb-2 text-dark">Activities</span>
                                            <span class="text-muted fw-bold fs-7">890,344 Sales</span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <!--begin::Menu-->
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-flip="top-end">
                                                <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--begin::Menu 1-->
                                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                                data-kt-menu="true" id="kt_menu_610d4eabd8488">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Menu separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Form-->
                                                <div class="px-7 py-5">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-bold">Status:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <div>
                                                            <select class="form-select form-select-solid"
                                                                data-kt-select2="true" data-placeholder="Select option"
                                                                data-dropdown-parent="#kt_menu_610d4eabd8488"
                                                                data-allow-clear="true">
                                                                <option></option>
                                                                <option value="1">Approved</option>
                                                                <option value="2">Pending</option>
                                                                <option value="2">In Process</option>
                                                                <option value="2">Rejected</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-bold">Member Type:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Options-->
                                                        <div class="d-flex">
                                                            <!--begin::Options-->
                                                            <label
                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" />
                                                                <span class="form-check-label">Author</span>
                                                            </label>
                                                            <!--end::Options-->
                                                            <!--begin::Options-->
                                                            <label
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="2"
                                                                    checked="checked" />
                                                                <span class="form-check-label">Customer</span>
                                                            </label>
                                                            <!--end::Options-->
                                                        </div>
                                                        <!--end::Options-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-bold">Notifications:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Switch-->
                                                        <div
                                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                name="notifications" checked="checked" />
                                                            <label class="form-check-label">Enabled</label>
                                                        </div>
                                                        <!--end::Switch-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="reset"
                                                            class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                            data-kt-menu-dismiss="true">Reset</button>
                                                        <button type="submit" class="btn btn-sm btn-primary"
                                                            data-kt-menu-dismiss="true">Apply</button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Menu 1-->
                                            <!--end::Menu-->
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-5">
                                        <!--begin::Timeline-->
                                        <div class="timeline-label">
                                            <!--begin::Item-->
                                            <div class="timeline-item">
                                                <!--begin::Label-->
                                                <div class="timeline-label fw-bolder text-gray-800 fs-6">08:42</div>
                                                <!--end::Label-->
                                                <!--begin::Badge-->
                                                <div class="timeline-badge">
                                                    <i class="fa fa-genderless text-warning fs-1"></i>
                                                </div>
                                                <!--end::Badge-->
                                                <!--begin::Text-->
                                                <div class="fw-mormal timeline-content text-muted ps-3">Outlines keep you
                                                    honest. And keep structure</div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="timeline-item">
                                                <!--begin::Label-->
                                                <div class="timeline-label fw-bolder text-gray-800 fs-6">10:00</div>
                                                <!--end::Label-->
                                                <!--begin::Badge-->
                                                <div class="timeline-badge">
                                                    <i class="fa fa-genderless text-success fs-1"></i>
                                                </div>
                                                <!--end::Badge-->
                                                <!--begin::Content-->
                                                <div class="timeline-content d-flex">
                                                    <span class="fw-bolder text-gray-800 ps-3">AEOL meeting</span>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="timeline-item">
                                                <!--begin::Label-->
                                                <div class="timeline-label fw-bolder text-gray-800 fs-6">14:37</div>
                                                <!--end::Label-->
                                                <!--begin::Badge-->
                                                <div class="timeline-badge">
                                                    <i class="fa fa-genderless text-danger fs-1"></i>
                                                </div>
                                                <!--end::Badge-->
                                                <!--begin::Desc-->
                                                <div class="timeline-content fw-bolder text-gray-800 ps-3">Make deposit
                                                    <a href="#" class="text-primary">USD 700</a>. to ESL
                                                </div>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="timeline-item">
                                                <!--begin::Label-->
                                                <div class="timeline-label fw-bolder text-gray-800 fs-6">16:50</div>
                                                <!--end::Label-->
                                                <!--begin::Badge-->
                                                <div class="timeline-badge">
                                                    <i class="fa fa-genderless text-primary fs-1"></i>
                                                </div>
                                                <!--end::Badge-->
                                                <!--begin::Text-->
                                                <div class="timeline-content fw-mormal text-muted ps-3">Indulging in poorly
                                                    driving and keep structure keep great</div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="timeline-item">
                                                <!--begin::Label-->
                                                <div class="timeline-label fw-bolder text-gray-800 fs-6">21:03</div>
                                                <!--end::Label-->
                                                <!--begin::Badge-->
                                                <div class="timeline-badge">
                                                    <i class="fa fa-genderless text-danger fs-1"></i>
                                                </div>
                                                <!--end::Badge-->
                                                <!--begin::Desc-->
                                                <div class="timeline-content fw-bold text-gray-800 ps-3">New order placed
                                                    <a href="#" class="text-primary">#XF-2356</a>.
                                                </div>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="timeline-item">
                                                <!--begin::Label-->
                                                <div class="timeline-label fw-bolder text-gray-800 fs-6">16:50</div>
                                                <!--end::Label-->
                                                <!--begin::Badge-->
                                                <div class="timeline-badge">
                                                    <i class="fa fa-genderless text-primary fs-1"></i>
                                                </div>
                                                <!--end::Badge-->
                                                <!--begin::Text-->
                                                <div class="timeline-content fw-mormal text-muted ps-3">Indulging in poorly
                                                    driving and keep structure keep great</div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="timeline-item">
                                                <!--begin::Label-->
                                                <div class="timeline-label fw-bolder text-gray-800 fs-6">21:03</div>
                                                <!--end::Label-->
                                                <!--begin::Badge-->
                                                <div class="timeline-badge">
                                                    <i class="fa fa-genderless text-danger fs-1"></i>
                                                </div>
                                                <!--end::Badge-->
                                                <!--begin::Desc-->
                                                <div class="timeline-content fw-bold text-gray-800 ps-3">New order placed
                                                    <a href="#" class="text-primary">#XF-2356</a>.
                                                </div>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="timeline-item">
                                                <!--begin::Label-->
                                                <div class="timeline-label fw-bolder text-gray-800 fs-6">10:30</div>
                                                <!--end::Label-->
                                                <!--begin::Badge-->
                                                <div class="timeline-badge">
                                                    <i class="fa fa-genderless text-success fs-1"></i>
                                                </div>
                                                <!--end::Badge-->
                                                <!--begin::Text-->
                                                <div class="timeline-content fw-mormal text-muted ps-3">Finance KPI Mobile
                                                    app launch preparion meeting</div>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Timeline-->
                                    </div>
                                    <!--end: Card Body-->
                                </div>
                                <!--end: List Widget 5-->
                            </div>
                            <div class="col-xl-4">
                                <!--begin::List Widget 3-->
                                <div class="card card-xl-stretch mb-5 mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title fw-bolder text-dark">Todo</h3>
                                        <div class="card-toolbar">
                                            <!--begin::Menu-->
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-flip="top-end">
                                                <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                                opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--begin::Menu 3-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                                data-kt-menu="true">
                                                <!--begin::Heading-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                        Payments</div>
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Create Invoice</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                            data-bs-toggle="tooltip"
                                                            title="Specify a target name for future usage and reference"></i></a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Generate Bill</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                    data-kt-menu-placement="right-end" data-kt-menu-flip="bottom, top">
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">Subscription</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Plans</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Billing</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Statements</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu separator-->
                                                        <div class="separator my-2"></div>
                                                        <!--end::Menu separator-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <div class="menu-content px-3">
                                                                <!--begin::Switch-->
                                                                <label
                                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form-check-input w-30px h-20px"
                                                                        type="checkbox" value="1" checked="checked"
                                                                        name="notifications" />
                                                                    <!--end::Input-->
                                                                    <!--end::Label-->
                                                                    <span
                                                                        class="form-check-label text-muted fs-6">Recuring</span>
                                                                    <!--end::Label-->
                                                                </label>
                                                                <!--end::Switch-->
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-1">
                                                    <a href="#" class="menu-link px-3">Settings</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 3-->
                                            <!--end::Menu-->
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-8">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-vertical h-40px bg-success"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Checkbox-->
                                            <div class="form-check form-check-custom form-check-solid mx-5">
                                                <input class="form-check-input" type="checkbox" value="" />
                                            </div>
                                            <!--end::Checkbox-->
                                            <!--begin::Description-->
                                            <div class="flex-grow-1">
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Create
                                                    FireStone Logo</a>
                                                <span class="text-muted fw-bold d-block">Due in 2 Days</span>
                                            </div>
                                            <!--end::Description-->
                                            <span class="badge badge-light-success fs-8 fw-bolder">New</span>
                                        </div>
                                        <!--end:Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-8">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-vertical h-40px bg-primary"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Checkbox-->
                                            <div class="form-check form-check-custom form-check-solid mx-5">
                                                <input class="form-check-input" type="checkbox" value="" />
                                            </div>
                                            <!--end::Checkbox-->
                                            <!--begin::Description-->
                                            <div class="flex-grow-1">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fw-bolder fs-6">Stakeholder
                                                    Meeting</a>
                                                <span class="text-muted fw-bold d-block">Due in 3 Days</span>
                                            </div>
                                            <!--end::Description-->
                                            <span class="badge badge-light-primary fs-8 fw-bolder">New</span>
                                        </div>
                                        <!--end:Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-8">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-vertical h-40px bg-warning"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Checkbox-->
                                            <div class="form-check form-check-custom form-check-solid mx-5">
                                                <input class="form-check-input" type="checkbox" value="" />
                                            </div>
                                            <!--end::Checkbox-->
                                            <!--begin::Description-->
                                            <div class="flex-grow-1">
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Scoping
                                                    &amp; Estimations</a>
                                                <span class="text-muted fw-bold d-block">Due in 5 Days</span>
                                            </div>
                                            <!--end::Description-->
                                            <span class="badge badge-light-warning fs-8 fw-bolder">New</span>
                                        </div>
                                        <!--end:Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-8">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-vertical h-40px bg-primary"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Checkbox-->
                                            <div class="form-check form-check-custom form-check-solid mx-5">
                                                <input class="form-check-input" type="checkbox" value="" />
                                            </div>
                                            <!--end::Checkbox-->
                                            <!--begin::Description-->
                                            <div class="flex-grow-1">
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">KPI App
                                                    Showcase</a>
                                                <span class="text-muted fw-bold d-block">Due in 2 Days</span>
                                            </div>
                                            <!--end::Description-->
                                            <span class="badge badge-light-primary fs-8 fw-bolder">New</span>
                                        </div>
                                        <!--end:Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-8">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-vertical h-40px bg-danger"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Checkbox-->
                                            <div class="form-check form-check-custom form-check-solid mx-5">
                                                <input class="form-check-input" type="checkbox" value="" />
                                            </div>
                                            <!--end::Checkbox-->
                                            <!--begin::Description-->
                                            <div class="flex-grow-1">
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Project
                                                    Meeting</a>
                                                <span class="text-muted fw-bold d-block">Due in 12 Days</span>
                                            </div>
                                            <!--end::Description-->
                                            <span class="badge badge-light-danger fs-8 fw-bolder">New</span>
                                        </div>
                                        <!--end:Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Bullet-->
                                            <span class="bullet bullet-vertical h-40px bg-success"></span>
                                            <!--end::Bullet-->
                                            <!--begin::Checkbox-->
                                            <div class="form-check form-check-custom form-check-solid mx-5">
                                                <input class="form-check-input" type="checkbox" value="" />
                                            </div>
                                            <!--end::Checkbox-->
                                            <!--begin::Description-->
                                            <div class="flex-grow-1">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fw-bolder fs-6">Customers
                                                    Update</a>
                                                <span class="text-muted fw-bold d-block">Due in 1 week</span>
                                            </div>
                                            <!--end::Description-->
                                            <span class="badge badge-light-success fs-8 fw-bolder">New</span>
                                        </div>
                                        <!--end:Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end:List Widget 3-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="g-5 gx-xxl-8">
                            <!--begin::Tables Widget 10-->
                            <div class="card">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">New Products</span>
                                        <span class="text-muted mt-1 fw-bold fs-7">Over 500 new products</span>
                                    </h3>
                                    <div class="card-toolbar">
                                        <!--begin::Menu-->
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                            data-kt-menu-flip="top-end">
                                            <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                            opacity="0.3" />
                                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                            opacity="0.3" />
                                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                            opacity="0.3" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                        <!--begin::Menu 2-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator mb-3 opacity-75"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">New Ticket</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">New Customer</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                data-kt-menu-placement="right-start" data-kt-menu-flip="bottom, top">
                                                <!--begin::Menu item-->
                                                <a href="#" class="menu-link px-3">
                                                    <span class="menu-title">New Group</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--end::Menu item-->
                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Admin Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Staff Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Member Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">New Contact</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator mt-3 opacity-75"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content px-3 py-3">
                                                    <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 2-->
                                        <!--end::Menu-->
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="border-0">
                                                    <th class="p-0"></th>
                                                    <th class="p-0 min-w-150px"></th>
                                                    <th class="p-0 min-w-200px"></th>
                                                    <th class="p-0 min-w-150px"></th>
                                                    <th class="p-0 min-w-100px text-end"></th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-45px me-5">
                                                                <img alt="Pic" src="assets/media/avatars/150-1.jpg" />
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Name-->
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Emma
                                                                    Smith</a>
                                                                <a href="#"
                                                                    class="text-muted text-hover-primary fw-bold text-muted d-block fs-7">
                                                                    <span class="text-dark">Email</span>:
                                                                    e.smith@kpmg.com.au</a>
                                                            </div>
                                                            <!--end::Name-->
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$560,000</a>
                                                        <span
                                                            class="text-muted fw-bold text-muted d-block fs-7">Paid</span>
                                                    </td>
                                                    <td class="text-muted fw-bold text-end">Laravel, Metronic</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-light-success">Approved</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path
                                                                            d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                            fill="#000000" />
                                                                        <path
                                                                            d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                            fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <path
                                                                        d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                        fill="#000000" fill-rule="nonzero"
                                                                        transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                    <path
                                                                        d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                            <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path
                                                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                            fill="#000000" fill-rule="nonzero" />
                                                                        <path
                                                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                            fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-45px me-5">
                                                                <span
                                                                    class="symbol-label bg-light-danger text-danger fw-bolder">M</span>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Name-->
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Melody
                                                                    Macy</a>
                                                                <a href="#"
                                                                    class="text-muted text-hover-primary fw-bold text-muted d-block fs-7">
                                                                    <span class="text-dark">Email</span>:
                                                                    melody@altbox.com</a>
                                                            </div>
                                                            <!--end::Name-->
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$2,000,000</a>
                                                        <span
                                                            class="text-muted fw-bold text-muted d-block fs-7">Paid</span>
                                                    </td>
                                                    <td class="text-muted fw-bold text-end">ReactJs, HTML</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-light-warning">In Progress</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path
                                                                            d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                            fill="#000000" />
                                                                        <path
                                                                            d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                            fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <path
                                                                        d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                        fill="#000000" fill-rule="nonzero"
                                                                        transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                    <path
                                                                        d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                            <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path
                                                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                            fill="#000000" fill-rule="nonzero" />
                                                                        <path
                                                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                            fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-45px me-5">
                                                                <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Name-->
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Max
                                                                    Smith</a>
                                                                <a href="#"
                                                                    class="text-muted text-hover-primary fw-bold text-muted d-block fs-7">
                                                                    <span class="text-dark">Email</span>:
                                                                    max@kt.com</a>
                                                            </div>
                                                            <!--end::Name-->
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$760,000</a>
                                                        <span
                                                            class="text-muted fw-bold text-muted d-block fs-7">Paid</span>
                                                    </td>
                                                    <td class="text-muted fw-bold text-end">Python, MySQL</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-light-danger">Success</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path
                                                                            d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                            fill="#000000" />
                                                                        <path
                                                                            d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                            fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <path
                                                                        d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                        fill="#000000" fill-rule="nonzero"
                                                                        transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                    <path
                                                                        d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                            <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path
                                                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                            fill="#000000" fill-rule="nonzero" />
                                                                        <path
                                                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                            fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-45px me-5">
                                                                <img alt="Pic" src="assets/media/avatars/150-4.jpg" />
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Name-->
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Sean
                                                                    Bean</a>
                                                                <a href="#"
                                                                    class="text-muted text-hover-primary fw-bold text-muted d-block fs-7">
                                                                    <span class="text-dark">Email</span>:
                                                                    sean@dellito.com</a>
                                                            </div>
                                                            <!--end::Name-->
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$257,000</a>
                                                        <span
                                                            class="text-muted fw-bold text-muted d-block fs-7">Paid</span>
                                                    </td>
                                                    <td class="text-muted fw-bold text-end">ReactJS, Ruby</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-light-info">Rejected</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path
                                                                            d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                            fill="#000000" />
                                                                        <path
                                                                            d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                            fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <path
                                                                        d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                        fill="#000000" fill-rule="nonzero"
                                                                        transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                    <path
                                                                        d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                            <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path
                                                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                            fill="#000000" fill-rule="nonzero" />
                                                                        <path
                                                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                            fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-45px me-5">
                                                                <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Name-->
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Brian
                                                                    Cox</a>
                                                                <a href="#"
                                                                    class="text-muted text-hover-primary fw-bold text-muted d-block fs-7">
                                                                    <span class="text-dark">Email</span>:
                                                                    brian@exchange.com</a>
                                                            </div>
                                                            <!--end::Name-->
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$560,000</a>
                                                        <span
                                                            class="text-muted fw-bold text-muted d-block fs-7">Paid</span>
                                                    </td>
                                                    <td class="text-muted fw-bold text-end">AngularJS, C#</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-light-primary">In Progress</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path
                                                                            d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                            fill="#000000" />
                                                                        <path
                                                                            d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                            fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <path
                                                                        d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                        fill="#000000" fill-rule="nonzero"
                                                                        transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                    <path
                                                                        d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                            <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path
                                                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                            fill="#000000" fill-rule="nonzero" />
                                                                        <path
                                                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                            fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 10-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">2021©</span>
                            <a href="https://keenthemes.com" target="_blank"
                                class="text-gray-800 text-hover-primary">Keenthemes</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                            <li class="menu-item">
                                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                            </li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--begin::Drawers-->
    <!--begin::Activities drawer-->
    <div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities"
        data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'lg': '900px'}"
        data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_activities_toggle"
        data-kt-drawer-close="#kt_activities_close">
        <div class="card shadow-none rounded-0">
            <!--begin::Header-->
            <div class="card-header" id="kt_activities_header">
                <h3 class="card-title fw-bolder text-dark">Activity Logs</h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5"
                        id="kt_activities_close">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                    fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.5"
                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                        x="0" y="7" width="16" height="2" rx="1" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body position-relative" id="kt_activities_body">
                <!--begin::Content-->
                <div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5" data-kt-scroll="true"
                    data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_activities_body"
                    data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer" data-kt-scroll-offset="5px">
                    <!--begin::Timeline items-->
                    <div class="timeline">
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Chat2.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <polygon fill="#000000" opacity="0.3" points="5 15 3 21.5 9.5 19.5" />
                                            <path
                                                d="M13.5,21 C8.25329488,21 4,16.7467051 4,11.5 C4,6.25329488 8.25329488,2 13.5,2 C18.7467051,2 23,6.25329488 23,11.5 C23,16.7467051 18.7467051,21 13.5,21 Z M9,8 C8.44771525,8 8,8.44771525 8,9 C8,9.55228475 8.44771525,10 9,10 L18,10 C18.5522847,10 19,9.55228475 19,9 C19,8.44771525 18.5522847,8 18,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 C8,13.5522847 8.44771525,14 9,14 L14,14 C14.5522847,14 15,13.5522847 15,13 C15,12.4477153 14.5522847,12 14,12 L9,12 Z"
                                                fill="#000000" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-bold mb-2">There are 2 new tasks for you in “AirPlus Mobile APp”
                                        project:</div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
                                            <img src="assets/media/avatars/150-11.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                                <!--begin::Timeline details-->
                                <div class="overflow-auto pb-5">
                                    <!--begin::Record-->
                                    <div
                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">
                                        <!--begin::Title-->
                                        <a href="#"
                                            class="fs-5 text-dark text-hover-primary fw-bold w-375px min-w-200px">Meeting
                                            with customer</a>
                                        <!--end::Title-->
                                        <!--begin::Label-->
                                        <div class="min-w-175px pe-2">
                                            <span class="badge badge-light text-muted">Application Design</span>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Users-->
                                        <div class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px pe-2">
                                            <!--begin::User-->
                                            <div class="symbol symbol-circle symbol-25px">
                                                <img src="assets/media/avatars/150-3.jpg" alt="img" />
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="symbol symbol-circle symbol-25px">
                                                <img src="assets/media/avatars/150-11.jpg" alt="img" />
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="symbol symbol-circle symbol-25px">
                                                <div class="symbol-label fs-8 fw-bold bg-primary text-inverse-primary">A
                                                </div>
                                            </div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Users-->
                                        <!--begin::Progress-->
                                        <div class="min-w-125px pe-2">
                                            <span class="badge badge-light-primary">In Progress</span>
                                        </div>
                                        <!--end::Progress-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Record-->
                                    <!--begin::Record-->
                                    <div
                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0">
                                        <!--begin::Title-->
                                        <a href="#"
                                            class="fs-5 text-dark text-hover-primary fw-bold w-375px min-w-200px">Project
                                            Delivery Preparation</a>
                                        <!--end::Title-->
                                        <!--begin::Label-->
                                        <div class="min-w-175px">
                                            <span class="badge badge-light text-muted">CRM System Development</span>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Users-->
                                        <div class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px">
                                            <!--begin::User-->
                                            <div class="symbol symbol-circle symbol-25px">
                                                <img src="assets/media/avatars/150-5.jpg" alt="img" />
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="symbol symbol-circle symbol-25px">
                                                <div class="symbol-label fs-8 fw-bold bg-success text-inverse-primary">B
                                                </div>
                                            </div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Users-->
                                        <!--begin::Progress-->
                                        <div class="min-w-125px">
                                            <span class="badge badge-light-success">Completed</span>
                                        </div>
                                        <!--end::Progress-->
                                        <!--begin::Action-->
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Record-->
                                </div>
                                <!--end::Timeline details-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Thumbtack.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <path
                                                d="M11.6734943,8.3307728 L14.9993074,6.09979492 L14.1213255,5.22181303 C13.7308012,4.83128874 13.7308012,4.19812376 14.1213255,3.80759947 L15.535539,2.39338591 C15.9260633,2.00286161 16.5592283,2.00286161 16.9497526,2.39338591 L22.6066068,8.05024016 C22.9971311,8.44076445 22.9971311,9.07392943 22.6066068,9.46445372 L21.1923933,10.8786673 C20.801869,11.2691916 20.168704,11.2691916 19.7781797,10.8786673 L18.9002333,10.0007208 L16.6692373,13.3265608 C16.9264145,14.2523264 16.9984943,15.2320236 16.8664372,16.2092466 L16.4344698,19.4058049 C16.360509,19.9531149 15.8568695,20.3368403 15.3095595,20.2628795 C15.0925691,20.2335564 14.8912006,20.1338238 14.7363706,19.9789938 L5.02099894,10.2636221 C4.63047465,9.87309784 4.63047465,9.23993286 5.02099894,8.84940857 C5.17582897,8.69457854 5.37719743,8.59484594 5.59418783,8.56552292 L8.79074617,8.13355557 C9.76799113,8.00149544 10.7477104,8.0735815 11.6734943,8.3307728 Z"
                                                fill="#000000" />
                                            <polygon fill="#000000" opacity="0.3"
                                                transform="translate(7.050253, 17.949747) rotate(-315.000000) translate(-7.050253, -17.949747)"
                                                points="5.55025253 13.9497475 5.55025253 19.6640332 7.05025253 21.9497475 8.55025253 19.6640332 8.55025253 13.9497475" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n2">
                                <!--begin::Timeline heading-->
                                <div class="overflow-auto pe-3">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-bold mb-2">Invitation for crafting engaging designs that speak
                                        human workshop</div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Sent at 4:23 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Alan Nilson">
                                            <img src="assets/media/avatars/150-2.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotone/General/Attachment2.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z"
                                                    fill="#000000" opacity="0.3"
                                                    transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641)" />
                                                <path
                                                    d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z"
                                                    fill="#000000"
                                                    transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359)" />
                                                <path
                                                    d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z"
                                                    fill="#000000" opacity="0.3"
                                                    transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146)" />
                                                <path
                                                    d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z"
                                                    fill="#000000" opacity="0.3"
                                                    transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961)" />
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="mb-5 pe-3">
                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">3 New Incoming
                                        Project Files:</a>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Sent at 10:30 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Jan Hummer">
                                            <img src="assets/media/avatars/150-6.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                                <!--begin::Timeline details-->
                                <div class="overflow-auto pb-5">
                                    <div
                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                            <!--begin::Icon-->
                                            <img alt="" class="w-30px me-3" src="assets/media/svg/files/pdf.svg" />
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="ms-1 fw-bold">
                                                <!--begin::Desc-->
                                                <a href="#" class="fs-6 text-hover-primary fw-bolder">Finance KPI App
                                                    Guidelines</a>
                                                <!--end::Desc-->
                                                <!--begin::Number-->
                                                <div class="text-gray-400">1.9mb</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--begin::Info-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                            <!--begin::Icon-->
                                            <img alt="" class="w-30px me-3" src="assets/media/svg/files/doc.svg" />
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="ms-1 fw-bold">
                                                <!--begin::Desc-->
                                                <a href="#" class="fs-6 text-hover-primary fw-bolder">Client UAT Testing
                                                    Results</a>
                                                <!--end::Desc-->
                                                <!--begin::Number-->
                                                <div class="text-gray-400">18kb</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-aligns-center">
                                            <!--begin::Icon-->
                                            <img alt="" class="w-30px me-3" src="assets/media/svg/files/css.svg" />
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="ms-1 fw-bold">
                                                <!--begin::Desc-->
                                                <a href="#" class="fs-6 text-hover-primary fw-bolder">Finance Reports</a>
                                                <!--end::Desc-->
                                                <!--begin::Number-->
                                                <div class="text-gray-400">20mb</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Icon-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                </div>
                                <!--end::Timeline details-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                    fill="#000000" />
                                                <rect fill="#000000" opacity="0.3"
                                                    transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                    x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-bold mb-2">Task
                                        <a href="#" class="text-primary fw-bolder me-1">#45890</a>merged with
                                        <a href="#" class="text-primary fw-bolder me-1">#45890</a>in “Ads Pro Admin
                                        Dashboard project:
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Initiated at 4:23 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
                                            <img src="assets/media/avatars/150-11.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <path
                                                d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                fill="#000000" fill-rule="nonzero"
                                                transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                            <path
                                                d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-bold mb-2">3 new application design concepts added:</div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Created at 4:23 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Marcus Dotson">
                                            <img src="assets/media/avatars/150-3.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                                <!--begin::Timeline details-->
                                <div class="overflow-auto pb-5">
                                    <div
                                        class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
                                        <!--begin::Item-->
                                        <div class="overlay me-10">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper">
                                                <img alt="img" class="rounded w-200px"
                                                    src="assets/media/demos/demo1.png" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Link-->
                                            <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                            </div>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="overlay me-10">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper">
                                                <img alt="img" class="rounded w-200px"
                                                    src="assets/media/demos/demo2.png" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Link-->
                                            <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                            </div>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="overlay">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper">
                                                <img alt="img" class="rounded w-200px"
                                                    src="assets/media/demos/demo3.png" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Link-->
                                            <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                            </div>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                </div>
                                <!--end::Timeline details-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Urgent-mail.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <path
                                                d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z"
                                                fill="#000000" opacity="0.3" />
                                            <path
                                                d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z"
                                                fill="#000000" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-bold mb-2">New case
                                        <a href="#" class="text-primary fw-bolder me-1">#67890</a>is assigned to you in
                                        Multi-platform Database Design project
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="overflow-auto pb-5">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center mt-1 fs-6">
                                            <!--begin::Info-->
                                            <div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>
                                            <!--end::Info-->
                                            <!--begin::User-->
                                            <a href="#" class="text-primary fw-bolder me-1">Alice Tan</a>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <path
                                                d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                fill="#000000" fill-rule="nonzero"
                                                transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                            <path
                                                d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mb-10 mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-bold mb-2">You have received a new order:</div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Placed at 5:05 AM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip"
                                            data-bs-boundary="window" data-bs-placement="top" title="Robert Rich">
                                            <img src="assets/media/avatars/150-14.jpg" alt="img" />
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                                <!--begin::Timeline details-->
                                <div class="overflow-auto pb-5">
                                    <!--begin::Notice-->
                                    <div
                                        class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotone/Code/Git4.svg-->
                                        <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <path
                                                    d="M6,7 C7.1045695,7 8,6.1045695 8,5 C8,3.8954305 7.1045695,3 6,3 C4.8954305,3 4,3.8954305 4,5 C4,6.1045695 4.8954305,7 6,7 Z M6,9 C3.790861,9 2,7.209139 2,5 C2,2.790861 3.790861,1 6,1 C8.209139,1 10,2.790861 10,5 C10,7.209139 8.209139,9 6,9 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                                <path
                                                    d="M7,11.4648712 L7,17 C7,18.1045695 7.8954305,19 9,19 L15,19 L15,21 L9,21 C6.790861,21 5,19.209139 5,17 L5,8 L5,7 L7,7 L7,8 C7,9.1045695 7.8954305,10 9,10 L15,10 L15,12 L9,12 C8.27142571,12 7.58834673,11.8052114 7,11.4648712 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M18,22 C19.1045695,22 20,21.1045695 20,20 C20,18.8954305 19.1045695,18 18,18 C16.8954305,18 16,18.8954305 16,20 C16,21.1045695 16.8954305,22 18,22 Z M18,24 C15.790861,24 14,22.209139 14,20 C14,17.790861 15.790861,16 18,16 C20.209139,16 22,17.790861 22,20 C22,22.209139 20.209139,24 18,24 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                                <path
                                                    d="M18,13 C19.1045695,13 20,12.1045695 20,11 C20,9.8954305 19.1045695,9 18,9 C16.8954305,9 16,9.8954305 16,11 C16,12.1045695 16.8954305,13 18,13 Z M18,15 C15.790861,15 14,13.209139 14,11 C14,8.790861 15.790861,7 18,7 C20.209139,7 22,8.790861 22,11 C22,13.209139 20.209139,15 18,15 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                            <!--begin::Content-->
                                            <div class="mb-3 mb-md-0 fw-bold">
                                                <h4 class="text-gray-900 fw-bolder">Database Backup Process Completed!</h4>
                                                <div class="fs-6 text-gray-700 pe-7">Login into Metronic Admin Dashboard to
                                                    make sure the data integrity is OK</div>
                                            </div>
                                            <!--end::Content-->
                                            <!--begin::Action-->
                                            <a href="#"
                                                class="btn btn-primary px-6 align-self-center text-nowrap">Proceed</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Timeline details-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                <div class="symbol-label bg-light">
                                    <!--begin::Svg Icon | path: icons/duotone/Shopping/Cart4.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path opacity="0.25"
                                                d="M3.19406 11.1644C3.09247 10.5549 3.56251 10 4.18045 10H19.8195C20.4375 10 20.9075 10.5549 20.8059 11.1644L19.4178 19.4932C19.1767 20.9398 17.9251 22 16.4586 22H7.54138C6.07486 22 4.82329 20.9398 4.58219 19.4932L3.19406 11.1644Z"
                                                fill="#7E8299" />
                                            <path
                                                d="M2 9.5C2 8.67157 2.67157 8 3.5 8H20.5C21.3284 8 22 8.67157 22 9.5C22 10.3284 21.3284 11 20.5 11H3.5C2.67157 11 2 10.3284 2 9.5Z"
                                                fill="#7E8299" />
                                            <path
                                                d="M10 13C9.44772 13 9 13.4477 9 14V18C9 18.5523 9.44772 19 10 19C10.5523 19 11 18.5523 11 18V14C11 13.4477 10.5523 13 10 13Z"
                                                fill="#7E8299" />
                                            <path
                                                d="M14 13C13.4477 13 13 13.4477 13 14V18C13 18.5523 13.4477 19 14 19C14.5523 19 15 18.5523 15 18V14C15 13.4477 14.5523 13 14 13Z"
                                                fill="#7E8299" />
                                            <g opacity="0.25">
                                                <path
                                                    d="M10.7071 3.70711C11.0976 3.31658 11.0976 2.68342 10.7071 2.29289C10.3166 1.90237 9.68342 1.90237 9.29289 2.29289L4.29289 7.29289C3.90237 7.68342 3.90237 8.31658 4.29289 8.70711C4.68342 9.09763 5.31658 9.09763 5.70711 8.70711L10.7071 3.70711Z"
                                                    fill="#7E8299" />
                                                <path
                                                    d="M13.2929 3.70711C12.9024 3.31658 12.9024 2.68342 13.2929 2.29289C13.6834 1.90237 14.3166 1.90237 14.7071 2.29289L19.7071 7.29289C20.0976 7.68342 20.0976 8.31658 19.7071 8.70711C19.3166 9.09763 18.6834 9.09763 18.2929 8.70711L13.2929 3.70711Z"
                                                    fill="#7E8299" />
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content mt-n1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-bold mb-2">New order
                                        <a href="#" class="text-primary fw-bolder me-1">#67890</a>is placed for Workshow
                                        Planning &amp; Budget Estimation
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7">Placed at 4:23 PM by</div>
                                        <!--end::Info-->
                                        <!--begin::User-->
                                        <a href="#" class="text-primary fw-bolder me-1">Jimmy Bold</a>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                    </div>
                    <!--end::Timeline items-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer py-5 text-center" id="kt_activities_footer">
                <a href="../../demo6/dist/pages/profile/activity.html" class="btn btn-bg-body text-primary">View All
                    Activities
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <rect fill="#000000" opacity="0.5"
                                    transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)"
                                    x="7.5" y="7.5" width="2" height="9" rx="1" />
                                <path
                                    d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                    fill="#000000" fill-rule="nonzero"
                                    transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
            </div>
            <!--end::Footer-->
        </div>
    </div>
    <!--end::Activities drawer-->
    <!--begin::Exolore drawer toggle-->
    <button id="kt_explore_toggle"
        class="btn btn-sm btn-white btn-active-primary shadow-sm position-fixed px-5 fw-bolder zindex-2 top-50 mt-10 end-0 transform-90 fs-6 rounded-top-0"
        title="Explore Metronic" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
        <span id="kt_explore_toggle_label">Explore</span>
    </button>
    <!--end::Exolore drawer toggle-->
    <!--begin::Exolore drawer-->
    <div id="kt_explore" class="bg-white" data-kt-drawer="true" data-kt-drawer-name="explore"
        data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'lg': '375px'}"
        data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_explore_toggle" data-kt-drawer-close="#kt_explore_close">
        <!--begin::Card-->
        <div class="card shadow-none w-100">
            <!--begin::Header-->
            <div class="card-header" id="kt_explore_header">
                <h3 class="card-title fw-bolder text-gray-700">Explore Metronic</h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5"
                        id="kt_explore_close">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                    fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.5"
                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                        x="0" y="7" width="16" height="2" rx="1" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body" id="kt_explore_body">
                <!--begin::Content-->
                <div id="kt_explore_scroll" class="scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto"
                    data-kt-scroll-wrappers="#kt_explore_body"
                    data-kt-scroll-dependencies="#kt_explore_header, #kt_explore_footer" data-kt-scroll-offset="5px">
                    <!--begin::Demos-->
                    <div class="mb-0">
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo1</h3>
                            <div class="overlay overflow-hidden border border-4 p-2 rounded">
                                <div class="overlay-wrapper rounded">
                                    <img src="assets/media/demos/demo1.png" alt="demo" class="w-100 rounded" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <a href="https://preview.keenthemes.com/metronic8/demo1"
                                        class="btn btn-primary shadow">Preview</a>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo2</h3>
                            <div class="overlay overflow-hidden border border-4 p-2 rounded">
                                <div class="overlay-wrapper rounded">
                                    <img src="assets/media/demos/demo2.png" alt="demo" class="w-100 rounded" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <a href="https://preview.keenthemes.com/metronic8/demo2"
                                        class="btn btn-primary shadow">Preview</a>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo3</h3>
                            <div class="overlay overflow-hidden border border-4 p-2 rounded">
                                <div class="overlay-wrapper rounded">
                                    <img src="assets/media/demos/demo3.png" alt="demo" class="w-100 rounded" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <a href="https://preview.keenthemes.com/metronic8/demo3"
                                        class="btn btn-primary shadow">Preview</a>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo4</h3>
                            <div class="overlay overflow-hidden border border-4 p-2 rounded">
                                <div class="overlay-wrapper rounded">
                                    <img src="assets/media/demos/demo4.png" alt="demo" class="w-100 rounded" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <a href="https://preview.keenthemes.com/metronic8/demo4"
                                        class="btn btn-primary shadow">Preview</a>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo5</h3>
                            <div class="overlay overflow-hidden border border-4 p-2 rounded">
                                <div class="overlay-wrapper rounded">
                                    <img src="assets/media/demos/demo5.png" alt="demo" class="w-100 rounded" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <a href="https://preview.keenthemes.com/metronic8/demo5"
                                        class="btn btn-primary shadow">Preview</a>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo6</h3>
                            <div class="overlay overflow-hidden border border-4 border-primary p-2 rounded">
                                <div class="overlay-wrapper rounded">
                                    <img src="assets/media/demos/demo6.png" alt="demo" class="w-100 rounded" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <a href="https://preview.keenthemes.com/metronic8/demo6"
                                        class="btn btn-primary shadow">Preview</a>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo7</h3>
                            <div class="overlay overflow-hidden border border-4 p-2 rounded">
                                <div class="overlay-wrapper rounded">
                                    <img src="assets/media/demos/demo7.png" alt="demo" class="w-100 rounded" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <a href="https://preview.keenthemes.com/metronic8/demo7"
                                        class="btn btn-primary shadow">Preview</a>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo8</h3>
                            <div class="overlay overflow-hidden border border-4 p-2 rounded">
                                <div class="overlay-wrapper">
                                    <img src="assets/media/demos/demo8.png" alt="demo" class="w-100 rounded opacity-75" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming soon</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo9</h3>
                            <div class="overlay overflow-hidden border border-4 p-2 rounded">
                                <div class="overlay-wrapper">
                                    <img src="assets/media/demos/demo9.png" alt="demo" class="w-100 rounded opacity-75" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming soon</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo10</h3>
                            <div class="overlay overflow-hidden border border-4 p-2 rounded">
                                <div class="overlay-wrapper">
                                    <img src="assets/media/demos/demo10.png" alt="demo"
                                        class="w-100 rounded opacity-75" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming soon</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo11</h3>
                            <div class="overlay overflow-hidden border border-4 p-2 rounded">
                                <div class="overlay-wrapper">
                                    <img src="assets/media/demos/demo11.png" alt="demo"
                                        class="w-100 rounded opacity-75" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming soon</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo12</h3>
                            <div class="overlay overflow-hidden border border-4 p-2 rounded">
                                <div class="overlay-wrapper">
                                    <img src="assets/media/demos/demo12.png" alt="demo"
                                        class="w-100 rounded opacity-75" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming soon</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo13</h3>
                            <div class="overlay overflow-hidden border border-4 p-2 rounded">
                                <div class="overlay-wrapper">
                                    <img src="assets/media/demos/demo13.png" alt="demo"
                                        class="w-100 rounded opacity-75" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming soon</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo14</h3>
                            <div class="overlay overflow-hidden border border-4 p-2 rounded">
                                <div class="overlay-wrapper">
                                    <img src="assets/media/demos/demo14.png" alt="demo"
                                        class="w-100 rounded opacity-75" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming soon</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo15</h3>
                            <div class="overlay overflow-hidden border border-4 p-2 rounded">
                                <div class="overlay-wrapper">
                                    <img src="assets/media/demos/demo15.png" alt="demo"
                                        class="w-100 rounded opacity-75" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming soon</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                        <!--begin::Demo-->
                        <div class="mb-7">
                            <h3 class="fw-bold text-center mb-3">Demo16</h3>
                            <div class="overlay overflow-hidden border border-4 p-2 rounded">
                                <div class="overlay-wrapper">
                                    <img src="assets/media/demos/demo16.png" alt="demo"
                                        class="w-100 rounded opacity-75" />
                                </div>
                                <div class="overlay-layer bg-dark bg-opacity-10">
                                    <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming soon</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Demo-->
                    </div>
                    <!--end::Demos-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer py-5 text-center" id="kt_explore_footer">
                <a href="https://1.envato.market/EA4JP" class="btn btn-primary">Purchase Metronic</a>
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Exolore drawer-->
    <!--begin::Chat drawer-->
    <div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat"
        data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}"
        data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_chat_toggle"
        data-kt-drawer-close="#kt_drawer_chat_close">
        <!--begin::Messenger-->
        <div class="card w-100 rounded-0" id="kt_drawer_chat_messenger">
            <!--begin::Card header-->
            <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
                <!--begin::Title-->
                <div class="card-title">
                    <!--begin::User-->
                    <div class="d-flex justify-content-center flex-column me-3">
                        <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian Cox</a>
                        <!--begin::Info-->
                        <div class="mb-0 lh-1">
                            <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                            <span class="fs-7 fw-bold text-muted">Active</span>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Menu-->
                    <div class="me-2">
                        <button class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                            <i class="bi bi-three-dots fs-3"></i>
                        </button>
                        <!--begin::Menu 3-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                            data-kt-menu="true">
                            <!--begin::Heading-->
                            <div class="menu-item px-3">
                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Contacts</div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_users_search">Add Contact</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_invite_friends">Invite Contacts
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="Specify a contact email to send an invitation"></i></a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start"
                                data-kt-menu-flip="left, center, top">
                                <a href="#" class="menu-link px-3">
                                    <span class="menu-title">Groups</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <!--begin::Menu sub-->
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon">Create Group</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon">Invite Members</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon">Settings</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu sub-->
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-1">
                                <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                    title="Coming soon">Settings</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu 3-->
                    </div>
                    <!--end::Menu-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                    fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.5"
                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                        x="0" y="7" width="16" height="2" rx="1" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body" id="kt_drawer_chat_messenger_body">
                <!--begin::Messages-->
                <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true"
                    data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                    data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer"
                    data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                    <span class="text-muted fs-7 mb-1">2 mins</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">How likely are you to recommend our company to your friends
                                and family ?</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(out)-->
                    <div class="d-flex justify-content-end mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">5 mins</span>
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text">Hey there, we’re just writing to let you know that you’ve
                                been subscribed to a repository on GitHub.</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(out)-->
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                    <span class="text-muted fs-7 mb-1">1 Hour</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">Ok, Understood!</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(out)-->
                    <div class="d-flex justify-content-end mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">2 Hours</span>
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text">You’ll receive notifications for all issues, pull requests!
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(out)-->
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                    <span class="text-muted fs-7 mb-1">3 Hours</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">You can unwatch this repository immediately by clicking here:
                                <a href="https://keenthemes.com">Keenthemes.com</a>
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(out)-->
                    <div class="d-flex justify-content-end mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">4 Hours</span>
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text">Most purchased Business courses during this sale!</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(out)-->
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                    <span class="text-muted fs-7 mb-1">5 Hours</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">Company BBQ to celebrate the last quater achievements and
                                goals. Food and drinks provided</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(template for out)-->
                    <div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">Just now</span>
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text"></div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(template for out)-->
                    <!--begin::Message(template for in)-->
                    <div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                    <span class="text-muted fs-7 mb-1">Just now</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">Right before vacation season we have the next Big Deal for
                                you.</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(template for in)-->
                </div>
                <!--end::Messages-->
            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
                <!--begin::Input-->
                <textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input"
                    placeholder="Type a message"></textarea>
                <!--end::Input-->
                <!--begin:Toolbar-->
                <div class="d-flex flex-stack">
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center me-2">
                        <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                            data-bs-toggle="tooltip" title="Coming soon">
                            <i class="bi bi-paperclip fs-3"></i>
                        </button>
                        <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                            data-bs-toggle="tooltip" title="Coming soon">
                            <i class="bi bi-upload fs-3"></i>
                        </button>
                    </div>
                    <!--end::Actions-->
                    <!--begin::Send-->
                    <button class="btn btn-primary" type="button" data-kt-element="send">Send</button>
                    <!--end::Send-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card footer-->
        </div>
        <!--end::Messenger-->
    </div>
    <!--end::Chat drawer-->
    <!--end::Drawers-->
    <!--begin::Modals-->
    <!--begin::Modal - Create App-->
    <div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Create App</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                    fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.5"
                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                        x="0" y="7" width="16" height="2" rx="1" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-lg-10 px-lg-10">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                        id="kt_modal_create_app_stepper">
                        <!--begin::Aside-->
                        <div
                            class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
                            <!--begin::Nav-->
                            <div class="stepper-nav ps-lg-10">
                                <!--begin::Step 1-->
                                <div class="stepper-item current" data-kt-stepper-element="nav">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">1</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Details</h3>
                                        <div class="stepper-desc">Name your App</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 1-->
                                <!--begin::Step 2-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">2</span>
                                    </div>
                                    <!--begin::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Frameworks</h3>
                                        <div class="stepper-desc">Define your app framework</div>
                                    </div>
                                    <!--begin::Label-->
                                </div>
                                <!--end::Step 2-->
                                <!--begin::Step 3-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">3</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Database</h3>
                                        <div class="stepper-desc">Select the app database type</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 3-->
                                <!--begin::Step 4-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">4</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Billing</h3>
                                        <div class="stepper-desc">Provide payment details</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 4-->
                                <!--begin::Step 5-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <!--begin::Line-->
                                    <div class="stepper-line w-40px"></div>
                                    <!--end::Line-->
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="stepper-check fas fa-check"></i>
                                        <span class="stepper-number">5</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Release</h3>
                                        <div class="stepper-desc">Review and Submit</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Step 5-->
                            </div>
                            <!--end::Nav-->
                        </div>
                        <!--begin::Aside-->
                        <!--begin::Content-->
                        <div class="flex-row-fluid py-lg-5 px-lg-15">
                            <!--begin::Form-->
                            <form class="form" novalidate="novalidate" id="kt_modal_create_app_form">
                                <!--begin::Step 1-->
                                <div class="current" data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                                <span class="required">App Name</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify your unique app name"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                name="name" placeholder="" value="" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-4">
                                                <span class="required">Category</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Select your app category"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin:Options-->
                                            <div class="fv-row">
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin:Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-primary">
                                                                <!--begin::Svg Icon | path: icons/duotone/Home/Globe.svg-->
                                                                <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24" />
                                                                            <path
                                                                                d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z"
                                                                                fill="#000000" fill-rule="nonzero" />
                                                                            <circle fill="#000000" opacity="0.3" cx="12"
                                                                                cy="10" r="6" />
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">Quick Online Courses</span>
                                                            <span class="fs-7 text-muted">Creating a clear text structure
                                                                is just one SEO</span>
                                                        </span>
                                                        <!--end:Info-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" name="category"
                                                            value="1" />
                                                    </span>
                                                    <!--end:Input-->
                                                </label>
                                                <!--end::Option-->
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin:Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-danger">
                                                                <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                                                <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="5" y="5" width="5" height="5" rx="1"
                                                                                fill="#000000" />
                                                                            <rect x="14" y="5" width="5" height="5" rx="1"
                                                                                fill="#000000" opacity="0.3" />
                                                                            <rect x="5" y="14" width="5" height="5" rx="1"
                                                                                fill="#000000" opacity="0.3" />
                                                                            <rect x="14" y="14" width="5" height="5" rx="1"
                                                                                fill="#000000" opacity="0.3" />
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">Face to Face Discussions</span>
                                                            <span class="fs-7 text-muted">Creating a clear text structure
                                                                is just one aspect</span>
                                                        </span>
                                                        <!--end:Info-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" name="category"
                                                            value="2" />
                                                    </span>
                                                    <!--end:Input-->
                                                </label>
                                                <!--end::Option-->
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin:Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-success">
                                                                <!--begin::Svg Icon | path: icons/duotone/Devices/Watch1.svg-->
                                                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <path
                                                                            d="M9,8 C8.44771525,8 8,8.44771525 8,9 L8,15 C8,15.5522847 8.44771525,16 9,16 L15,16 C15.5522847,16 16,15.5522847 16,15 L16,9 C16,8.44771525 15.5522847,8 15,8 L9,8 Z M9,6 L15,6 C16.6568542,6 18,7.34314575 18,9 L18,15 C18,16.6568542 16.6568542,18 15,18 L9,18 C7.34314575,18 6,16.6568542 6,15 L6,9 C6,7.34314575 7.34314575,6 9,6 Z"
                                                                            fill="#000000" fill-rule="nonzero" />
                                                                        <path
                                                                            d="M9,8 C8.44771525,8 8,8.44771525 8,9 L8,15 C8,15.5522847 8.44771525,16 9,16 L15,16 C15.5522847,16 16,15.5522847 16,15 L16,9 C16,8.44771525 15.5522847,8 15,8 L9,8 Z"
                                                                            fill="#000000" opacity="0.3" />
                                                                        <path
                                                                            d="M9,18 L15,18 L15,20.5 C15,21.3284271 14.3284271,22 13.5,22 L10.5,22 C9.67157288,22 9,21.3284271 9,20.5 L9,18 Z"
                                                                            fill="#000000" opacity="0.3" />
                                                                        <path
                                                                            d="M10.5,2 L13.5,2 C14.3284271,2 15,2.67157288 15,3.5 L15,6 L9,6 L9,3.5 C9,2.67157288 9.67157288,2 10.5,2 Z"
                                                                            fill="#000000" opacity="0.3" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">Full Intro Training</span>
                                                            <span class="fs-7 text-muted">Creating a clear text structure
                                                                copywriting</span>
                                                        </span>
                                                        <!--end:Info-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" name="category"
                                                            value="3" />
                                                    </span>
                                                    <!--end:Input-->
                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <!--end:Options-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Step 1-->
                                <!--begin::Step 2-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-4">
                                                <span class="required">Select Framework</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify your apps framework"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer mb-5">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin:Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-warning">
                                                            <i class="fab fa-html5 text-warning fs-2x"></i>
                                                        </span>
                                                    </span>
                                                    <!--end:Icon-->
                                                    <!--begin:Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6">HTML5</span>
                                                        <span class="fs-7 text-muted">Base Web Projec</span>
                                                    </span>
                                                    <!--end:Info-->
                                                </span>
                                                <!--end:Label-->
                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" checked="checked"
                                                        name="framework" value="1" />
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer mb-5">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin:Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-success">
                                                            <i class="fab fa-react text-success fs-2x"></i>
                                                        </span>
                                                    </span>
                                                    <!--end:Icon-->
                                                    <!--begin:Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6">ReactJS</span>
                                                        <span class="fs-7 text-muted">Robust and flexible app
                                                            framework</span>
                                                    </span>
                                                    <!--end:Info-->
                                                </span>
                                                <!--end:Label-->
                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="framework"
                                                        value="2" />
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer mb-5">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin:Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-danger">
                                                            <i class="fab fa-angular text-danger fs-2x"></i>
                                                        </span>
                                                    </span>
                                                    <!--end:Icon-->
                                                    <!--begin:Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6">Angular</span>
                                                        <span class="fs-7 text-muted">Powerful data mangement</span>
                                                    </span>
                                                    <!--end:Info-->
                                                </span>
                                                <!--end:Label-->
                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="framework"
                                                        value="3" />
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer">
                                                <!--begin:Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin:Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-primary">
                                                            <i class="fab fa-vuejs text-primary fs-2x"></i>
                                                        </span>
                                                    </span>
                                                    <!--end:Icon-->
                                                    <!--begin:Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6">Vue</span>
                                                        <span class="fs-7 text-muted">Lightweight and responsive
                                                            framework</span>
                                                    </span>
                                                    <!--end:Info-->
                                                </span>
                                                <!--end:Label-->
                                                <!--begin:Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="framework"
                                                        value="4" />
                                                </span>
                                                <!--end:Input-->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Step 2-->
                                <!--begin::Step 3-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Database Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                name="dbname" placeholder="" value="master_db" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-4">
                                                <span class="required">Select Database Engine</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Select your app database engine"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer mb-5">
                                                <!--begin::Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin::Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-success">
                                                            <i class="fas fa-database text-success fs-2x"></i>
                                                        </span>
                                                    </span>
                                                    <!--end::Icon-->
                                                    <!--begin::Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6">MySQL</span>
                                                        <span class="fs-7 text-muted">Basic MySQL database</span>
                                                    </span>
                                                    <!--end::Info-->
                                                </span>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="dbengine"
                                                        checked="checked" value="1" />
                                                </span>
                                                <!--end::Input-->
                                            </label>
                                            <!--end::Option-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer mb-5">
                                                <!--begin::Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin::Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-danger">
                                                            <i class="fab fa-google text-danger fs-2x"></i>
                                                        </span>
                                                    </span>
                                                    <!--end::Icon-->
                                                    <!--begin::Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6">Firebase</span>
                                                        <span class="fs-7 text-muted">Google based app data
                                                            management</span>
                                                    </span>
                                                    <!--end::Info-->
                                                </span>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="dbengine"
                                                        value="2" />
                                                </span>
                                                <!--end::Input-->
                                            </label>
                                            <!--end::Option-->
                                            <!--begin:Option-->
                                            <label class="d-flex flex-stack cursor-pointer">
                                                <!--begin::Label-->
                                                <span class="d-flex align-items-center me-2">
                                                    <!--begin::Icon-->
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-warning">
                                                            <i class="fab fa-amazon text-warning fs-2x"></i>
                                                        </span>
                                                    </span>
                                                    <!--end::Icon-->
                                                    <!--begin::Info-->
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bolder fs-6">DynamoDB</span>
                                                        <span class="fs-7 text-muted">Amazon Fast NoSQL Database</span>
                                                    </span>
                                                    <!--end::Info-->
                                                </span>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="dbengine"
                                                        value="3" />
                                                </span>
                                                <!--end::Input-->
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Step 3-->
                                <!--begin::Step 4-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                <span class="required">Name On Card</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a card holder's name"></i>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="card_name" value="Max Doe" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-bold form-label mb-2">Card Number</label>
                                            <!--end::Label-->
                                            <!--begin::Input wrapper-->
                                            <div class="position-relative">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    placeholder="Enter card number" name="card_number"
                                                    value="4111 1111 1111 1111" />
                                                <!--end::Input-->
                                                <!--begin::Card logos-->
                                                <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                                    <img src="assets/media/svg/card-logos/visa.svg" alt=""
                                                        class="h-25px" />
                                                    <img src="assets/media/svg/card-logos/mastercard.svg" alt=""
                                                        class="h-25px" />
                                                    <img src="assets/media/svg/card-logos/american-express.svg" alt=""
                                                        class="h-25px" />
                                                </div>
                                                <!--end::Card logos-->
                                            </div>
                                            <!--end::Input wrapper-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-10">
                                            <!--begin::Col-->
                                            <div class="col-md-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-bold form-label mb-2">Expiration
                                                    Date</label>
                                                <!--end::Label-->
                                                <!--begin::Row-->
                                                <div class="row fv-row">
                                                    <!--begin::Col-->
                                                    <div class="col-6">
                                                        <select name="card_expiry_month"
                                                            class="form-select form-select-solid" data-control="select2"
                                                            data-hide-search="true" data-placeholder="Month">
                                                            <option></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-6">
                                                        <select name="card_expiry_year"
                                                            class="form-select form-select-solid" data-control="select2"
                                                            data-hide-search="true" data-placeholder="Year">
                                                            <option></option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2027">2027</option>
                                                            <option value="2028">2028</option>
                                                            <option value="2029">2029</option>
                                                            <option value="2030">2030</option>
                                                            <option value="2031">2031</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                    <span class="required">CVV</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                        data-bs-toggle="tooltip" title="Enter a card CVV code"></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid"
                                                        minlength="3" maxlength="4" placeholder="CVV" name="card_cvv" />
                                                    <!--end::Input-->
                                                    <!--begin::CVV icon-->
                                                    <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                                        <!--begin::Svg Icon | path: icons/duotone/Shopping/Credit-card.svg-->
                                                        <span class="svg-icon svg-icon-2hx">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <rect fill="#000000" opacity="0.3" x="2" y="5"
                                                                        width="20" height="14" rx="2" />
                                                                    <rect fill="#000000" x="2" y="8" width="20"
                                                                        height="3" />
                                                                    <rect fill="#000000" opacity="0.3" x="16" y="14"
                                                                        width="4" height="2" rx="1" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::CVV icon-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Label-->
                                            <div class="me-5">
                                                <label class="fs-6 fw-bold form-label">Save Card for further
                                                    billing?</label>
                                                <div class="fs-7 fw-bold text-muted">If you need more info, please check
                                                    budget planning</div>
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    checked="checked" />
                                                <span class="form-check-label fw-bold text-muted">Save Card</span>
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Step 4-->
                                <!--begin::Step 5-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100 text-center">
                                        <!--begin::Heading-->
                                        <h1 class="fw-bolder text-dark mb-3">Release!</h1>
                                        <!--end::Heading-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-bold fs-3">Submit your app to kickstart your project.
                                        </div>
                                        <!--end::Description-->
                                        <!--begin::Illustration-->
                                        <div class="text-center px-4 py-15">
                                            <img src="assets/media/illustrations/todo.png" alt=""
                                                class="mw-100 mh-150px" />
                                        </div>
                                        <!--end::Illustration-->
                                    </div>
                                </div>
                                <!--end::Step 5-->
                                <!--begin::Actions-->
                                <div class="d-flex flex-stack pt-10">
                                    <!--begin::Wrapper-->
                                    <div class="me-2">
                                        <button type="button" class="btn btn-lg btn-light-primary me-3"
                                            data-kt-stepper-action="previous">
                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Left-2.svg-->
                                            <span class="svg-icon svg-icon-3 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <rect fill="#000000" opacity="0.3"
                                                            transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000)"
                                                            x="14" y="7" width="2" height="10" rx="1" />
                                                        <path
                                                            d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Back
                                        </button>
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Wrapper-->
                                    <div>
                                        <button type="button" class="btn btn-lg btn-primary"
                                            data-kt-stepper-action="submit">
                                            <span class="indicator-label">Submit
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                                                <span class="svg-icon svg-icon-3 ms-2 me-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <rect fill="#000000" opacity="0.5"
                                                                transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)"
                                                                x="7.5" y="7.5" width="2" height="9" rx="1" />
                                                            <path
                                                                d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button type="button" class="btn btn-lg btn-primary"
                                            data-kt-stepper-action="next">Continue
                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                                            <span class="svg-icon svg-icon-3 ms-1 me-0">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <rect fill="#000000" opacity="0.5"
                                                            transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)"
                                                            x="7.5" y="7.5" width="2" height="9" rx="1" />
                                                        <path
                                                            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Stepper-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Create App-->
    <!--begin::Modal - Select Location-->
    <div class="modal fade" id="kt_modal_select_location" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog mw-1000px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Title-->
                    <h2>Select Location</h2>
                    <!--end::Title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                    fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.5"
                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                        x="0" y="7" width="16" height="2" rx="1" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body">
                    <div id="kt_modal_select_location_map" class="w-100 rounded" style="height:450px"></div>
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer d-flex justify-content-end">
                    <a href="#" class="btn btn-active-light me-5" data-bs-dismiss="modal">Cancel</a>
                    <button type="button" id="kt_modal_select_location_button" class="btn btn-primary"
                        data-bs-dismiss="modal">Apply</button>
                </div>
                <!--end::Modal footer-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Select Location-->
    <!--end::Modals-->
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
    <script src="{{ asset('assets/js/finance-division/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/finance-division/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/finance-division/chat.js') }}"></script>
    <script src="{{ asset('assets/js/finance-division/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/finance-division/upgrade-plan.js') }}"></script>
@endpush
