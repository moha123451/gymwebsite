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
                        <li><a href="{{ url('/about-us') }}">About Us</a></li>
                        <li><a href="{{ url('/class-details') }}">Classes</a></li>
                        <li><a href="{{ url('/services') }}">Services</a></li>
                      
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="{{ url('/about-us') }}">About us</a></li>
                                <li><a href="{{ url('/class-timetable') }}">Classes timetable</a></li>
                                <li><a href="{{ url('/bmi-calculator') }}">Bmi calculate</a></li>


                            </ul>
                        </li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">

                </div>
            </div>
        </div>
        <div class="canvas-open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header End -->
