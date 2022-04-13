<div>
    <div>
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
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
                        wire:model="pagesize">
                        <option value="10" class="form-control form-select form-select-solid fw-bolder" selected>10
                        </option>
                        <option value="25" class="form-control form-select form-select-solid fw-bolder">25</option>
                        <option value="50" class="form-control form-select form-select-solid fw-bolder">50</option>
                        <option value="100" class="form-control form-select form-select-solid fw-bolder">100</option>
                    </select>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
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
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
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
                            <form wire:submit.prevent="submitfiltercash">
                                <!--begin::Input group-->
                                <div class="fv-row mb-5">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-3">Date Range:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Pick a date range"
                                        id="datefilter" name="datefilter" type="text" wire:model.defer="datefilter">
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-5">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-3">Referral:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-control form-select account-multiple" data-pharaonic="select2"
                                        data-component-id="{{ $this->id }}" wire:model.defer="accounts"
                                        id="accounts" name="accounts[]" multiple="multiple">
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
                                    <select class="form-control form-select pic-multiple" data-pharaonic="select2"
                                        data-component-id="{{ $this->id }}" wire:model.defer="pics" id="pics"
                                        name="pics[]" multiple="multiple">
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
                                    <select class="form-control form-select paidto-multiple" data-pharaonic="select2"
                                        data-component-id="{{ $this->id }}" wire:model.defer="paidtos" id="paidtos"
                                        name="paidtos[]" multiple="multiple">
                                        @foreach ($paidto as $pt)
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
                                    <select class="form-control form-select project-multiple" data-pharaonic="select2"
                                        data-component-id="{{ $this->id }}" wire:model.defer="projects"
                                        id="projects" name="projects[]" multiple="multiple">
                                        @foreach ($project as $p)
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
                                        x="11" y="2" width="2" height="12" rx="1" />
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
                                <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
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
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#kt_subscriptions_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-20px">Date</th>
                        <th class="min-w-70px">Token</th>
                        <th class="min-w-175px">Description</th>
                        <th class="min-w-70px">Referral</th>
                        <th class="min-w-70px">Debit</th>
                        <th class="min-w-70px">Credit</th>
                        <th class="min-w-70px">PIC</th>
                        <th class="min-w-70px">Project</th>
                        <th class="min-w-70px">Paid To</th>
                        <th class="min-w-70px">Type</th>
                        <th class="min-w-70px">Status</th>
                        <th class="text-end min-w-20px"></th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                    @foreach ($transaction as $trans)
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td class="text-center">
                                {{ date('Y-m-d', strtotime($trans[0][0]->date)) }}
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
                                <td class="text-center">{{ $trans[0][0]->transactionProject->name }}</td>
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
                                        <form
                                            action="{{ route('findiv.cash-destroy', ['uuid' => $trans[0][0]->uuid]) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" data-kt-subscriptions-table-filter="delete_row"
                                                class="btn-delete menu-link px-3 fw-bold"
                                                onclick="return confirm('Are you sure to delete this data?')">Delete</button>
                                        </form>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                    @endforeach
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
@endpush
