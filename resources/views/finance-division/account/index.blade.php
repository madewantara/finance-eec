@extends('layouts.app-findiv')

@section('title', 'Account | Finance Division')

@section('page-title', 'Account')

@section('sub-page-title', 'Account List')

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
                        <!--begin::Card-->
                        <div class="card">
                            @livewire('filter-index-account')
                        </div>
                        <!--end::Card-->
                        <!--begin::Modals-->
                        <!--begin::Modal - Adjust Balance-->
                        <div class="modal fade" id="kt_subscriptions_export_modal" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bolder">Export Financial Account</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div id="kt_subscriptions_export_close"
                                            class="btn btn-icon btn-sm btn-active-icon-primary">
                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
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
                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                        <!--begin::Form-->
                                        <form id="kt_subscriptions_export_form"
                                            action="{{ route('findiv.account-export') }}" method="GET">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-bold form-label mb-5">Select Export Format:</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select data-control="select2" data-hide-search="true"
                                                    data-placeholder="Select a format" name="format"
                                                    class="form-select form-select-solid">
                                                    <option value="excel">Excel</option>
                                                    <option value="csv">CSV</option>
                                                    <option value="pdf">PDF</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Row-->
                                            <div class="row fv-row mb-15">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-bold form-label mb-5">Category:</label>
                                                <!--end::Label-->
                                                <!--begin::Radio group-->
                                                <div class="d-flex flex-column">
                                                    <!--begin::Radio button-->
                                                    <label
                                                        class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                                        <input class="form-check-input check_all" type="checkbox" value=""
                                                            name="exportcategory[]" />
                                                        <span class="form-check-label text-gray-600 fw-bold">All</span>
                                                    </label>
                                                    <!--end::Radio button-->
                                                    @foreach ($allCategory as $ac)
                                                        <!--begin::Radio button-->
                                                        <label
                                                            class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                                            <input class="form-check-input category" type="checkbox"
                                                                value="{{ $ac }}" name="exportcategory[]" />
                                                            <span
                                                                class="form-check-label text-gray-600 fw-bold">{{ $ac }}</span>
                                                        </label>
                                                        <!--end::Radio button-->
                                                    @endforeach
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Actions-->
                                            <div class="text-center">
                                                <button type="reset" class="btn btn-light me-3"
                                                    id="kt_subscriptions_export_cancel">Discard</button>
                                                <button type="submit" class="btn btn-primary"
                                                    id="kt_subscriptions_export_submit">
                                                    <span class="indicator-label">Submit</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                    </span>
                                                </button>
                                            </div>
                                            <!--end::Actions-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Modal body-->
                                </div>
                                <!--end::Modal content-->
                            </div>
                            <!--end::Modal dialog-->
                        </div>
                        <!--end::Modal - New Card-->
                        <!--end::Modals-->
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
    <script src="{{ asset('assets/js/finance-division/export.js') }}"></script>
    <script>
        $(".check_all").on("click", function() {
            if ($(this).prop('checked')) {
                $('.category').prop('checked', true);
            } else {
                $('.category').prop('checked', false);
            }
        });
    </script>
@endpush
