<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym | Blog</title>

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
    @include('offcanvas-menu') <!-- إعادة استخدام قسم القائمة الجانبية -->
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    @include('header')
    <!-- Header End -->

    <!-- Blog Details Hero Section Begin -->
    <section class="blog-details-hero set-bg" data-setbg="{{ asset('img/blog/details/details-hero.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 p-0 m-auto">
                    <div class="bh-text">
                        <h3>Workout nutrition explained. What to eat before, during, and after exercise.</h3>
                        <ul>
                            <li>by Admin</li>
                            <li>Aug,15, 2019</li>
                            <li>20 Comment</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero Section End -->
     <!-- Blog Details Section Begin -->
     <section class="blog-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 p-0 m-auto">
                    <div class="blog-details-text">
                        <div class="blog-details-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</p>
                            <p>laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure...</p>
                            <h5>You Can Buy For Less Than A College Degree</h5>
                            <p>Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore...</p>
                        </div>
                        <div class="blog-details-pic">
                            <div class="blog-details-pic-item">
                                <img src="{{ asset('img/blog/details/details-1.jpg') }}" alt="">
                            </div>
                            <div class="blog-details-pic-item">
                                <img src="{{ asset('img/blog/details/details-2.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="blog-details-desc">
                            <p>Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore...</p>
                        </div>
                        <div class="blog-details-quote">
                            <div class="quote-icon">
                                <img src="{{ asset('img/blog/details/quote-left.png') }}" alt="">
                            </div>
                            <h5>The whole family of tiny legumes, whether red, green, yellow, or black...</h5>
                            <span>MEIKE PETERS</span>
                        </div>
                        <div class="blog-details-more-desc">
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi...</p>
                        </div>
                        <div class="blog-details-tag-share">
                            <div class="tags">
                                <a href="#">Body building</a>
                                <a href="#">Yoga</a>
                                <a href="#">Weightloss</a>
                                <a href="#">Streching</a>
                            </div>
                            <div class="share">
                                <span>Share</span>
                                <a href="#"><i class="fa fa-facebook"></i> 82</a>
                                <a href="#"><i class="fa fa-twitter"></i> 24</a>
                                <a href="#"><i class="fa fa-envelope"></i> 08</a>
                            </div>
                        </div>
                        <div class="blog-details-author">
                            <div class="ba-pic">
                                <img src="{{ asset('img/blog/details/blog-profile.jpg') }}" alt="">
                            </div>
                            <div class="ba-text">
                                <h5>Lena Mollein.</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                                <div class="bp-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="comment-option">
                                    <h5 class="co-title">Comment</h5>
                                    <div class="co-item">
                                        <div class="co-widget">
                                            <a href="#"><i class="fa fa-heart-o"></i></a>
                                            <a href="#"><i class="fa fa-share-square-o"></i></a>
                                        </div>
                                        <div class="co-pic">
                                            <img src="{{ asset('img/blog/details/comment-1.jpg') }}" alt="">
                                            <h5>Brandon Kelley</h5>
                                        </div>
                                        <div class="co-text">
                                            <p>Neque porro quisquam est, qui dolorem ipsum dolor sit amet...</p>
                                        </div>
                                    </div>
                                    <!-- تعليق آخر هنا -->
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="leave-comment">
                                    <h5>Leave a comment</h5>
                                    <form action="#">
                                        <input type="text" placeholder="Name">
                                        <input type="text" placeholder="Email">
                                        <input type="text" placeholder="Website">
                                        <textarea placeholder="Comment"></textarea>
                                        <button type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    @include('get_in_touch') <!-- تضمين قسم "التواصل معنا" -->
    @include('footer') <!-- تضمين الفوتر -->

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
