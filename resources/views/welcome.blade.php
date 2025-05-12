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
        <!--====== Bootstrap Icons CSS ======-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <!--====== Bootstrap CSS ======-->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.0.0-beta1.min.css') }}">
        <!--====== Default CSS ======-->
        <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
        <!--====== Style CSS ======-->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <title>Les Fous Nu</title>
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
                                <a class="navbar-brand" href="{{ route('home') }}">
                                    <img id="logo" src="{{ asset('assets/img/logo-text-dark-mode.png') }}" alt="Logo">
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
                                            <a class="page-scroll" href="#portfolio">Galerie</a>
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
                                    <h2 class="hero_title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">Une Vision et</br> une Mission Inspirantes</h2>
                                    <p class="wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">Dans un monde où l’art est souvent perçu comme un luxe, <strong style="color: #ffed00">Les Fous Nu</strong> se positionne comme une initiative cruciale pour redonner une voix et une place aux artistes issus de tous horizons.</p>
                                    <a href="#features" class="main-btn wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">Explore</a>
                                </div> <!-- hero content -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                </div> <!-- single hero -->
            </div> <!-- header hero -->
        </section>
        <!--====== HEADER PART ENDS ======-->

        <!--====== FEATURES PART START ======-->
        <section id="features" class="features_area pt-120 bg-dark">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_title text-center pb-25">
                            <h4 class="title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">Pourquoi nous choisir ?</h4>
                            <p class="wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.4s">Nous facilitons les jeunes artistes issus de milieux défavorisés à vivre leur passion et trouver des opportunités.</p>
                        </div> <!-- section title -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <div class="row g-lg-4 g-sm-3 justify-content-center">
                            <div class="col-md-6">
                                <div class="single_features text-center mt-30 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                                    <i class="bi bi-mortarboard"></i>
                                    <h4 class="features_title">Formations et ateliers</a></h4>
                                    <p>Développement des compétences artistiques et professionnelles.</p>
                                </div> <!-- single features -->
                            </div>
                            <div class="col-md-6">
                                <div class="single_features text-center mt-30 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.4s">
                                    <i class="bi bi-palette"></i>
                                    <h4 class="features_title">Espaces de création</a></h4>
                                    <p>Accès à des lieux entièrement équipés pour faciliter les artistes.</p>
                                </div> <!-- single features -->
                            </div>
                            <div class="col-md-6">
                                <div class="single_features text-center mt-30 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.6s">
                                    <i class="bi bi-eye"></i>
                                    <h4 class="features_title">Opportunités de visibilité</a></h4>
                                    <p>Organisation des événements tels que des expositions, concerts et autres.</p>
                                </div> <!-- single features -->
                            </div>
                            <div class="col-md-6">
                                <div class="single_features text-center mt-30 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">
                                    <i class="bi bi-airplane"></i>
                                    <h4 class="features_title">Bourses et partenariats</a></h4>
                                    <p>Offre de bourses par des partenaires tels que les institutions culturelles et mécènes</p>
                                </div> <!-- single features -->
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </section>
        <!--====== FEATURES PART ENDS ======-->

        <!--====== ABOUT PART START ======-->
        <section id="about" class="pt-130 bg-dark">
            <div class="about_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about_content pt-120 pb-120">
                                <div class="section_title pb">
                                    <h4 class="title mb-4 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">A propos de nous</h4>
                                    <p class="mb-4 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.4s"><strong style="color: #ffed00">Les Fous Nu</strong> est un collectif d’avant-garde,<br>agissant à la croisée de l’invisible et du visible dans le spectre électromagnétique.</p>
                                    <ul class="wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.6s">
                                        <li class="mb-4">
                                            <h5 class="fw-normal text-white"><i class="bi bi-chevron-double-right me-2"></i> Pourquoi &laquo; <code class="fs-5" style="color: #ffed00">Les Fous</code> &raquo; ?</h5>
                                            <p>Nous travaillons sans convention, maîtrisons les règles pour mieux les briser au service de l’innovation.</p>
                                        </li>

                                        <li>
                                            <h5 class="fw-normal text-white"><i class="bi bi-chevron-double-right me-2"></i> Pourquoi &laquo; <code class="fs-5" style="color: #ffed00">Nu</code> &raquo; ?</h5>
                                            <p>&laquo; <i>Nu</i> &raquo;, treizième lettre de l’alphabet grec, symbolise la fréquence temporaire d’un spectre. L’absence de “S” à la fin exprime notre constance dans la création.</p>
                                        </li>
                                    </ul>
                                    <p class="mb-4 text-light wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.4s">Notre couleur dominante, le noir, représente l’invisible de notre approche. Le jaune, quant à lui, incarne nos résultats visibles et tangibles.</p>
                                </div> <!-- section title -->
                            </div> <!-- about content -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
                
                <div class="about_image bg_cover wow fadeInLeft" data-wow-duration="1.3s" data-wow-delay="0.2s"
                    style="background-image: url(assets/images/about.jpg)">
                    <div class="image_content p-4">
                        <img src="{{ asset('assets/img/logo-black.png') }}" alt="" class="img-fluid">
                    </div>
                </div> <!-- about image -->
            </div>

            <div class="container pb-80">
                <div class="row">
                    <div class="col-md-6">
                        <div class="single_features text-center mt-60 wow fadeInUp" data-wow-duration="1.3s"
                            data-wow-delay="0.2s">
                            <i class="lni lni-briefcase"></i>
                            <h4 class="features_title">Notre Mission</h4>
                            <p>Soutenir et encadrer les jeunes artistes issus de milieux défavorisés pour leur offrir un accès équitable aux ressources nécessaires au développement de leur talent et de leur carrière. Nous créons un environnement inclusif où la créativité et l’échange intergénérationnel peuvent s’épanouir.</p>
                        </div> <!-- single features -->
                    </div>
                    <div class="col-md-6">
                        <div class="single_features text-center mt-60 wow fadeInUp" data-wow-duration="1.3s"
                            data-wow-delay="0.3s">
                            <i class="lni lni-eye"></i>
                            <h4 class="features_title">Notre Vision</h4>
                            <p>Imaginer un monde où l’accès à l’art et à la culture est universel, permettant à chaque talent de s’épanouir et de contribuer à la richesse culturelle. Nous aspirons à devenir une référence pour l’accompagnement artistique inclusif, en transformant la perception de l’art comme un droit et non un privilège.</p>
                        </div> <!-- single features -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </section>
        <!--====== ABOUT PART ENDS ======-->

        <!--====== PORTFOLIO PART START ======-->
        <section id="portfolio" class="portfolio_area pt-120" style="background-color: #000;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_title text-center pb-60">
                            <h4 class="title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">Notre Galerie</h4>
                            <p class="wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.4s">Nous vous présentons toutes nos activités et les &oelig;uvres de nos étudiants à travers le pays.</p>
                        </div> <!-- section title -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="portfolio_wrapper d-flex flex-wrap">
                <div class="single_portfolio wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                    <img src="assets/images/portfolio-1.jpg" alt="portfolio">
                    <div class="portfolio_content">
                        <ul class="meta">
                            <li><a href="#0"><i class="lni lni-link"></i></a></li>
                        </ul>
                        <h5 class="portfolio_title">In convallis tellus</h5>
                    </div> <!-- Single portfolio -->
                </div> <!-- portfolio wrapper -->
                <div class="single_portfolio wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.3s">
                    <img src="assets/images/portfolio-2.jpg" alt="portfolio">
                    <div class="portfolio_content">
                        <ul class="meta">
                            <li><a href="#0"><i class="lni lni-link"></i></a></li>
                        </ul>
                        <h5 class="portfolio_title">Curabitur non elit</h5>
                    </div> <!-- Single portfolio -->
                </div> <!-- portfolio wrapper -->
                <div class="single_portfolio wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.4s">
                    <img src="assets/images/portfolio-3.jpg" alt="portfolio">
                    <div class="portfolio_content">
                        <ul class="meta">
                            <li><a href="#0"><i class="lni lni-link"></i></a></li>
                        </ul>
                        <h5 class="portfolio_title">Creative Projects</h5>
                    </div> <!-- Single portfolio -->
                </div> <!-- portfolio wrapper -->
                <div class="single_portfolio wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">
                    <img src="assets/images/portfolio-4.jpg" alt="portfolio">
                    <div class="portfolio_content">
                        <ul class="meta">
                            <li><a href="#0"><i class="lni lni-link"></i></a></li>
                        </ul>
                        <h5 class="portfolio_title">Inhac habitas sepla</h5>
                    </div> <!-- Single portfolio -->
                </div> <!-- portfolio wrapper -->
                <div class="single_portfolio wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                    <img src="assets/images/portfolio-5.jpg" alt="portfolio">
                    <div class="portfolio_content">
                        <ul class="meta">
                            <li><a href="#0"><i class="lni lni-link"></i></a></li>
                        </ul>
                        <h5 class="portfolio_title">Donec vitae metus</h5>
                    </div> <!-- Single portfolio -->
                </div> <!-- portfolio wrapper -->
                <div class="single_portfolio wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.3s">
                    <img src="assets/images/portfolio-6.jpg" alt="portfolio">
                    <div class="portfolio_content">
                        <ul class="meta">
                            <li><a href="#0"><i class="lni lni-link"></i></a></li>
                        </ul>
                        <h5 class="portfolio_title">Proin nonummy</h5>
                    </div> <!-- Single portfolio -->
                </div> <!-- portfolio wrapper -->
                <div class="single_portfolio wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.4s">
                    <img src="assets/images/portfolio-7.jpg" alt="portfolio">
                    <div class="portfolio_content">
                        <ul class="meta">
                            <li><a href="#0"><i class="lni lni-link"></i></a></li>
                        </ul>
                        <h5 class="portfolio_title">Praesent odio ligula</h5>
                    </div> <!-- Single portfolio -->
                </div> <!-- portfolio wrapper -->
                <div class="single_portfolio wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">
                    <img src="assets/images/portfolio-8.jpg" alt="portfolio">
                    <div class="portfolio_content">
                        <ul class="meta">
                            <li><a href="#0"><i class="lni lni-link"></i></a></li>
                        </ul>
                        <h5 class="portfolio_title">Aenean vestibulum</h5>
                    </div> <!-- Single portfolio -->
                </div> <!-- portfolio wrapper -->
            </div> <!-- row -->
        </section>
        <!--====== PORTFOLIO PART ENDS ======-->

        <!--====== BLOG PART START ======-->
        <section id="blog" class="blog_area pt-120 pb-130" style="background-color: #000;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_title text-center pb-25">
                            <h4 class="title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">Notre Recent Blog</h4>
                            <p class="wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.4s">Suivez l’actualité sur nos blogs concernant tous les événements que nous organisons.</p>
                        </div> <!-- section title -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single_blog mt-30 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                            <div class="blog_image">
                                <img src="assets/images/blog-1.jpg" alt="blog">
                            </div>
                            <div class="blog_content">
                                <h3 class="blog_title"><a href="#0">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor .</a></h3>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labor dolore.Lorem ipsum dolor sit amet, conse sadipscing elitr, sed diam nonumy eirmod tempor invidunt labor dolore magna .Lorem ipsum dolor sit amet, consetetur sadipscing elit.</p>
                            </div>
                        </div> <!-- single blog -->
                    </div>
                    <div class="col-lg-6">
                        <div class="single_blog blog_2 d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.3s"
                            data-wow-delay="0.2s">
                            <div class="blog_image">
                                <img src="assets/images/blog-2.jpg" alt="blog">
                            </div>
                            <div class="blog_content media-body">
                                <h3 class="blog_title"><a href="#0">Lorem ipsum dolor sit amet, consetetur sadipscing .</a></h3>
                                <p>Lorem ipsum dolor sit consetetur sadipscing elitr, sed diam.</p>
                                <a href="#0" class="more">Read More</a>
                            </div>
                        </div> <!-- single blog -->
                        
                        <div class="single_blog blog_2 d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.3s"
                            data-wow-delay="0.3s">
                            <div class="blog_image">
                                <img src="assets/images/blog-3.jpg" alt="blog">
                            </div>
                            <div class="blog_content media-body">
                                <h3 class="blog_title"><a href="#0">Lorem ipsum dolor sit amet, consetetur sadipscing .</a></h3>
                                <p>Lorem ipsum dolor sit consetetur sadipscing elitr, sed diam.</p>
                                <a href="#0" class="more">Read More</a>
                            </div>
                        </div> <!-- single blog -->
                        
                        <div class="single_blog blog_2 d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.3s"
                            data-wow-delay="0.4s">
                            <div class="blog_image">
                                <img src="assets/images/blog-4.jpg" alt="blog">
                            </div>
                            <div class="blog_content media-body">
                                <h3 class="blog_title"><a href="#0">Lorem ipsum dolor sit amet, consetetur sadipscing .</a></h3>
                                <p>Lorem ipsum dolor sit consetetur sadipscing elitr, sed diam.</p>
                                <a href="#0" class="more">Read More</a>
                            </div>
                        </div> <!-- single blog -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </section>
        <!--====== BLOG PART ENDS ======-->

        <!--====== CONTACT PART START ======-->
        <section id="contact" class="contact_area bg_cover pt-120 pb-130" style="background-image: url(assets/images/contact_bg.jpg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_title section_title_2 text-center pb-25">
                            <h4 class="title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">Nous contacter</h4>
                            <p class="wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.4s">Vous pouvez nous envoyer vos appréciations ou une demande pour soutenir votre talent.</p>
                        </div> <!-- section title -->
                    </div>
                </div> <!-- row -->
                
                <form id="contact-form" action="assets/contact.php" method="post" class="wow fadeInUp"
                    data-wow-duration="1.3s" data-wow-delay="0.4s">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single_form">
                                <input type="text" placeholder="Nom complet" name="name" id="name" required>
                            </div> <!-- single form -->
                        </div>
                        <div class="col-lg-6">
                            <div class="single_form">
                                <input type="email" placeholder="E-mail" name="email" id="email" required>
                            </div> <!-- single form -->
                        </div>
                        <div class="col-lg-6">
                            <div class="single_form">
                                <input type="text" placeholder="N&deg; de téléphone" name="number" id="number" required>
                            </div> <!-- single form -->
                        </div>
                        <div class="col-lg-6">
                            <div class="single_form">
                                <input type="text" placeholder="Sujet" name="subject" id="subject" required>
                            </div> <!-- single form -->
                        </div>
                        <div class="col-lg-12">
                            <div class="single_form">
                                <textarea placeholder="Votre message ..." name="message" id="message" required></textarea>
                            </div> <!-- single form -->
                        </div>
                        
                        <p class="form-message"></p>
                        
                        <div class="col-lg-12">
                            <div class="single_form text-center">
                                <button class="main-btn" type="submit">ENVOYER</button>
                            </div> <!-- single form -->
                        </div>
                    </div> <!-- row -->
                </form>
            </div> <!-- container -->
        </section>
        <!--====== CONTACT PART ENDS ======-->

        <!--====== FOOTER PART START ======-->
        <footer id="footer" class="footer_area">
            <div class="container">
                <div class="footer_wrapper text-center d-lg-flex align-items-center justify-content-between">
                    <p class="credit">Designed by <a href="https://xsamtech.com" target="_blank">Xsam Technologies</a></p>
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
