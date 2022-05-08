@extends('layouts.app-findir')

@section('title', 'Cash Journal | Finance Director')

@section('page-title') <a href="{{ route('findir.cash-index') }}" class="text-dark text-hover-primary">Cash Journal</a>
@endsection

@section('sub-page-title', 'Cash Transaction List')

@section('active-icon', 'active-sidebar-icon')

@section('active-link', 'active-sidebar-link')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container" id="kt_content_container">
            <!--begin::Card-->
            @livewire('finance-director.filter-index-cash')
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
                            <h2 class="fw-bolder">Export Cash Transaction</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal"
                                aria-label="Close">
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
                            <form action="{{ route('findir.cash-export') }}" method="POST" id="export" autocomplete="off">
                                @csrf
                                <!--begin::Input group-->
                                <div class="fv-row mb-5">
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
                                <!--begin::Input group-->
                                <div class="fv-row mb-5">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-3">Date Range:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Pick a date range"
                                        id="datefilterex" name="datefilterex" type="text">
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-5">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-3">Referral:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-control form-select account-multipleex" data-pharaonic="select2"
                                        id="accountsex" name="accountsex[]" multiple="multiple">
                                        @foreach ($accountex as $a)
                                            <option value="{{ $a->id }}">
                                                {{ $a->referral }} -
                                                {{ $a->name }} </option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-5">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-3">PIC:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-control form-select pic-multipleex" data-pharaonic="select2"
                                        id="picsex" name="picsex[]" multiple="multiple">
                                        @foreach ($picex as $p)
                                            <option value="{{ $p->pic }}">
                                                {{ $p->pic }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-5">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-3">Paid To:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-control form-select paidto-multipleex" data-pharaonic="select2"
                                        id="paidtosex" name="paidtosex[]" multiple="multiple">
                                        @foreach ($paidtoex as $pt)
                                            <option value="{{ $pt->paid_to }}">
                                                {{ $pt->paid_to }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-3">Project:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-control form-select project-multipleex" data-pharaonic="select2"
                                        id="projectsex" name="projectsex[]" multiple="multiple">
                                        @foreach ($projectex as $p)
                                            @if (!empty($p->transactionProject))
                                                <option value="{{ $p->transactionProject->id }}">
                                                    {{ $p->transactionProject->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="text-center">
                                    <button type="reset" class="btn btn-light me-3" id="kt_subscriptions_export_cancel"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" id="kt_subscriptions_export_submit">
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
    <script src="{{ asset('assets/js/finance-director/export.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ asset('vendor/pharaonic/pharaonic.select2.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('input[name="datefilterex"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                },
                autoApply: true,
                autoClose: true,
            }).on('click', function() {
                $('.daterangepicker').click(function(e) {
                    e.stopPropagation();
                });
            });
            $('input[name="datefilterex"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' -> ' + picker.endDate.format(
                    'YYYY-MM-DD'));
            })
            $('input[name="datefilterex"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.account-multipleex').select2({
                placeholder: "Select account",
                closeOnSelect: true,
                allowClear: true,
            });
        });
        $('.account-multipleex').on("select2:unselect", function(e) {
            if (!e.params.originalEvent) {
                return
            }
            e.params.originalEvent.stopPropagation();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.pic-multipleex').select2({
                placeholder: "Select PIC",
                closeOnSelect: true,
                allowClear: true,
            });
        });
        $('.pic-multipleex').on("select2:unselect", function(e) {
            if (!e.params.originalEvent) {
                return
            }
            e.params.originalEvent.stopPropagation();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.paidto-multipleex').select2({
                placeholder: "Select Paid To",
                closeOnSelect: true,
                allowClear: true,
            });
        });
        $('.paidto-multipleex').on("select2:unselect", function(e) {
            if (!e.params.originalEvent) {
                return
            }
            e.params.originalEvent.stopPropagation();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.project-multipleex').select2({
                placeholder: "Select project",
                closeOnSelect: true,
                allowClear: true,
            });
        });
        $('.project-multipleex').on("select2:unselect", function(e) {
            if (!e.params.originalEvent) {
                return
            }
            e.params.originalEvent.stopPropagation();
        });
    </script>
    <script>
        $(window).ready(function() {
            $('#export').submit(function(e) {
                $(".indicator-label").hide();
                $(".indicator-progress").show();

                setTimeout(function() {
                    $(".indicator-label").show();
                    $(".indicator-progress").hide();
                }, 2000);
            });
        })
    </script>
@endpush
