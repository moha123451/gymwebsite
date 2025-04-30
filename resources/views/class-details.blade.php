<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym | Classes Detail</title>

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
    @include('offcanvas-menu') <!-- تضمين القائمة الجانبية -->
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    @include('header') <!-- تضمين الهيدر -->
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Classes Detail</h2>
                        <div class="bt-option">
                            <a href="{{ url('/') }}">Home</a>
                            <a href="#"><span> Classes</span></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->




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
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Classes Section End -->

<!-- Class Timetable Section Begin -->
<section class="class-timetable-section class-details-timetable spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="class-details-timetable_title">
                    <h5>Classes timetable</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="class-timetable details-timetable">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                                <th>Sunday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="class-time">6.00am - 8.00am</td>
                                <td class="dark-bg hover-dp ts-meta" data-tsmeta="workout">
                                    <h5>WEIGHT LOOSE</h5>
                                    <span>RLefew D. Loee</span>
                                </td>
                                <td class="hover-dp ts-meta" data-tsmeta="fitness">
                                    <h5>Cardio</h5>
                                    <span>RLefew D. Loee</span>
                                </td>
                                <td class="dark-bg hover-dp ts-meta" data-tsmeta="workout">
                                    <h5>Yoga</h5>
                                    <span>Keaf Shen</span>
                                </td>
                                <td class="hover-dp ts-meta" data-tsmeta="fitness">
                                    <h5>Fitness</h5>
                                    <span>Kimberly Stone</span>
                                </td>
                                <td class="dark-bg blank-td"></td>
                                <td class="hover-dp ts-meta" data-tsmeta="motivation">
                                    <h5>Boxing</h5>
                                    <span>Rachel Adam</span>
                                </td>
                                <td class="dark-bg hover-dp ts-meta" data-tsmeta="workout">
                                    <h5>Body Building</h5>
                                    <span>Robert Cage</span>
                                </td>
                            </tr>
                            <!-- Add more rows here as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Class Timetable Section End -->
<!-- Get In Touch Section Begin -->
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
