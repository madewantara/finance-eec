<div>
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
    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title flex-row-fluid justify-content-start gap-5">
                <div class="w-150px mb-2">
                    <!--begin::date-->
                    <input class="form-control form-control-solid pe-3" type="text" placeholder="Search report year"
                        name="yearFil" id="yearFil" wire:model="yearFil" />
                    <!--end::date-->
                </div>
                <div class="w-150px mb-2">
                    <!--begin::Select2-->
                    <select class="form-select form-select-solid" name="reportCat" id="reportCat" wire:model="reportCat"
                        data-pharaonic="select2" data-component-id="{{ $this->id }}">
                        <option></option>
                        <option value="1">Balance Sheet</option>
                        <option value="2">Profit Ledger</option>
                    </select>
                    <!--end::Select2-->
                </div>
                <!--begin::Filter-->
                <div class="w-150px mb-2">
                    <!--begin::Select2-->
                    <select class="form-select form-select-solid" name="status" id="status" wire:model="status"
                        data-pharaonic="select2" data-component-id="{{ $this->id }}">
                        <option></option>
                        <option value="1">Pending</option>
                        <option value="2">Rejected</option>
                        <option value="3">Approved</option>
                    </select>
                    <!--end::Select2-->
                </div>
                <div class="w-150px me-3 mb-2">
                    <!--begin::Select2-->
                    <select class="form-select form-select-solid" name="type" id="type" wire:model="type"
                        data-pharaonic="select2" data-component-id="{{ $this->id }}">
                        <option></option>
                        <option value="1">Draft</option>
                        <option value="2">Posted</option>
                    </select>
                    <!--end::Select2-->
                </div>
                <!--end::Filter-->
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addReport">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                            <rect fill="#000000" opacity="0.5"
                                transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)"
                                x="4" y="11" width="16" height="2" rx="1" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Add Report
                </button>
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <div id="kt_ecommerce_report_shipping_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                        id="kt_ecommerce_report_shipping_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-100px sorting" tabindex="0" rowspan="1" colspan="1"
                                    style="width: 20%;">
                                    Report Year</th>
                                <th class="min-w-100px sorting" tabindex="0" rowspan="1" colspan="1" style="width: 25%">
                                    Report Type</th>
                                <th class="min-w-100px sorting" tabindex="0" rowspan="1" colspan="1"
                                    style="width: 15%;">
                                    Status</th>
                                <th class="text-center min-w-75px sorting" tabindex="0" rowspan="1" colspan="1"
                                    style="width: 15%;">Type</th>
                                <th class="text-end min-w-100px sorting" tabindex="0" rowspan="1" colspan="1"
                                    style="width: 5%;"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @if (count($report) == 0)
                                <tr>
                                    <td colspan="5" class="text-muted fst-italic mt-5 text-center">There are no reports
                                    </td>
                                </tr>
                            @else
                                <!--end::Table row-->
                                @foreach ($report as $index => $r)
                                    <tr>
                                        <!--begin::startDate-->
                                        <td>{{ $r->year }}</td>
                                        <!--end::startDate-->
                                        <!--begin::Report Type=-->
                                        <td>
                                            @if ($r->report_type == 1)
                                                Balance Sheet
                                            @else
                                                Profit Ledger
                                            @endif
                                        </td>
                                        <!--end::Report Type=-->
                                        <!--begin::Status=-->
                                        <td>
                                            @if ($r->status == 1)
                                                <div class="badge badge-light-warning">Pending</div>
                                            @elseif($r->status == 2)
                                                <div class="badge badge-light-danger">Rejected</div>
                                            @else
                                                <div class="badge badge-light-success">Approved</div>
                                            @endif
                                        </td>
                                        <!--end::Status-->
                                        <!--begin::Type=-->
                                        <td class="text-center">
                                            <!--begin::Badges-->
                                            @if ($r->type == 1)
                                                <div class="badge badge-light fw-bolder text-white"
                                                    style="background-color: rgb(232, 123, 51);">
                                                    Draft</div>
                                            @else
                                                <div class="badge badge-light fw-bolder text-white"
                                                    style="background-color: #3498DB;">Posted
                                                </div>
                                            @endif
                                            <!--end::Badges-->
                                        </td>
                                        <!--end::Type=-->
                                        <!--begin::Actions=-->
                                        <td class="text-end pe-0">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                                data-kt-menu-flip="top-end" style="padding: 5px 10px;">
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                                <i class="bi bi-three-dots fs-5 pe-0"></i>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('findiv.report-detail', ['uuid' => $r->uuid]) }}"
                                                        class="menu-link px-3">View</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item ps-3" style="margin-right: -1.75rem !important">
                                                    <button type="button" class="btn-delete menu-link fw-bold px-3"
                                                        wire:click="edit('{{ $r->uuid }}')">Edit</button>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 mb-2">
                                                    <button type="submit" class="btn-delete menu-link fw-bold px-3"
                                                        wire:click="confirmDelete('{{ $r->uuid }}')">Delete</button>
                                                </div>
                                                <div class="separator border-gray-200"></div>
                                                <div class="menu-item px-3">
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#exportReport{{ $index }}"
                                                        class="btn btn-light-primary menu-link w-100 py-2 mt-3 justify-content-center text-primary text-hover-white fs-7"
                                                        style="font-weight: 500;">Export</button>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                        <!--end::Actions=-->
                                    </tr>

                                    <!--Modal Export-->
                                    <div class="modal fade" id="exportReport{{ $index }}" tabindex="-1"
                                        aria-labelledby="exportReport{{ $index }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Export Format <br> <span
                                                            class="text-muted fw-bold fs-6"><b
                                                                class="text-warning">Attention!</b> Only
                                                            transaction
                                                            with 'paid' status will be calculated in report.</span></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form" id="export{{ $index }}"
                                                        action="{{ route('findiv.report-export', ['uuid' => $r->uuid]) }}"
                                                        novalidate method="post"
                                                        onkeydown="return event.key != 'Enter';" autocomplete="off">
                                                        @csrf

                                                        <input type="hidden" name="uuid" value="{{ $r->uuid }}">
                                                        <div class="fv-row row fv-plugins-icon-container">
                                                            <div class="col-md-12">
                                                                <!--begin::Options-->
                                                                <div class="mb-0">
                                                                    <!--begin:Option-->
                                                                    <label
                                                                        class="d-flex flex-stack mb-5 cursor-pointer">
                                                                        <!--begin:Label-->
                                                                        <span class="d-flex align-items-center me-2">
                                                                            <!--begin::Icon-->
                                                                            <span class="symbol symbol-50px me-6">
                                                                                <span class="symbol-label">
                                                                                    <i class="bi bi-file-earmark-pdf-fill text-danger"
                                                                                        style="font-size: 2rem;"></i>
                                                                                </span>
                                                                            </span>
                                                                            <!--end::Icon-->
                                                                            <!--begin::Description-->
                                                                            <span class="d-flex flex-column">
                                                                                <span
                                                                                    class="fw-bolder text-gray-800 text-hover-primary fs-5">PDF</span>
                                                                                <span
                                                                                    class="fs-6 fw-bold text-muted">Exported
                                                                                    report table with header
                                                                                    and
                                                                                    footer EEC
                                                                                    Indonesia
                                                                                    <b><i>(Recommended)</i></b></span>
                                                                            </span>
                                                                            <!--end:Description-->
                                                                        </span>
                                                                        <!--end:Label-->
                                                                        <!--begin:Input-->
                                                                        <span
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input" type="radio"
                                                                                checked="checked" name="export_format"
                                                                                value="pdf">
                                                                        </span>
                                                                        <!--end:Input-->
                                                                    </label>
                                                                    <!--end::Option-->
                                                                    <!--begin:Option-->
                                                                    <label
                                                                        class="d-flex flex-stack mb-0 cursor-pointer">
                                                                        <!--begin:Label-->
                                                                        <span class="d-flex align-items-center me-2">
                                                                            <!--begin::Icon-->
                                                                            <span class="symbol symbol-50px me-6">
                                                                                <span class="symbol-label">
                                                                                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
                                                                                    <span
                                                                                        class="svg-icon svg-icon-1 svg-icon-gray-600">
                                                                                        <i class="bi bi-file-earmark-spreadsheet-fill text-success"
                                                                                            style="font-size: 2rem;"></i>
                                                                                    </span>
                                                                                    <!--end::Svg Icon-->
                                                                                </span>
                                                                            </span>
                                                                            <!--end::Icon-->
                                                                            <!--begin::Description-->
                                                                            <span class="d-flex flex-column">
                                                                                <span
                                                                                    class="fw-bolder text-gray-800 text-hover-primary fs-5">Excel</span>
                                                                                <span
                                                                                    class="fs-6 fw-bold text-muted">Exported
                                                                                    only report table</span>
                                                                            </span>
                                                                            <!--end:Description-->
                                                                        </span>
                                                                        <!--end:Label-->
                                                                        <!--begin:Input-->
                                                                        <span
                                                                            class="form-check form-check-custom form-check-solid">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="export_format" value="excel">
                                                                        </span>
                                                                        <!--end:Input-->
                                                                    </label>
                                                                    <!--end::Option-->
                                                                </div>
                                                                <!--end::Options-->
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        form="export{{ $index }}">
                                                        <span class="indicator-label">Export</span>
                                                        <span class="indicator-progress">Please wait...
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </tbody>
                        <!--end::Table body-->
                    </table>
                </div>
                <div class="row">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="dataTables_length" id="kt_ecommerce_report_shipping_table_length">
                            <label><select name="kt_ecommerce_report_shipping_table_length"
                                    aria-controls="kt_ecommerce_report_shipping_table"
                                    class="form-select form-select-sm form-select-solid" wire:model="pagesize">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                </select></label>
                        </div>
                        <div class="fs-6 fw-bold text-gray-700 ms-3">Showing {{ count($report) }} of
                            {{ count($allReport) }}
                            entries
                        </div>
                    </div>
                    <div
                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="dataTables_paginate paging_simple_numbers"
                            id="kt_ecommerce_report_shipping_table_paginate">
                            {{ $report->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>

    <!-- Modal Create-->
    <div wire:ignore.self class="modal fade" id="addReport" tabindex="-1" aria-labelledby="reportModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Report Summary</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storereport" id="addreport" novalidate autocomplete="off">
                        <div class="current" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <div class="fv-row row mb-5">
                                    <div class="col-md-3 d-flex align-items-center">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2"><span class="required">Report
                                                Type</span></label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input group-->
                                        <div class="fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6 mb-3">
                                                    <!--begin::Option-->
                                                    <input type="radio"
                                                        class="btn-check @error('reportType') is-invalid @enderror"
                                                        name="report_type" value="1" checked="checked"
                                                        id="kt_create_report_form_report_type_bs"
                                                        wire:model="reportType">
                                                    <label
                                                        class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center"
                                                        for="kt_create_report_form_report_type_bs">
                                                        <span class="me-5">
                                                            <i class="bi bi-journal-bookmark-fill"
                                                                style="font-size: 2.5rem;"></i>
                                                        </span>
                                                        <!--begin::Info-->
                                                        <span class="d-block fw-bold text-start">
                                                            <span class="text-dark fw-bolder d-block fs-4 mb-2">Balance
                                                                Sheet</span>
                                                            <span class="text-muted fw-bold fs-6">Contains
                                                                information
                                                                about
                                                                <b>assets, liabilities and equity</b></span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Option-->
                                                    <input type="radio"
                                                        class="btn-check @error('reportType') is-invalid @enderror"
                                                        name="report_type" value="2"
                                                        id="kt_create_report_form_report_type_pl"
                                                        wire:model="reportType">
                                                    <label
                                                        class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center"
                                                        for="kt_create_report_form_report_type_pl">
                                                        <span class="me-5">
                                                            <i class="bi bi-cash-stack" style="font-size: 2.5rem;"></i>
                                                        </span>
                                                        <!--begin::Info-->
                                                        <span class="d-block fw-bold text-start">
                                                            <span class="text-dark fw-bolder d-block fs-4 mb-2">Profit
                                                                Ledger</span>
                                                            <span class="text-muted fw-bold fs-6">Contains
                                                                information
                                                                about
                                                                <b>revenue and expense</b></span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    @error('reportType')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--begin::Input group-->
                        <div class="fv-row row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-3 d-flex align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><span class="required">Report
                                        Year</span></label>
                                <!--end::Label-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-9" wire:ignore>
                                <!--begin::Input-->
                                <input readonly name="year" id="year" type="text"
                                    class="form-control form-control-solid mb-2 yearpicker @error('year') is-invalid @enderror"
                                    @error('year') style="border-color:#f1416c;" @enderror
                                    placeholder="Pick a report year" wire:model="year" required>
                                <!--end::Input-->
                                @error('year')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-3 d-flex align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><span class="required">Type</span></label>
                                <!--end::Label-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-9" wire:ignore>
                                <!--begin::Input-->
                                <select
                                    class="form-control form-select form-control-solid fw-bolder custom-select @error('typeReport') is-invalid @enderror"
                                    data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                    wire:model.defer="typeReport" id="typeReport" name="typeReport" required>
                                    <option value="1" selected>Draft</option>
                                    <option value="2">Posted</option>
                                </select>
                                <!--end::Input-->
                                @error('typeReport')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row row">
                            <!--begin::Col-->
                            <div class="col-md-3 d-flex align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><span class="required">Status</span></label>
                                <!--end::Label-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-9" wire:ignore>
                                <!--begin::Input-->
                                <select
                                    class="form-control form-select form-control-solid fw-bolder custom-select status-report add @error('statusReport') is-invalid @enderror"
                                    data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                    wire:model.defer="statusReport" id="statusReport" name="statusReport"
                                    style="background-color: #f5f8fa;" required disabled>
                                    <option value="1" selected>Pending</option>
                                    <option value="2">Rejected</option>
                                    <option value="3">Approved</option>
                                </select>
                                <!--end::Input-->
                                @error('statusReport')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="addreport">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit-->
    <div wire:ignore.self class="modal fade" id="updateReport" tabindex="-1" aria-labelledby="updateReport"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Report Summary</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click.prevent="cancel()"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updatereport" id="updatereport" novalidate autocomplete="off">
                        <div class="current" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <div class="fv-row row mb-5">
                                    <div class="col-md-3 d-flex align-items-center">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2"><span class="required">Report
                                                Type</span></label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input group-->
                                        <div class="fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6 mb-3">
                                                    <!--begin::Option-->
                                                    <input type="radio"
                                                        class="btn-check @error('reportType') is-invalid @enderror"
                                                        name="report_type" value="1"
                                                        id="kt_create_report_form_report_type_bs"
                                                        wire:model="reportType"
                                                        @if ($this->typeReport == 1) checked="checked" @endif>
                                                    <label
                                                        class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center"
                                                        for="kt_create_report_form_report_type_bs">
                                                        <span class="me-5">
                                                            <i class="bi bi-journal-bookmark-fill"
                                                                style="font-size: 2.5rem;"></i>
                                                        </span>
                                                        <!--begin::Info-->
                                                        <span class="d-block fw-bold text-start">
                                                            <span class="text-dark fw-bolder d-block fs-4 mb-2">Balance
                                                                Sheet</span>
                                                            <span class="text-muted fw-bold fs-6">Contains
                                                                information
                                                                about
                                                                <b>assets, liabilities and
                                                                    equity</b></span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Option-->
                                                    <input type="radio"
                                                        class="btn-check @error('reportType') is-invalid @enderror"
                                                        name="report_type" value="2"
                                                        id="kt_create_report_form_report_type_pl"
                                                        wire:model="reportType"
                                                        @if ($this->typeReport == 2) checked="checked" @endif>
                                                    <label
                                                        class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center"
                                                        for="kt_create_report_form_report_type_pl">
                                                        <span class="me-5">
                                                            <i class="bi bi-cash-stack" style="font-size: 2.5rem;"></i>
                                                        </span>
                                                        <!--begin::Info-->
                                                        <span class="d-block fw-bold text-start">
                                                            <span class="text-dark fw-bolder d-block fs-4 mb-2">Profit
                                                                Ledger</span>
                                                            <span class="text-muted fw-bold fs-6">Contains
                                                                information
                                                                about
                                                                <b>revenue and
                                                                    expense</b></span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    @error('reportType')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--begin::Input group-->
                        <div class="fv-row row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-3 d-flex align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><span class="required">Report
                                        Year</span></label>
                                <!--end::Label-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-9">
                                <!--begin::Input-->
                                <input type="hidden" wire:model="uuid">
                                <div wire:ignore>
                                    <input name="year" id="year" type="text"
                                        class="form-control form-control-solid mb-2 yearpicker @error('year') is-invalid @enderror"
                                        @error('year') style="border-color:#f1416c;" @enderror
                                        placeholder="Pick a report year" wire:model="year" required>
                                </div>
                                <!--end::Input-->
                                @error('year')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-3 d-flex align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><span class="required">Type</span></label>
                                <!--end::Label-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-9" wire:ignore>
                                <!--begin::Input-->
                                <select
                                    class="form-control form-select form-control-solid fw-bolder custom-select @error('typeReport') is-invalid @enderror"
                                    data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                    wire:model.defer="typeReport" id="typeUpdateReport" name="typeReport" required>
                                    <option value="1">
                                        Draft</option>
                                    <option value="2">
                                        Posted</option>
                                </select>
                                <!--end::Input-->
                                @error('typeReport')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row row">
                            <!--begin::Col-->
                            <div class="col-md-3 d-flex align-items-center">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><span class="required">Status</span></label>
                                <!--end::Label-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-9" wire:ignore>
                                <!--begin::Input-->
                                <select
                                    class="form-control form-select form-control-solid fw-bolder custom-select @error('statusReport') is-invalid @enderror"
                                    data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                    wire:model.defer="statusReport" id="statusUpdateReport" name="statusReport"
                                    style="background-color: #f5f8fa;" required>
                                    <option value="1">
                                        Pending
                                    </option>
                                    <option value="2" disabled>
                                        Rejected
                                    </option>
                                    <option value="3" disabled>
                                        Approved
                                    </option>
                                </select>
                                <!--end::Input-->
                                @error('statusReport')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click.prevent="cancel()">Cancel</button>
                    <button type="submit" class="btn btn-primary" form="updatereport">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script type="text/javascript" src="{{ asset('assets/js/finance-division/yearpicker.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/pharaonic/pharaonic.select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.yearpicker').yearpicker({
                onChange: function(value) {
                    @this.set('year', value, true)
                }
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDate', function() {
                $('.yearpicker').yearpicker({
                    onChange: function(value) {
                        @this.set('year', value, true)
                    }
                });
            });
        });
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);

        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshNotification', function() {
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function() {
                        $(this).remove();
                    });
                }, 5000);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#typeReport').select2({
                placeholder: "Select type",
                closeOnSelect: true,
                minimumResultsForSearch: -1,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#typeReport').select2({
                    placeholder: "Select type",
                    closeOnSelect: true,
                    minimumResultsForSearch: -1,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#statusReport').select2({
                placeholder: "Select status",
                closeOnSelect: true,
                minimumResultsForSearch: -1,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#statusReport').select2({
                    placeholder: "Select status",
                    closeOnSelect: true,
                    minimumResultsForSearch: -1,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#typeUpdateReport').select2({
                placeholder: "Select type",
                closeOnSelect: true,
                minimumResultsForSearch: -1,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#typeUpdateReport').select2({
                    placeholder: "Select type",
                    closeOnSelect: true,
                    minimumResultsForSearch: -1,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#statusUpdateReport').select2({
                placeholder: "Select status",
                closeOnSelect: true,
                minimumResultsForSearch: -1,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#statusUpdateReport').select2({
                    placeholder: "Select status",
                    closeOnSelect: true,
                    minimumResultsForSearch: -1,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#status').select2({
                placeholder: "Select status",
                closeOnSelect: true,
                allowClear: true,
                minimumResultsForSearch: -1,
                width: 'resolve',
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#status').select2({
                    placeholder: "Select status",
                    closeOnSelect: true,
                    allowClear: true,
                    minimumResultsForSearch: -1,
                    width: 'resolve',
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#type').select2({
                placeholder: "Select type",
                closeOnSelect: true,
                allowClear: true,
                minimumResultsForSearch: -1,
                width: 'resolve',
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#type').select2({
                    placeholder: "Select type",
                    closeOnSelect: true,
                    allowClear: true,
                    minimumResultsForSearch: -1,
                    width: 'resolve',
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#reportCat').select2({
                placeholder: "Select report type",
                closeOnSelect: true,
                allowClear: true,
                minimumResultsForSearch: -1,
                width: 'resolve',
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#reportCat').select2({
                    placeholder: "Select report type",
                    closeOnSelect: true,
                    allowClear: true,
                    minimumResultsForSearch: -1,
                    width: 'resolve',
                });
            });
        });
    </script>
    <script>
        window.livewire.on('closeReport', function() {
            $('#addReport').modal('hide');
        })
    </script>
    <script>
        window.livewire.on('closeReport', function() {
            $('#updateReport').modal('hide');
        })
    </script>
    <script>
        window.livewire.on('openEditReport', function() {
            $('#updateReport').modal('show');
        })
    </script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function(event) {
            @this.on('triggerDelete', uuid => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "If you delete this report, it will be permanently deleted.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#e4e6ef',
                    cancelButtonText: '<span style="color:#7e8299">Cancel</span>',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.value) {
                        @this.call('destroy', uuid)
                    }
                });
            });
        })
    </script>
@endpush
