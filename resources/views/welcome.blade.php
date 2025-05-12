<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="lesfousnu.com">
        <meta name="keywords" content="lesfousnu">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">

        <!-- Stylesheet -->
        <!--====== Animate CSS ======-->
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
        <!--====== Glide CSS ======-->
        <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}">
        <!--====== Line Icons CSS ======-->
        <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.2.0.css') }}">
        <!--====== Bootstrap CSS ======-->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.0.0-beta1.min.css') }}">
        <!--====== Default CSS ======-->
        <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
        <!--====== Style CSS ======-->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <title>{{ env('APP_NAME') }}</title>
    </head>

    <body>
        <!--[if IE]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        <!--====== PRELOADER PART START ======-->
        <div class="preloader">
            <div class="loader">
                <div class="ytp-spinner">
                    <div class="ytp-spinner-container">
                        <div class="ytp-spinner-rotator">
                            <div class="ytp-spinner-left">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                            <div class="ytp-spinner-right">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== PRELOADER PART ENDS ======-->

        <!--====== HEADER PART START ======-->
        <section id="home" class="header_area">
            <div id="header_navbar" class="header_navbar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg">
                                <a class="navbar-brand" href="index.html">
                                    <img id="logo" src="{{ asset('assets/img/logo-text-light-mode.png') }}" alt="Logo">
                                </a>
                                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul id="nav" class="navbar-nav ms-auto">
                                        <li class="nav-item">
                                            <a class="page-scroll active" href="#home">Accueil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="#about">A propos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="#portfolio">Galérie</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="#blog">Blog</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="#contact">Contact</a>
                                        </li>
                                    </ul>
                                </div> <!-- navbar collapse -->
                            </nav> <!-- navbar -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- header navbar -->

            <div class="header_hero">
                <div class="single_hero bg_cover d-flex align-items-center" style="background-image: url(/assets/images/hero.jpg)">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-md-10">
                                <div class="hero_content text-center">
                                    <h2 class="hero_title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">Simple Bootstrap 5</br> Website Template</h2>
                                    <p class="wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">A super simple website template based on Bootstrap 5 and HTML5, comes with all essential <br class="d-none d-xl-block"> elements & features to get started and ready to use for almost any type of business websites.</p>
                                    <a href="#about" class="main-btn wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">Explore</a>
                                </div> <!-- hero content -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                </div> <!-- single hero -->
            </div> <!-- header hero -->
        </section>
        <!--====== HEADER PART ENDS ======-->

        <!--====== FOOTER PART START ======-->
        <footer id="footer" class="footer_area">
            <div class="container">
                <div class="footer_wrapper text-center d-lg-flex align-items-center justify-content-between">
                    <p class="credit">Designed and Developed by <a href="https://uideck.com" rel="nofollow">UIdeck</a></p>
                    <div class="footer_social pt-15">
                        <ul>
                            <li><a href="#0"><i class="lni lni-facebook-original"></i></a></li>
                            <li><a href="#0"><i class="lni lni-twitter-original"></i></a></li>
                            <li><a href="#0"><i class="lni lni-instagram-original"></i></a></li>
                            <li><a href="#0"><i class="lni lni-linkedin-original"></i></a></li>
                        </ul>
                    </div> <!-- footer social -->
                </div> <!-- footer wrapper -->
            </div> <!-- container -->
        </footer>
        <!--====== FOOTER PART ENDS ======-->

        <!--====== BACK TOP TOP PART START ======-->
        <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>
        <!--====== BACK TOP TOP PART ENDS ======-->

        <!-- Scripts -->
        <!--====== Bootstrap js ======-->
        <script src="{{ asset('assets/js/bootstrap.bundle-5.0.0-beta1.min.js') }}"></script>
        <!--====== glide js ======-->
        <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
        <!--====== wow js ======-->
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <!--====== Main js ======-->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>
