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
<!-- Services Section Begin -->
<section class="services-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>What we do?</span>
                    <h2>PUSH YOUR LIMITS FORWARD</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 order-lg-1 col-md-6 p-0">
                <div class="ss-pic">
                    <img src="{{ asset('img/services/services-1.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-3 order-lg-2 col-md-6 p-0">
                <div class="ss-text">
                    <h4>Personal training</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut dolore facilisis.</p>
                    <a href="#">Explore</a>
                </div>
            </div>
            <div class="col-lg-3 order-lg-3 col-md-6 p-0">
                <div class="ss-pic">
                    <img src="{{ asset('img/services/services-2.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-3 order-lg-4 col-md-6 p-0">
                <div class="ss-text">
                    <h4>Group fitness classes</h4>
                    <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus.</p>
                    <a href="#">Explore</a>
                </div>
            </div>
            <div class="col-lg-3 order-lg-8 col-md-6 p-0">
                <div class="ss-pic">
                    <img src="{{ asset('img/services/services-4.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-3 order-lg-7 col-md-6 p-0">
                <div class="ss-text second-row">
                    <h4>Body building</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut dolore facilisis.</p>
                    <a href="#">Explore</a>
                </div>
            </div>
            <div class="col-lg-3 order-lg-6 col-md-6 p-0">
                <div class="ss-pic">
                    <img src="{{ asset('img/services/services-3.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-3 order-lg-5 col-md-6 p-0">
                <div class="ss-text second-row">
                    <h4>Strength training</h4>
                    <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus.</p>
                    <a href="#">Explore</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->
<!-- Banner Section Begin -->
<section class="banner-section set-bg" data-setbg="{{ asset('img/banner-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="bs-text service-banner">
                    <h2>Exercise until the body obeys.</h2>
                    <div class="bt-tips">Where health, beauty and fitness meet.</div>
                    <a href="https://www.youtube.com/watch?v=EzKkl64rRbM" class="play-btn video-popup"><i
                            class="fa fa-caret-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

 <!-- Get  Pricing Section Begin -->
<section class="pricing-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Our Plan</span>
                    <h2>Choose your pricing plan</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($subscriptions as $subscription) <!-- تكرار كل خطة اشتراك -->
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>{{ $subscription->title }}</h3> <!-- عرض اسم الخطة -->
                        <div class="pi-price">
                            <h2>{{ number_format($subscription->subscribtion_amount, 2) }} JOD</h2> <!-- عرض السعر بالعملة الأردنية -->
                            <span>SINGLE CLASS</span>
                        </div>
                        <ul>
                            <li>{{ $subscription->features }}</li>  <!-- عرض المزايا -->
                            <li>{{ $subscription->description }}</li>  <!-- عرض الوصف -->
                            <li>{{ $subscription->duration }}</li>  <!-- عرض المدة -->
                        </ul>
                        <a href="{{ route('payment.show', $subscription->id) }}" class="primary-btn pricing-btn">Enroll now</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Pricing Section End -->In Touch Section Begin -->
 <div class="gettouch-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="gt-text">
                    <i class="fa fa-map-marker"></i>
                    <p>333 Middle Winchendon Rd, Rindge,<br/> NH 03461</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gt-text">
                    <i class="fa fa-mobile"></i>
                    <ul>
                        <li>125-711-811</li>
                        <li>125-668-886</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gt-text email">
                    <i class="fa fa-envelope"></i>
                    <p>Support.gymcenter@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Get In Touch Section End -->

<!-- Footer Section Begin -->
<section class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="fs-about">
                    <div class="fa-logo">
                        <a href="#"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore dolore magna aliqua endisse ultrices gravida lorem.</p>
                    <div class="fa-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa  fa-envelope-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="fs-widget">
                    <h4>Useful links</h4>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Classes</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="fs-widget">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">My account</a></li>
                        <li><a href="#">Subscribe</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="fs-widget">
                    <h4>Tips & Guides</h4>
                    <div class="fw-recent">
                        <h6><a href="#">Physical fitness may help prevent depression, anxiety</a></h6>
                        <ul>
                            <li>3 min read</li>
                            <li>20 Comment</li>
                        </ul>
                    </div>
                    <div class="fw-recent">
                        <h6><a href="#">Fitness: The best exercise to lose belly fat and tone up...</a></h6>
                        <ul>
                            <li>3 min read</li>
                            <li>20 Comment</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="copyright-text">
                    <p>&copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
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
