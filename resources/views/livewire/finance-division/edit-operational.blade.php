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

    <!--begin::Form-->
    <form action="{{ route('findiv.operational-update', ['uuid' => $uuid]) }}" novalidate method="post"
        id="needs-validation" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';" autocomplete="off">
        @csrf
        <!--begin::Wrapper-->
        <div class="d-flex flex-column align-items-start flex-xxl-row">
            <!--begin::Input group-->
            <div class="d-flex align-items-baseline flex-equal fw-row me-4 order-2" data-bs-toggle="tooltip"
                data-bs-trigger="hover" title="Specify transaction date">
                <!--begin::Date-->
                <div class="fs-6 fw-bolder text-gray-700 text-nowrap"><span class="required"></span> Date:</div>
                <!--end::Date-->
                <!--begin::Input-->
                <div class="position-relative d-flex flex-column align-items-center w-150px">
                    <!--begin::Datepicker-->
                    <input class="form-control form-control-white fw-bolder pe-3 @error('date') is-invalid @enderror"
                        type="date" placeholder="Select date" name="date" wire:model.defer="date"
                        style="color: #5e6278; border:none;" required />
                    <!--end::Datepicker-->
                    <div class="invalid-feedback fw-bolder">*Date is required.</div>
                </div>
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="d-flex flex-column flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4 text-center align-items-center"
                data-bs-toggle="tooltip" data-bs-trigger="hover" title="Enter transaction token">
                <span class="fs-3 fw-bolder text-gray-700"><span class="required"></span> Token</span>
                <div wire:ignore>
                    <input type="text"
                        class="form-control form-control-flush fs-4 fw-bolder w-250px text-center @error('token') is-invalid @enderror"
                        placeholder="AB/000/ABCD/I/0000" name="token" wire:model.defer="token"
                        style="color: #5e6278;" required />
                    <input type="hidden"
                        class="form-control form-control-flush fw-bolder text-muted fs-4 w-250px text-center"
                        name="oldToken" wire:model.defer="oldToken" required />
                    <div class="invalid-feedback">*Token is required.</div>
                </div>
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="d-flex align-items-baseline justify-content-end flex-equal order-3 fw-row"
                data-bs-toggle="tooltip" data-bs-trigger="hover" title="Specify document type">
                <!--begin::Date-->
                <div class="fs-6 fw-bolder text-gray-700 text-nowrap"><span class="required"></span> Type:</div>
                <!--end::Date-->
                <!--begin::Input-->
                <div class="position-relative d-flex flex-column align-items-center w-150px">
                    <!--begin::select-->
                    <select
                        class="form-control form-control-white custom-select fw-bolder pe-5 form-select type @error('type') is-invalid @enderror"
                        data-pharaonic="select2" data-component-id="{{ $this->id }}" wire:ignore="type"
                        id="type" name="type" wire:model.defer="type" required>
                        <option></option>
                        @if ($this->type == 1)
                            <option value="1" selected>Draft</option>
                            <option value="2">Posted</option>
                        @else
                            <option value="1">Draft</option>
                            <option value="2" selected>Posted</option>
                        @endif
                    </select>
                    <!--end::select-->
                    <div class="invalid-feedback">*Type is required.</div>
                </div>
                <!--end::Input-->
            </div>
            <!--end::Input group-->
        </div>
        <!--end::Top-->
        <!--begin::Separator-->
        <div class="separator separator-dashed my-10"></div>
        <!--end::Separator-->
        <!--begin::Wrapper-->
        <div class="mb-0">
            <!--begin::Row-->
            <div class="row gx-10 mb-5">
                <!--begin::Col-->
                <div class="col-lg-6">
                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Project</label>
                    <!--begin::Input group-->
                    <div class="mb-5">
                        <!--begin::select-->
                        <select
                            class="form-control form-control-white custom-select fw-bolder pe-5 form-select project @error('project') is-invalid @enderror"
                            data-pharaonic="select2" data-component-id="{{ $this->id }}" id="project"
                            name="project" wire:ignore="project" style="background-color: #f5f8fa;">
                            <option></option>
                            @foreach ($allProject as $ap)
                                <option value="{{ $ap->id }}" @if ($this->project == $ap->name) selected @endif>
                                    @if ($ap->category_id == 1)
                                        Radar Upgrade
                                    @elseif($ap->category_id == 2)
                                        Radar Spare Part
                                    @elseif($ap->category_id == 3)
                                        Radar Reinstallation
                                    @elseif($ap->category_id == 4)
                                        Preventive Maintenance
                                    @elseif($ap->category_id == 5)
                                        New Radar
                                    @elseif($ap->category_id == 6)
                                        Corrective Maintenance
                                    @endif
                                    - {{ $ap->name }}
                                </option>
                            @endforeach
                        </select>
                        <!--end::select-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-6">
                    <!--begin::Input group-->
                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">PIC</label>
                    <div class="mb-5">
                        <!--begin::select-->
                        <select
                            class="form-control form-control-white custom-select fw-bolder pe-5 form-select pic @error('pic') is-invalid @enderror"
                            data-pharaonic="select2" data-component-id="{{ $this->id }}" id="pic"
                            name="pic" wire:ignore="pic" style="background-color: #f5f8fa;">
                            <option></option>
                            @foreach ($allEmployee as $ae)
                                <option value="{{ $ae['fullname'] }}"
                                    @if ($this->pic == $ae['fullname']) selected @endif>
                                    {{ $ae['fullname'] }} - {{ $ae['position'] }}</option>
                            @endforeach
                        </select>
                        <!--end::select-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--start::Row-->
            <div class="row gx-10 mb-5">
                <div class="col-lg-6">
                    <!--begin::Input group-->
                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3"><span class="required">Paid
                            To</span></label>
                    <div class="mb-5">
                        <input type="text" name="paidto" wire:model.defer="paidto"
                            class="form-control form-control-solid @error('paidto') is-invalid @enderror"
                            placeholder="Paid To" required />
                        <div class="invalid-feedback fw-bolder">*Paid
                            to is required.</div>
                    </div>
                    <!--end::Input group-->
                </div>
                <div class="col-lg-6">
                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3"><span
                            class="required">Status</span></label>
                    <!--begin::Input group-->
                    <div class="mb-5">
                        <!--begin::select-->
                        @if ($this->status == 1 || $this->status == 2 || $this->status == 4)
                            <select
                                class="form-control form-control-white custom-select fw-bolder pe-5 form-select status add disabled @error('status') is-invalid @enderror"
                                data-pharaonic="select2" data-component-id="{{ $this->id }}" id="status"
                                name="status" wire:ignore="status" style="background-color: #f5f8fa;" required
                                disabled>
                            @else
                                <select
                                    class="form-control form-control-white fw-bolder pe-5 form-select status edit @error('status') is-invalid @enderror"
                                    data-pharaonic="select2" data-component-id="{{ $this->id }}" id="status"
                                    name="status" wire:ignore="status" style="background-color: #f5f8fa;" required>
                        @endif
                        <option></option>
                        @if ($this->status == 1 || $this->status == 2)
                            <option value="1" selected disabled>Pending</option>
                            <option value="3" disabled>Accepted</option>
                            <option value="5" disabled>Rejected</option>
                            <option value="4" disabled>Paid</option>
                        @elseif ($this->status == 3)
                            <option value="1">Pending</option>
                            <option value="3" disabled selected>Accepted</option>
                            <option value="5" disabled>Rejected</option>
                            <option value="4">Paid</option>
                        @elseif ($this->status == 4)
                            <option value="1" disabled>Pending</option>
                            <option value="3" disabled>Accepted</option>
                            <option value="5" disabled>Rejected</option>
                            <option value="4" disabled selected>Paid</option>
                        @else
                            <option value="1">Pending</option>
                            <option value="3" disabled>Accepted</option>
                            <option value="5" disabled selected>Rejected</option>
                            <option value="4" disabled>Paid</option>
                        @endif
                        </select>
                        <div class="invalid-feedback">*Status is required.</div>
                        <!--end::select-->
                    </div>
                    <!--end::Input group-->
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Table wrapper-->
            <div class="table-responsive mb-10 mt-16">
                <!--begin::Table-->
                <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700" data-kt-element="items">
                    <!--begin::Table head-->
                    <thead>
                        <tr
                            class=" border-bottom border-top form-label fs-5 fw-bolder text-gray-700 mb-3 text-uppercase">
                            <th colspan="4">Debit</th>
                        </tr>
                        <tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
                            <th class="min-w-300px w-350px"><span class="required">Description</span></th>
                            <th class="min-w-100px w-250px"><span class="required">Referral</span></th>
                            <th class="min-w-150px w-200px"><span class="required">Nominal</span></th>
                            <th class="min-w-75px w-75px text-end">Action</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($transDebit as $indexDebit => $td)
                            <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                <td class="pe-10">
                                    <input type="text"
                                        class="form-control form-control-solid mb-2 @error('transDebit.*.descriptionDebit') is-invalid @enderror"
                                        name="transDebit[{{ $indexDebit }}][descriptionDebit]"
                                        placeholder="Description"
                                        wire:model.defer="transDebit.{{ $indexDebit }}.descriptionDebit" required />
                                    <div class="invalid-feedback">*Description is required.</div>
                                </td>
                                <td class="ps-0">
                                    <!--begin::select-->
                                    <select
                                        class="form-control form-control-white fw-bolder pe-5 form-select custom-select referraldebit @error('transDebit.*.referralDebit') is-invalid @enderror"
                                        data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                        id="transDebit[{{ $indexDebit }}][referralDebit]"
                                        name="transDebit[{{ $indexDebit }}][referralDebit]"
                                        wire:ignore="transDebit.{{ $indexDebit }}.referralDebit" required>
                                        <option></option>
                                        @foreach ($allReferral as $ar)
                                            <option value="{{ $ar->id }}"
                                                @if ($td['referralDebit'] == $ar->name) selected @endif>
                                                {{ $ar->referral }}
                                                - {{ $ar->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">*Referral is required.</div>
                                    <!--end::select-->
                                </td>
                                <td>
                                    <input type="text" type-currency="IDR"
                                        id="transDebit[{{ $indexDebit }}][debit]"
                                        class="form-control form-control-solid @error('transDebit.*.debit') is-invalid @enderror"
                                        name="transDebit[{{ $indexDebit }}][debit]" placeholder="Nominal"
                                        wire:model.lazy="transDebit.{{ $indexDebit }}.debit" required />
                                    <div class="invalid-feedback">*Nominal is required.</div>
                                </td>
                                <td class="pt-5 text-end">
                                    <button wire:click.prevent="removeDebit({{ $indexDebit }})" type="button"
                                        class="btn btn-sm btn-icon btn-active-color-primary"
                                        data-kt-element="remove-item"
                                        @if (count($transDebit) == 1) disabled @endif>
                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24"
                                                        height="24" />
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
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                    <!--begin::Table foot-->
                    <tfoot>
                        <tr class="border-top border-top-dashed align-top fs-6 fw-bolder text-gray-700"
                            style="border-bottom:1px solid #eff2f5 !important;">
                            <th class="text-primary">
                                <button wire:click.prevent="addDebit" class="btn btn-link py-1">Add
                                    transaction</button>
                            </th>
                            <th colspan="1" class="ps-0">
                                <div class="d-flex flex-column align-items-start">
                                    <div class="fs-5">Total</div>
                                </div>
                            </th>
                            <th colspan="2" class="text-end">Rp.&nbsp;
                                <span data-kt-element="sub-total">{{ number_format($sumDebit, 0, ',', '.') }}</span>
                            </th>
                        </tr>
                    </tfoot>
                    <!--end::Table foot-->
                </table>
                <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700 mt-20" data-kt-element="items">
                    <!--begin::Table head-->
                    <thead>
                        <tr
                            class=" border-bottom border-top form-label fs-5 fw-bolder text-gray-700 mb-3 text-uppercase">
                            <th colspan="4">Credit</th>
                        </tr>
                        <tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
                            <th class="min-w-300px w-350px"><span class="required">Description</span></th>
                            <th class="min-w-100px w-250px"><span class="required">Referral</span></th>
                            <th class="min-w-150px w-200px"><span class="required">Nominal</span></th>
                            <th class="min-w-75px w-75px text-end">Action</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($transCredit as $indexCredit => $tc)
                            <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                <td class="pe-10">
                                    <input type="text"
                                        class="form-control form-control-solid mb-2 @error('transCredit.*.descriptionCredit') is-invalid @enderror"
                                        name="transCredit[{{ $indexCredit }}][descriptionCredit]"
                                        placeholder="Description"
                                        wire:model.defer="transCredit.{{ $indexCredit }}.descriptionCredit"
                                        required />
                                    <div class="invalid-feedback">*Description is required.</div>
                                </td>
                                <td class="ps-0">
                                    <!--begin::select-->
                                    <select
                                        class="form-control form-control-white fw-bolder pe-5 form-select custom-select referralcredit @error('transCredit.*.referralCredit') is-invalid @enderror"
                                        data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                        id="transCredit[{{ $indexCredit }}][referralCredit]"
                                        name="transCredit[{{ $indexCredit }}][referralCredit]"
                                        wire:ignore="transCredit.{{ $indexCredit }}.referralCredit" required>
                                        <option></option>
                                        @foreach ($allReferral as $ar)
                                            <option value="{{ $ar->id }}"
                                                @if ($tc['referralCredit'] == $ar->name) selected @endif>
                                                {{ $ar->referral }}
                                                - {{ $ar->name }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::select-->
                                    <div class="invalid-feedback">*Referral is required.</div>
                                </td>
                                <td>
                                    <input type="text" type-currency="IDR"
                                        id="transCredit[{{ $indexCredit }}][credit]"
                                        class="form-control form-control-solid @error('transCredit.*.credit') is-invalid @enderror"
                                        name="transCredit[{{ $indexCredit }}][credit]" placeholder="Nominal"
                                        wire:model.lazy="transCredit.{{ $indexCredit }}.credit" required />
                                    <div class="invalid-feedback">*Nominal is required.</div>
                                </td>
                                <td class="pt-5 text-end">
                                    <button wire:click.prevent="removeCredit({{ $indexCredit }})" type="button"
                                        class="btn btn-sm btn-icon btn-active-color-primary"
                                        data-kt-element="remove-item"
                                        @if (count($transCredit) == 1) disabled @endif>
                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24"
                                                        height="24" />
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
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                    <!--begin::Table foot-->
                    <tfoot>
                        <tr class="border-top border-top-dashed align-top fs-6 fw-bolder text-gray-700"
                            style="border-bottom:1px solid #eff2f5 !important;">
                            <th class="text-primary">
                                <button wire:click.prevent="addCredit" class="btn btn-link py-1">Add
                                    transaction</button>
                            </th>
                            <th colspan="1" class="ps-0">
                                <div class="d-flex flex-column align-items-start">
                                    <div class="fs-5">Total</div>
                                </div>
                            </th>
                            <th colspan="2" class="text-end">Rp.&nbsp;
                                <span
                                    data-kt-element="sub-total">{{ number_format($sumCredit, 0, ',', '.') }}</span>
                            </th>
                        </tr>
                    </tfoot>
                    <!--end::Table foot-->
                </table>
            </div>
            <!--end::Table-->
            <!--begin::Transaction-->
            <div class="mb-0 mt-18">
                <label class="form-label fs-6 fw-bolder text-gray-700 mb-0">Transaction
                    Report</label>
                <label class="text-start text-muted fw-bolder gs-0"
                    style="font-size: 12px; display:block; margin-bottom: -1%;">*
                    Accepted format : .doc, .docx, .pdf, .jpg, .jpeg, .png.</label>
                <div class="row">
                    <div class="col-md-10">
                        <input type="file" id="file-upload" name="report" style="display: none"
                            class="form-control @error('report') is-invalid @enderror"
                            onchange="showFileName();" /><br>
                        <label class="file-upload-text" for="file-upload">Upload
                            file</label>
                        @error('report')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 justify-content-end">
                        <div id="file-upload-filename" style="text-align: center">
                            @if ($this->report)
                                @if (pathinfo($this->report, PATHINFO_EXTENSION) == 'jpg' || pathinfo($this->report, PATHINFO_EXTENSION) == 'png' || pathinfo($this->report, PATHINFO_EXTENSION) == 'jpeg')
                                    <div class="mt-5"> <i class="bi bi-file-earmark-image-fill text-success"
                                            style="font-size: 500%;margin-bottom:5%;"><span
                                                class="fs-7 text-dark d-block mt-3 attach-cash"
                                                style="line-height: 15px">{{ $this->report }}</span></i>
                                    </div>
                                @elseif(pathinfo($this->report, PATHINFO_EXTENSION) == 'doc' || pathinfo($this->report, PATHINFO_EXTENSION) == 'docx')
                                    <div class="mt-5"> <i class="bi bi-file-earmark-word-fill text-primary"
                                            style="font-size: 500%;margin-bottom:5%;"><span
                                                class="fs-7 text-dark d-block mt-3 attach-cash"
                                                style="line-height: 15px">{{ $this->report }}</span></i>
                                    </div>
                                @elseif(pathinfo($this->report, PATHINFO_EXTENSION) == 'pdf')
                                    <div class="mt-5"> <i class="bi bi-file-earmark-pdf-fill text-danger"
                                            style="font-size: 500%;margin-bottom:5%;"><span
                                                class="fs-7 text-dark d-block mt-3"
                                                style="line-height: 15px">{{ $this->report }}</span></i>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Transaction-->
            <!--begin::Attachments-->
            <div class="mb-0 mt-18">
                <label class="form-label fs-6 fw-bolder text-gray-700 mb-0">Attachments</label>
                <label class="text-start text-muted fw-bolder gs-0"
                    style="font-size: 12px; display:block; margin-bottom: -1%;">*
                    Accepted format : .doc, .docx, .pdf, .jpg, .jpeg, .png.</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" id="file-upload-attach" name="attach[]" style="display: none"
                            class="form-control @error('attach.*') is-invalid @enderror"
                            onchange="showFileNameAttach();" multiple /><br>
                        <label class="file-upload-text" for="file-upload-attach">Upload
                            file</label>
                        @error('attach.*')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="row justify-content-end" id="file-upload-filename-attach"
                            style="text-align: center;">
                            @foreach ($this->attach as $index => $atc)
                                @if (pathinfo($atc, PATHINFO_EXTENSION) == 'jpg' || pathinfo($atc, PATHINFO_EXTENSION) == 'png' || pathinfo($atc, PATHINFO_EXTENSION) == 'jpeg')
                                    <div class="col-md-4 mt-5 deleteText" id="deleteAttach{{ $index }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" title="Delete"
                                        style="cursor:pointer;"> <i
                                            class="bi bi-file-earmark-image-fill text-success d-flex flex-column deleteAttach"
                                            style="font-size: 500%;margin-bottom:5%;"><span
                                                class="fs-7 text-dark d-block mt-3" style="line-height: 15px">
                                                @if (strlen($atc) > 20)
                                                    {{ substr($atc, 0, 20) }}...{{ pathinfo($atc, PATHINFO_EXTENSION) }}
                                                @else
                                                    {{ $atc }}
                                                @endif
                                            </span></i>
                                    </div>
                                @elseif(pathinfo($atc, PATHINFO_EXTENSION) == 'doc' || pathinfo($atc, PATHINFO_EXTENSION) == 'docx')
                                    <div class="col-md-4 mt-5 deleteText" id="deleteAttach{{ $index }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" title="Delete"
                                        style="cursor:pointer;"> <i
                                            class="bi bi-file-earmark-word-fill text-primary d-flex flex-column deleteAttach"
                                            style="font-size: 500%;margin-bottom:5%;"><span
                                                class="fs-7 text-dark d-block mt-3" style="line-height: 15px">
                                                @if (strlen($atc) > 20)
                                                    {{ substr($atc, 0, 20) }}...{{ pathinfo($atc, PATHINFO_EXTENSION) }}
                                                @else
                                                    {{ $atc }}
                                                @endif
                                            </span></i>
                                    </div>
                                @elseif(pathinfo($atc, PATHINFO_EXTENSION) == 'pdf')
                                    <div class="col-md-4 mt-5 deleteText" id="deleteAttach{{ $index }}"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" title="Delete"
                                        style="cursor:pointer;"> <i
                                            class="bi bi-file-earmark-pdf-fill text-danger d-flex flex-column deleteAttach"
                                            style="font-size: 500%;margin-bottom:5%;"><span
                                                class="fs-7 text-dark d-block mt-3" style="line-height: 15px">
                                                @if (strlen($atc) > 20)
                                                    {{ substr($atc, 0, 20) }}...{{ pathinfo($atc, PATHINFO_EXTENSION) }}
                                                @else
                                                    {{ $atc }}
                                                @endif
                                            </span></i>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" name="temparrattachments" id="temparrattachments"
                        wire:model.defer="arrattachments">
                    <input type="hidden" name="arrattachments">
                </div>
            </div>
            <!--end::Attachments-->

            <!--start::Submit-->
            <div class="row text-end mt-10">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary float-right mt-7">Submit</button>
                </div>
            </div>
            <!--end::Submit-->
        </div>
        <!--end::Wrapper-->
    </form>
    <!--end::Form-->
</div>

@push('js')
    <script src="{{ asset('assets/js/finance-division/create.js') }}"></script>
    <script src="{{ asset('vendor/pharaonic/pharaonic.select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.type').select2({
                placeholder: "Select type",
                closeOnSelect: true,
                allowClear: true,
                minimumResultsForSearch: -1,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('.type').select2({
                    placeholder: "Select type",
                    closeOnSelect: true,
                    allowClear: true,
                    minimumResultsForSearch: -1,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.project').select2({
                placeholder: "Select project",
                closeOnSelect: true,
                allowClear: true,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('.project').select2({
                    placeholder: "Select project",
                    closeOnSelect: true,
                    allowClear: true,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.pic').select2({
                placeholder: "Select PIC",
                closeOnSelect: true,
                allowClear: true,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('.pic').select2({
                    placeholder: "Select PIC",
                    closeOnSelect: true,
                    allowClear: true,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.referraldebit').select2({
                placeholder: "Select account",
                closeOnSelect: true,
                allowClear: true,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('.referraldebit').select2({
                    placeholder: "Select account",
                    closeOnSelect: true,
                    allowClear: true,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.status').select2({
                placeholder: "Select status",
                closeOnSelect: true,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('.status').select2({
                    placeholder: "Select status",
                    closeOnSelect: true,
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.referralcredit').select2({
                placeholder: "Select account",
                closeOnSelect: true,
                allowClear: true,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('.referralcredit').select2({
                    placeholder: "Select account",
                    closeOnSelect: true,
                    allowClear: true,
                });
            });
        });
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
        function showFileName() {
            var fileName = document.getElementById('file-upload').files[0].name;
            var extension = $('#file-upload').val().split('.').pop();
            var infoArea = document.getElementById('file-upload-filename');
            console.log(fileName);
            var fileBaseName = fileName.substr(0, fileName.lastIndexOf('.')) || fileName;
            var limit = 20;
            switch (extension) {
                case 'png':
                case 'jpeg':
                case 'jpg':
                    if (fileBaseName.length > limit) {
                        fileName = fileBaseName.substring(0, limit) + '...' + extension;
                        infoArea.innerHTML =
                            '<i class="bi bi-file-earmark-image-fill text-success d-flex flex-column" style="font-size: 500%;margin-bottom:5%;"></i>' +
                            fileName;
                    } else {
                        infoArea.innerHTML =
                            '<i class="bi bi-file-earmark-image-fill text-success d-flex flex-column" style="font-size: 500%;margin-bottom:5%;"></i>' +
                            fileName;
                    }
                    break;
                case 'doc':
                case 'docx':
                    if (fileBaseName.length > limit) {
                        fileName = fileBaseName.substring(0, limit) + '...' + extension;
                        infoArea.innerHTML =
                            '<i class="bi bi-file-earmark-word-fill text-primary d-flex flex-column" style="font-size: 500%;margin-bottom:5%;"></i>' +
                            fileName;
                    } else {
                        infoArea.innerHTML =
                            '<i class="bi bi-file-earmark-word-fill text-primary d-flex flex-column" style="font-size: 500%;margin-bottom:5%;"></i>' +
                            fileName;
                    }
                    break;
                case 'pdf':
                    if (fileBaseName.length > limit) {
                        fileName = fileBaseName.substring(0, limit) + '...' + extension;
                        infoArea.innerHTML =
                            '<i class="bi bi-file-earmark-pdf-fill text-danger d-flex flex-column" style="font-size: 500%;margin-bottom:5%;"></i>' +
                            fileName;
                    } else {
                        infoArea.innerHTML =
                            '<i class="bi bi-file-earmark-pdf-fill text-danger d-flex flex-column" style="font-size: 500%;margin-bottom:5%;"></i>' +
                            fileName;
                    }
                    break;
                default:
                    infoArea.innerHTML =
                        '<span style="color:red;"><i class="bi bi-file-earmark-excel d-flex flex-column" style="font-size: 500%; margin-bottom:5%; color:red;"></i> Only formats are allowed: .doc, .docx, .pdf, .jpg, .jpeg, .png.</span>';
            }
        }
    </script>
    <script type="text/javascript">
        var arrValue = [];
        var tempFile = new Map();

        $(document).ready(function() {
            var lastValue = document.getElementById('temparrattachments').value;
            arrValue = lastValue.split('[<>]');
            tempFile = arrValue;
            var checkSelection = document.getElementById("file-upload-attach");
            var checkAllFileName = Array.from(checkSelection.files).map(({
                name
            }) => name);
            if (checkAllFileName.length === 0) {
                for (var j = 0; j < Object.keys(tempFile).length; j++) {
                    let val = tempFile[j]
                    $("#deleteAttach" + j).click({
                        index: j
                    }, function(e) {
                        tempFile[e.data.index] = null;
                        $(this).remove();
                        attrVal = $(this).attr('aria-describedby');
                        $('#' + attrVal).remove();
                    });
                }
            } else {
                showFileNameAttach();
            }
            $("#needs-validation").submit(function() {
                $('[name="arrattachments"]').val(JSON.stringify(tempFile));
            });
        })

        function showFileNameAttach() {
            var selection = document.getElementById("file-upload-attach");
            var limit = 20;
            var allFileName = Array.from(selection.files).map(({
                name
            }) => name);
            var lengthTemp = Object.keys(tempFile).length
            for (var i = 0; i < allFileName.length; i++) {
                tempFile[i + lengthTemp] = allFileName[i]
                var extension = allFileName[i].split('.').pop();
                var fileName = allFileName[i];
                var fileBaseName = fileName.substr(0, fileName.lastIndexOf('.')) || fileName;
                switch (extension) {
                    case 'png':
                    case 'jpeg':
                    case 'jpg':
                        if (fileBaseName.length > limit) {
                            fileName = fileBaseName.substring(0, limit) + '...' + extension;
                            $('#file-upload-filename-attach').append(
                                '<div class="col-md-4 mt-5 deleteText" id="deleteAttach' + (i +
                                    lengthTemp) +
                                '" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Delete" style="cursor:pointer;"> <i class="bi bi-file-earmark-image-fill text-success d-flex flex-column deleteAttach" style="font-size: 500%;margin-bottom:5%;"></i>' +
                                fileName + '</div>');
                        } else {
                            $('#file-upload-filename-attach').append(
                                '<div class="col-md-4 mt-5 deleteText" id="deleteAttach' + (i +
                                    lengthTemp) +
                                '" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Delete" style="cursor:pointer;"> <i class="bi bi-file-earmark-image-fill d-flex flex-column deleteAttach" style="font-size: 500%;margin-bottom:5%;"></i>' +
                                fileName + '</div>');
                        }
                        break;
                    case 'doc':
                    case 'docx':
                        if (fileBaseName.length > limit) {
                            fileName = fileBaseName.substring(0, limit) + '...' + extension;
                            $('#file-upload-filename-attach').append(
                                '<div class="col-md-4 mt-5 deleteText" id="deleteAttach' + (i +
                                    lengthTemp) +
                                '" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Delete" style="cursor:pointer;"><i class="bi bi-file-earmark-word-fill text-primary d-flex flex-column deleteAttach" style="font-size: 500%;margin-bottom:5%;"></i>' +
                                fileName + '</div>');
                        } else {
                            $('#file-upload-filename-attach').append(
                                '<div class="col-md-4 mt-5 deleteText" id="deleteAttach' + (i +
                                    lengthTemp) +
                                '" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Delete" style="cursor:pointer;"><i class="bi bi-file-earmark-word-fill text-primary d-flex flex-column deleteAttach" style="font-size: 500%;margin-bottom:5%;"></i>' +
                                fileName + '</div>');
                        }
                        break;
                    case 'pdf':
                        if (fileBaseName.length > limit) {
                            fileName = fileBaseName.substring(0, limit) + '...' + extension;
                            $('#file-upload-filename-attach').append(
                                '<div class="col-md-4 mt-5 deleteText" id="deleteAttach' + (i +
                                    lengthTemp) +
                                '" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Delete" style="cursor:pointer;"><i class="bi bi-file-earmark-pdf-fill text-danger d-flex flex-column deleteAttach" style="font-size: 500%;margin-bottom:5%;"></i>' +
                                fileName + '</div>');
                        } else {
                            $('#file-upload-filename-attach').append(
                                '<div class="col-md-4 mt-5 deleteText" id="deleteAttach' + (i +
                                    lengthTemp) +
                                '" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Delete" style="cursor:pointer;"><i class="bi bi-file-earmark-pdf-fill text-danger d-flex flex-column deleteAttach" style="font-size: 500%;margin-bottom:5%;"></i>' +
                                fileName + '</div>');
                        }
                        break;
                    default:
                        $('#file-upload-filename-attach').append(
                            '<div class="col-md-4 mt-5 deleteText error-file" id="deleteAttach' + (i + lengthTemp) +
                            '" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Delete" style="cursor:pointer;"><span><i class="bi bi-file-earmark-excel d-flex flex-column deleteAttach" style="font-size: 500%; margin-bottom:5%; color:red;"></i> Only formats are allowed: .doc, .docx, .pdf, .jpg, .jpeg, .png.</span><div>'
                        );
                }
            }

            for (var j = 0; j < Object.keys(tempFile).length; j++) {
                let val = tempFile[j]
                $("#deleteAttach" + j).click({
                    index: j
                }, function(e) {
                    ext = val.split('.').pop();
                    fileNameReal = $(this).text();
                    console.log(fileNameReal)
                    if (fileNameReal[0] === " ") {
                        fileNameReal = fileNameReal.substring(1, $(this).text().length);
                    }

                    if (val.length > 20) {
                        $tempFileName = val.substring(0, 20) + '...' + ext;
                        if (fileNameReal === $tempFileName) {
                            tempFile[e.data.index] = null;
                            $(this).remove();
                            attrVal = $(this).attr('aria-describedby');
                            $('#' + attrVal).remove();
                        }
                    }

                    if (val.length < 20) {
                        if (fileNameReal === val) {
                            tempFile[e.data.index] = null;
                            $(this).remove();
                            attrVal = $(this).attr('aria-describedby');
                            $('#' + attrVal).remove();
                        }
                    }

                    if ($(this).text().substring(1, $(this).text().length) ===
                        "Only formats are allowed: .doc, .docx, .pdf, .jpg, .jpeg, .png.") {
                        tempFile[e.data.index] = null;
                        $(this).remove();
                        attrVal = $(this).attr('aria-describedby');
                        $('#' + attrVal).remove();
                    }
                });
            }
        }
    </script>
    <script>
        ! function() {
            "use strict";
            window.addEventListener("load", function() {
                var e = document.getElementById("needs-validation");
                e.addEventListener("submit", function(t) {
                    !1 === e.checkValidity() && (t.preventDefault(), t.stopPropagation()), e.classList.add(
                        "was-validated"), $('.select2-selection').addClass('was-validated');
                }, !1)
            }, !1)
        }()

        ! function() {
            "use strict";
            document.addEventListener('livewire:load', function(event) {
                @this.on('refreshValidation', function() {
                    var e = document.getElementById("needs-validation");
                    !1 === e.checkValidity(), e.classList.add(
                        "was-validated"), $('.select2-selection').addClass('was-validated');
                });
            });
        }()
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
