@extends('layouts.app-findir')

@section('title', 'Report Preview | Finance Director')

@section('page-title') <a href="{{ route('findir.report-index') }}" class="text-dark text-hover-primary">Report</a>
@endsection

@section('sub-page-title', 'Report Preview')

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
                    <!--begin::Order summary-->
                    <div class="card card-flush py-4 mb-10">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Report Details</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                        <!--begin::Date-->
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                    <span class="svg-icon svg-icon-2 me-4">
                                                        <i class="bi bi-calendar-check fs-3"></i>
                                                    </span>
                                                    <!--end::Svg Icon-->Report Year
                                                </div>
                                            </td>
                                            <td class="fw-bolder text-end">
                                                {{ $report->year }}
                                            </td>
                                        </tr>
                                        <!--end::Date-->
                                        <!--begin::Payment method-->
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                                    <span class="svg-icon svg-icon-2 me-4">
                                                        <i class="bi bi-journal-bookmark-fill fs-3"></i>
                                                    </span>
                                                    <!--end::Svg Icon-->Report Type
                                                </div>
                                            </td>
                                            <td class="fw-bolder text-end">
                                                @if ($report->report_type == 1)
                                                    Balance Sheet
                                                @else
                                                    Profit Ledger
                                                @endif
                                            </td>
                                        </tr>
                                        <!--end::Payment method-->
                                        <!--begin::Date-->
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm006.svg-->
                                                    <span class="svg-icon svg-icon-2 me-4">
                                                        <i class="bi bi-patch-check fs-3"></i>
                                                    </span>
                                                    <!--end::Svg Icon-->Status
                                                </div>
                                            </td>
                                            <td class="fw-bolder text-end">
                                                @if ($report->status == 1)
                                                    <div class="badge badge-light-warning">Pending</div>
                                                @elseif($report->status == 2)
                                                    <div class="badge badge-light-danger">Rejected</div>
                                                @else
                                                    <div class="badge badge-light-success">Approved</div>
                                                @endif
                                            </td>
                                        </tr>
                                        <!--end::Date-->
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Order summary-->
                    <!--begin::Orders-->
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <!--begin::Product List-->
                        <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Report Summary <i class="text-muted">( In {{ $report->year }} )</i></h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            @if ($report->report_type == 1)
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr
                                                            class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th class="min-w-25px">No.</th>
                                                            <th class="min-w-200px">Aktiva</th>
                                                            <th class="min-w-150px">Nominal</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody class="fw-bold text-gray-600">
                                                        <!--begin::Products-->
                                                        <tr>
                                                            <!--begin::Product-->
                                                            <td class="fw-bolder">
                                                                1.
                                                            </td>
                                                            <!--end::Product-->
                                                            <!--begin::SKU-->
                                                            <td class="fw-bolder">AKTIVA LANCAR</td>
                                                            <!--end::SKU-->
                                                            <!--begin::Quantity-->
                                                            <td class="fw-bolder">RP.
                                                                {{ number_format($aktivalancar, 0, ',', '.') }}</td>
                                                            <!--end::Quantity-->
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                1.1. Kas
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($kas, 0, ',', '.') }}</td>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                1.2. Bank
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($bank, 0, ',', '.') }}</td>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                1.3. Biaya Dibayar Di Muka
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($biayamuka, 0, ',', '.') }}</td>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                1.4. Pajak Dibayar Di Muka
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($pajakmuka, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                1.5. <span class="fst-italic">Stock</span>
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($stock, 0, ',', '.') }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <!--begin::Product-->
                                                            <td class="fw-bolder">
                                                                2.
                                                            </td>
                                                            <!--end::Product-->
                                                            <!--begin::SKU-->
                                                            <td class="fw-bolder">
                                                                AKTIVA LAIN-LAIN
                                                            </td>
                                                            <!--end::SKU-->
                                                            <!--begin::Quantity-->
                                                            <td class="fw-bolder">RP.
                                                                {{ number_format($aktivalain, 0, ',', '.') }}</td>
                                                            <!--end::Quantity-->
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                2.1. <span class="fst-italic">Test Equipment</span>
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($test, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                2.2. <span class="fst-italic">Tools</span> dan Alat
                                                                Kerja
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($tools, 0, ',', '.') }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <!--begin::Product-->
                                                            <td class="fw-bolder">
                                                                3.
                                                            </td>
                                                            <!--end::Product-->
                                                            <!--begin::SKU-->
                                                            <td class="fw-bolder">AKTIVA TETAP</td>
                                                            <!--end::SKU-->
                                                            <!--begin::Quantity-->
                                                            <td class="fw-bolder">RP.
                                                                {{ number_format($aktivatetap, 0, ',', '.') }}</td>
                                                            <!--end::Quantity-->
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                3.1. Tanah
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($tanah, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                3.2. Bangunan
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($bangunan, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                3.3. Kendaraan
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($kendaraan, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                3.4. Peralatan Kantor
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($inventaris, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                3.5. Amortisasi
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($amortisasi, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <!--end::Products-->
                                                    </tbody>
                                                    <!--end::Table head-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr
                                                            class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th class="min-w-25px">No.</th>
                                                            <th class="min-w-200px">Pasiva</th>
                                                            <th class="min-w-150px">Nominal</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody class="fw-bold text-gray-600">
                                                        <!--begin::Products-->
                                                        <tr>
                                                            <!--begin::Product-->
                                                            <td class="fw-bolder">
                                                                4.
                                                            </td>
                                                            <!--end::Product-->
                                                            <!--begin::SKU-->
                                                            <td class="fw-bolder">HUTANG LANCAR</td>
                                                            <!--end::SKU-->
                                                            <!--begin::Quantity-->
                                                            <td class="fw-bolder">RP.
                                                                {{ number_format($hutanglancar, 0, ',', '.') }}</td>
                                                            <!--end::Quantity-->
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                4.1. Hutang Dagang
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($hutangusaha, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                4.2. Hutang kepada Bank
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($hutangbank, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                4.3. Hutang Biaya
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($hutangbiaya, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                4.4. Hutang Pajak
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($hutangpajak, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                4.5. Hutang Lain - Lain
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($hutanglain, 0, ',', '.') }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <!--begin::Product-->
                                                            <td class="fw-bolder">
                                                                5.
                                                            </td>
                                                            <!--end::Product-->
                                                            <!--begin::SKU-->
                                                            <td class="fw-bolder">
                                                                HUTANG JANGKA PANJANG
                                                            </td>
                                                            <!--end::SKU-->
                                                            <!--begin::Quantity-->
                                                            <td class="fw-bolder">RP.
                                                                {{ number_format($hutangjangkapanjang, 0, ',', '.') }}
                                                            </td>
                                                            <!--end::Quantity-->
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                5.1. Hutang <span class="fst-italic">Leasing</span>
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($hutangleasing, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                5.2. Hutang Jangka Panjang Lain
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($hutangpanjang, 0, ',', '.') }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <!--begin::Product-->
                                                            <td class="fw-bolder">
                                                                6.
                                                            </td>
                                                            <!--end::Product-->
                                                            <!--begin::SKU-->
                                                            <td class="fw-bolder">MODAL DAN LABA</td>
                                                            <!--end::SKU-->
                                                            <!--begin::Quantity-->
                                                            <td class="fw-bolder">RP.
                                                                {{ number_format($modaldanlaba, 0, ',', '.') }}</td>
                                                            <!--end::Quantity-->
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                6.1. Modal Disetor
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($modal, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                6.2. Laba Ditahan {{ $year - 1 }}
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($labaditahan, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td class="ps-10">
                                                                6.3. Laba Tahun {{ $year }}
                                                            </td>
                                                            <td class="ps-10">
                                                                Rp.
                                                                {{ number_format($laba, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <!--end::Products-->
                                                    </tbody>
                                                    <!--end::Table head-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <th class="min-w-25px p-0"></th>
                                                        <th class="min-w-200px p-0"></th>
                                                        <th class="min-w-150px p-0"></th>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody class="fw-bold text-gray-600">
                                                        <tr>
                                                            <td colspan="2" class="text-center fs-3 fw-bolder">TOTAL
                                                                AKTIVA
                                                            </td>
                                                            <td class="fs-3 fw-bolder">Rp.
                                                                {{ number_format($aktivalancar + $aktivalain + $aktivatetap, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <!--end::Table head-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <th class="min-w-25px p-0"></th>
                                                        <th class="min-w-200px p-0"></th>
                                                        <th class="min-w-150px p-0"></th>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody class="fw-bold text-gray-600">
                                                        <tr>
                                                            <td colspan="2" class="text-center fs-3 fw-bolder">TOTAL
                                                                PASIVA
                                                            </td>
                                                            <td class="fs-3 fw-bolder">Rp.
                                                                {{ number_format($hutanglancar + $hutangjangkapanjang + $modaldanlaba, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <!--end::Table head-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="min-w-25px">No.</th>
                                                    <th class="min-w-200px">Keterangan</th>
                                                    <th class="min-w-150px">Nominal</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600">
                                                <!--begin::Products-->
                                                <tr>
                                                    <!--begin::Product-->
                                                    <td class="fw-bolder">
                                                        1.
                                                    </td>
                                                    <!--end::Product-->
                                                    <!--begin::SKU-->
                                                    <td class="fw-bolder">PENDAPATAN</td>
                                                    <!--end::SKU-->
                                                    <!--begin::Quantity-->
                                                    <td class="fw-bolder">Rp.
                                                        {{ number_format($pendapatan, 0, ',', '.') }}</td>
                                                    <!--end::Quantity-->
                                                </tr>

                                                <tr>
                                                    <!--begin::Product-->
                                                    <td class="fw-bolder">
                                                        2.
                                                    </td>
                                                    <!--end::Product-->
                                                    <!--begin::SKU-->
                                                    <td class="fw-bolder">
                                                        BIAYA LANGSUNG <span class="fst-italic">(COST OF
                                                            GOODSOLD)</span>
                                                    </td>
                                                    <!--end::SKU-->
                                                    <!--begin::Quantity-->
                                                    <td class="fw-bolder">Rp.
                                                        {{ number_format($biayalangsung, 0, ',', '.') }}</td>
                                                    <!--end::Quantity-->
                                                </tr>

                                                <tr>
                                                    <!--begin::Product-->
                                                    <td class="fw-bolder">
                                                        3.
                                                    </td>
                                                    <!--end::Product-->
                                                    <!--begin::SKU-->
                                                    <td class="fw-bolder fst-italic">GROSS MARGIN
                                                    </td>
                                                    <!--end::SKU-->
                                                    <!--begin::Quantity-->
                                                    <td class="fw-bolder">Rp.
                                                        {{ number_format($gross, 0, ',', '.') }}</td>
                                                    <!--end::Quantity-->
                                                </tr>

                                                <tr>
                                                    <!--begin::Product-->
                                                    <td class="fw-bolder">
                                                        4.
                                                    </td>
                                                    <!--end::Product-->
                                                    <!--begin::SKU-->
                                                    <td class="fw-bolder">BIAYA OPERASIONAL</td>
                                                    <!--end::SKU-->
                                                    <!--begin::Quantity-->
                                                    <td class="fw-bolder">Rp.
                                                        {{ number_format($operasional, 0, ',', '.') }}</td>
                                                    <!--end::Quantity-->
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="ps-10">
                                                        4.1. Biaya Karyawan
                                                    </td>
                                                    <td class="ps-10">
                                                        Rp. {{ number_format($karyawan, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="ps-10">
                                                        4.2. Biaya Kantor
                                                    </td>
                                                    <td class="ps-10">
                                                        Rp. {{ number_format($kantor, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="ps-10">
                                                        4.3. Biaya Pemasaran
                                                    </td>
                                                    <td class="ps-10">
                                                        Rp. {{ number_format($pemasaran, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="ps-10">
                                                        4.4. Adm, Legal & <span class="fst-italic">Finance Cost</span>
                                                    </td>
                                                    <td class="ps-10">
                                                        Rp. {{ number_format($adm, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="ps-10">
                                                        4.5. Biaya Penyusutan & Amortisasi
                                                    </td>
                                                    <td class="ps-10">
                                                        Rp. {{ number_format($penyusutan, 0, ',', '.') }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <!--begin::Product-->
                                                    <td class="fw-bolder">
                                                        5.
                                                    </td>
                                                    <!--end::Product-->
                                                    <!--begin::SKU-->
                                                    <td class="fw-bolder">PELUNASAN PEMBAYARAN PAJAK</td>
                                                    <!--end::SKU-->
                                                    <!--begin::Quantity-->
                                                    <td class="fw-bolder">Rp.
                                                        {{ number_format($pajak, 0, ',', '.') }}</td>
                                                    <!--end::Quantity-->
                                                </tr>
                                                <!--end::Products-->

                                                <!--begin::Subtotal-->
                                                <tr class="text-grey-600">
                                                    <td></td>
                                                    <td class="fs-3 fw-bolder">LABA BERSIH </td>
                                                    <td class="fs-3 fw-bolder">Rp.
                                                        {{ number_format($gross - $operasional - $pajak, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <!--end::Subtotal-->
                                            </tbody>
                                            <!--end::Table head-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                            @endif
                            <!--end::Card body-->
                            <!-- begin::Footer-->
                            <div class="d-flex flex-stack flex-wrap mx-10">
                                <!-- begin::Actions-->
                                <div class="my-1">
                                    <!-- begin::Print-->
                                    <form method="post"
                                        action="{{ route('findir.report-export', ['uuid' => $uuid]) }}">
                                        @csrf
                                        <input type="hidden" name="export_format" value="pdf">
                                        <input type="hidden" name="uuid" value="{{ $uuid }}">
                                        <button type="submit" class="btn btn-danger my-1">Print
                                            Report - PDF <i>(Recommended)</i></button>
                                    </form>
                                    <!-- end::Print-->
                                </div>
                                <!-- end::Actions-->
                                <!-- begin::Action-->
                                <div class="my-1">
                                    <!-- begin::Print-->
                                    <form method="post"
                                        action="{{ route('findir.report-export', ['uuid' => $uuid]) }}">
                                        @csrf
                                        <input type="hidden" name="export_format" value="excel">
                                        <input type="hidden" name="uuid" value="{{ $uuid }}">
                                        <button type="submit" class="btn btn-success my-1">Print
                                            Report - Excel</button>
                                    </form>
                                    <!-- end::Print-->
                                </div>
                                <!-- end::Action-->
                            </div>
                            <!-- end::Footer-->
                        </div>
                        <!--end::Product List-->
                    </div>
                    <!--end::Orders-->
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
                                            <p><i>There are no activities for this report</i></p>
                                        </div>
                                    </div>
                                @else
                                    @foreach ($activity as $a)
                                        <div class="row mt-7">
                                            <div class="col-lg-1">
                                                <div class="symbol-group symbol-hover">
                                                    <!--begin::User-->
                                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                        title="{{ $a['user']['fullname'] }}"
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
                                                        @if ($a['log']->category == 'report-store')
                                                            <span>Has <i class="text-dark fw-bolder">created</i>
                                                                this
                                                                report on
                                                                {{ $a['log']->created_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'report-update')
                                                            <span>Has <b><i class="text-dark fw-bolder">updated</i></b>
                                                                this report on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'report-delete')
                                                            <span>Has <b><i class="text-dark fw-bolder">deleted</i></b>
                                                                this report on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'report-rejected')
                                                            <span>Has <b><i class="text-dark fw-bolder">rejected</i></b>
                                                                this report on
                                                                {{ $a['log']->updated_at->format('l, jS \of F Y h:i:s A') }}</span>
                                                        @elseif ($a['log']->category == 'report-approved')
                                                            <span>Has <b><i class="text-dark fw-bolder">approved</i></b>
                                                                this report on
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
@endsection
