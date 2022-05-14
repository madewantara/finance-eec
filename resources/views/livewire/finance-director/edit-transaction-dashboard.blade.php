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
    @endif
    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <div class="col-xl-4">
            <!--begin::Statistics Widget 5-->
            <a href="{{ route('findir.cash-index') }}" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotone/Shopping/Cart3.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <i class="bi bi-cash-stack" style="font-size: 3rem; color:#fff;"></i>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-inverse-danger fw-bolder fs-2 mb-2 mt-5">Cash Journal</div>
                    <div class="fw-bold text-inverse-danger fs-6">Balance : Rp.
                        {{ number_format($cashBalance->balance, 0, ',', '.') }}</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
        <div class="col-xl-4">
            <!--begin::Statistics Widget 5-->
            <a href="{{ route('findir.operational-index') }}"
                class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotone/Home/Building.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <i class="bi bi-bank" style="font-size: 3rem; color:#fff;"></i>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-inverse-primary fw-bolder fs-2 mb-2 mt-5">Mandiri Operational Journal</div>
                    <div class="fw-bold text-inverse-primary fs-6">Balance : Rp.
                        {{ number_format($optBalance->balance, 0, ',', '.') }}</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
        </div>
        <div class="col-xl-4">
            <!--begin::Statistics Widget 5-->
            <a href="{{ route('findir.escrow-index') }}"
                class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotone/Shopping/Chart-bar1.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <i class="bi bi-bank2" style="font-size: 3rem; color:#fff;"></i>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-inverse-success fw-bolder fs-2 mb-2 mt-5">Mandiri Escrow Journal</div>
                    <div class="fw-bold text-inverse-success fs-6">Balance : Rp.
                        {{ number_format($escBalance->balance, 0, ',', '.') }}</div>
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
                <div class="card-header border-0 pt-5 pb-2">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-4 mb-1">Cash Journal Overview</span>
                        <span class="text-muted fw-bold fs-7">Journal statistics</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0 d-flex flex-column">
                    <div class="scroll-y me-3 pe-5 h-400px" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-offset="5px">
                        <!--begin::Stats-->
                        <div class="card-p pt-3 bg-body flex-grow-1">
                            <!--begin::Row-->
                            <div class="row g-0">
                                <!--begin::Col-->
                                <div class="col mr-8">
                                    <!--begin::Label-->
                                    <div class="fs-7 text-warning fw-bold">Pending</div>
                                    <!--end::Label-->
                                    <!--begin::Stat-->
                                    <div class="fs-4 fw-bolder">{{ count($cashTransPen) }}
                                    </div>
                                    <!--end::Stat-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col">
                                    <!--begin::Label-->
                                    <div class="fs-7 fw-bold text-success">Approved</div>
                                    <!--end::Label-->
                                    <!--begin::Stat-->
                                    <div class="fs-4 fw-bolder ">{{ count($cashTransAcc) }}</div>
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
                                    <div class="fs-7 text-danger fw-bold">Rejected</div>
                                    <!--end::Label-->
                                    <!--begin::Stat-->
                                    <div class="fs-4 fw-bolder">{{ count($cashTransRej) }}</div>
                                    <!--end::Stat-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col">
                                    <!--begin::Label-->
                                    <div class="fs-7 text-primary fw-bold">Paid</div>
                                    <!--end::Label-->
                                    <!--begin::Stat-->
                                    <div class="fs-4 fw-bolder">{{ count($cashTransPaid) }}</div>
                                    <!--end::Stat-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <div class="mt-10">
                                <h3 class="card-title align-items-start d-flex flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Action Needed</span>
                                    <span class="text-muted fw-bold fs-7">Transaction that need to be approved or
                                        rejected by
                                        finance director</span>
                                </h3>
                            </div>
                            <!--begin::Items-->
                            <div class="mt-5">
                                @if (count($needApprovedCash) == 0)
                                    <div class="container d-flex align-items-center justify-content-center h-125px">
                                        <div class="text-muted fw-bolder fst-italic mt-5 text-center">
                                            There are no transactions to approve or reject
                                        </div>
                                    </div>
                                @else
                                    @foreach ($needApprovedCash as $npc)
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack mb-5">
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center me-2">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-50px me-3">
                                                    <div class="symbol-label bg-light">
                                                        <i class="bi bi-exclamation-circle-fill text-warning fs-1"></i>
                                                    </div>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div>
                                                    <a href="#"
                                                        class="fs-6 text-gray-800 text-hover-primary fw-bolder">{{ $npc->token }}</a>
                                                    <div class="fs-7 text-muted fw-bold mt-1">Rp.
                                                        {{ number_format($npc->credit, 0, ',', '.') }}
                                                    </div>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Label-->
                                            <button type="button" wire:click="editCash('{{ $npc->uuid }}')"
                                                class="btn btn-light-primary menu-link w-100 py-2 mt-3 ms-10 justify-content-center text-primary text-hover-white fs-8"
                                                style="font-weight: 500;">Approval</button>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                        <div wire:ignore.self class="modal fade" id="approvalCashTrans"
                                            tabindex="-1" aria-labelledby="approvalCashTrans" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Approval Cash Transaction</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form wire:submit.prevent="approveCashTrans"
                                                            id="approveCashTrans" autocomplete="off">

                                                            <div
                                                                class="fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                                                <!--begin::Row-->
                                                                <div class="row">
                                                                    <!--begin::Col-->
                                                                    <div class="col-lg-6 mb-3">
                                                                        <!--begin::Option-->
                                                                        <input type="radio" class="btn-check"
                                                                            name="approveAct"
                                                                            id="kt_create_report_form_approval_approve_cash"
                                                                            value="2" wire:model.defer="approveAct"
                                                                            @if ($this->approveAct == 2) checked="checked" @endif>
                                                                        <label
                                                                            class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex flex-column align-items-center"
                                                                            for="kt_create_report_form_approval_approve_cash">
                                                                            <span class="mb-5">
                                                                                <i class="bi bi-journal-check"
                                                                                    style="font-size: 5rem; color: #50cd89;"></i>
                                                                            </span>
                                                                            <!--begin::Info-->
                                                                            <span class="d-block fw-bold text-center">
                                                                                <span
                                                                                    class="text-dark fw-bolder d-block fs-4 mb-1">Approved</span>
                                                                                <span
                                                                                    class="text-muted fw-bold fs-6">This
                                                                                    action
                                                                                    cannot be undone.</span>
                                                                            </span>
                                                                            <!--end::Info-->
                                                                        </label>
                                                                        <!--end::Option-->
                                                                    </div>
                                                                    <!--end::Col-->
                                                                    <!--begin::Col-->
                                                                    <div class="col-lg-6">
                                                                        <!--begin::Option-->
                                                                        <input type="radio" class="btn-check"
                                                                            name="approveAct"
                                                                            id="kt_create_report_form_approval_reject_cash"
                                                                            value="5" wire:model.defer="approveAct"
                                                                            @if ($this->approveAct == 5) checked="checked" @endif>
                                                                        <label
                                                                            class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex flex-column align-items-center"
                                                                            for="kt_create_report_form_approval_reject_cash">
                                                                            <span class="mb-5">
                                                                                <i class="bi bi-journal-x"
                                                                                    style="font-size: 5rem; color: #f1416c;"></i>
                                                                            </span>
                                                                            <!--begin::Info-->
                                                                            <span class="d-block fw-bold text-center">
                                                                                <span
                                                                                    class="text-dark fw-bolder d-block fs-4 mb-1">Rejected</span>
                                                                                <span
                                                                                    class="text-muted fw-bold fs-6">This
                                                                                    action
                                                                                    cannot be undone.</span>
                                                                            </span>
                                                                            <!--end::Info-->
                                                                        </label>
                                                                        <!--end::Option-->
                                                                    </div>
                                                                    <!--end::Col-->
                                                                </div>
                                                                <!--end::Row-->
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            form="approveCashTrans">
                                                            <span class="indicator-label">Submit</span>
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
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Stats-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 3-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Mixed Widget 4-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Beader-->
                <div class="card-header border-0 pt-5 pb-2">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-4 mb-1">Mandiri Operational Journal Overview</span>
                        <span class="text-muted fw-bold fs-7">Journal statistics</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0 d-flex flex-column">
                    <div class="scroll-y me-3 pe-5 h-400px" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-offset="5px">
                        <!--begin::Stats-->
                        <div class="card-p pt-3 bg-body flex-grow-1">
                            <!--begin::Row-->
                            <div class="row g-0">
                                <!--begin::Col-->
                                <div class="col mr-8">
                                    <!--begin::Label-->
                                    <div class="fs-7 text-warning fw-bold">Pending</div>
                                    <!--end::Label-->
                                    <!--begin::Stat-->
                                    <div class="fs-4 fw-bolder">{{ count($optTransPen) }}
                                    </div>
                                    <!--end::Stat-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col">
                                    <!--begin::Label-->
                                    <div class="fs-7 fw-bold text-success">Approved</div>
                                    <!--end::Label-->
                                    <!--begin::Stat-->
                                    <div class="fs-4 fw-bolder ">{{ count($optTransAcc) }}</div>
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
                                    <div class="fs-7 text-danger fw-bold">Rejected</div>
                                    <!--end::Label-->
                                    <!--begin::Stat-->
                                    <div class="fs-4 fw-bolder">{{ count($optTransRej) }}</div>
                                    <!--end::Stat-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col">
                                    <!--begin::Label-->
                                    <div class="fs-7 text-primary fw-bold">Paid</div>
                                    <!--end::Label-->
                                    <!--begin::Stat-->
                                    <div class="fs-4 fw-bolder">{{ count($optTransPaid) }}</div>
                                    <!--end::Stat-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <div class="mt-10">
                                <h3 class="card-title align-items-start d-flex flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Action Needed</span>
                                    <span class="text-muted fw-bold fs-7">Transaction that need to be approved or
                                        rejected by
                                        finance director</span>
                                </h3>
                            </div>
                            <!--begin::Items-->
                            <div class="mt-5">
                                @if (count($needApprovedOpt) == 0)
                                    <div class="container d-flex align-items-center justify-content-center h-125px">
                                        <div class="text-muted fw-bolder fst-italic mt-5 text-center">
                                            There are no transactions to approve or reject
                                        </div>
                                    </div>
                                @else
                                    @foreach ($needApprovedOpt as $npo)
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack mb-5">
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center me-2">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-50px me-3">
                                                    <div class="symbol-label bg-light">
                                                        <i class="bi bi-exclamation-circle-fill text-warning fs-1"></i>
                                                    </div>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div>
                                                    <a href="#"
                                                        class="fs-6 text-gray-800 text-hover-primary fw-bolder">{{ $npo->token }}</a>
                                                    <div class="fs-7 text-muted fw-bold mt-1">Rp.
                                                        {{ number_format($npo->credit, 0, ',', '.') }}
                                                    </div>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Label-->
                                            <button type="button" wire:click="editOperational('{{ $npo->uuid }}')"
                                                class="btn btn-light-primary menu-link w-100 py-2 mt-3 ms-10 justify-content-center text-primary text-hover-white fs-8"
                                                style="font-weight: 500;">Approval</button>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                        <div wire:ignore.self class="modal fade" id="approvalOperationalTrans"
                                            tabindex="-1" aria-labelledby="approvalOperationalTrans" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Approval Mandiri Operational
                                                            Transaction</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form wire:submit.prevent="approveOperationalTrans"
                                                            id="approveOperationalTrans" autocomplete="off">

                                                            <div
                                                                class="fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                                                <!--begin::Row-->
                                                                <div class="row">
                                                                    <!--begin::Col-->
                                                                    <div class="col-lg-6 mb-3">
                                                                        <!--begin::Option-->
                                                                        <input type="radio" class="btn-check"
                                                                            name="approveAct"
                                                                            id="kt_create_report_form_approval_approve_opt"
                                                                            value="2" wire:model.defer="approveAct"
                                                                            @if ($this->approveAct == 2) checked="checked" @endif>
                                                                        <label
                                                                            class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex flex-column align-items-center"
                                                                            for="kt_create_report_form_approval_approve_opt">
                                                                            <span class="mb-5">
                                                                                <i class="bi bi-journal-check"
                                                                                    style="font-size: 5rem; color: #50cd89;"></i>
                                                                            </span>
                                                                            <!--begin::Info-->
                                                                            <span class="d-block fw-bold text-center">
                                                                                <span
                                                                                    class="text-dark fw-bolder d-block fs-4 mb-1">Approved</span>
                                                                                <span
                                                                                    class="text-muted fw-bold fs-6">This
                                                                                    action
                                                                                    cannot be undone.</span>
                                                                            </span>
                                                                            <!--end::Info-->
                                                                        </label>
                                                                        <!--end::Option-->
                                                                    </div>
                                                                    <!--end::Col-->
                                                                    <!--begin::Col-->
                                                                    <div class="col-lg-6">
                                                                        <!--begin::Option-->
                                                                        <input type="radio" class="btn-check"
                                                                            name="approveAct"
                                                                            id="kt_create_report_form_approval_reject_opt"
                                                                            value="5" wire:model.defer="approveAct"
                                                                            @if ($this->approveAct == 5) checked="checked" @endif>
                                                                        <label
                                                                            class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex flex-column align-items-center"
                                                                            for="kt_create_report_form_approval_reject_opt">
                                                                            <span class="mb-5">
                                                                                <i class="bi bi-journal-x"
                                                                                    style="font-size: 5rem; color: #f1416c;"></i>
                                                                            </span>
                                                                            <!--begin::Info-->
                                                                            <span class="d-block fw-bold text-center">
                                                                                <span
                                                                                    class="text-dark fw-bolder d-block fs-4 mb-1">Rejected</span>
                                                                                <span
                                                                                    class="text-muted fw-bold fs-6">This
                                                                                    action
                                                                                    cannot be undone.</span>
                                                                            </span>
                                                                            <!--end::Info-->
                                                                        </label>
                                                                        <!--end::Option-->
                                                                    </div>
                                                                    <!--end::Col-->
                                                                </div>
                                                                <!--end::Row-->
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            form="approveOperationalTrans">
                                                            <span class="indicator-label">Submit</span>
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
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Stats-->
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
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Beader-->
                <div class="card-header border-0 pt-5 pb-2">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-4 mb-1">Mandiri Escrow Journal Overview</span>
                        <span class="text-muted fw-bold fs-7">Journal statistics</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0 d-flex flex-column">
                    <div class="scroll-y me-3 pe-5 h-400px" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-offset="5px">
                        <!--begin::Stats-->
                        <div class="card-p pt-3 bg-body flex-grow-1">
                            <!--begin::Row-->
                            <div class="row g-0">
                                <!--begin::Col-->
                                <div class="col mr-8">
                                    <!--begin::Label-->
                                    <div class="fs-7 text-warning fw-bold">Pending</div>
                                    <!--end::Label-->
                                    <!--begin::Stat-->
                                    <div class="fs-4 fw-bolder">{{ count($escTransPen) }}
                                    </div>
                                    <!--end::Stat-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col">
                                    <!--begin::Label-->
                                    <div class="fs-7 fw-bold text-success">Approved</div>
                                    <!--end::Label-->
                                    <!--begin::Stat-->
                                    <div class="fs-4 fw-bolder ">{{ count($escTransAcc) }}</div>
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
                                    <div class="fs-7 text-danger fw-bold">Rejected</div>
                                    <!--end::Label-->
                                    <!--begin::Stat-->
                                    <div class="fs-4 fw-bolder">{{ count($escTransRej) }}</div>
                                    <!--end::Stat-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col">
                                    <!--begin::Label-->
                                    <div class="fs-7 text-primary fw-bold">Paid</div>
                                    <!--end::Label-->
                                    <!--begin::Stat-->
                                    <div class="fs-4 fw-bolder">{{ count($escTransPaid) }}</div>
                                    <!--end::Stat-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <div class="mt-10">
                                <h3 class="card-title align-items-start d-flex flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Action Needed</span>
                                    <span class="text-muted fw-bold fs-7">Transaction that need to be approved or
                                        rejected by
                                        finance director</span>
                                </h3>
                            </div>
                            <!--begin::Items-->
                            <div class="mt-5">
                                @if (count($needApprovedEsc) == 0)
                                    <div class="container d-flex align-items-center justify-content-center h-125px">
                                        <div class="text-muted fw-bolder fst-italic mt-5 text-center">
                                            There are no transactions to approve or reject
                                        </div>
                                    </div>
                                @else
                                    @foreach ($needApprovedEsc as $npe)
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack mb-5">
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center me-2">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-50px me-3">
                                                    <div class="symbol-label bg-light">
                                                        <i class="bi bi-exclamation-circle-fill text-warning fs-1"></i>
                                                    </div>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div>
                                                    <a href="#"
                                                        class="fs-6 text-gray-800 text-hover-primary fw-bolder">{{ $npe->token }}</a>
                                                    <div class="fs-7 text-muted fw-bold mt-1">Rp.
                                                        {{ number_format($npe->credit, 0, ',', '.') }}
                                                    </div>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Label-->
                                            <button type="button" wire:click="editEscrow('{{ $npe->uuid }}')"
                                                class="btn btn-light-primary menu-link w-100 py-2 mt-3 ms-10 justify-content-center text-primary text-hover-white fs-8"
                                                style="font-weight: 500;">Approval</button>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                    @endforeach
                                    <div wire:ignore.self class="modal fade" id="approvalEscrowTrans" tabindex="-1"
                                        aria-labelledby="approvalEscrowTrans" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Approval Mandiri Escrow Transaction</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form wire:submit.prevent="approveEscrowTrans"
                                                        id="approveEscrowTrans" autocomplete="off">

                                                        <div
                                                            class="fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                                            <!--begin::Row-->
                                                            <div class="row">
                                                                <!--begin::Col-->
                                                                <div class="col-lg-6 mb-3">
                                                                    <!--begin::Option-->
                                                                    <input type="radio" class="btn-check"
                                                                        name="approveAct"
                                                                        id="kt_create_report_form_approval_approve_esc"
                                                                        value="2" wire:model.defer="approveAct"
                                                                        @if ($this->approveAct == 2) checked="checked" @endif>
                                                                    <label
                                                                        class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex flex-column align-items-center"
                                                                        for="kt_create_report_form_approval_approve_esc">
                                                                        <span class="mb-5">
                                                                            <i class="bi bi-journal-check"
                                                                                style="font-size: 5rem; color: #50cd89;"></i>
                                                                        </span>
                                                                        <!--begin::Info-->
                                                                        <span class="d-block fw-bold text-center">
                                                                            <span
                                                                                class="text-dark fw-bolder d-block fs-4 mb-1">Approved</span>
                                                                            <span class="text-muted fw-bold fs-6">This
                                                                                action
                                                                                cannot be undone.</span>
                                                                        </span>
                                                                        <!--end::Info-->
                                                                    </label>
                                                                    <!--end::Option-->
                                                                </div>
                                                                <!--end::Col-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-6">
                                                                    <!--begin::Option-->
                                                                    <input type="radio" class="btn-check"
                                                                        name="approveAct"
                                                                        id="kt_create_report_form_approval_reject_esc"
                                                                        value="5" wire:model.defer="approveAct"
                                                                        @if ($this->approveAct == 5) checked="checked" @endif>
                                                                    <label
                                                                        class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex flex-column align-items-center"
                                                                        for="kt_create_report_form_approval_reject_esc">
                                                                        <span class="mb-5">
                                                                            <i class="bi bi-journal-x"
                                                                                style="font-size: 5rem; color: #f1416c;"></i>
                                                                        </span>
                                                                        <!--begin::Info-->
                                                                        <span class="d-block fw-bold text-center">
                                                                            <span
                                                                                class="text-dark fw-bolder d-block fs-4 mb-1">Rejected</span>
                                                                            <span class="text-muted fw-bold fs-6">This
                                                                                action
                                                                                cannot be undone.</span>
                                                                        </span>
                                                                        <!--end::Info-->
                                                                    </label>
                                                                    <!--end::Option-->
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Row-->
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        form="approveEscrowTrans">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Stats-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 5-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>

