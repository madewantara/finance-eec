@extends('layouts.app-auth')

@section('title', 'Login')

@section('body', 'id="kt_body" class="bg-body"')

@section('content')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative"
                style="background: url('assets/image/login/background.jpg'); background-repeat: no-repeat; background-size: auto 100vh;">
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y"
                    style="background: rgb(0,0,0,0.5); height: 100vh;">
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20" style="z-index: 99999999">
                        <a href="{{ asset('assets/image/logo/main-logo.png') }}" target="_blank" class="py-9">
                            <img alt="Logo" src="{{ asset('assets/image/logo/main-logo.png') }}" class="h-300px" />
                        </a>
                        <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #ffffff;">Welcome to Financial Portal</h1>
                        <p class="fw-bold fs-2" style="color: #ffffff;">PT. Era Elektra Corpora Indonesia
                            <br />Your Vision for Weather
                        </p>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST"
                            action="{{ Route('login') }}">
                            @csrf
                            <div class="text-center mb-10">
                                <h1 class="text-dark mb-3">Sign In</h1>
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                                <input class="form-control form-control-lg form-control-solid" type="email" name="email"
                                    autocomplete="off" />
                            </div>
                            <div class="fv-row mb-10">
                                <div class="d-flex flex-stack mb-2">
                                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                    <a href="../../demo7/dist/authentication/flows/aside/password-reset.html"
                                        class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                                </div>
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    name="password" autocomplete="off" />
                            </div>
                            <div class="text-center">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">Continue</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
                                <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                    <img alt="Logo" src="{{ asset('assets/image/login/google-icon.svg') }}"
                                        class="h-20px me-3" />Continue with Google
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/js/login/general.js') }}"></script>
@endpush
