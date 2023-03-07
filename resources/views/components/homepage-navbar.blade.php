<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

        <h1 class="logo me-auto me-lg-0"><a href="index.html">Pengaduan Sekolah</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="frontend/assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link {{request()->routeIs('homepage') ? 'active' : ''}}" href="{{route('homepage')}}">Home</a></li>
                <li><a class="nav-link {{request()->routeIs('profile') ? 'active' : ''}}" href="{{route('profile')}}">Profile</a></li>
                @guest
                    <li><a class="nav-link" href="{{route('login')}}">Login</a></li>
                @endguest
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header>
