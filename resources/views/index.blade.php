<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Shiva's | Gym">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shiva's | Gym</title>

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

    <style>
        .nav-menu ul li .btn-login,
        .nav-menu ul li .btn-register {
            background-color: #ff4d00;
            /* لون برتقالي قوي */
            color: #fff;
            padding: 8px 16px;
            margin-left: 10px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
            width: auto;
        }

        .nav-menu ul li .btn-login:hover,
        .nav-menu ul li .btn-register:hover {
            background-color: #e63e00;
            /* أغمق شوي عند التمرير */
            color: #fff;
        }

        .nav-menu ul {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
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
                <li><a href="{{ url('/about-us') }}">About</a></li>
                <li><a href="{{ url('/classes') }}">Classes</a></li>
                <li><a href="{{ url('/services') }}">Services</a></li>

                <li><a href="#">Pages</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('/about-us') }}">About us</a></li>
                        <li><a href="{{ url('/class-timetable') }}">Classes timetable</a></li>
                        <li><a href="{{ url('/bmi-calculator') }}">Bmi calculate</a></li>

                        <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                        <li><a href="{{ url('/blog') }}">Our blog</a></li>

                    </ul>
                </li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>
        </nav>

    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <ul>
                            <li class="active"><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/about-us') }}">Abouts</a></li>
                            <li><a href="{{ url('/class-details') }}">Classes</a></li>
                            <li><a href="{{ url('/services') }}">Services</a></li>

                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="{{ url('/about-us') }}">About us</a></li>
                                    <li><a href="{{ url('/class-timetable') }}">Classes timetable</a></li>
                                    <li><a href="{{ url('/bmi-calculator') }}">Bmi calculator</a></li>

                                </ul>
                            </li>
                            <li><a href="{{ url('/contact') }}">Contact</a></li>
                            @if (Auth::guard('member')->check())
                            <li><span>Welcome, {{ Auth::guard('member')->user()->First_Name }}</span></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}" class="btn-login">Login</a></li>
                            <li><a href="{{ route('register') }}" class="btn-register">Register</a></li>
                        @endif
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">

                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header End -->


    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hs-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/hero-1.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Shape your body</span>
                                <h1>Be <strong>strong</strong> traning hard</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/hero-2.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Shape your body</span>
                                <h1>Be <strong>strong</strong> traning hard</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- ChoseUs Section Begin -->
    <section class="choseus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Why choose us?</span>
                        <h2>PUSH YOUR LIMITS FORWARD</h2>
                    </div>
                </div>
            </div>
            <div class="row">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

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

                @php
                 use App\Models\ChooseUsItem;
                      $chooseUsItems = ChooseUsItem::all();
                @endphp
            @foreach ($chooseUsItems as $item)
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <!-- هنا نعرض الأيقونة والعنوان والوصف من قاعدة البيانات -->
                        <span class="{{ $item->icon_class }}"></span>
                        <h4>{{ $item->title }}</h4>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </section>


    <!-- ChoseUs Section End -->
    <!-- Classes Section Begin -->
    <section class="classes-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Classes</span>
                        <h2>WHAT WE CAN OFFER</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @php
                    $trainingClasses = \App\Models\GymClass::all();
                @endphp
                @foreach ($trainingClasses as $class)
                    <div class="col-lg-4 col-md-6">
                        <div class="class-item">
                            <div class="ci-pic">
                                <img src="{{ asset('storage/' . $class->image) }}" alt="">
                            </div>
                            <div class="ci-text">
                                <span>{{ $class->category }}</span>
                                <h5>{{ $class->class_name }}</h5>
                                <a href= "{{ route('classes.show', $class->id) }}"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Classes Section End -->


     <!-- Pricing Section Begin -->
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
<!-- Pricing Section End -->

    <!-- Gallery Section Begin -->
    <div class="gallery-section">
        <div class="gallery">
            <div class="grid-sizer"></div>
            <div class="gs-item grid-wide set-bg" data-setbg="{{ asset('img/gallery/gallery-1.jpg') }}">
                <a href="{{ asset('img/gallery/gallery-1.jpg') }}" class="thumb-icon image-popup"><i
                        class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="{{ asset('img/gallery/gallery-2.jpg') }}">
                <a href="{{ asset('img/gallery/gallery-2.jpg') }}" class="thumb-icon image-popup"><i
                        class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="{{ asset('img/gallery/gallery-3.jpg') }}">
                <a href="{{ asset('img/gallery/gallery-3.jpg') }}" class="thumb-icon image-popup"><i
                        class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="{{ asset('img/gallery/gallery-4.jpg') }}">
                <a href="{{ asset('img/gallery/gallery-4.jpg') }}" class="thumb-icon image-popup"><i
                        class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="{{ asset('img/gallery/gallery-5.jpg') }}">
                <a href="{{ asset('img/gallery/gallery-5.jpg') }}" class="thumb-icon image-popup"><i
                        class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item grid-wide set-bg" data-setbg="{{ asset('img/gallery/gallery-6.jpg') }}">
                <a href="{{ asset('img/gallery/gallery-6.jpg') }}" class="thumb-icon image-popup"><i
                        class="fa fa-picture-o"></i></a>
            </div>
        </div>
    </div>
    <!-- Gallery Section End -->
  <!-- Team Section Begin -->
<section class="team-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="team-title">
                    <div class="section-title">
                        <span>Our Team</span>
                        <h2>TRAIN WITH EXPERTS</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ts-slider owl-carousel">
                @foreach($trainers as $trainer)
                    <div class="col-lg-4">
                        <a href="{{ route('trainer.show', $trainer->id) }}">
                            <div class="ts-item set-bg"
                                @if($trainer->image)
                                           <img src="{{ asset('storage/' . $trainer->image) }}" class="card-img-top" alt="{{ $trainer->name }}">

                                @else
                                    style="background-image: url('{{ asset('img/placeholder-trainer.jpg') }}')"
                                @endif
                            >
                                <div class="ts_text">
                                    <h4>{{ $trainer->name }}</h4>
                                    @if($trainer->specialization)
                                        <p class="specialization">{{ $trainer->specialization }}</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Team Section End -->

    <!-- Get In Touch Section Begin -->
    <div class="gettouch-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-map-marker"></i>
                        <p>Amman<br /> Marj Alhammam</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-mobile"></i>
                        <ul>

                            <li>0770210744</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text email">
                        <i class="fa fa-envelope"></i>
                        <p>mohammadzghoul2018@gmail.com</p>
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
