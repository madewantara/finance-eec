@extends('layouts.app-exedir')

@section('title', 'Detail Mandiri Operational Transaction | Executive Director')

@section('page-title') <a href="{{ route('exedir.operational-index') }}" class="text-dark text-hover-primary">Mandiri
        Operational Journal</a>
@endsection

@section('sub-page-title', 'Detail Mandiri Operational Transaction')

@section('active-icon', 'active-sidebar-icon')

@section('active-link', 'active-sidebar-link')

@section('content')
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
                            <rect opacity="0.4" x="2" y="2" width="20" height="20" rx="10"
                                fill="currentColor"></rect>
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
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-fluid" id="kt_content_container">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10 w-lg-800px">
                    <div class="card">
                        <!-- begin::Body-->
                        <div class="card-body py-20">
                            <!-- begin::Wrapper-->
                            <div class="mx-auto w-100">
                                <!-- begin::Header-->
                                <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
                                    <h4 class="fw-boldest text-gray-800 fs-2qx pe-5 pb-7">TRANSACTION
                                        <br>SUMMARY
                                    </h4>
                                    <!--end::Logo-->
                                    <div class="text-sm-end">
                                        <!--begin::Logo-->
                                        <a href="#" class="d-block mw-150px ms-sm-auto">
                                            <img alt="Logo" src="{{ asset('assets/image/logo/main-logo.png') }}"
                                                class="w-100">
                                        </a>
                                        <!--end::Logo-->
                                        <!--begin::Text-->
                                        <div class="text-sm-end fw-bold fs-4 text-muted mt-7">
                                            <div>Grand Palace Rukan A-16. Jl. Benyamin Suaeb No. 5 -
                                                Kemayoran.
                                            </div>
                                            <div>Jakarta Pusat - 10530</div>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="pb-12">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column gap-7 gap-md-10">
                                        <!--begin::Message-->
                                        <div class="fw-bolder fs-1">{{ $transaction[0]->token }}
                                            <br>
                                            <span class="text-muted fs-5">Paid to &ensp;&ensp;:&ensp;
                                                {{ $transaction[0]->paid_to }}</span>
                                        </div>
                                        <!--begin::Message-->
                                        <!--begin::Separator-->
                                        <div class="separator"></div>
                                        <!--begin::Separator-->
                                        <!--begin::Order details-->
                                        <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bolder">
                                            <div class="flex-root d-flex flex-column">
                                                <span class="text-muted">Date</span>
                                                <span
                                                    class="fs-5">{{ date('d F Y', strtotime($transaction[0]->date)) }}</span>
                                            </div>
                                            <div class="flex-root d-flex flex-column">
                                                <span class="text-muted">Project</span>
                                                @if (empty($transaction[0]->transactionProject))
                                                    <span class="fs-5">-</span>
                                                @else
                                                    <span class="fs-5">
                                                        @if ($transaction[0]->transactionProject->category_id == 1)
                                                            Radar Upgrade
                                                        @elseif($transaction[0]->transactionProject->category_id == 2)
                                                            Radar Spare Part
                                                        @elseif($transaction[0]->transactionProject->category_id == 3)
                                                            Radar Reinstallation
                                                        @elseif($transaction[0]->transactionProject->category_id == 4)
                                                            Preventive Maintenance
                                                        @elseif($transaction[0]->transactionProject->category_id == 5)
                                                            New Radar
                                                        @elseif($transaction[0]->transactionProject->category_id == 6)
                                                            Corrective Maintenance
                                                        @endif
                                                        - {{ $transaction[0]->transactionProject->name }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="flex-root d-flex flex-column">
                                                <span class="text-muted">PIC</span>
                                                @if (empty($transaction[0]->pic))
                                                    <span class="fs-5">-</span>
                                                @else
                                                    <span class="fs-5">{{ $transaction[0]->pic }}</span>
                                                @endif
                                            </div>
                                            <div class="flex-root d-flex flex-column">
                                                <span class="text-muted">Status</span>
                                                <span class="fs-5">
                                                    @if ($transaction[0]->status == 1 || $transaction[0]->status == 2)
                                                        <td class="text-center"><span
                                                                class="badge badge-light-warning fw-bolder">
                                                                Pending</span></td>
                                                    @elseif ($transaction[0]->status == 3)
                                                        <td class="text-center"><span
                                                                class="badge badge-light-success fw-bolder">
                                                                Approved</span></td>
                                                    @elseif ($transaction[0]->status == 4)
                                                        <td class="text-center"><span
                                                                class="badge badge-light-primary fw-bolder">
                                                                Paid</span></td>
                                                    @else
                                                        <td class="text-center"><span
                                                                class="badge badge-light-danger fw-bolder">
                                                                Rejected</span></td>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <!--end::Order details-->
                                        <!--begin:Order summary-->
                                        <div class="d-flex justify-content-between flex-column">
                                            <!--begin::Table-->
                                            <div class="table-responsive border-bottom mb-9">
                                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                    <thead>
                                                        <tr class="border-bottom fs-6 fw-bolder text-muted">
                                                            <th class="min-w-175px pb-2">Description</th>
                                                            <th class="min-w-70px pb-2">Referral</th>
                                                            <th class="min-w-80px text-end pb-2">Debit</th>
                                                            <th class="min-w-100px text-end pb-2">Credit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="fw-bold text-gray-600">
                                                        @foreach ($transaction as $t)
                                                            <tr>
                                                                <td>{{ $t->description }}</td>
                                                                <td>
                                                                    {{ $t->transactionAccount[0]->referral }} -
                                                                    {{ $t->transactionAccount[0]->name }}
                                                                </td>
                                                                @if ($t->debit == 0)
                                                                    <td class="text-end">-
                                                                    </td>
                                                                @else
                                                                    <td class="text-end">Rp.
                                                                        {{ number_format($t->debit, 0, ',', '.') }}
                                                                    </td>
                                                                @endif
                                                                @if ($t->credit == 0)
                                                                    <td class="text-end">-
                                                                    </td>
                                                                @else
                                                                    <td class="text-end">Rp.
                                                                        {{ number_format($t->credit, 0, ',', '.') }}
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td colspan="3" class="fs-3 text-dark fw-bolder text-end">
                                                                Grand
                                                                Total</td>
                                                            <td class="text-dark fs-3 fw-boldest text-end">
                                                                <?php $sum = 0; ?>
                                                                @for ($i = 0; $i < count($transaction); $i++)
                                                                    <?php $sum = $sum + $transaction[$i]->debit; ?>
                                                                @endfor
                                                                Rp. {{ number_format($sum, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end::Table-->
                                            <div class="row">
                                                <div class="col-md-4 mt-5">
                                                    <label class="fs-5 fw-bold">Transaction Report</label>
                                                    @if (!empty($report[0]))
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                @if (pathinfo($report[0]->name, PATHINFO_EXTENSION) == 'jpg' || pathinfo($report[0]->name, PATHINFO_EXTENSION) == 'png' || pathinfo($report[0]->name, PATHINFO_EXTENSION) == 'jpeg')
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#reportModal">
                                                                        <div class="mt-5"> <i
                                                                                class="bi bi-file-earmark-image-fill text-success attach-cash"
                                                                                style="font-size: 500%;margin-bottom:5%;"><span
                                                                                    class="fs-7 text-dark d-block mt-3 attach-cash"
                                                                                    style="line-height: 15px">{{ $report[0]->name }}</span></i>
                                                                        </div>
                                                                    </a>
                                                                @elseif(pathinfo($report[0]->name, PATHINFO_EXTENSION) == 'doc' || pathinfo($report[0]->name, PATHINFO_EXTENSION) == 'docx')
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#reportModal">
                                                                        <div class="mt-5"> <i
                                                                                class="bi bi-file-earmark-word-fill text-primary attach-cash"
                                                                                style="font-size: 500%;margin-bottom:5%;"><span
                                                                                    class="fs-7 text-dark d-block mt-3 attach-cash"
                                                                                    style="line-height: 15px">{{ $report[0]->name }}</span></i>
                                                                        </div>
                                                                    </a>
                                                                @elseif(pathinfo($report[0]->name, PATHINFO_EXTENSION) == 'pdf')
                                                                    <a type="button"
                                                                        href="{{ asset('storage/Operational/' . $transaction[0]->uuid . '/' . $report[0]->name) }}"
                                                                        target="_blank">
                                                                        <div class="mt-5"> <i
                                                                                class="bi bi-file-earmark-pdf-fill text-danger attach-cash"
                                                                                style="font-size: 500%;margin-bottom:5%;"><span
                                                                                    class="fs-7 text-dark d-block mt-3 attach-cash"
                                                                                    style="line-height: 15px">{{ $report[0]->name }}</span></i>
                                                                        </div>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p>No Transaction Report</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-8 mt-5">
                                                    <label class="fs-5 fw-bold">Attachments</label>
                                                    @if (!empty($attach[0]))
                                                        <div class="row">
                                                            @foreach ($attach as $index => $atc)
                                                                <div class="col-md-2">
                                                                    @if (pathinfo($atc->name, PATHINFO_EXTENSION) == 'jpg' || pathinfo($atc->name, PATHINFO_EXTENSION) == 'png' || pathinfo($atc->name, PATHINFO_EXTENSION) == 'jpeg')
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#reportModal{{ $index }}">
                                                                            <div class="mt-5"> <i
                                                                                    class="bi bi-file-earmark-image-fill text-success attach-cash"
                                                                                    style="font-size: 500%;margin-bottom:5%;"><span
                                                                                        class="fs-7 text-dark d-block mt-3 attach-cash"
                                                                                        style="line-height: 15px">{{ $atc->name }}</span></i>
                                                                            </div>
                                                                        </a>
                                                                    @elseif(pathinfo($atc->name, PATHINFO_EXTENSION) == 'doc' || pathinfo($atc->name, PATHINFO_EXTENSION) == 'docx')
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#reportModal{{ $index }}">
                                                                            <div class="mt-5"> <i
                                                                                    class="bi bi-file-earmark-word-fill text-primary attach-cash"
                                                                                    style="font-size: 500%;margin-bottom:5%;"><span
                                                                                        class="fs-7 text-dark d-block mt-3 attach-cash"
                                                                                        style="line-height: 15px">{{ $atc->name }}</span></i>
                                                                            </div>
                                                                        </a>
                                                                    @elseif(pathinfo($atc->name, PATHINFO_EXTENSION) == 'pdf')
                                                                        <a type="button"
                                                                            href="{{ asset('storage/Operational/' . $transaction[0]->uuid . '/' . $atc->name) }}"
                                                                            target="_blank">
                                                                            <div class="mt-5"> <i
                                                                                    class="bi bi-file-earmark-pdf-fill text-danger attach-cash"
                                                                                    style="font-size: 500%;margin-bottom:5%;"><span
                                                                                        class="fs-7 text-dark d-block mt-3 attach-cash"
                                                                                        style="line-height: 15px">{{ $atc->name }}</span></i>
                                                                            </div>
                                                                        </a>
                                                                    @endif
                                                                    <!-- Attach Modal -->
                                                                    <div class="modal fade"
                                                                        id="reportModal{{ $index }}"
                                                                        tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog modal-fullscreen">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="modalLabel">
                                                                                        {{ $atc->name }}
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body text-center">
                                                                                    @if (pathinfo($atc->name, PATHINFO_EXTENSION) == 'doc' || pathinfo($atc->name, PATHINFO_EXTENSION) == 'docx')
                                                                                        <iframe
                                                                                            src='https://view.officeapps.live.com/op/embed.aspx?src={{ asset('storage/Operational/' . $transaction[0]->uuid . '/' . $atc->name) }}'
                                                                                            width='100%' height='100%'
                                                                                            frameborder='0'></iframe>
                                                                                    @elseif(pathinfo($atc->name, PATHINFO_EXTENSION) == 'jpg' || pathinfo($atc->name, PATHINFO_EXTENSION) == 'png' || pathinfo($atc->name, PATHINFO_EXTENSION) == 'jpeg')
                                                                                        <img class="img img-fluid"
                                                                                            src="{{ asset('storage/Operational/' . $transaction[0]->uuid . '/' . $atc->name) }}"
                                                                                            alt="{{ $atc->name }}"
                                                                                            style="max-width: 100%; height: auto;">
                                                                                    @endif
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                    <a type="button"
                                                                                        class="btn btn-primary"
                                                                                        href="{{ asset('storage/Operational/' . $transaction[0]->uuid . '/' . $atc->name) }}"
                                                                                        download="">Download</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <p>No Attachments</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!--end:Order summary-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Body-->
                                <!-- begin::Footer-->
                                <div class="d-flex flex-stack flex-wrap mt-lg-20 pt-13">
                                    <!-- begin::Actions-->
                                    <div class="my-1 me-5">
                                        <!-- begin::Print-->
                                        <form method="post"
                                            action="{{ route('exedir.operational-detail-export', ['uuid' => $transaction[0]->uuid]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-success my-1 me-12">Print
                                                Transaction</button>
                                        </form>
                                        <!-- end::Print-->
                                    </div>
                                    <!-- end::Actions-->
                                </div>
                                <!-- end::Footer-->
                            </div>
                            <!-- end::Wrapper-->
                        </div>
                        <!-- end::Body-->
                    </div>
                </div>
                <!--begin::Sidebar-->
                <div class="flex-lg-auto w-lg-450px">
                    <!--begin::Card-->
                    <div class="card card-flush" data-kt-sticky="true" data-kt-sticky-name="invoice"
                        data-kt-sticky-offset="{default: false, lg: '200px'}"
                        data-kt-sticky-width="{md: 'auto', lg: '450px'}" data-kt-sticky-left="auto"
                        data-kt-sticky-top="30px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                        <div class="card-header pt-7">
                            <div class="card-title">
                                <h2 class="fw-bolder">Activity</h2>
                            </div>
                        </div>
                        <div class="separator separator-dashed border-gray-200"></div>
                        <!--begin::Card body-->
                        <div class="card-body p-0 ps-10 pe-10 pb-10">
                            <div class="scroll-y me-n5 pe-5 h-550px" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-offset="5px">
                                @if (count($activity) == 0)
                                    <div class="row mt-7">
                                        <div class="col-lg-12">
                                            <p><i>There are no activities for this transaction</i></p>
                                        </div>
                                    </div>
                                @else
                                    @foreach ($activity as $a)
                                        <div class="row mt-7">
                                            <div class="col-lg-1">
                                                <div class="symbol-group symbol-hover">
                                                    <!--begin::User-->
                                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                        title=""
                                                        data-bs-original-title="{{ $a['user']['fullname'] }}">
                                                        <img class="img img-fluid" src="{{ $a['user']['avatar'] }}"
                                                            alt="image" style="max-width: 100%;">
                                                    </div>
                                                    <!--end::User-->
                                                </div>
                                            </div>
                                            <div class="col-lg-11">
                                                <div class="symbol-group symbol-hover">
                                                    <div>
                                                        <p class="mb-0 fw-bolder">{{ $a['user']['fullname'] }}
                                                        </p>
                                                        @if ($a['log']->category == 'operational-store')
                                                            <span>Has <i class="text-dark fw-bolder">created</i>
                                                                this
                                                                transaction on
                                                                {{ $a['log']->created_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'operational-update')
                                                            <span>Has <b><i class="text-dark fw-bolder">updated</i></b>
                                                                this transaction on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'operational-delete')
                                                            <span>Has <b><i class="text-dark fw-bolder">deleted</i></b>
                                                                this transaction on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'operational-approved-findir')
                                                            <span>Has <b><i class="text-dark fw-bolder">approved</i></b>
                                                                this transaction on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'operational-approved-excdir')
                                                            <span>Has <b><i class="text-dark fw-bolder">approved</i></b>
                                                                this transaction on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'operational-rejected')
                                                            <span>Has <b><i class="text-dark fw-bolder">rejected</i></b>
                                                                this transaction on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'operational-paid')
                                                            <span>Has <b><i class="text-dark fw-bolder">paid</i></b>
                                                                this transaction on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Sidebar-->
                <!--end::Content-->
            </div>
            <!--end::Layout-->
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
                        <rect fill="#000000" opacity="0.5" x="11" y="10" width="2"
                            height="10" rx="1" />
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
    <!-- Report Modal -->
    @if (!empty($report[0]))
        <div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $report[0]->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        @if (pathinfo($report[0]->name, PATHINFO_EXTENSION) == 'doc' || pathinfo($report[0]->name, PATHINFO_EXTENSION) == 'docx')
                            <iframe
                                src='https://view.officeapps.live.com/op/embed.aspx?src={{ asset('storage/Operational/' . $transaction[0]->uuid . '/' . $report[0]->name) }}'
                                width='100%' height='100%' frameborder='0'></iframe>
                        @elseif(pathinfo($report[0]->name, PATHINFO_EXTENSION) == 'jpg' || pathinfo($report[0]->name, PATHINFO_EXTENSION) == 'png' || pathinfo($report[0]->name, PATHINFO_EXTENSION) == 'jpeg')
                            <img class="img img-fluid"
                                src="{{ asset('storage/Operational/' . $transaction[0]->uuid . '/' . $report[0]->name) }}"
                                alt="{{ $report[0]->name }}" style="max-width: 100%; height: auto;">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a type="button" class="btn btn-primary"
                            href="{{ asset('storage/Operational/' . $transaction[0]->uuid . '/' . $report[0]->name) }}"
                            download="">Download</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('js')
    <script src="{{ asset('assets/js/executive-director/create.js') }}"></script>
@endpush
