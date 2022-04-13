<div>
    <!--begin::Form-->
    <form action="{{ route('findiv.cash-post') }}" method="post" id="kt_invoice_form" enctype="multipart/form-data"
        onkeydown="return event.key != 'Enter';">
        @csrf
        <!--begin::Wrapper-->
        <div class="d-flex flex-column align-items-start flex-xxl-row">
            <!--begin::Input group-->
            <div class="d-flex align-items-center flex-equal fw-row me-4 order-2" data-bs-toggle="tooltip"
                data-bs-trigger="hover" title="Specify transaction date">
                <!--begin::Date-->
                <div class="fs-6 fw-bolder text-gray-700 text-nowrap">Date:</div>
                <!--end::Date-->
                <!--begin::Input-->
                <div class="position-relative d-flex align-items-center w-150px">
                    <!--begin::Datepicker-->
                    <input class="form-control form-control-white fw-bolder pe-3" type="date" placeholder="Select date"
                        name="date" wire:model.defer="date" style="color: #5e6278" />
                    <!--end::Datepicker-->
                </div>
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4"
                data-bs-toggle="tooltip" data-bs-trigger="hover" title="Enter transaction token">
                <span class="fs-2x fw-bolder text-gray-800">Token</span>
                <input type="text" class="form-control form-control-flush fw-bolder text-muted fs-3 w-250px"
                    placeholder="AB/000/ABCD/I/0000" name="token" wire:model.defer="token" />
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="d-flex align-items-center justify-content-end flex-equal order-3 fw-row" data-bs-toggle="tooltip"
                data-bs-trigger="hover" title="Specify document type">
                <!--begin::Date-->
                <div class="fs-6 fw-bolder text-gray-700 text-nowrap">Type:</div>
                <!--end::Date-->
                <!--begin::Input-->
                <div class="position-relative d-flex align-items-center w-150px">
                    <!--begin::select-->
                    <select class="form-control form-control-white fw-bolder pe-5 form-select type"
                        data-pharaonic="select2" data-component-id="{{ $this->id }}" wire:ignore="type" id="type"
                        name="type" wire:model.defer="type">
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
                        <select class="form-control form-control-white fw-bolder pe-5 form-select project"
                            data-pharaonic="select2" data-component-id="{{ $this->id }}" id="project" name="project"
                            wire:ignore="project" style="background-color: #f5f8fa;">
                            <option></option>
                            @foreach ($allProject as $ap)
                                <option value="{{ $ap->id }}" @if ($this->project == $ap->name) selected @endif>
                                    {{ $ap->name }}</option>
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
                        <input type="text" name="pic" wire:model.defer="pic" class="form-control form-control-solid"
                            placeholder="PIC" />
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
                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Paid To</label>
                    <div class="mb-5">
                        <input type="text" name="paidto" wire:model.defer="paidto"
                            class="form-control form-control-solid" placeholder="Paid To" />
                    </div>
                    <!--end::Input group-->
                </div>
                <div class="col-lg-6">
                    <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Status</label>
                    <!--begin::Input group-->
                    <div class="mb-5">
                        <!--begin::select-->
                        @if ($this->status == 1 || $this->status == 2)
                            <select class="form-control form-control-white fw-bolder pe-5 form-select status disabled"
                                data-pharaonic="select2" data-component-id="{{ $this->id }}" id="status"
                                name="status" wire:ignore="status" style="background-color: #f5f8fa;" disabled>
                            @else
                                <select class="form-control form-control-white fw-bolder pe-5 form-select status"
                                    data-pharaonic="select2" data-component-id="{{ $this->id }}" id="status"
                                    name="status" wire:ignore="status" style="background-color: #f5f8fa;">
                        @endif
                        <option></option>
                        @if ($this->status == 1 || $this->status == 2)
                            <option value="pending" selected>Pending</option>
                            <option value="accepeted" disabled>Accepted</option>
                            <option value="rejected" disabled>Rejected</option>
                            <option value="paid">Paid</option>
                        @elseif ($this->status == 3)
                            <option value="pending">Pending</option>
                            <option value="accepeted" disabled selected>Accepted</option>
                            <option value="rejected" disabled>Rejected</option>
                            <option value="paid">Paid</option>
                        @elseif ($this->status == 4)
                            <option value="pending">Pending</option>
                            <option value="accepeted" disabled>Accepted</option>
                            <option value="rejected" disabled selected>Rejected</option>
                            <option value="paid">Paid</option>
                        @else
                            <option value="pending">Pending</option>
                            <option value="accepeted" disabled>Accepted</option>
                            <option value="rejected" disabled>Rejected</option>
                            <option value="paid" selected>Paid</option>
                        @endif
                        </select>
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
                            <th class="min-w-300px w-350px">Description</th>
                            <th class="min-w-100px w-250px">Referral</th>
                            <th class="min-w-150px w-200px">Nominal</th>
                            <th class="min-w-75px w-75px text-end">Action</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($transDebit as $indexDebit => $transDebit)
                            <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                <td class="pe-10">
                                    <input type="text" class="form-control form-control-solid mb-2"
                                        name="transDebit[{{ $indexDebit }}][descriptionDebit]"
                                        placeholder="Description"
                                        wire:model.defer="transDebit.{{ $indexDebit }}.descriptionDebit" />
                                </td>
                                <td class="ps-0">
                                    <!--begin::select-->
                                    <select
                                        class="form-control form-control-white fw-bolder pe-5 form-select referraldebit"
                                        data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                        id="transDebit[{{ $indexDebit }}][referralDebit]"
                                        name="transDebit[{{ $indexDebit }}][referralDebit]"
                                        wire:ignore="transDebit.{{ $indexDebit }}.referralDebit">
                                        <option></option>
                                        @foreach ($allReferral as $ar)
                                            <option value="{{ $ar->id }}"
                                                @if ($transDebit['referralDebit'] == $ar->name) selected @endif>{{ $ar->referral }}
                                                - {{ $ar->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <!--end::select-->
                                </td>
                                <td>
                                    <input type="text" type-currency="IDR" id="transDebit[{{ $indexDebit }}][debit]"
                                        class="form-control form-control-solid"
                                        name="transDebit[{{ $indexDebit }}][debit]" placeholder="Nominal"
                                        wire:model.lazy="transDebit.{{ $indexDebit }}.debit" />
                                </td>
                                <td class="pt-5 text-end">
                                    <button wire:click.prevent="removeDebit({{ $indexDebit }})" type="button"
                                        class="btn btn-sm btn-icon btn-active-color-primary"
                                        data-kt-element="remove-item">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
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
                                <button wire:click.prevent="addDebit" class="btn btn-link py-1">Add transaction</button>
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
                            <th class="min-w-300px w-350px">Description</th>
                            <th class="min-w-100px w-250px">Referral</th>
                            <th class="min-w-150px w-200px">Nominal</th>
                            <th class="min-w-75px w-75px text-end">Action</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($transCredit as $indexCredit => $tc)
                            <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                <td class="pe-10">
                                    <input type="text" class="form-control form-control-solid mb-2"
                                        name="transCredit[{{ $indexCredit }}][descriptionCredit]"
                                        placeholder="Description"
                                        wire:model.defer="transCredit.{{ $indexCredit }}.descriptionCredit" />
                                </td>
                                <td class="ps-0">
                                    <!--begin::select-->
                                    <select
                                        class="form-control form-control-white fw-bolder pe-5 form-select referralcredit"
                                        data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                        id="transCredit[{{ $indexCredit }}][referralCredit]"
                                        name="transCredit[{{ $indexCredit }}][referralCredit]"
                                        wire:ignore="transCredit.{{ $indexCredit }}.referralCredit">
                                        <option></option>
                                        @foreach ($allReferral as $ar)
                                            <option value="{{ $ar->id }}"
                                                @if ($tc['referralCredit'] == $ar->name) selected @endif>{{ $ar->referral }}
                                                - {{ $ar->name }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::select-->
                                </td>
                                <td>
                                    <input type="text" type-currency="IDR"
                                        id="transCredit[{{ $indexCredit }}][credit]"
                                        class="form-control form-control-solid"
                                        name="transCredit[{{ $indexCredit }}][credit]" placeholder="Nominal"
                                        wire:model.lazy="transCredit.{{ $indexCredit }}.credit" />
                                </td>
                                <td class="pt-5 text-end">
                                    <button wire:click.prevent="removeCredit({{ $indexCredit }})" type="button"
                                        class="btn btn-sm btn-icon btn-active-color-primary"
                                        data-kt-element="remove-item">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
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
                                <span data-kt-element="sub-total">{{ number_format($sumCredit, 0, ',', '.') }}</span>
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
                            onchange="showFileName();" /><br>
                        <label class="file-upload-text" for="file-upload">Upload
                            file</label>
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
                            onchange="showFileNameAttach();" multiple /><br>
                        <label class="file-upload-text" for="file-upload-attach">Upload
                            file</label>
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
                    <input type="hidden" name="arrattachments">
                </div>
            </div>
            <!--end::Attachments-->

            <!--start::Submit-->
            <div class="row text-end mt-10">
                <div class="col-md-12">
                    <button type="reset" class="btn btn-light btn-active-light-primary fw-bold float-right mt-7"
                        wire:click="resetcash()">Reset</button>
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
                allowClear: true,
            });
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshDropdown', function() {
                $('.status').select2({
                    placeholder: "Select status",
                    closeOnSelect: true,
                    allowClear: true,
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
        $(document).ready(function() {
            var tempFile = {{ json_encode($this->attach) }}
            console.log($tempFile)

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
                                '<div class="col-md-4 mt-5 deleteText" id="deleteAttach' + (i + lengthTemp) +
                                '" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Delete" style="cursor:pointer;"><span style="color:red;"><i class="bi bi-file-earmark-excel d-flex flex-column deleteAttach" style="font-size: 500%; margin-bottom:5%; color:red;"></i> Only formats are allowed: .doc, .docx, .pdf, .jpg, .jpeg, .png.</span><div>'
                            );
                    }
                    $('[name="arrattachments"]').val(JSON.stringify(tempFile));
                }

                for (var j = 0; j < Object.keys(tempFile).length; j++) {
                    let val = tempFile[j]
                    $("#deleteAttach" + j).click({
                        index: j
                    }, function(e) {
                        ext = val.split('.').pop();
                        fileNameReal = $(this).text();
                        console.log()
                        if (fileNameReal[0] === " ") {
                            fileNameReal = fileNameReal.substring(1, $(this).text().length);
                        }

                        if (val.length > 20) {
                            $tempFileName = val.substring(0, 20) + '...' + ext;
                            if (fileNameReal === $tempFileName) {
                                tempFile[e.data.index] = null;
                                $(this).remove();
                            }
                        }
                        if (val.length < 20) {
                            if (fileNameReal === val) {
                                tempFile[e.data.index] = null;
                                $(this).remove();
                            }
                        }

                        if ($(this).text().substring(1, $(this).text().length) ===
                            "Only formats are allowed: .doc, .docx, .pdf, .jpg, .jpeg, .png.") {
                            tempFile[e.data.index] = null;
                            $(this).remove();
                        }

                        $('[name="arrattachments"]').val(JSON.stringify(tempFile));
                    });
                }

            }
        });
    </script>
@endpush
