<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym | About Us</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/barfiller.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <div class="canvas-search search-switch">
            <i class="fa fa-search"></i>
        </div>
        <nav class="canvas-menu mobile-menu">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about-us') }}" class="active">About Us</a></li>
                <li><a href="{{ url('/classes') }}">Classes</a></li>
                <li><a href="{{ url('/services') }}">Services</a></li>
                <li><a href="{{ url('/team') }}">Our Team</a></li>
                <li><a href="#">Pages</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('/about-us') }}">About us</a></li>
                        <li><a href="{{ url('/class-timetable') }}">Classes timetable</a></li>
                        <li><a href="{{ url('/bmi-calculator') }}">Bmi calculate</a></li>
                        <li><a href="{{ url('/team') }}">Our team</a></li>
                        <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                        <li><a href="{{ url('/blog') }}">Our blog</a></li>
                        <li><a href="{{ url('/404') }}">404</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    @include('header')
    <!-- Header End -->
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb-text">
                    <h2>About us</h2>
                    <div class="bt-option">
                        <a href="{{ url('/') }}">Home</a>
                        <span>About</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- ChoseUs Section Begin -->
<section class="choseus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Why chose us?</span>
                    <h2>PUSH YOUR LIMITS FORWARD</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-034-stationary-bike"></span>
                    <h4>Modern equipment</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut dolore facilisis.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-033-juice"></span>
                    <h4>Healthy nutrition plan</h4>
                    <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-002-dumbell"></span>
                    <h4>Professional training plan</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut dolore facilisis.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-014-heart-beat"></span>
                    <h4>Unique to your needs</h4>
                    <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ChoseUs Section End -->

<!-- About Us Section Begin -->
<section class="aboutus-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="about-video set-bg" data-setbg="{{ asset('img/about-us.jpg') }}">
                    <a href="https://www.youtube.com/watch?v=EzKkl64rRbM" class="play-btn video-popup"><i class="fa fa-caret-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="about-text">
                    <div class="section-title">
                        <span>About Us</span>
                        <h2>What we have done</h2>
                    </div>
                    <div class="at-desc">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                    </div>
                    <div class="about-bar">
                        <div class="ab-item">
                            <p>Body building</p>
                            <div id="bar1" class="barfiller">
                                <span class="fill" data-percentage="80"></span>
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                            </div>
                        </div>
                        <div class="ab-item">
                            <p>Training</p>
                            <div id="bar2" class="barfiller">
                                <span class="fill" data-percentage="85"></span>
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                            </div>
                        </div>
                        <div class="ab-item">
                            <p>Fitness</p>
                            <div id="bar3" class="barfiller">
                                <span class="fill" data-percentage="75"></span>
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Section End -->

@include('footer') <!-- تضمين الفوتر -->
@include('get_in_touch') <!-- تضمين قسم "التواصل معنا" -->

<!-- JS Plugins -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('js/jquery.barfiller.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
