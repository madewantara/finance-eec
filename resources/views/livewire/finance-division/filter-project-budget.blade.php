<div class="card card-flush mt-6 mt-xl-9">
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
    <!--begin::Card header-->
    <div class="card-header mt-5">
        <!--begin::Card title-->
        <div class="card-title flex-column">
            <h3 class="fw-bolder mb-1">Project Spendings</h3>
            <div class="fs-6 text-gray-400">Total {{ count($transaction) }} transactions</div>
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar my-1">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-3 position-absolute ms-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="black">
                        </rect>
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="black"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" id="kt_filter_search" wire:model="search"
                    class="form-control form-control-solid form-select-sm w-150px ps-9"
                    placeholder="Search transaction">
            </div>
            <!--end::Search-->
        </div>
        <!--begin::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <div id="kt_profile_overview_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table id="kt_profile_overview_table"
                        class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder dataTable no-footer">
                        <!--begin::Head-->
                        <thead class="fs-7 text-gray-400 text-uppercase">
                            <tr>
                                <th class="min-w-20px">Date</th>
                                <th class="min-w-70px">Token</th>
                                <th class="min-w-150px">Description</th>
                                <th class="min-w-70px">Referral</th>
                                <th class="min-w-150px text-center">Debit</th>
                                <th class="min-w-150px text-center">Credit</th>
                                <th class="min-w-70px">Paid To</th>
                                <th class="min-w-50px">Status</th>
                                <th class="min-w-50px text-center">Journal</th>
                                <th class="min-w-50px text-end">Details</th>
                            </tr>
                        </thead>
                        <!--end::Head-->
                        <!--begin::Body-->
                        <tbody class="fs-7 text-gray-600 fw-bold">
                            @if (count($transaction) == 0)
                                <tr>
                                    <td colspan="10" class="text-muted fst-italic mt-5 text-center">There are no
                                        transactions
                                    </td>
                                </tr>
                            @else
                                @foreach ($transaction as $trans)
                                    <tr>
                                        <td class="text-center">
                                            {{ $trans[0]->date }}
                                        </td>
                                        <td class="text-center">{{ $trans[0]->token }}</td>
                                        <td>
                                            @foreach ($trans as $t)
                                                {{ $t->description }}<br>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @foreach ($trans as $t)
                                                {{ $t->transactionAccount[0]->referral }}<br>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @foreach ($trans as $t)
                                                @if (empty($t->debit))
                                                    -<br>
                                                @else
                                                    Rp. {{ number_format($t->debit, 0, ',', '.') }}<br>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @foreach ($trans as $t)
                                                @if (empty($t->credit))
                                                    -<br>
                                                @else
                                                    Rp. {{ number_format($t->credit, 0, ',', '.') }}<br>
                                                @endif
                                            @endforeach
                                        </td>

                                        <td class="text-center">{{ $trans[0]->paid_to }}</td>

                                        @if ($trans[0]->status == 1 || $trans[0]->status == 2)
                                            <td class="text-center"><span
                                                    class="badge badge-light-warning fw-bolder">
                                                    Pending</span></td>
                                        @elseif ($trans[0]->status == 3)
                                            <td class="text-center"><span
                                                    class="badge badge-light-success fw-bolder">
                                                    Approved</span></td>
                                        @elseif ($trans[0]->status == 4)
                                            <td class="text-center"><span
                                                    class="badge badge-light-primary fw-bolder">
                                                    Paid</span></td>
                                        @else
                                            <td class="text-center"><span class="badge badge-light-danger fw-bolder">
                                                    Rejected</span></td>
                                        @endif

                                        @if ($trans[0]->category == 'cash')
                                            <td class="text-center"><span
                                                    class="badge badge-success fw-bolder text-white">
                                                    Cash</span></td>
                                        @elseif ($trans[0]->category == 'operational')
                                            <td class="text-center"><span
                                                    class="badge badge-primary fw-bolder text-white">
                                                    Mandiri Operational</span></td>
                                        @else
                                            <td class="text-center"><span
                                                    class="badge badge-danger fw-bolder text-white">
                                                    Mandiri Escrow</span></td>
                                        @endif

                                        <td class="text-end">
                                            @if ($trans[0]->category == 'cash')
                                                <a href="{{ route('findiv.cash-detail', ['uuid' => $trans[0]->uuid]) }}"
                                                    class="btn btn-light btn-active-light-primary btn-sm"
                                                    style="padding: 5px 10px;">
                                                    View
                                                </a>
                                            @elseif ($trans[0]->category == 'operational')
                                                <a href="{{ route('findiv.operational-detail', ['uuid' => $trans[0]->uuid]) }}"
                                                    class="btn btn-light btn-active-light-primary btn-sm"
                                                    style="padding: 5px 10px;">
                                                    View
                                                </a>
                                            @else
                                                <a href="{{ route('findiv.escrow-detail', ['uuid' => $trans[0]->uuid]) }}"
                                                    class="btn btn-light btn-active-light-primary btn-sm"
                                                    style="padding: 5px 10px;">
                                                    View
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <!--end::Body-->
                    </table>
                </div>
                <div class="row">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="dataTables_length me-3" id="kt_profile_overview_table_length">
                            <label><select name="kt_profile_overview_table_length"
                                    aria-controls="kt_profile_overview_table"
                                    class="form-select form-select-sm form-select-solid" wire:model="pagesize">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                </select></label>
                        </div>
                        <div class="fs-6 fw-bold text-gray-700">Showing {{ count($transaction) }} of
                            {{ count($uuidTrans) }}
                            entries
                        </div>
                    </div>
                    <div
                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_profile_overview_table_paginate">
                            <!--begin::Pages-->
                            {{ $transaction->links() }}
                            <!--end::Pages-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--end::Card body-->
</div>
