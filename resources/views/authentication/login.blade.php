@extends('layouts.app-auth')

@section('title', 'Sign In | EEC Indonesia')

@section('body', 'id="kt_body" class="bg-body"')

@section('content')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-size: 100%; background-image: url('/assets/image/login/development-hd.png')">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="{{ route('dashboard') }}" class="mb-5">
                    <img alt="Logo" src="{{ asset('assets/image/logo/logo.png') }}" class="h-150px" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto"
                    style="border-radius: 1rem !important;">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}"
                        method="POST">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-8">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Sign In to Finance Portal</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-7"><i class="fs-4">Sign in to your account</i>
                            </div>
                            <!--end::Link-->
                        </div>
                        <!--end::Heading-->
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center"
                            role="alert">
                                <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.4" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                                        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"></rect>
                                        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"></rect>
                                    </svg>
                                </span>
                                <div>
                                    {{ Session::get('error') }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close" style="top:5px;"></button>
                            </div>
                        @elseif (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center"
                                role="alert">
                                <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <div>
                                    {{ Session::get('success') }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close" style="top:5px;"></button>
                            </div>
                        @endif
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark"><span
                                    class="required">Email</span></label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="email" name="email"
                                autocomplete="off" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0"><span
                                        class="required">Password</span></label>
                                <!--end::Label-->
                                <!--begin::Link-->
                                <a href="../../demo6/dist/authentication/flows/dark/password-reset.html"
                                    class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password"
                                autocomplete="off" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Continue</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Submit button-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="https://eecindonesia.co.id/" target="_blank"
                        class="text-muted text-hover-primary px-2">About</a>
                    <a href="https://eecindonesia.co.id/#contact-1" target="_blank"
                        class="text-muted text-hover-primary px-2">Contact
                        Us</a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/js/login/general.js') }}"></script>
    <script>
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
          });
        }, 10000);
    </script>
@endpush
