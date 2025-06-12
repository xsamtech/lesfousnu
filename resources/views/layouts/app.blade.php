<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="lesfousnu.com">
        <meta name="keywords" content="lesfousnu">
        <meta name="jeb-url" content="{{ getWebURL() }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">

        <!-- Stylesheet -->
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.2.0.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.0.0-beta1.min.css') }}">
        <!-- Addons CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/jquery/jquery-ui/jquery-ui.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/jquery/datetimepicker/css/jquery.datetimepicker.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/cropper/css/cropper.min.css') }}">

        <!--====== Default CSS ======-->
        <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
        <!--====== Custom Style CSS ======-->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <style>
            textarea { resize: none; }
            th, td, .form-label { font-size: 14px }
            .user-account { text-decoration: none; color: #000; }
            .modal { z-index: 9998; }
            .alert { z-index: 9999; }
            @media (min-width: 992px) {
                #features { min-height: 40rem; }
                .user-account { position: relative; top: -0.8rem; }
            }
        </style>

        <title>
@if (!empty($page_title))
            {{ $page_title }}
@else
            {{ env('APP_NAME') }}
@endif
        </title>
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
                                            <a class="page-scroll active" href="">Tableau de bord</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="">Utilisateurs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="">Evénements</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="">Arts</a>
                                        </li>
                                    </ul>
                                </div> <!-- navbar collapse -->
                            </nav> <!-- navbar -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- header navbar -->
        </section>
        <!--====== HEADER PART ENDS ======-->

@yield('app-content')

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
        <script src="{{ asset('assets/addons/jquery/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/addons/jquery/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/addons/autosize/js/autosize.min.js') }}"></script>
        <script src="{{ asset('assets/addons/sweetalert2/dist/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/addons/jquery/datetimepicker/js/jquery.datetimepicker.full.min.js') }}"></script>
        <script src="{{ asset('assets/addons/cropper/js/cropper.min.js') }}"></script>
        <script src="{{ asset('assets/addons/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <!--====== Main js ======-->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <!-- Custom JS-->
        <script src="{{ asset('assets/js/scripts.custom.js') }}"></script>
        <script type="text/javascript">
            /**
             * Check string is numeric
             * 
             * @param boolean success
             * @param string message
             */
            const showAlert = (success, message) => {
                const color = success === true ? 'success' : 'danger';
                const icon = success === true ? 'bi bi-info-circle' : 'bi bi-exclamation-triangle';

                // Delete old alerts
                $('#ajax-alert-container .alert').alert('close');

                const alert = `<div class="position-relative">
                                    <div class="row position-fixed w-100" style="opacity: 0.9; z-index: 999;">
                                        <div class="col-lg-4 col-sm-6 mx-auto">
                                            <div class="alert alert-${color} alert-dismissible fade show rounded-0" role="alert">
                                                <i class="${icon} me-2 fs-4" style="vertical-align: -3px;"></i> ${message}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

                // Adding alert to do DOM
                $('#ajax-alert-container').append(alert);

                // Automatic closing after 6 seconds
                setTimeout(() => {
                    $('#ajax-alert-container .alert').alert('close');
                }, 6000);
            };
        </script>
@if (Route::is('dashboard.users'))
        <script type="text/javascript">
            $(function () {
                /*
                 * All about USER
                 */
                // Focus to specific input for each concerned modal
                $('#userModal').on('shown.bs.modal', function () {
                    $('#firstname').focus();
                });
                // Send user registration
                $('#addUserForm').on('submit', function (e) {
                    e.preventDefault();

                    // Clean up previous errors and alerts
                    $('.is-invalid').removeClass('is-invalid');
                    $('.invalid-feedback').remove();

                    // Show the loader
                    $('#ajax-loader').removeClass('d-none');

                    const formData = new FormData(this);

                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            // Hide the loader
                            $('#ajax-loader').addClass('d-none');
                            // Close the modal
                            $('#userModal').modal('hide');

                            // Success alert
                            showAlert(true, 'Utilisateur ajouté avec succès.');

                            // Just reload the table
                            $('#dataList').load(location.href + ' #dataList > *');
                            // Reset the form
                            $('#addUserForm')[0].reset();
                            // Reset profile picture
                            $('#image_64').val('');
                            $('.other-user-image').attr('src', `${currentHost}/assets/img/user.png`);
                            // Remove error classes (just in case)
                            $('#addUserForm .is-invalid').removeClass('is-invalid');
                            $('#addUserForm .invalid-feedback').remove();
                        },
                        error: function (xhr) {
                            $('#ajax-loader').addClass('d-none');

                            if (xhr.status === 422) {
                                const errors = xhr.responseJSON.errors;

                                for (const [field, messages] of Object.entries(errors)) {
                                    const input = $(`[name="${field}"]`);

                                    input.addClass('is-invalid');
                                    input.after(`<div class="invalid-feedback d-block">${messages[0]}</div>`);
                                }

                            } else {
                                // Close the modal
                                $('#userModal').modal('hide');
                                // Error (500) alert
                                showAlert(false, 'Une erreur est survenue. Veuillez réessayer ultérieurement.');
                            }
                        }
                    });
                });
            });
        </script>
@endif

@if (Route::is('dashboard.users.entity'))
    @if ($entity == 'roles')
        <script type="text/javascript">
            $(function () {
                /*
                 * All about ROLE
                 */
                // Focus to specific input for each concerned modal
                $('#userEntityModal').on('shown.bs.modal', function () {
                    $('#role_name').focus();
                });
                // Send user registration
                $('#addRoleForm').on('submit', function (e) {
                    e.preventDefault();

                    // Clean up previous errors and alerts
                    $('.is-invalid').removeClass('is-invalid');
                    $('.invalid-feedback').remove();

                    // Show the loader
                    $('#ajax-loader').removeClass('d-none');

                    const formData = new FormData(this);

                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            // Hide the loader
                            $('#ajax-loader').addClass('d-none');
                            // Close the modal
                            $('#userEntityModal').modal('hide');

                            // Success alert
                            showAlert(true, 'Rôle ajouté avec succès.');

                            // Just reload the table
                            $('#dataList').load(location.href + ' #dataList > *');
                            // Reset the form
                            $('#addUserForm')[0].reset();
                            // Remove error classes (just in case)
                            $('#addUserForm .is-invalid').removeClass('is-invalid');
                            $('#addUserForm .invalid-feedback').remove();
                        },
                        error: function (xhr) {
                            $('#ajax-loader').addClass('d-none');

                            if (xhr.status === 422) {
                                const errors = xhr.responseJSON.errors;

                                for (const [field, messages] of Object.entries(errors)) {
                                    const input = $(`[name="${field}"]`);

                                    input.addClass('is-invalid');
                                    input.after(`<div class="invalid-feedback d-block">${messages[0]}</div>`);
                                }

                            } else {
                                // Close the modal
                                $('#userEntityModal').modal('hide');
                                // Error (500) alert
                                showAlert(false, 'Une erreur est survenue. Veuillez réessayer ultérieurement.');
                            }
                        }
                    });
                });
            });
        </script>
    @endif
@endif
    </body>
</html>
