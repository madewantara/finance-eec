<div>
    @if (Session::has('success'))
        <div class="position-relative">
            <div class="position-fixed bottom-0 end-0" style="bottom: 2% !important; right: 1% !important; z-index:2;">
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.4" x="2" y="2" width="20" height="20"
                                rx="10" fill="currentColor"></rect>
                            <rect x="11" y="14" width="7" height="2" rx="1"
                                transform="rotate(-90 11 14)" fill="currentColor"></rect>
                            <rect x="11" y="17" width="2" height="2" rx="1"
                                transform="rotate(-90 11 17)" fill="currentColor"></rect>
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
    <div class="card mb-12">
        <!--begin::Hero body-->
        <div class="card-body flex-column p-5">
            <!--begin::Hero content-->
            <div class="d-flex align-items-center h-lg-300px p-5 p-lg-15">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column align-items-start justift-content-center flex-equal me-5">
                    <!--begin::Title-->
                    <i>
                        <h1 class="fw-bolder fs-4 fs-lg-1 text-gray-800 mb-3 mb-lg-8">Cash Balance
                        </h1>
                    </i>
                    <!--end::Title-->
                    <h1 class="text-gray-800 mb-5 mb-lg-10" style="font-size: 450%; font-weight: 400;">
                        Rp. {{ number_format($cashBalance[0]->balance, 0, ',', '.') }}
                    </h1>
                    <button data-bs-toggle="modal" data-bs-target="#update_balance"
                        class="btn btn-primary fw-bolder fs-8 fs-lg-base">Update balance</button>
                </div>
                <!--end::Wrapper-->
                <!--begin::Wrapper-->
                <div class="flex-equal d-flex justify-content-center align-items-end ms-5">
                    <!--begin::Illustration-->
                    <img src="{{ asset('assets/image/random/balance.png') }}" alt=""
                        class="mw-100 mh-125px mh-lg-275px mb-lg-n12">
                    <!--end::Illustration-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Hero content-->
        </div>
        <!--end::Hero body-->
    </div>
    <div class="modal fade" id="update_balance" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-750px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form wire:submit.prevent="submitUpdateBalance" autocomplete="off">
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Update Balance</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-gray-400 fw-bold fs-5">If you update this balance, all paid transactions
                                still substract the updated balance. But if you <b><i>change status paid to other status
                                        after updated balance, it will not substract the balance</i></b>.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Balance</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" type-currency="IDR" class="form-control form-control-solid"
                                placeholder="Enter your balance" name="balance" wire:model.defer="balance">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                            </button>
                        </div>
                        <!--end::Actions-->
                        <div></div>
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path
                                    d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                    fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-subscription-table-filter="search"
                        class="form-control form-control-solid mw-250px ps-14" wire:model="search"
                        placeholder="Search Transaction" />
                </div>
                <div class="d-flex align-items-center position-relative my-1 ms-3">
                    <select class="form-control form-select-solid form-select" name="pagesize" id="pagesize"
                        wire:model="pagesize" data-pharaonic="select2" data-component-id="{{ $this->id }}">
                        <option value="10" class="form-control form-select form-select-solid fw-bolder" selected>
                            10
                        </option>
                        <option value="25" class="form-control form-select form-select-solid fw-bolder">25
                        </option>
                        <option value="50" class="form-control form-select form-select-solid fw-bolder">50
                        </option>
                        <option value="100" class="form-control form-select form-select-solid fw-bolder">100
                        </option>
                    </select>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="flex-row-fluid justify-content-end gap-5" data-kt-subscription-table-toolbar="base">
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                        <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Filter
                    </button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-500px w-md-525px" data-kt-menu="true">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Separator-->
                        <!--begin::Content-->
                        <div class="px-7 py-5" data-kt-subscription-table-filter="form">
                            <form wire:submit.prevent="submitfiltercash" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-5">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold form-label mb-3">Date Range:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid"
                                                placeholder="Pick a date range" id="datefilter" name="datefilter"
                                                type="text" wire:model.defer="datefilter">
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-5">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold form-label mb-3">Referral:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-control form-select account-multiple"
                                                data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                                wire:model.defer="accounts" id="accounts" name="accounts[]"
                                                multiple="multiple">
                                                @foreach ($account as $a)
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
                                            <select class="form-control form-select pic-multiple"
                                                data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                                wire:model.defer="pics" id="pics" name="pics[]"
                                                multiple="multiple">
                                                @foreach ($pic as $p)
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
                                            <select class="form-control form-select paidto-multiple"
                                                data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                                wire:model.defer="paidtos" id="paidtos" name="paidtos[]"
                                                multiple="multiple">
                                                @foreach ($paidto as $pt)
                                                    <option value="{{ $pt->paid_to }}">
                                                        {{ $pt->paid_to }}</option>
                                                @endforeach
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-md-6">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-5">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold form-label mb-3">Project:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-control form-select project-multiple"
                                                data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                                wire:model.defer="projects" id="projects" name="projects[]"
                                                multiple="multiple">
                                                @foreach ($project as $p)
                                                    @if (!empty($p->transactionProject))
                                                        <option value="{{ $p->transactionProject->id }}">
                                                            @if ($p->transactionProject->category_id == 1)
                                                                Radar Upgrade
                                                            @elseif($p->transactionProject->category_id == 2)
                                                                Radar Spare Part
                                                            @elseif($p->transactionProject->category_id == 3)
                                                                Radar Reinstallation
                                                            @elseif($p->transactionProject->category_id == 4)
                                                                Preventive Maintenance
                                                            @elseif($p->transactionProject->category_id == 5)
                                                                New Radar
                                                            @elseif($p->transactionProject->category_id == 6)
                                                                Corrective Maintenance
                                                            @endif
                                                            - {{ $p->transactionProject->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-5">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold form-label mb-3">Type:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-control form-select type-multiple"
                                                data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                                wire:model.defer="types" id="types" name="types[]"
                                                multiple="multiple">
                                                <option></option>
                                                <option value="1">Draft</option>
                                                <option value="2">Posted</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-5">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold form-label mb-3">Status:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-control form-select status-multiple"
                                                data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                                wire:model.defer="statuss" id="statuss" name="statuss[]"
                                                multiple="multiple">
                                                <option></option>
                                                <option value="1" selected>Pending</option>
                                                <option value="2" selected>Pending (Only approved by Finance
                                                    Director)
                                                </option>
                                                <option value="3">Accepted</option>
                                                <option value="5">Rejected</option>
                                                <option value="4">Paid</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end">
                                            <button type="reset"
                                                class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                                                data-kt-menu-dismiss="true" data-kt-subscription-table-filter="reset"
                                                wire:click="resetcash()">Reset</button>
                                            <button type="submit" class="btn btn-primary fw-bold px-6"
                                                data-kt-menu-dismiss="true"
                                                data-kt-subscription-table-filter="filter">Apply</button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Filter-->
                    <!--begin::Export-->
                    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                        data-bs-target="#kt_subscriptions_export_modal">
                        <!--begin::Svg Icon | path: icons/duotone/Files/Export.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <rect fill="#000000" opacity="0.3"
                                        transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000)"
                                        x="11" y="2" width="2" height="12"
                                        rx="1" />
                                    <path
                                        d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000)" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Export
                    </button>
                    <!--end::Export-->
                    <!--begin::Add account-->

                    <a href="{{ route('findiv.cash-create') }}" class="btn btn-primary">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <rect fill="#000000" x="4" y="11" width="16" height="2"
                                    rx="1" />
                                <rect fill="#000000" opacity="0.5"
                                    transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)"
                                    x="4" y="11" width="16" height="2" rx="1" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Add Transaction
                    </a>
                    <!--end::Add account-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none"
                    data-kt-subscription-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                        <span class="me-2" data-kt-subscription-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger"
                        data-kt-subscription-table-select="delete_selected">Delete
                        Selected</button>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0 table-responsive">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-center text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-20px">Date</th>
                        <th class="min-w-70px">Token</th>
                        <th class="min-w-150px">Description</th>
                        <th class="min-w-70px">Referral</th>
                        <th class="min-w-150px">Debit</th>
                        <th class="min-w-150px">Credit</th>
                        <th class="min-w-70px">PIC</th>
                        <th class="min-w-70px">Project</th>
                        <th class="min-w-70px">Paid To</th>
                        <th class="min-w-50px">Type</th>
                        <th class="min-w-50px">Status</th>
                        <th class="text-end min-w-20px"></th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                    @if (count($transaction) == 0)
                        <tr>
                            <td colspan="12" class="text-muted fst-italic mt-5 text-center">There are no cash
                                transactions
                            </td>
                        </tr>
                    @else
                        @foreach ($transaction as $trans)
                            <tr>
                                <td class="text-center">
                                    {{ $trans[0][0]->date }}
                                </td>
                                <td class="text-center">{{ $trans[0][0]->token }}</td>
                                <td>
                                    @foreach ($trans[0] as $t)
                                        {{ $t->description }}<br>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    @foreach ($trans[0] as $t)
                                        {{ $t->transactionAccount[0]->referral }}<br>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    @foreach ($trans[0] as $t)
                                        @if (empty($t->debit))
                                            -<br>
                                        @else
                                            Rp. {{ number_format($t->debit, 0, ',', '.') }}<br>
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    @foreach ($trans[0] as $t)
                                        @if (empty($t->credit))
                                            -<br>
                                        @else
                                            Rp. {{ number_format($t->credit, 0, ',', '.') }}<br>
                                        @endif
                                    @endforeach
                                </td>
                                @if (empty($trans[0][0]->pic))
                                    <td class="text-center">-</td>
                                @else
                                    <td class="text-center">{{ $trans[0][0]->pic }}</td>
                                @endif

                                @if (empty($trans[0][0]->transactionProject->name))
                                    <td class="text-center">-</td>
                                @else
                                    <td class="text-center">
                                        @if ($trans[0][0]->transactionProject->category_id == 1)
                                            Radar Upgrade
                                        @elseif($trans[0][0]->transactionProject->category_id == 2)
                                            Radar Spare Part
                                        @elseif($trans[0][0]->transactionProject->category_id == 3)
                                            Radar Reinstallation
                                        @elseif($trans[0][0]->transactionProject->category_id == 4)
                                            Preventive Maintenance
                                        @elseif($trans[0][0]->transactionProject->category_id == 5)
                                            New Radar
                                        @elseif($trans[0][0]->transactionProject->category_id == 6)
                                            Corrective Maintenance
                                        @endif
                                        - {{ $trans[0][0]->transactionProject->name }}
                                    </td>
                                @endif

                                <td class="text-center">{{ $trans[0][0]->paid_to }}</td>

                                @if ($trans[0][0]->type == 1)
                                    <td class="text-center"><span class="badge badge-light fw-bolder text-white"
                                            style="background-color: rgb(232, 123, 51);">
                                            Draft</span></td>
                                @else
                                    <td class="text-center"><span class="badge badge-light fw-bolder text-white"
                                            style="background-color: #3498DB;">
                                            Posted</span></td>
                                @endif

                                @if ($trans[0][0]->status == 1 || $trans[0][0]->status == 2)
                                    <td class="text-center"><span class="badge badge-light-warning fw-bolder">
                                            Pending</span></td>
                                @elseif ($trans[0][0]->status == 3)
                                    <td class="text-center"><span class="badge badge-light-success fw-bolder">
                                            Approved</span></td>
                                @elseif ($trans[0][0]->status == 4)
                                    <td class="text-center"><span class="badge badge-light-primary fw-bolder">
                                            Paid</span></td>
                                @else
                                    <td class="text-center"><span class="badge badge-light-danger fw-bolder">
                                            Rejected</span></td>
                                @endif

                                <td class="text-end">
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
                                            <a href="{{ route('findiv.cash-detail', ['uuid' => $trans[0][0]->uuid]) }}"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('findiv.cash-edit', ['uuid' => $trans[0][0]->uuid]) }}"
                                                class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <button type="submit" class="btn-delete menu-link px-3 fw-bold"
                                                wire:click="confirmDelete('{{ $trans[0][0]->uuid }}')">Delete</button>
                                        </div>

                                        <div class="separator border-gray-200"></div>
                                        <div class="menu-item px-3">
                                            <div class="text-start">
                                                <label class="px-3 fw-bold mt-5"
                                                    @if ($trans[0][0]->status == 1 || $trans[0][0]->status == 2 || $trans[0][0]->status == 4 || $trans[0][0]->status == 5) style="color:#7e829978;" @endif>Paid?</label>
                                                <label class="switch">
                                                    <input
                                                        wire:click="confirmUpdateStatus('{{ $trans[0][0]->uuid }}')"
                                                        type="checkbox" class="checkbox-status"
                                                        @if ($trans[0][0]->status == 1 || $trans[0][0]->status == 2 || $trans[0][0]->status == 5) disabled @elseif ($trans[0][0]->status == 4) disabled checked @endif>
                                                    <span class="slider round"
                                                        @if ($trans[0][0]->status == 1 || $trans[0][0]->status == 2 || $trans[0][0]->status == 4 || $trans[0][0]->status == 5) style="background-color:#7e829930;" @endif></span>
                                                </label>
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
            <div class="d-flex flex-stack flex-wrap pt-10">
                <div class="fs-6 fw-bold text-gray-700">Showing {{ count($transaction) }} of
                    {{ count($distAllTrans) }}
                    entries
                </div>
                <!--begin::Pages-->
                {{ $transaction->links() }}
                <!--end::Pages-->
            </div>
        </div>
        <!--end::Card body-->
    </div>
