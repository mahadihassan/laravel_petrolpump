<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="keywords" content="{{ $basic->meta_tag }}">
    <title>{{ $site_title }} | {{ $page_title }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.min.css') }}">

    @yield('style')
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar">
<!-- - var navbarShadow = true-->
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-light bg-gradient-x-grey-blue">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="navbar-brand">
                        <img alt="logo" src="{{ asset('assets/images/logo.png') }}" style="height: 36px" class="brand-logo">
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div id="navbar-mobile" class="collapse navbar-collapse">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link nav-link-expand"><i class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
                <span class="avatar avatar-online">
                  <img src="{{ asset('assets/images') }}/{{ Auth::user()->image }}" alt="avatar"><i></i></span>
                            <span class="user-name">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a href="{{ route('edit-profile') }}" class="dropdown-item"><i class="ft-edit-3"></i> Edit Profile</a>
                            <a href="{{ route('admin-change-password') }}" class="dropdown-item"><i class="ft-check-square"></i> Change Password</a>
                            <div class="dropdown-divider"></div><a href="{{ route('admin.logout') }}" class="dropdown-item"><i class="ft-power"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div data-scroll-to-active="true" class="main-menu menu-fixed menu-light menu-accordion menu-shadow">
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" navigation-header">
                <span>General</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
            </li>
            <li class="{{ Request::is('admin-dashboard') ? 'active' : '' }} nav-item">
                <a href="{{ route('dashboard') }}"><i class="ft-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
            </li>


            <li class="nav-item"><a href="#"><i class="ft-menu"></i><span data-i18n="" class="menu-title">Manage Blog</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/post-create') ? 'active' : '' }}"><a href="{{ route('post-create') }}" class="menu-item">New Blog</a></li>
                    <li class="{{ Request::is('admin/post-all') ? 'active' : '' }}"><a href="{{ route('post-all') }}" class="menu-item">All Blog</a></li>
                </ul>
            </li>

             <li class="nav-item"><a href="#"><i class="ft-grid"></i><span data-i18n="" class="menu-title">Manage Fuel</span></a>
                <ul class="menu-content">
                    <li  class="{{ Request::is('admin/fuel-create') ? 'active' : '' }}"><a href="{{ route('fuel-create') }}" class="menu-item">New Fuel</a></li>
                    </li>
                    <li class="{{ Request::is('admin/fuel-index') ? 'active' : '' }}"><a href="{{ route('fuel-index') }}" class="menu-item">All Fuel</a></li>
                </ul>
            </li>

            <li class="nav-item"><a href="#"><i class="fa fa-picture-o"></i><span data-i18n="" class="menu-title">StoreFuel</span></a>
                <ul class="menu-content">
                    <li  class="{{ Request::is('admin/fuel-store-create') ? 'active' : '' }}"><a href="{{ route('fuel-store-create') }}" class="menu-item">New StoreFuel</a></li>
                    </li>
                    <li class="{{ Request::is('admin/fuel-store-index') ? 'active' : '' }}"><a href="{{ route('fuel-store-index') }}" class="menu-item">All StoreFuel</a></li>
                </ul>
            </li>

             <li class="nav-item"><a href="#"><i class="ft-menu"></i><span data-i18n="" class="menu-title">Manage Machine</span></a>
                <ul class="menu-content">
                    <li  class="{{ Request::is('admin/machine-create') ? 'active' : '' }}"><a href="{{ route('machine-create') }}" class="menu-item">Machine Create</a></li>
                    </li>
                    <li class="{{ Request::is('admin/machine-index') ? 'active' : '' }}"><a href="{{ route('machine-index') }}" class="menu-item">All Machine</a></li>
                </ul>
            </li>

            <li class="nav-item"><a href="#"><i class="ft-menu"></i><span data-i18n="" class="menu-title">Load Fuel</span></a>
                <ul class="menu-content">
                    <li  class="{{ Request::is('admin/load-create') ? 'active' : '' }}"><a href="{{ route('load-create') }}" class="menu-item">New LoadFuel</a></li>
                    </li>
                    <li class="{{ Request::is('admin/load-index') ? 'active' : '' }}"><a href="{{ route('load-index') }}" class="menu-item">All LoadFuel</a></li>
                </ul>
            </li>



             <li class="nav-item"><a href="#"><i class="fa fa-picture-o"></i><span data-i18n="" class="menu-title">Manage Branch</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/branch-create') ? 'active' : '' }}"><a href="{{ route('branch-create') }}" class="menu-item">Create Branch</a></li>
                     <li class="{{ Request::is('admin/branch-index') ? 'active' : '' }}"><a href="{{ route('branch-index') }}" class="menu-item">All Branch</a></li>
                </ul>
            </li>

             <li class="nav-item"><a href="#"><i class="ft-grid"></i><span data-i18n="" class="menu-title">Branch Manager</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/manager-create') ? 'active' : '' }}"><a href="{{ route('manager-create') }}" class="menu-item">Create Manager</a></li>
                    <li class="{{ Request::is('admin/manager-index') ? 'active' : '' }}"><a href="{{ route('manager-index') }}" class="menu-item">All Manager</a></li>
                    
                </ul>
            </li>

             <li class="nav-item"><a href="#"><i class="ft-map"></i><span data-i18n="" class="menu-title">Manage Seller</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/seller-create') ? 'active' : '' }}"><a href="{{ route('seller-create') }}" class="menu-item">Create Seller</a></li>
                     <li class="{{ Request::is('admin/seller-index') ? 'active' : '' }}"><a href="{{ route('seller-index') }}" class="menu-item">All Seller</a></li>
                </ul>
            </li>

            <li class="nav-item"><a href="#"><i class="ft-menu"></i><span data-i18n="" class="menu-title">Manage Supplier</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/supplier-create') ? 'active' : '' }}"><a href="{{ route('supplier-create') }}" class="menu-item">Create Supplier</a></li>
                    <li class="{{ Request::is('admin/supplier-index') ? 'active' : '' }}"><a href="{{ route('supplier-index') }}" class="menu-item">Supplier History</a></li>
                </ul>
            </li>

             <li class="nav-item"><a href="#"><i class="ft-map"></i><span data-i18n="" class="menu-title">Supplier Payment</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/repayment') ? 'active' : '' }}"><a href="{{ route('repayment') }}" class="menu-item">Repayment</a></li>
                    <li class="{{ Request::is('admin/repayment-index') ? 'active' : '' }}"><a href="{{ route('repayment-index') }}" class="menu-item">Repayment History</a></li>
                </ul>
            </li>

             <li class="nav-item"><a href="#"><i class="ft-menu"></i><span data-i18n="" class="menu-title">Manage Balance</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin/balance-create') ? 'active' : '' }}"><a href="{{ route('balance-create') }}" class="menu-item">Balance</a></li>
                    <li class="{{ Request::is('admin/balance-index') ? 'active' : '' }}"><a href="{{ route('balance-index') }}" class="menu-item">Balance History</a></li>
                </ul>
            </li>

             <li class="{{ Request::is('admin/expense-index') ? 'active' : '' }} nav-item">
                <a href="{!! route('expense-index') !!}"><i class="ft-credit-card"></i><span data-i18n="" class="menu-title">Manage Expense</span></a>
            </li>


            <li class="{{ Request::is('admin/manage-category') ? 'active' : '' }} nav-item">
                <a href="{!! route('manage-category') !!}"><i class="ft-map"></i><span data-i18n="" class="menu-title">Blog Category</span></a>
            </li>
            <li class="{{ Request::is('admin/speciality-control') ? 'active' : '' }} nav-item">
                <a href="{!! route('speciality-control') !!}"><i class="ft-grid"></i><span data-i18n="" class="menu-title">Manage Speciality</span></a>
            </li>
           

            <li class="{{ Request::is('transaction-log') ? 'active' : '' }} nav-item">
                <a href="{{ route('transaction-log') }}"><i class="ft-activity"></i><span data-i18n="" class="menu-title">Transaction Log</span></a>
            </li>
            <li class="navigation-header">
                <span>Basic Control</span><i data-toggle="tooltip" data-placement="right" data-original-title="Components" class=" ft-minus"></i>
            </li>
            <li class="{{ Request::is('admin/basic-setting') ? 'active' : '' }} nav-item">
                <a href="{!! route('basic-setting') !!}"><i class="fa fa-cogs" aria-hidden="true"></i><span data-i18n="" class="menu-title">Basic Setup</span></a>
            </li>
            <li class="{{ Request::is('admin/email-setting') ? 'active' : '' }} nav-item">
                <a href="{!! route('email-setting') !!}"><i class="fa fa-envelope-square" aria-hidden="true"></i><span data-i18n="" class="menu-title">Email Setting</span></a>
            </li>
            <li class="{{ Request::is('admin/google-recaptcha') ? 'active' : '' }} nav-item">
                <a href="{!! route('google-recaptcha') !!}"><i class="fa fa-retweet"></i><span data-i18n="" class="menu-title">Google Recaptcha</span></a>
            </li>
            <li class="{{ Request::is('admin/email-template') ? 'active' : '' }} nav-item">
                <a href="{!! route('email-template') !!}"><i class="fa fa-envelope-open-o"></i><span data-i18n="" class="menu-title">Email Template</span></a>
            </li>
            <li class="{{ Request::is('admin/sms-setting') ? 'active' : '' }} nav-item">
                <a href="{!! route('sms-setting') !!}"><i class="fa fa-cog"></i><span data-i18n="" class="menu-title">SMS API</span></a>
            </li>
            <li class="{{ Request::is('admin/currency-widget') ? 'active' : '' }} nav-item">
                <a href="{!! route('currency-widget') !!}"><i class="fa fa-unlink"></i><span data-i18n="" class="menu-title">Currency widget</span></a>
            </li>
            <li class="{{ Request::is('admin/google-analytic') ? 'active' : '' }} nav-item">
                <a href="{!! route('google-analytic') !!}"><i class="fa fa-google"></i><span data-i18n="" class="menu-title">Google Analytic</span></a>
            </li>
            <li class="{{ Request::is('admin/live-chat') ? 'active' : '' }} nav-item">
                <a href="{!! route('live-chat') !!}"><i class="fa fa-comments-o"></i><span data-i18n="" class="menu-title">Live Chat</span></a>
            </li>
            <li class="{{ Request::is('admin/cron-job') ? 'active' : '' }} nav-item">
                <a href="{!! route('cron-job') !!}"><i class="fa fa-link"></i><span data-i18n="" class="menu-title">Cron Config</span></a>
            </li>
            <li class="{{ Request::is('admin/database-backup') ? 'active' : '' }} nav-item">
                <a href="{!! route('database-backup') !!}"><i class="fa fa-database"></i><span data-i18n="" class="menu-title">Database Backup</span></a>
            </li>
            <li class=" navigation-header">
                <span>Web Control</span><i data-toggle="tooltip" data-placement="right" data-original-title="Components" class=" ft-minus"></i>
            </li>
            <li class="{{ Request::is('admin/manage-logo') ? 'active' : '' }} nav-item">
                <a href="{!! route('manage-logo') !!}"><i class="fa fa-picture-o"></i><span data-i18n="" class="menu-title">Manage Logo</span></a>
            </li>
            
            <li class="{{ Request::is('admin/manage-social') ? 'active' : '' }} nav-item">
                <a href="{!! route('manage-social') !!}"><i class="fa fa-share-square-o"></i><span data-i18n="" class="menu-title">Manage Social</span></a>
            </li>
            <li class="{{ Request::is('admin/manage-breadcrumb') ? 'active' : '' }} nav-item">
                <a href="{!! route('manage-breadcrumb') !!}"><i class="fa fa-file-image-o"></i><span data-i18n="" class="menu-title">Breadcrumb Image</span></a>
            </li>

            <li class="{{ Request::is('admin/menu-control') ? 'active' : '' }} nav-item">
                <a href="{!! route('menu-control') !!}"><i class="ft-briefcase"></i><span data-i18n="" class="menu-title">Manage Menu</span></a>
            </li>
           
            <li class="{{ Request::is('admin/manage-terms') ? 'active' : '' }} nav-item">
                <a href="{!! route('manage-terms') !!}"><i class="fa fa-address-card-o"></i><span data-i18n="" class="menu-title">Term & Condition</span></a>
            </li>
            <li class="{{ Request::is('admin/manage-privacy') ? 'active' : '' }} nav-item">
                <a href="{!! route('manage-privacy') !!}"><i class="fa fa-file-text"></i><span data-i18n="" class="menu-title">Privacy & Policy</span></a>
            </li>
            <li class=" navigation-header">
                <span>Section Control</span><i data-toggle="tooltip" data-placement="right" data-original-title="Components" class=" ft-minus"></i>
            </li>
            <li class="{{--{{ Request::is('admin/login-section') ? 'active' : '' }}--}} nav-item">
                <a href="{{--{!! route('login-section') !!}--}}"><i class="fa fa-sign-in"></i><span data-i18n="" class="menu-title">Login Section</span></a>
            </li>
        </ul>
    </div>
</div>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">{{ $page_title }}</h3>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ $page_title }}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            @if($errors->any())
                @foreach ($errors->all() as $error)

                    <div class="alert alert-icon-left alert-warning alert-dismissible mb-1" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {!!  $error !!}
                    </div>

                @endforeach
            @endif

            @yield('content')

        </div>
    </div>
</div>

<footer class="footer footer-static footer-dark navbar-border">
    <p class="clearfix text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">{!! $basic->copy_text !!}</span>
      <span class="float-md-right d-block d-md-inline-block">Version : v1.0.2</span>
    </p>
</footer>

<script src="{{ asset('assets/admin/js/vendors.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/toastr.js') }}"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
@yield('scripts')
</body>
</html>