<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title', 'Shop Homepage - Start Bootstrap Template')</title>
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Add this line to include Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Your Custom CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{ route('buyer.dashboard') }}">
                <img src="{{ asset('assets/logo.PNG') }}" alt="Your Logo" width="auto" height="100">
                SweeTrade Hub
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('buyer/home') ? 'active' : '' }}"
                            href="{{ route('buyer.dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('buyer/about') ? 'active' : '' }}"
                            href="{{ route('buyer.about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('buyer/order-history') ? 'active' : '' }}"
                            href="{{ route('buyer.order-history') }}">History Pembelian</a>
                    </li>
                </ul>
                <div class="d-flex">
                    @auth
                    <div class="dropdown">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="userDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('buyer.profile') }}">Profile</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item logout">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <a class="btn btn-outline-dark" href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Header-->
    <header class="bg-dark py-5 mt-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">@yield('header', 'Shop in style')</h1>
                <p class="lead fw-normal text-white-50 mb-0">@yield('header-description', 'With this shop homepage
                    template')</p>
            </div>
        </div>
    </header>

    <!-- Content Section -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s"
        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="fw-bold text-light mb-4">Sweet<span class="text-secondary">Potato</span></h1>
                    <p>Your one-stop destination for the finest organic sweet potatoes. We are passionate about
                        providing
                        high-quality, sustainably grown sweet potatoes from KAMPUNG BERSEHATI, DISTRIK TANAH MIRING,
                        MERAUKE.</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="#"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="#"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="#"><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href="#"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link text-light" href="#">About Us</a>
                    <a class="btn btn-link text-light" href="#">Contact Us</a>
                    <a class="btn btn-link text-light" href="#">Our Services</a>
                    <a class="btn btn-link text-light" href="#">Terms &amp; Condition</a>
                    <a class="btn btn-link text-light" href="#">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Stay updated with our latest sweet potato news and offers. Sign up for our newsletter!</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button" class="btn btn-success py-2 position-absolute top-0 end-0 mt-2 me-2">Sign
                            Up</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        © <a href="#" class="text-light">Sweet Potato Shop</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>