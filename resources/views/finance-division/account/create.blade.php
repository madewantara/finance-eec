@extends('layouts.app-findiv')

@section('title', 'Add Account | Finance Division')

@section('page-title') <a href="{{ route('findiv.account-index') }}" class="text-dark text-hover-primary">Account</a>
@endsection

@section('sub-page-title', 'Add Account')

@section('active-icon', 'active-sidebar-icon')

@section('active-link', 'active-sidebar-link')

@section('content')
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
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!--begin::Layout-->
            <!--begin::Content-->
            <div class="row me-lg-5 order-2 order-lg-1 mb-10 mb-lg-0">
                <div class="col-lg-4 mt-2">
                    @livewire('filter-create-account')
                </div>
                <div class="col-lg-5 mt-2">
                    <!--begin::Card-->
                    <div class="card card-flush pt-3 mb-5 mb-lg-10">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bolder">Add Account</h2>
                            </div>
                            <!--begin::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <form class="form-create" method="POST" action="{{ route('findiv.account-post') }}"
                                id="form-account" novalidate>
                                @csrf
                                <div class="form-group">
                                    <label for="referral"
                                        class="text-start text-muted fw-bolder fs-6 text-uppercase gs-0"><span
                                            class="required">Referral</span></label>
                                    <input type="text" class="form-control mt-3 @error('referral') is-invalid @enderror"
                                        value="{{ old('referral') }}" name="referral" id="referral"
                                        placeholder="12.34(.xx)" required>
                                    <div class="invalid-feedback">*Referral is required</div>
                                </div>
                                <div class="form-group">
                                    <label for="name"
                                        class="text-start text-muted fw-bolder fs-6 text-uppercase gs-0 mt-5"><span
                                            class="required">Name</span></label>
                                    <input type="text" class="form-control mt-3 @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" name="name" id="name" placeholder="Name" required>
                                    <div class="invalid-feedback">*Name is required</div>
                                </div>
                                <div class="form-group">
                                    <label for="category"
                                        class="text-start text-muted fw-bolder fs-6 text-uppercase gs-0 mt-5"><span
                                            class="required">Category</span></label>
                                    <label class="text-start text-muted fw-bolder gs-0" for="reminder-category"
                                        style="font-size: 12px; display:block;">* Please use capital
                                        letter for each word if
                                        you add new category.</label>
                                    <select
                                        class="form-control form-select mt-3 category custom-select @error('category') is-invalid @enderror"
                                        name="category" id="category" data-pharaonic="select2" required>
                                        <option></option>
                                        @foreach ($allCategory as $cat)
                                            <option style="color:#181c32;" value={{ $cat }}>
                                                {{ preg_replace('/([a-z])([A-Z])/s', '$1 $2', $cat) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">*Category is required</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary float-right mt-7">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--begin::Sidebar-->
                <div class="col-lg-3 mt-2">
                    <!--begin::Card-->
                    <div class="card card-flush" data-kt-sticky="true" data-kt-sticky-name="invoice"
                        data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-left="auto"
                        data-kt-sticky-width="{lg: '405px', lg: '405px'}" data-kt-sticky-top="30px"
                        data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
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
                                <div class="row mt-7">
                                    <div class="col-lg-12">
                                        <p><i>There are no activities for this account</i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Sidebar-->
            </div>
            <!--end::Content-->
            <!--end::Layout-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
@endsection

@push('js')
    <script src="{{ asset('vendor/pharaonic/pharaonic.select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.category').select2({
                placeholder: "Select category",
                closeOnSelect: true,
                allowClear: true,
            });
        });
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 10000);
    </script>
    <script>
        $('#form-account input').on("input", function() {
            field = $(this).attr('id');

            if ($('#' + field).val() == '') {
                $(this).removeClass('is-valid');
                $(this).addClass('is-invalid');
            }

            if ($('#' + field).val() != '') {
                $(this).removeClass('is-invalid');
                $(this).addClass("is-valid");
            }
        });

        $('#form-account select').change(function() {
            field = $(this).attr('id');

            if (!$('#' + field).val()) {
                $('#' + field).removeClass('is-valid');
                $('.select2-selection').removeClass('is-valid');
                $('#' + field).addClass("is-invalid");
                $('.select2-selection').addClass("is-invalid");
            }

            if ($('#' + field).val()) {
                $('#' + field).removeClass('is-invalid');
                $('#' + field).addClass("is-valid");

                $('.select2-selection').removeClass('is-invalid');
                $('.select2-selection').addClass("is-valid");
            }
        });
    </script>
    <script>
        ! function() {
            "use strict";
            window.addEventListener("load", function() {
                var e = document.getElementById("form-account");
                e.addEventListener("submit", function(t) {
                    !1 === e.checkValidity() && (t.preventDefault(), t.stopPropagation()), e.classList.add(
                        "was-validated"), $('.select2-selection').addClass('was-validated');
                }, !1)
            }, !1)
        }()
    </script>
@endpush
