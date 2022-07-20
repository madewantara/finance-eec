<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />

    <!--====== Title ======-->
    <title>Welcome! Finance Portal | EEC Indonesia</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/image/logo/logo.png') }}" type="image/png" />

    <!--====== CSS Files LinkUp ======-->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets-landing/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets-landing/css/lineIcons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets-landing/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets-landing/css/style.css') }}" />
</head>

<body>
    <!--====== PRELOADER PART START ======-->
    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->
    <header class="header-area" style="height: 95vh;">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#" style="max-width: 10%;">
                                <img src="{{ asset('assets/image/logo/logo.png') }}" alt="Logo" />
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"> </span>
                                <span class="toggler-icon"> </span>
                                <span class="toggler-icon"> </span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://eecindonesia.co.id/" target="_blank">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://eecindonesia.co.id/#contact-1" target="_blank">Contact
                                            Us</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- navbar collapse -->

                            <div class="navbar-btn d-none d-sm-inline-block">
                                <a class="main-btn" data-scroll-nav="0" href="{{ route('login') }}" rel="nofollow">
                                    Sign-In
                                </a>
                            </div>
                        </nav>
                        <!-- navbar -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- navbar area -->

        <div id="home" class="header-hero bg_cover"
            style="background-image: url('assets-landing/images/header/banner-bg.svg')">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="header-hero-content text-center">
                            <h3 class="header-sub-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                                Welcome to,
                            </h3>
                            <h2 class="header-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">
                                Finance Portal Era Elektra Corpora Indonesia
                            </h2>
                            <p class="text wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">
                                Manage by Executive Director,
                                Finance Director and Finance Division for all financial activity in Era Elektra Copora
                                Indonesia.
                            </p>
                            <a href="{{ route('login') }}" class="main-btn wow fadeInUp" data-wow-duration="1.3s"
                                data-wow-delay="1.1s">
                                Get Started
                            </a>
                        </div>
                        <!-- header hero content -->
                    </div>
                </div>
                <!-- row -->
                <div class="row mt-80">
                    <div class="col-lg-12">
                        <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s"
                            data-wow-delay="1.4s">
                            <img src="{{ asset('assets-landing/images/header/header-hero.png') }}" alt="hero" />
                        </div>
                        <!-- header hero image -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
            <div id="particles-1" class="particles"></div>
        </div>
        <!-- header hero -->
    </header>
    <!--====== HEADER PART ENDS ======-->

    <!--====== Javascript Files ======-->
    <script src="{{ asset('assets-landing/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/count-up.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/particles.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/main.js') }}"></script>
</body>

</html>
