<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{$basic->meta_tag}}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>{{ $site_title }} - {{$page_title}}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- This is for the animation CSS -->
    <link href="{{ asset('assets/css/aos.css') }}" rel="stylesheet">
    <!-- This page CSS -->
    <link href="{{ asset('assets/css/bootstrap-touch-slider.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/css/prism.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.theme.green.css') }}" rel="stylesheet">
    <!-- This page CSS -->
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/headers.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">{{ $site_title }}</p>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <div class="topbar bg-inverse">
        {{--<div class="header6">
            <div class="container po-relative">
                <nav class="navbar navbar-expand-lg h6-nav-bar">
                    <a href="{{ route('home') }}" class="navbar-brand"><img src="{{asset('assets/images/logo.png')}}" alt="{{ $basic->title }}" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#h6-info" aria-controls="h6-info" aria-expanded="false" aria-label="Toggle navigation"><span class="ti-menu"></span></button>
                    <div class="collapse navbar-collapse hover-dropdown font-14 ml-auto" id="h6-info">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            @foreach($menus as $m)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('menu') }}/{{ $m->id }}/{{ urldecode(strtolower(str_slug($m->name))) }}">{{ $m->name }}</a>
                            </li>
                            @endforeach
                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="{{ route('blog') }}" id="h6-dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Blog <i class="fa fa-angle-down m-l-5"></i>
                                </a>
                                <ul class="b-none dropdown-menu font-14 general-listing p-l-20 animated fadeInUp">
                                    @foreach($category as $cat)
                                    <li><a class="dropdown-item" href="{{ route('category-blog',$cat->slug) }}"> <i class="fa fa-long-arrow-right"></i> {{ $cat->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about-us') }}">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
                            </li>

                            @if(Auth::check())
                                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="h6-dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Hi. {{ Auth::user()->name }} <i class="fa fa-angle-down m-l-5"></i>
                                    </a>
                                    <ul class="b-none dropdown-menu font-14 general-listing p-l-20 animated fadeInUp">
                                        <li><a class="dropdown-item" href="{{ route('user-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Log Out</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </ul>
                                </li>
                            </ul>
                            @else
                            </ul>
                            <div class="rounded-button">
                                <a href="{{ route('login') }}">Login</a> - OR - <a href="{{ route('register') }}">Register</a>
                            </div>
                            @endif
                    </div>
                </nav>
            </div>
        </div>--}}
        <div class="header13">
            <!-- Header 13 topbar -->
            <div class="h13-topbar">
                <div class="container">
                    <nav class="navbar navbar-expand-lg font-14">
                        <a class="navbar-brand hidden-lg-up" href="#">Top Menu</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header13a" aria-controls="header13a" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="sl-icon-options"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="header13a">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link" href="mailto:info@wrappixel.com"><i class="fa fa-envelope"></i> info@wrappixel.com</a></li>
                                <li class="nav-item"><a class="nav-link"><i class="fa fa-clock-o"></i> 8.00AM - 6:00PM</a></li>
                            </ul>
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="h13-sdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-search"></i></a>
                                    <div class="dropdown-menu b-none search-box dropdown-menu-right animated fadeInDown" aria-labelledby="h13-sdropdown">
                                        <input class="form-control" type="text" placeholder="Type &amp; hit enter">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Header 13 topbar -->
            <div class="container">
                <!-- Header 13 navabar -->
                <nav class="navbar navbar-expand-lg hover-dropdown h13-nav">
                    <a class="navbar-brand" href="#"><img src="{{ asset('assets/images/logo.png') }}" alt="logo" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header13" aria-controls="header13" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="ti-menu"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="header13">
                        <div class="call-info hidden-md-down">
                            <small class="text-muted">CALL US ON</small>
                            <h5 class="m-b-0 font-medium">215 123 4567</h5>
                        </div>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">About Me</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Work</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="h13-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Services <i class="fa fa-angle-down m-l-5"></i>
                                </a>
                                <ul class="b-none dropdown-menu animated flipInY">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li class="divider" role="separator"></li>
                                    <li class="dropdown-submenu"> <a class="dropdown-toggle dropdown-item" href="#" data-toggle="dropdown">Dropdown <i class="fa fa-angle-right ml-auto"></i></a>
                                        <ul class="dropdown-menu b-none menu-right animated fadeInUp">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            <li class="divider" role="separator"></li>
                                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                                            <li class="divider" role="separator"></li>
                                            <li><a class="dropdown-item" href="#">One more separated link</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    <li class="divider" role="separator"></li>
                                    <li><a class="dropdown-item" href="#">One more separated link</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#">Freebies</a></li>
                            <li class="nav-item"><a class="btn btn-danger-gradiant" href="#">Get Free Quote</a></li>
                        </ul>
                    </div>
                </nav>
                <!-- End Header 13 navabar -->
            </div>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->

        @yield('content')

        <a class="bt-top btn btn-circle btn-lg btn-info-gradiant" href="#top"><i class="ti-arrow-up"></i></a>

    </div>

    <div class="footer4 spacer b-t bg-dark white">
        <div class="container">
            <div class="row">
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <a href="#"><img src="{{ asset('assets/images/logo.png') }}" alt="{{$site_title}}"></a>
                    <p class="m-t-20 text-justify">{{$basic->footer_text}}</p>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-6 col-md-12 m-t-5">
                    <h5 class="font-medium m-t-20 white">Popular Categories</h5>
                    <ul class="general-listing two-part with-arrow m-t-10 ">
                        @foreach($footer_category as $fc)
                        <li><a href="{{route('category-blog',$fc->slug)}}" class="white"><i class="fa fa-angle-right"></i> {{$fc->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- Column -->
                <div class="col-lg-3 col-md-6 white">
                    <h5 class="font-medium m-t-20 white">Get in Touch</h5>
                    <div class="d-flex no-block m-b-10 m-t-20">
                        <div class="display-7 m-r-20 align-self-top"><i class="icon-Location-2"></i></div>
                        <div class="info">
                            <span class="font-medium text-dark db m-t-5 white">{!! $basic->address !!}</span>
                        </div>
                    </div>
                    <div class="d-flex no-block m-b-10">
                        <div class="display-7 m-r-20 align-self-top"><i class="icon-Phone-2"></i></div>
                        <div class="info">
                            <span class="font-medium text-dark db  m-t-5 white">{{$basic->phone}}</span>
                        </div>
                    </div>
                    <div class="d-flex no-block m-b-20">
                        <div class="display-7 m-r-20 align-self-top"><i class="icon-Mail"></i></div>
                        <div class="info">
                            <a href="#" class="font-medium text-dark db  m-t-5 white">{{$basic->email}}</a>
                        </div>
                    </div>
                    <div class="round-social light">
                        @foreach($social as $sc)
                        <a href="{{$sc->link}}" target="_blank" class="link">{!! $sc->code !!}</a>
                        @endforeach
                    </div>
                </div>
                <!-- Column -->
            </div>
            <div class="f4-bottom-bar white">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex font-14">
                            <div class="m-t-10 m-b-10 copyright">{!! $basic->copy_text !!}</div>
                            <div class="links ml-auto m-t-10 m-b-10">
                                <a href="{{ route('home') }}" class="p-10 p-l-0 white">Home</a>
                                <a href="{{ route('about-us') }}" class="p-10 p-l-0 white">About Us</a>
                                <a href="{{ route('terms-condition') }}" class="p-10 p-l-0 white">Terms of Use</a>
                                <a href="{{ route('privacy-policy') }}" class="p-10 white">Privacy Policy</a>
                                <a href="{{ route('contact-us') }}" class="p-10 white">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/aos.js') }}"></script>
<script src="{{ asset('assets/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.touchSwipe.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.min.js') }}"></script>
<script src="{{ asset('assets/js/prism.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-touch-slider.js') }}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/js/change.js') }}"></script>

{!! $basic->google_analytic !!}
{!! $basic->chat !!}


</body>

</html>