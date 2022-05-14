@extends('layouts.app-findiv')

@section('title', 'Account | Finance Division')

@section('page-title') <a href="{{ route('findiv.account-index') }}" class="text-dark text-hover-primary">Account</a>
@endsection

@section('sub-page-title', 'Account List')

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
        <div class="container" id="kt_content_container">
            <div class="row g-6 g-xl-9 mb-10">
                <div class="col-lg-12 col-xxl-12">
                    <!--begin::Budget-->
                    <div class="card h-100">
                        <div class="card-body p-9">
                            <div class="fs-2hx fw-bolder">{{ count($categories) }}</div>
                            <div class="fs-4 fw-bold text-gray-400 mb-7">Account by Category</div>
                            <div class="row mx-n10">
                                @if (count($categories) == 0)
                                    <div class="container d-flex align-items-center justify-content-center h-150px">
                                        <div class="text-muted fw-bolder fst-italic mt-5 text-center">
                                            There are no accounts by category
                                        </div>
                                    </div>
                                @else
                                    @foreach (array_combine($categories, $countCategory) as $cate => $countCate)
                                        <div class="col-md-6 px-10">
                                            <div class="fs-6 d-flex justify-content-between mb-4">
                                                <div class="fw-bold">{{ $cate }}</div>
                                                <div class="badge badge-light-primary">{{ $countCate }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Budget-->
            </div>

            <!--begin::Card-->
            <div class="card">
                @livewire('finance-division.filter-index-account')
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
                            <div data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                            <form id="kt_subscriptions_export_form" action="{{ route('findiv.account-export') }}"
                                method="GET" autocomplete="off">
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
                                        <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                            <input class="form-check-input check_all" type="checkbox" value=""
                                                name="exportcategory[]" />
                                            <span class="form-check-label text-gray-600 fw-bold">All</span>
                                        </label>
                                        <!--end::Radio button-->
                                        @foreach ($allCategory as $ac)
                                            <!--begin::Radio button-->
                                            <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
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
                                    <button type="reset" class="btn btn-light me-3" id="kt_subscriptions_export_cancel"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" id="submit">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
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
@endsection

@push('js')
    <script>
        $(".check_all").on("click", function() {
            if ($(this).prop('checked')) {
                $('.category').prop('checked', true);
            } else {
                $('.category').prop('checked', false);
            }
        });
    </script>
    <script>
        $(window).ready(function() {
            $('#kt_subscriptions_export_form').submit(function(e) {
                $(".indicator-label").hide();
                $(".indicator-progress").show();

                setTimeout(function() {
                    $(".indicator-label").show();
                    $(".indicator-progress").hide();
                }, 2000);
            });
        })
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 10000);
    </script>
@endpush
