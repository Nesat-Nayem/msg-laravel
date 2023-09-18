<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>{{ $general->websitename }}</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ url('images/admin/generalsettings/' . $general->favicon) }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fontawesome.all.min.css') }}" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    {{--
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/all.min.css') }}" />

    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/animate.min.css') }}" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/admin.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .close {
            display: flex;
            justify-content: end;
            position: relative;
            top: 0px;
        }
    </style>

    {{--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    --}}

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('toastr/toastr.css') }}">
    <script src="{{ asset('toastr/jquery.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    @yield('head')
</head>

<body>
    <div class="main-wrapper">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <a href="{{ route('admindashboard') }}" class="logo logo-small">
                    <img src="{{ url('images/admin/generalsettings/' . $general->logo) }}" alt="Logo"
                        width="30" height="30" />
                </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-align-left"></i>
            </a>
            <a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
                <i class="fas fa-align-left"></i>
            </a>

            <ul class="nav user-menu">
                <!-- Notifications -->
                <li class="nav-item dropdown noti-dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <i class="fa fa-bell"></i> <span
                            class="badge badge-pill">{{ Auth::guard('adminpanel')->user()->unreadNotifications->count() }}</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            {{-- <a href="javascript:void(0)" class="clear-noti"> Clear All </a> --}}
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                @if (Auth::guard('adminpanel')->user())
                                    @forelse($notifications as $notification)
                                        <li class="notification-message">
                                            {{-- <a href="{{ route('markNotification') }}"> <span class="text-end">X</span> --}}
                                            <a href="#" rel="tooltip" title="Mark as read" class="mark-as-read"
                                                data-id="{{ $notification->id }}" style="font-size: 16px;"> <span
                                                    class="close"> X</span>
                                                <div class="media">
                                                    {{-- <span class="avatar avatar-sm">
                                                    <img class="avatar-img rounded-circle" alt="User Image"
                                                        src="{{ asset('admin/assets/img/main-logo.jpeg') }}">
                                                </span> --}}
                                                    <div class="media-body">
                                                        <p class="noti-details"> <span
                                                                class="noti-title">{{ $notification->data['name'] }}
                                                                &nbsp;</span></p>
                                                        <span class="">{{ $notification->data['noti-msg'] }}
                                                        </span>
                                                        <p class="noti-time"><span
                                                                class="notification-time">{{ $notification->created_at->format('d M Y') }}</span>
                                                        </p>

                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @empty
                                        There are no new notifications
                                    @endforelse
                                @else
                                @endif
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="{{ route('admin.notifications') }}">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <!-- /Notifications -->

                <!-- User Menu -->
                <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle user-link nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{ asset('admin/assets/img/user.jpg') }}" width="40"
                                alt="Admin" />
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        {{-- <a class="dropdown-item" href="">Profile</a> --}}
                        <a class="dropdown-item" href="{{ route('admin.changepassword') }}">Change Password</a>
                        <a class="dropdown-item" href="{{ route('admin.adminlogout') }}">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- /Header -->


        <?php $page = Route::current()->getName(); ?>

        <!-- Sidebar -->
        <div class="sidebar mb-4" id="sidebar">
            <div class="sidebar-logo">
                <a href="{{ route('admindashboard') }}">
                    <img src="{{ url('images/admin/generalsettings/' . $general->logo) }}" class="img-fluid"
                        alt="" />
                </a>
            </div>

            <div class="sidebar-inner slimscroll">
                <div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 466px;">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title">
                                <span>Main</span></a>
                            </li>

                            <li @if ($page == 'admindashboard') class="m-link active" @else class="m-link" @endif
                                href="{{ route('admindashboard') }}">
                                <a @if ($page == 'admindashboard') class="m-link active" @else class="m-link" @endif
                                    href="{{ route('admindashboard') }}"><i class="fa fa-columns"></i>
                                    <span>Dashboard</span></a>
                            </li>


                            <li class="menu-title">
                                <span>Management</span></a>
                            </li>
                            <li class="submenu collapsed">
                                <a @if (
                                    $page == 'addadmin.index' ||
                                        $page == 'provider.index' ||
                                        $page == 'admin-users.index' ||
                                        $page == 'addadmin.create' ||
                                        $page == 'provider.create' ||
                                        $page == 'admin-users.create' ||
                                        $page == 'addadmin.edit' ||
                                        $page == 'provider.edit' ||
                                        $page == 'admin-users.edit') class="m-link active" @else class="m-link" @endif
                                    data-bs-toggle="collapse" data-bs-target="#manage_users" title="Manage Users"> <i
                                        class="fas fa-users"></i>
                                    <span>Manage Users<span class="menu-arrow"><i
                                                class="fa fa-angle-right"></i></span>
                                    </span>
                                </a>

                                <ul @if (
                                    $page == 'addadmin.index' ||
                                        $page == 'provider.index' ||
                                        $page == 'admin-users.index' ||
                                        $page == 'addadmin.create' ||
                                        $page == 'provider.create' ||
                                        $page == 'admin-users.create' ||
                                        $page == 'addadmin.edit' ||
                                        $page == 'provider.edit' ||
                                        $page == 'admin-users.edit') class="sub-menu collapse show" @else
                                    class="sub-menu collapse" @endif
                                    id="manage_users">
                                    <li>
                                        <a @if ($page == 'addadmin.index' || $page == 'addadmin.create' || $page == 'addadmin.edit') class="ms-link active" @else class="ms-link" @endif
                                            href="{{ route('addadmin.index') }}"> <span>Admin</span></a>
                                    </li>
                                    <li>
                                        <a @if ($page == 'admin-provider.index' || $page == 'admin-provider.create' || $page == 'admin-provider.edit') class="ms-link active" @else class="ms-link" @endif
                                            href="{{ route('admin-provider.index') }}">
                                            <span>Providers</span></a>
                                    </li>
                                    <li>
                                        <a @if ($page == 'admin-users.index' || $page == 'admin-users.create' || $page == 'admin-users.edit') class="ms-link active" @else class="ms-link" @endif
                                            href="{{ route('admin-users.index') }}">
                                            <span>Users</span></a>
                                    </li>
                                </ul>
                            </li>


                            <li class="menu-title"><span>Services And Categories</span></li>
                            <li class="submenu collapsed">
                                <a @if (
                                    $page == 'admin-category.index' ||
                                        $page == 'admin-subcategory.index' ||
                                        $page == 'admin-category.create' ||
                                        $page == 'admin-subcategory.create') class="m-link active" @else class="m-link" @endif
                                    data-bs-toggle="collapse" data-bs-target="#category_subcategory"
                                    title="Category and Subcategory">
                                    <i class="fa fa-layer-group"></i> <span> Categories</span><span
                                        class="menu-arrow"><i class="fa fa-angle-right"></i></span>
                                </a>
                                <ul @if (
                                    $page == 'admin-category.index' ||
                                        $page == 'admin-subcategory.index' ||
                                        $page == 'admin-category.create' ||
                                        $page == 'admin-subcategory.create') class="sub-menu collapse show" @else class="sub-menu collapse" @endif
                                    id="category_subcategory">
                                    <li>
                                        <a @if ($page == 'admin-category.index' || $page == 'admin-category.create') class="ms-link active" @else class="ms-link" @endif
                                            href="{{ route('admin-category.index') }}"> <span>Categories</span></a>
                                    </li>
                                    <li>
                                        <a @if ($page == 'admin-subcategory.index' || $page == 'admin-subcategory.create') class="ms-link active" @else class="ms-link" @endif
                                            href="{{ route('admin-subcategory.index') }}">
                                            <span>Sub-Categories</span></a>
                                    </li>
                                </ul>
                            </li>


                            <li class="submenu collapsed">
                                <a @if (
                                    $page == 'admin-service.index' ||
                                        $page == 'admin-service.create' ||
                                        $page == 'admin-service.edit' ||
                                        $page == 'admin.pendingservices' ||
                                        $page == 'admin.deletedservices' ||
                                        $page == 'admin.inactiveservices') class="m-link active" @else class="m-link" @endif
                                    data-bs-toggle="collapse" data-bs-target="#services" title="Services">
                                    <i class="fa fa-bullhorn"></i> <span> Services</span><span class="menu-arrow"><i
                                            class="fa fa-angle-right"></i></span></a>
                                <ul @if (
                                    $page == 'admin-service.index' ||
                                        $page == 'admin-service.create' ||
                                        $page == 'admin-service.edit' ||
                                        $page == 'admin.pendingservices' ||
                                        $page == 'admin.deletedservices' ||
                                        $page == 'admin.inactiveservices') class="sub-menu collapse show" @else class="sub-menu collapse" @endif
                                    id="services">
                                    <li>
                                        <a @if ($page == 'admin-service.index') class="ms-link active" @else
                                            class="ms-link" @endif
                                            href="{{ route('admin-service.index') }}"> <span>All
                                                Services</span></a>
                                    </li>
                                    <li><a @if ($page == 'admin-service.create') class="ms-link active" @else
                                            class="ms-link" @endif
                                            href="{{ route('admin-service.create') }}"> <span>Add
                                                Services</span></a>
                                    </li>
                                    <li>
                                        <a @if ($page == 'admin.pendingservices') class="ms-link active" @else
                                            class="ms-link" @endif
                                            href="{{ route('admin.pendingservices') }}"><span>Pending
                                                Services</span></a>
                                    </li>
                                    <li>
                                        <a @if ($page == 'admin.deletedservices') class="ms-link active" @else
                                            class="ms-link" @endif
                                            href="{{ route('admin.deletedservices') }}"><span>Deleted
                                                Services</span></a>
                                    </li>
                                    <li>
                                        <a @if ($page == 'admin.inactiveservices') class="ms-link active" @else
                                            class="ms-link" @endif
                                            href="{{ route('admin.inactiveservices') }}"><span>Inactive
                                                Services</span></a>
                                    </li>
                                </ul>
                            </li>


                            <li class="menu-title">
                                <span>Booking</span></a>
                            </li>
                            <li @if ($page == 'admin.totalreport') class="m-link active" @else class="m-link" @endif
                                href="{{ route('admin.totalreport') }}">
                                <a @if ($page == 'admin.totalreport') class="m-link active" @else class="m-link" @endif
                                    href="{{ route('admin.totalreport') }}"><i class="far fa-calendar-check"></i>
                                    <span>Booking List</span></a>
                            </li>


                            <li class="menu-title">
                                <span>Wallet And Subscription</span></a>
                            </li>
                            {{-- <li class="submenu">
                                <a href="#"><i class="fa fa-wallet"></i>
                                    <span>Wallet<span class="menu-arrow"><i class="fa fa-angle-right"></i></span></a>
                                <ul>
                                    <li>
                                        <a href="#" class=""> <span>User</span></a>
                                    </li>
                                    <li><a href="#"> <span>Provider</span></a>
                                    </li>
                                </ul>
                            </li> --}}

                            <li @if ($page == 'admin.userwallet') class="m-link active" @else class="m-link" @endif
                                href="{{ route('admin.userwallet') }}">
                                <a @if ($page == 'admin.userwallet') class="ms-link active" @else class="ms-link" @endif
                                    href="{{ route('admin.userwallet') }}"><i class="fa fa-wallet"></i>
                                    <span>User Wallet</span></a>
                            </li>


                            <li @if ($page == 'adminsubscription.index' || $page == 'adminsubscription.create' || $page == 'adminsubscription.edit') class="m-link active" @else class="m-link" @endif
                                href="{{ route('adminsubscription.index') }}">
                                <a @if ($page == 'adminsubscription.index' || $page == 'adminsubscription.create' || $page == 'adminsubscription.edit') class="ms-link active" @else class="ms-link" @endif
                                    href="{{ route('adminsubscription.index') }}"><i class="fa fa-credit-card"></i>
                                    <span>Subscription</span></a>
                            </li>


                            <li class="menu-title">
                                <span>Reports</span></a>
                            </li>
                            <li class="submenu collapsed">
                                <a @if ($page == 'admin.earnings' || $page == 'admin.sellerbalance') class="m-link active"
                                    @else class="m-link" @endif
                                    data-bs-toggle="collapse" data-bs-target="#reports" title="Reports"><i
                                        class="fa fa-wallet"></i>
                                    <span>Earning<span class="menu-arrow"><i class="fa fa-angle-right"></i></span></a>
                                <ul @if ($page == 'admin.earnings' || $page == 'admin.sellerbalance') class="sub-menu collapse show" @else class="sub-menu collapse" @endif
                                    id="reports">
                                    <li>
                                        <a @if ($page == 'admin.earnings') class="ms-link active" @else class="ms-link" @endif
                                            href="{{ route('admin.earnings') }}"> <span>Earings</span></a>
                                    </li>
                                    <li><a @if ($page == 'admin.sellerbalance') class="ms-link active" @else
                                            class="ms-link" @endif
                                            href="{{ route('admin.sellerbalance') }}">
                                            <span>Seller Balance</span></a>
                                    </li>
                                </ul>
                            </li>


                            {{-- <li @if ($page == 'admin.revenue') class="m-link active" @else class="m-link" @endif
                                href="{{ route('admin.revenue') }}">
                                <a href="{{ route('admin.revenue') }}"><i class="fa fa-bullhorn"></i>
                                    <span>Revenue</span></a>
                            </li>


                            <li @if ($page == 'admin-pushnotifications.index' || $page == 'admin-pushnotifications.create')
                                class="m-link active" @else class="m-link" @endif
                                href="{{ route('admin-pushnotifications.index') }}">
                                <a href="{{ route('admin-pushnotifications.index') }}"><i
                                        class="fa fa-bell"></i><span>Push
                                        Notifications</span></a>
                            </li> --}}


                            <li class="menu-title"><span>Settings</span></li>
                            <li @if ($page == 'admin-generalsettings.index') class="m-link active" @else class="m-link" @endif
                                href="{{ route('admin-generalsettings.index') }}">
                                <a href="{{ route('admin-generalsettings.index') }}"> <i class="fa fa-sliders-h"></i>
                                    <span> General Settings</span></a>
                            </li>

                            <li @if ($page == 'admin-seosettings.index') class="m-link active" @else class="m-link" @endif
                                href="{{ route('admin-seosettings.index') }}">
                                <a href="{{ route('admin-seosettings.index') }}"> <i class="fa fa-building"></i>
                                    <span>SEO Settings</span></a>
                            </li>


                            <li class="submenu collapsed">
                                <a @if ($page == 'admin.othersettings') class="m-link active" @else class="m-link" @endif
                                    data-bs-toggle="collapse" data-bs-target="#gdrpsettings" title="gdrpsettings"> <i
                                        class="fa fa-cookie"></i>
                                    <span>GDPR Settings<span class="menu-arrow"><i
                                                class="fa fa-angle-right"></i></span>
                                    </span>
                                </a>
                                <ul @if ($page == 'admin.othersettings') class="sub-menu collapse show" @else
                                    class="sub-menu collapse" @endif
                                    id="gdrpsettings">
                                    <li>
                                        <a @if ($page == 'admin.othersettings') class="ms-link active" @else
                                            class="ms-link" @endif
                                            href="{{ route('admin.othersettings') }}">
                                            <span>Other
                                                Settings</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li @if ($page == 'admin-country.index' || $page == 'admin-country.create' || $page == 'admin-country.edit') class="m-link active" @else class="m-link" @endif
                                href="{{ route('admin-country.index') }}">
                                <a href="{{ route('admin-country.index') }}"> <i class="fa fa-globe"></i>
                                    <span>Country</span></a>
                            </li>

                            <li @if ($page == 'admin-state.index' || $page == 'admin-state.create' || $page == 'admin-state.edit') class="m-link active" @else class="m-link" @endif
                                href="{{ route('admin-state.index') }}">
                                <a href="{{ route('admin-state.index') }}"> <i class="fa fa-map"></i>
                                    <span>State</span></a>
                            </li>

                            <li @if ($page == 'admin-city.index' || $page == 'admin-city.create' || $page == 'admin-city.edit') class="m-link active" @else class="m-link" @endif
                                href="{{ route('admin-city.index') }}">
                                <a href="{{ route('admin-city.index') }}"> <i class="fa fa-city"></i>
                                    <span>City</span></a>
                            </li>

                            <li class="menu-title">
                                <span>Contact</span></a>
                            </li>
                            <li @if ($page == 'admincontactus.index') class="m-link active" @else class="m-link mb-4" @endif
                                href="{{ route('admincontactus.index') }}">
                                <a @if ($page == 'admincontactus.index') class="m-link active" @else class="m-link" @endif
                                    href="{{ route('admincontactus.index') }}"><i class="fa fa-address-book"></i>
                                    <span>Contact Us List</span></a>
                            </li>

                            {{-- <li><a href="{{ route('emailtemplate.index') }}"><i
                                        class="fa fa-calendar-check"></i><span>Email Template</span></a> --}}

                            {{--
                            <li>
                                <a href="#"><i class="fa fa-calendar-check"></i>
                                    <span>Manage Users</span></a>
                            </li> --}}
                            {{-- <li class="">
                                <a href="{{ route('systemsettings') }}"> <i class="fas fa-cog"></i><span>System
                                        Settings</span></a>
                            </li> --}}
                            {{-- <li class="">
                                <a href="{{ route('localizationsettings') }}"> <i class="fas fa-clock"></i>
                                    <span>Localization</span></a>
                            </li> --}}

                            {{-- <li class="">
                                <a href="{{ route('admin.loginsettings') }}"> <i class="fas fa-unlock"></i>
                                    <span>Login Settings</span></a>
                            </li> --}}

                            {{-- <li class="">
                                <a href="{{ route('emailsettings') }}"> <i class="fas fa-at"></i>
                                    <span>Email Settings</span></a>
                            </li> --}}

                            {{-- <li class="">
                                <a href="{{ route('smssettings') }}"> <i class="fas fa-comment-dots"></i>
                                    <span>SMS Settings</span></a>
                            </li> --}}
                            {{-- <li class="">
                                <a href="{{ route('sevicesettings') }}"> <i class="fas fa-business-time"></i>
                                    <span>Service
                                        Settings</span></a>
                            </li> --}}

                            {{-- <li class="">
                                <a href="{{ route('paymentsettings') }}"> <i class="fas fa-money-bill"></i>
                                    <span>Payment Settings</span></a>
                            </li> --}}

                            {{-- <li class="">
                                <a href="#"> <i class="fas fa-globe"></i> <span>Language
                                        Settings</span></a>
                            </li> --}}
                            {{-- <li>
                                <a href="{{ route('paymentlist') }}"><i class="fas fa-hashtag"></i>
                                    <span>Payments</span></a>
                            </li>
                            <li>
                                <a href="{{ route('ratingstype') }}"><i class="fas fa-star-half-alt"></i>
                                    <span>Rating Type</span></a>
                            </li>
                            <li>
                                <a href="{{ route('reviewreports') }}"><i class="fas fa-star"></i>
                                    <span>Ratings</span></a>
                            </li>
                            <li>
                                <a href="{{ route('subscriptions') }}"><i class="fa fa-calendar-alt"></i>
                                    <span>Subscriptions</span></a>
                            </li>
                            <li>
                                <a href="{{ route('wallet') }}"><i class="fas fa-wallet"></i> <span> Wallet</span></a>
                            </li>
                            <li>
                                <a href="{{ route('wallet') }}"><i class="fas fa-user-tie"></i>
                                    <span> Service Providers</span></a>
                            </li>
                            <li>
                                <a href="{{ route('wallet') }}"><i class="fas fa-user"></i> <span>Users</span></a>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="fas fa-clipboard"></i> <span> Invoices</span>
                                    <span class="menu-arrow"><i class="fas fa-angle-right"></i></span>
                                </a>
                                <ul>
                                    <li><a href="{{ route('invoices') }}">Invoices List</a></li>
                                    <li><a href="{{ route('invoicegrid') }}">Invoices Grid</a></li>
                                    <li><a href="{{ route('addinvoice') }}">Add Invoices</a></li>
                                    <li><a href="{{ route('editinvoice') }}">Edit Invoices</a></li>
                                    <li><a href="{{ route('viewinvoice') }}">Invoices Details</a></li>

                                </ul>
                            </li> --}}

                            {{-- <li class="submenu">
                                <a href="#"><i class="fa fa-calendar-check"></i>
                                    <span>Blog<span class="menu-arrow"><i class="fas fa-angle-right"></i></span></a>
                                <ul>
                                    <li>
                                        <a href="{{ route('blog.index') }}" class=""> <span>All
                                                Blogs</span></a>
                                    </li>
                                    <li><a href="{{ route('blog.create') }}"> <span>Add
                                                Blogs</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blogcategory.index') }}" class=""><span>Categories</span></a>
                                    </li>
                                    <li>
                                        <a href="#" class=""><span>Blog Comments</span></a>
                                    </li>
                                </ul>
                            </li> --}}
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Sidebar -->

        <div class="page-wrapper">
            @yield('content')
        </div>
        <!-- /Page Wrapper -->
        {{-- @yield('modal') --}}
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin/assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('admin/assets/js/admin.js') }}"></script>


    <!-- Bootstrap Core JS -->
    <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        function sendMarkRequest(id = null) {
            return $.ajax("{{ route('markNotification') }}", {
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
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
    @yield('js')
</body>


</html>
