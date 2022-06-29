@extends('layouts.app-findiv')

@section('title', 'My Profile | Finance Division')

@section('page-title', 'My Profile')

@section('sub-page-title', 'Profile Overview')

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
        <div id="kt_content_container" class="container">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                        <!--begin: Pic-->
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="{{ $dataUser['avatar'] }}" alt="image" />
                                <div
                                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px">
                                </div>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <p class="text-gray-900 fs-2 fw-bolder me-1 mt-3 mb-0">
                                            {{ $dataUser['fullname'] }}</p>
                                        <div class="bg-light-success fw-bolder text-success ms-2 fs-8 py-1 px-3">
                                            {{ $dataUser['Contracts'][0]['Position']['title'] }}</div>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-2 pe-2">
                                        <div class="d-flex align-items-center text-gray-400 me-5 mb-2">
                                            <!--begin::Svg Icon | path: icons/duotone/General/User.svg-->
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path
                                                            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path
                                                            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->{{ $dataUser['Contracts'][0]['Position']['Department']['name'] }}
                                        </div>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Title-->
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="fs-3 fw-bolder">
                                                {{ $dataUser['Contracts'][0]['JobType']['type'] }}</div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">Job Type</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="fs-3 fw-bolder" data-kt-countup="true"
                                                data-kt-countup-value="{{ $dataUser['Contracts'][0]['base_salary'] }}"
                                                data-kt-countup-prefix="Rp.">
                                                {{ number_format($dataUser['Contracts'][0]['base_salary'], 0, ',', '.') }}
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-bold fs-6 text-gray-400">Base Salary</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                </div>
            </div>
            <!--end::Navbar-->
            <!--begin::details View-->
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Profile Details</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <!--begin::Row-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Employee ID</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bolder fs-6 text-gray-800">{{ $dataUser['nip'] }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Full Name</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bolder fs-6 text-gray-800">{{ ucfirst($dataUser['fullname']) }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Address</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <span
                                        class="fw-bolder text-gray-800 fs-6">{{ ucfirst($dataUser['address']) }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Contact Phone 1</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bolder fs-6 text-gray-800">{{ $dataUser['employee_phone_1'] }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Contact Phone 2</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bolder fs-6 text-gray-800">{{ $dataUser['employee_phone_2'] }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Email</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bolder fs-6 text-gray-800">{{ $dataUser['User']['email'] }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Office</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bolder fs-6 text-gray-800">{{ ucfirst($dataUser['Office']['name']) }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-lg-6">
                            <!--begin::Row-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">ID Number</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bolder fs-6 text-gray-800">{{ $dataUser['id_number'] }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Place of Birth</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bolder fs-6 text-gray-800">{{ ucfirst($dataUser['place_of_birth']) }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Date of Birth</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <span
                                        class="fw-bolder text-gray-800 fs-6">{{ date('F j, Y', strtotime($dataUser['date_of_birth'])) }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Gender</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 d-flex align-items-center">
                                    <span
                                        class="fw-bolder fs-6 text-gray-800 me-2">{{ ucfirst($dataUser['gender']) }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Nationality</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bolder fs-6 text-gray-800">{{ ucfirst($dataUser['nationality']) }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Marital Status</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bolder fs-6 text-gray-800">{{ ucfirst($dataUser['marital_status']) }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-bold text-muted">Religion</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bolder fs-6 text-gray-800">{{ $dataUser['religion'] }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::details View-->
            <!--begin::details View-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Emergency Contact</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Full Name</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $dataUser['ec_fullname'] }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Email</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $dataUser['ec_email'] }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Phone</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bolder text-gray-800 fs-6">{{ ucfirst($dataUser['ec_phone']) }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Relation</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bolder text-gray-800 fs-6">{{ ucfirst($dataUser['ec_relation']) }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::details View-->
            <!--begin::details View-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Signature</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <!--begin::Row-->
                    <div class="row mb-7 justify-content-center">
                        <img src="{{ asset('storage/Signature/' . $signature[0]->image) }}" alt="image"
                            class="img img-fluid" style="width: 15%; height:auto;">
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#updateSignature">
                            Update Signature
                        </button>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::details View-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
    <!--Modal Signature-->
    <div class="modal fade" id="updateSignature" tabindex="-1" aria-labelledby="updateSignature" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Signature</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form" id="formSign"
                        action="{{ route('findiv.signature-update', ['userid' => session('user')['nip']]) }}" novalidate
                        method="post" onkeydown="return event.key != 'Enter';" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="fv-row row fv-plugins-icon-container">
                            <div class="col-md-12 mt-n5 text-center">
                                <input type="file" id="file-upload" name="signature" accept="image/*"
                                    style="display: none" onchange="loadFile(event)"
                                    class="form-control @error('signature') is-invalid @enderror" required /><br>
                                <label class="file-upload-text w-100 text-center" for="file-upload">Upload
                                    file</label>
                                @error('signature')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                @enderror
                                <img id="prevImg" class="img img-fluid mt-3" style="width: 30%; height: auto;">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="formSign">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10"
                        rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
@endsection

@push('js')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
    </script>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('prevImg');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
@endpush
