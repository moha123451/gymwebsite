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
            <li><a href="{{ url('/about-us') }}">About Us</a></li>
            <li><a href="{{ url('/classes') }}">Classes</a></li>
            <li><a href="{{ url('/services') }}">Services</a></li>
            <li><a href="{{ url('/team') }}">Our Team</a></li>
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
    <div id="mobile-menu-wrap"></div>
   
</div>
<!-- Offcanvas Menu Section End -->
