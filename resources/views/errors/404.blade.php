<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>Page Not Found | EEC Indonesia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:title" content="Page Not Found || EEC Indonesia" />
    <meta property="og:site_name" content="Page Not Found || EEC Indonesia" />
    <link rel="shortcut icon" href="{{ asset('assets/image/logo/logo.png') }}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="{{ asset('assets/css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Error 404 -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url({{ asset('assets/image/error/404.png') }})">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-20">
                <!--begin::Logo-->
                <a href="{{ route('dashboard') }}" class="pt-lg-20">
                    <img alt="Logo" src="{{ asset('assets/image/logo/logo.png') }}" class="h-150px mb-5" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="pt-lg-10">
                    <!--begin::Logo-->
                    <h1 class="fw-bolder fs-4x text-gray-800 mb-10">Page Not Found</h1>
                    <!--end::Logo-->
                    <!--begin::Message-->
                    <div class="fw-bold fs-3 text-muted mb-15">You didn't break the internet!
                        <br />But we can't find what are you looking for.
                    </div>
                    <!--end::Message-->
                    <!--begin::Action-->
                    <div class="text-center">
                        <a href="{{ route('dashboard') }}" class="btn btn-lg btn-primary fw-bolder">Go to
                            homepage</a>
                    </div>
                    <!--end::Action-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="https://eecindonesia.co.id/" class="text-muted text-hover-primary px-2">About</a>
                    <a href="https://eecindonesia.co.id/#contact-1" class="text-muted text-hover-primary px-2">Contact
                        Us</a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Error 404-->
    </div>
    <!--end::Main-->
    <!--begin::Javascript-->
    <script src="{{ asset('assets/js/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
