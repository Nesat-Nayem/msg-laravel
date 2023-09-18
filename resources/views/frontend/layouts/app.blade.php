<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $general->websitename }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('images/admin/generalsettings/' . $general->favicon) }}" />

    {{--
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap"
        rel="stylesheet" /> --}}

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/poppins.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/all.min.css') }}">

    {{--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css"
        integrity="sha512-gMjQeDaELJ0ryCI+FtItusU9MkAifCZcGq789FrzkiM49D8lbDhoaUaIX4ASU187wofMNlgBJ4ckbrXM9sE6Pg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" />

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/fontawesome/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/all.min.css') }}" />

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/owlcarousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/owlcarousel/owl.theme.default.min.css') }}" />

    <!-- Aos CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/aos/aos.css') }}" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('toastr/toastr.css') }}">
    <script src="{{ asset('toastr/jquery.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script>
        toastr.options = {
            "closeButton": true
            , "progressBar": true,
            // "newestOnTop": false,
            // "positionClass": "toast-bottom-center",
            // "preventDuplicates": false,
            // "onclick": null,
            // "showDuration": "300",
            // "hideDuration": "1000",
            // "timeOut": "5000",
            // "extendedTimeOut": "1000",
            // "showEasing": "swing",
            // "hideEasing": "linear",
            // "showMethod": "fadeIn",
            // "hideMethod": "fadeOut"
        }

    </script>
    <style>
        .notification-title {
            font-size: 17px !important;
            color: #FF6800 !important;
        }

        .close {
            display: flex;
            justify-content: end;
            position: relative;
            top: 0px;
        }
    </style>
    @yield('head')
</head>

<body>
    <!-- Loader -->
    <!-- <div class="page-loading">
        <div class="preloader-inner">
            <div class="preloader-square-swapping">
                <div class="cssload-square-part cssload-square-green"></div>
                <div class="cssload-square-part cssload-square-pink"></div>
                <div class="cssload-square-blend"></div>
            </div>
        </div>
    </div> -->
    <!-- /Loader -->

    <div class="main-wrapper">
        <!-- Header -->
        <header class="header">
            <nav class="navbar navbar-expand-lg header-nav">

                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>
                    <a href="{{ route('index') }}" class="navbar-brand logo-main">
                        <img src="{{ url('images/admin/generalsettings/' . $general->logo) }}" class="img-fluid"
                            alt="Logo" style="height:60px;">
                    </a>
                    {{-- <a href="{{ route('index') }}" class="navbar-brand logo-small">
                        <img src="{{ asset('frontend/assets/img/main-logo-small.png') }}" class="img-fluid"
                            style="height: 50px;" alt="Logo" />
                    </a> --}}
                </div>
                <?php $page = Route::current()->getName(); ?>

                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i></a>
                    </div>
                    <ul class="main-nav">
                        {{-- <li class="active has-submenu"> --}}
                        <li @if ($page=='index' ) class="active" @endif href="{{ route('index') }}">
                            <a href="{{ route('index') }}">Home</a>
                        </li>
                        <li @if ($page=='categories' ) class="active" @endif href="{{ route('categories') }}">
                            <a href="{{ route('categories')}}">Categories</a>
                        </li>
                        <li @if ($page=='contactus' ) class="active" @endif href="{{ route('contactus') }}">
                            <a href="{{ route('contactus')}}">Contact</a>
                        </li>
                        {{-- <li>
                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                data-bs-target="#provider-register">Become a Professional</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#user-register">Become
                                a User</a>
                        </li> --}}
                        {{-- <li class="nav-item dropdown hide-dropdown show">
                            <a href="#" class="dropdown-toggle header-login" data-toggle="dropdown"
                                aria-expanded="true">
                                Register <i class="fas fa-chevron-down"></i>
                            </a>
                            <div class="dropdown-menu notify-blk dropdown-menu-right register-dropdown show">
                                <div class="dropdown-content">
                                    <ul class="notification-list">
                                        <li class="nav-item nav-item-two"><a href="javascript:void(0);"
                                                data-toggle="modal" data-target="#modal-wizard">Become a
                                                Professional</a></li>

                                        <li class="nav-item nav-item-two"><a href="javascript:void(0);"
                                                data-toggle="modal" data-target="#modal-wizard1">Become a User</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li> --}}
                    </ul>
                </div>
                {{-- <ul class="nav header-navbar-rht me-2">
                    <li class="nav-item">
                        <a class="nav-link header-login" href="javascript:void(0);" data-bs-toggle="modal"
                            data-bs-target="#login_modal">Login</a>
                    </li>
                </ul> --}}
                {{-- @if(Auth::check() && Auth::user()->status == 'active') --}}
                @if(Auth::guard('web')->check())

                @elseif(Auth::guard('providerpanel')->check() && Auth::guard('providerpanel')->user()->status ==
                'active')

                @else
                <ul class="nav header-navbar-rht">
                    <li class="nav-item">
                        <a class="nav-link header-login dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Login<i class="fas fa-chevron-down ms-2"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            {{-- <li><a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                    data-bs-target="#provider-register">Become a Professional</a></li>
                            <li> <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                    data-bs-target="#user-register">Become a User</a> --}}
                            <li><a class="dropdown-item" href="{{ route('provider.providerlogin') }}">Become a
                                    Professional</a></li>
                            <li> <a class="dropdown-item" href="{{ route('user.login') }}">Become a User</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                @endif
                @if(Auth::guard('web')->check())
                <ul class="nav header-navbar-rht ms-2">
                    {{-- <li class="nav-item">
                        <a href="{{ route('user.userlogout') }}" class="nav-link header-login" type="button">Logout</a>
                    </li> --}}
                    {{-- <li class="nav-item dropdown has-arrow logged-item"> --}}
                    <li class="nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="user-img user">
                                @if(Auth::guard('web')->user()->profileimage != '' ||
                                Auth::guard('web')->user()->profileimage != null)
                                <img class="rounded-circle"
                                    src="{{ url('/images/admin/usersprofileimage/'. Auth::guard('web')->user()->profileimage) }}"
                                    alt="User-Image">
                                @else
                                <img class="rounded-circle"
                                    src="{{ url('/images/admin/generalsettings/'.$general->profile_placeholder) }}"
                                    alt="User-Image">
                                @endif
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    @if(Auth::guard('web')->user()->profileimage != '' ||
                                    Auth::guard('web')->user()->profileimage != null)
                                    <img class="avatar-img rounded-circle"
                                        src="{{ url('/images/admin/usersprofileimage/'.Auth::guard('web')->user()->profileimage) }}"
                                        alt="User-Image">
                                    @else
                                    <img class="avatar-img rounded-circle"
                                        src="{{ url('/images/admin/generalsettings/'.$general->profile_placeholder) }}"
                                        alt="User-Image">
                                    @endif
                                </div>
                                <div class="user-text">
                                    <h6>{{ Auth::user()->name }}</h6>
                                    <p class="text-muted mb-0">User</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{route('userdashboard')}}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('user.userlogout') }}">Logout</a>
                        </div>
                    </li>
                </ul>
                @elseif(Auth::guard('providerpanel')->check() && Auth::guard('providerpanel')->user()->status ==
                'active')
                <ul class="nav header-navbar-rht ms-2">
                    {{-- <li class="nav-item">
                        <a href="{{ route('provider.providerlogout') }}" class="nav-link header-login"
                            type="button">Logout</a>
                    </li> --}}
                    <li class="nav-item dropdown logged-item show view">

                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="true"
                            id="notification">
                            <i class="fas fa-bell" style="color: #FF6800;"></i> <span
                                class="badge badge-pill bg-yellow">{{
                                Auth::guard('providerpanel')->user()->unreadNotifications->count() }}</span> </a>
                        <div class="dropdown-menu dropdown-menu-right notifications mobile-noti" aria-labelledby="notification">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">Notifications</span>
                                {{-- <a href="javascript:void(0)" class="clear-noti noty_clear"
                                    data-token="1p2h87aUWHUgEVJ"> Clear All </a> --}}
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">
                                    @if (Auth::guard('providerpanel')->user())
                                    @forelse($notifications as $notification)
                                    <li class="notification-message">
                                        <a href="#" rel="tooltip" title="Mark as read" class="mark-as-read"
                                            data-id="{{ $notification->id }}" style="font-size: 16px;"> <span
                                                class="close"> X</span>
                                            <div class="media">
                                                {{-- <span class="avatar avatar-sm">
                                                    <img class="avatar-img rounded-circle" alt="User Image"
                                                        src="https://truelysell.com/uploads/profile_img/1631787916.jpg">
                                                </span> --}}
                                                <div class="media-body">
                                                    <p class="noti-details"> <span class="noti-title">{{
                                                            $notification->data['name'] }} &nbsp;</span></p>
                                                    <span class="">{{ $notification->data['noti-msg'] }}</span>
                                                    <p class="noti-time"><span class="notification-time">{{
                                                            $notification->created_at->format('d M Y') }}</span></p>

                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @empty
                                    There are no new notifications
                                    @endforelse
                                    @else
                                    @endif
                                    {{-- <li class="notification-message">
                                        <a href="https://truelysell.com/notification-list">
                                            <div class="media">
                                                <span class="avatar avatar-sm">
                                                    <img class="avatar-img rounded-circle" alt="User Image"
                                                        src="https://truelysell.com/uploads/profile_img/1631787916.jpg">
                                                </span>
                                                <div class="media-body">
                                                    <p class="noti-details"> <span class="noti-title">Demo Provider have
                                                            inprogress the service - car repair services</span></p>
                                                    <p class="noti-time"><span class="notification-time">07 Nov 2022
                                                            03:56:17</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="topnav-dropdown-footer">
                                <a href="{{ route('provider.notifications') }}">View all Notifications</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="user-img user">

                                @if(Auth::guard('providerpanel')->user()->profileimage != '' ||
                                Auth::guard('providerpanel')->user()->profileimage != null)
                                <img class="rounded-circle"
                                    src="{{ url('/images/admin/providerprofileimage/'.Auth::guard('providerpanel')->user()->profileimage) }}"
                                    alt="Provider-Image">
                                @else
                                <img class="rounded-circle"
                                    src="{{ url('/images/admin/generalsettings/'.$general->profile_placeholder) }}"
                                    alt="Provider-Image">
                                @endif


                                {{-- @if(Auth::guard('web')->user()->profileimage != '' ||
                                Auth::guard('web')->user()->profileimage != null)
                                <img class="rounded-circle"
                                    src="{{ asset('frontend/assets/img/customer/user-01.jpg') }}" alt=""> --}}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    @if(Auth::guard('providerpanel')->user()->profileimage != '' ||
                                    Auth::guard('providerpanel')->user()->profileimage != null)
                                    <img class="avatar-img rounded-circle"
                                        src="{{ url('/images/admin/providerprofileimage/'.Auth::guard('providerpanel')->user()->profileimage) }}"
                                        alt="Provider-Image">
                                    @else
                                    <img class="avatar-img rounded-circle"
                                        src="{{ url('/images/admin/generalsettings/'.$general->profile_placeholder) }}"
                                        alt="Provider-Image">
                                    @endif

                                </div>
                                <div class="user-text">
                                    <h6>{{ Auth::guard('providerpanel')->user()->name }}</h6>
                                    <p class="text-muted mb-0">Provider</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{route('providerdashboard')}}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('provider.providerlogout') }}">Logout</a>
                        </div>
                    </li>
                </ul>
                @endif
            </nav>
        </header>
        <!-- /Header -->

        @yield('content')

        <footer class="footer container-fluid">
            <!-- Footer Top -->
            <div class="footer-top aos" data-aos="fade-up">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <!-- Footer Widget -->
                            <div class="footer-widget footer-menu">
                                <h2 class="footer-title">Quick Links</h2>
                                <ul>
                                    <li>
                                        <a href="{{ route('aboutus')}}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contactus')}}">Contact Us</a>
                                    </li>
                                    {{-- <li>
                                        <a href="{{ route('faq')}}">Faq</a>
                                    </li> --}}
                                    <li>
                                        <a href="#">Help</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /Footer Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- Footer Widget -->
                            <div class="footer-widget footer-menu">
                                <h2 class="footer-title">Categories</h2>
                                <ul>
                                    @foreach ($footercategory as $category)
                                    <li>
                                        <a href="{{ route('categories') }}">{{ $category->categoryname }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /Footer Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- Footer Widget -->
                            <div class="footer-widget footer-contact">
                                <h2 class="footer-title">Contact Us</h2>
                                <div class="footer-contact-info">
                                    <div class="footer-address">
                                        <span><i class="far fa-building"></i></span>
                                        <p>
                                            {{ $general->contactdetails }}
                                        </p>
                                    </div>
                                    <p><i class="fas fa-headphones"></i>+91 {{ $general->mobilenumber }}</p>
                                    <p class="mb-0">
                                        <i class="fas fa-envelope"></i>
                                        <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="d3a7a1a6b6bfaaa0b6bfbf93b6abb2bea3bfb6fdb0bcbe">[email&#160;protected]</a>
                                    </p>
                                </div>
                            </div>
                            <!-- /Footer Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- Footer Widget -->
                            <div class="footer-widget">
                                <h2 class="footer-title">Follow Us</h2>
                                <div class="social-icon">
                                    <ul>
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-google"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="subscribe-form">
                                    <input type="email" class="form-control" placeholder="Enter your email" />
                                    <button type="submit" class="btn footer-btn">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /Footer Widget -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Footer Top -->

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <!-- Copyright -->
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="copyright-text">
                                    <p class="mb-0">
                                        &copy; 2023 <a href="{{ route('index') }}">Omm Software</a>. All
                                        rights reserved.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <!-- Copyright Menu -->
                                <div class="copyright-menu">
                                    <ul class="policy-menu">
                                        <li>
                                            <a href="#">Terms and Conditions</a>
                                        </li>
                                        <li>
                                            <a href="#">Privacy</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Copyright Menu -->
                            </div>
                        </div>
                    </div>
                    <!-- /Copyright -->
                </div>
            </div>
            <!-- /Footer Bottom -->
        </footer>
        <!-- /Footer -->
    </div>

    {{-- @yield('modal') --}}
    <!-- jQuery -->

    <script src="{{ asset('frontend/assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Owl JS -->
    <script src="{{ asset('frontend/assets/plugins/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Aos -->
    <script src="{{ asset('frontend/assets/plugins/aos/aos.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>

    @yield('js')

    <script>
        function sendMarkRequest(id = null) {
            return $.ajax("{{ route('provider.markNotification') }}", {
                method: 'POST'
                , data: {
                    "_token": "{{ csrf_token() }}"
                    , "id": id
                }
            });
        }
        $(function() {
            $('.mark-as-read').click(function() {
                let request = sendMarkRequest($(this).data('id'));
                request.done(() => {
                    $(this).parents('div.alert').remove();
                    location.reload(true);
                });
            });
        });
        $('#mark-all').click(function() {
            // alert('hii');
            let request = sendMarkRequest();
            request.done(() => {
                $('div.markall').remove();
                location.reload(true);
            })
        });

    </script>
</body>

</html>