@push('js')
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
        window.livewire.on('openEditCashTrans', function() {
            $('#approvalCashTrans').modal('show');
        })
    </script>
    <script>
        window.livewire.on('closeCashApproval', function() {
            $('#approvalCashTrans').remove();
            $('.modal-backdrop').remove();
            $('body').removeClass("modal-open");
            $('body').css({
                "overflow-y": "scroll"
            });
            $('body').css({
                "padding-right": "0px"
            });
        })
    </script>
    <script>
        window.livewire.on('openEditOperationalTrans', function() {
            $('#approvalOperationalTrans').modal('show');
        })
    </script>
    <script>
        window.livewire.on('closeOperationalApproval', function() {
            $('#approvalOperationalTrans').remove();
            $('.modal-backdrop').remove();
            $('body').removeClass("modal-open");
            $('body').css({
                "overflow-y": "scroll"
            });
            $('body').css({
                "padding-right": "0px"
            });
        })
    </script>
    <script>
        window.livewire.on('openEditEscrowTrans', function() {
            $('#approvalEscrowTrans').modal('show');
        })
    </script>
    <script>
        window.livewire.on('closeEscrowApproval', function() {
            $('#approvalEscrowTrans').remove();
            $('.modal-backdrop').remove();
            $('body').removeClass("modal-open");
            $('body').css({
                "overflow-y": "scroll"
            });
            $('body').css({
                "padding-right": "0px"
            });
        })
    </script>
@endpush