</div>
@push('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ asset('vendor/pharaonic/pharaonic.select2.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('input[name="datefilter"]').daterangepicker({
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
            $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' -> ' + picker.endDate.format(
                    'YYYY-MM-DD'));
                @this.set('datefilter', picker.startDate.format('YYYY-MM-DD') + ' -> ' + picker.endDate
                    .format(
                        'YYYY-MM-DD'), true);
            })
            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                @this.set('datefilter', '', true);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#pagesize').select2({
                closeOnSelect: true,
                minimumResultsForSearch: -1,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('#pagesize').select2({
                    closeOnSelect: true,
                    minimumResultsForSearch: -1,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.account-multiple').select2({
                placeholder: "Select account",
                closeOnSelect: true,
                allowClear: true,
            });
        });
        $('.account-multiple').on("select2:unselect", function(e) {
            if (!e.params.originalEvent) {
                return
            }
            e.params.originalEvent.stopPropagation();
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('.account-multiple').select2({
                    placeholder: "Select account",
                    closeOnSelect: true,
                    allowClear: true,
                });
                $('.account-multiple').on("select2:unselect", function(e) {
                    if (!e.params.originalEvent) {
                        return
                    }
                    e.params.originalEvent.stopPropagation();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.pic-multiple').select2({
                placeholder: "Select PIC",
                closeOnSelect: true,
                allowClear: true,
            });
        });
        $('.pic-multiple').on("select2:unselect", function(e) {
            if (!e.params.originalEvent) {
                return
            }
            e.params.originalEvent.stopPropagation();
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('.pic-multiple').select2({
                    placeholder: "Select PIC",
                    closeOnSelect: true,
                    allowClear: true,
                });
                $('.pic-multiple').on("select2:unselect", function(e) {
                    if (!e.params.originalEvent) {
                        return
                    }
                    e.params.originalEvent.stopPropagation();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.paidto-multiple').select2({
                placeholder: "Select paid to",
                closeOnSelect: true,
                allowClear: true,
            });
        });
        $('.paidto-multiple').on("select2:unselect", function(e) {
            if (!e.params.originalEvent) {
                return
            }
            e.params.originalEvent.stopPropagation();
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('.paidto-multiple').select2({
                    placeholder: "Select Paid To",
                    closeOnSelect: true,
                    allowClear: true,
                });
                $('.paidto-multiple').on("select2:unselect", function(e) {
                    if (!e.params.originalEvent) {
                        return
                    }
                    e.params.originalEvent.stopPropagation();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.project-multiple').select2({
                placeholder: "Select project",
                closeOnSelect: true,
                allowClear: true,
            });
        });
        $('.project-multiple').on("select2:unselect", function(e) {
            if (!e.params.originalEvent) {
                return
            }
            e.params.originalEvent.stopPropagation();
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('.project-multiple').select2({
                    placeholder: "Select project",
                    closeOnSelect: true,
                    allowClear: true,
                });
                $('.project-multiple').on("select2:unselect", function(e) {
                    if (!e.params.originalEvent) {
                        return
                    }
                    e.params.originalEvent.stopPropagation();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.type-multiple').select2({
                placeholder: "Select type",
                closeOnSelect: true,
                allowClear: true,
            });
        });
        $('.type-multiple').on("select2:unselect", function(e) {
            if (!e.params.originalEvent) {
                return
            }
            e.params.originalEvent.stopPropagation();
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('.type-multiple').select2({
                    placeholder: "Select type",
                    closeOnSelect: true,
                    allowClear: true,
                });
                $('.type-multiple').on("select2:unselect", function(e) {
                    if (!e.params.originalEvent) {
                        return
                    }
                    e.params.originalEvent.stopPropagation();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.status-multiple').select2({
                placeholder: "Select status",
                closeOnSelect: true,
                allowClear: true,
            });
        });
        $('.status-multiple').on("select2:unselect", function(e) {
            if (!e.params.originalEvent) {
                return
            }
            e.params.originalEvent.stopPropagation();
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('.status-multiple').select2({
                    placeholder: "Select status",
                    closeOnSelect: true,
                    allowClear: true,
                });
                $('.status-multiple').on("select2:unselect", function(e) {
                    if (!e.params.originalEvent) {
                        return
                    }
                    e.params.originalEvent.stopPropagation();
                });
            });
        });
    </script>
    <script>
        window.addEventListener('closeModal', event => {
            $('#update_balance').modal('hide')
        })
    </script>
    <script type="text/javascript">
        document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
            element.addEventListener('keyup', function(e) {
                let cursorPostion = this.selectionStart;
                let value = parseInt(this.value.replace(/[^,\d]/g, ''));
                let originalLenght = this.value.length;
                if (isNaN(value)) {
                    this.value = "";
                } else {
                    this.value = value.toLocaleString('id-ID', {
                        currency: 'IDR',
                        style: 'currency',
                        minimumFractionDigits: 0
                    });
                    cursorPostion = this.value.length - originalLenght + cursorPostion;
                    this.setSelectionRange(cursorPostion, cursorPostion);
                }
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshNominal', function() {
                document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
                    element.addEventListener('keyup', function(e) {
                        let cursorPostion = this.selectionStart;
                        let value = parseInt(this.value.replace(/[^,\d]/g, ''));
                        let originalLenght = this.value.length;
                        if (isNaN(value)) {
                            this.value = "";
                        } else {
                            this.value = value.toLocaleString('id-ID', {
                                currency: 'IDR',
                                style: 'currency',
                                minimumFractionDigits: 0
                            });
                            cursorPostion = this.value.length - originalLenght +
                                cursorPostion;
                            this.setSelectionRange(cursorPostion, cursorPostion);
                        }
                    });
                });
            });
        });
    </script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function(event) {
            @this.on('triggerUpdateStatus', uuid => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "If you update this transaction status to paid, it cannot be undone.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#e4e6ef',
                    cancelButtonText: '<span style="color:#7e8299">Cancel</span>',
                    confirmButtonText: 'Yes, update it!',
                }).then((result) => {
                    if (result.value) {
                        @this.call('updateStatus', uuid)
                    } else if (result.dismiss == 'cancel') {
                        $('.checkbox-status').prop('checked', false);
                    }
                });
            });
        })
    </script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function(event) {
            @this.on('triggerDelete', uuid => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "If you delete this transaction, it will be permanently deleted.",
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
@endpush
