
<?php
// header('Location: https://hackathon.fekdi.co.id/');
?>
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TRPK83HY1G"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-TRPK83HY1G');
    </script>
	<!-- Google tag (gtag.js) -->

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta property="og:locale" content="id_ID" />
	<meta http-equiv="Cache-control" content="public">

	<meta name="theme-color" content="#2A73AC">

	<meta name="author" content="Bank Indonesia" />
	<meta name="description" content="BI - OJK Hackathon 2025" />

	<meta property="og:site_name" content="BI - OJK Hackathon 2025" />
	<meta property="og:title" content="BI - OJK Hackathon 2025" />
	<meta property="og:description" content="EMPOWERING THE FUTURE: Innovating Digital Service and Financial Solutions for Inclusive Growth and Resilient Economy" />
	<meta property="og:url" content="https://hackathon.fekdi.co.id" />
	<meta property="og:image" content="/img/hero/bi-hackathon-2025.png" />
	<meta property="og:image:secure_url" content="/img/hero/bi-hackathon-2025.png" />
	<meta property="og:image:type" content="image/png" />
	<meta property="og:image:width" content="660" />
	<meta property="og:image:height" content="176" />
	<meta property="og:image:alt" content="Bank Indonesia" />
	<title>BI - OJK Hackathon 2025</title>

	<!-- Favicons -->
	<link href="/img/favicon.png" rel="icon">
	<link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/vendor/remixicon/remixicon.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="/css/css.css" rel="stylesheet">
    <link href="/css/register.css" rel="stylesheet">
</head>

<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-lg-between">
        <!-- Logo -->
        <div class="nav-logo">
            <a href="/" class="me-2 me-lg-4"><img src="/img/logo-bi.png" alt="" class="img-fluid logo-img " style="max-height:30px !important; width:auto;"></a>
            <a href="/" class="me-2 me-lg-4"><img src="/img/hero/component/logo-ojk.png" alt="" class="img-fluid logo-img fekdi" style="max-height:30px !important; width:auto;"></a>
            <a href="/" class="me-2 me-lg-4"><img src="/img/hero/component/logo-fekdi.png" alt="" class="img-fluid logo-img fekdi" style="max-height:30px !important; width:auto;"></a>
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0 ms-auto">
            <ul>
                <li><a class="nav-link scrollto" href="/#timeline">Timeline</a></li>
                <li><a class="nav-link scrollto" href="/#problem-statements">Problem Statements</a></li>
                <li><a class="nav-link scrollto" href="/#prizes">Prizes</a></li>
                <li><a class="nav-link scrollto" href="/#faq">FAQ</a></li>
                <li><a class="nav-link scrollto" href="/#hackathon2024">2024</a></li>
                <li><a class="nav-link scrollto" href="/#podcast">Podcast</a></li>
                <li><a class="nav-link scrollto" href="/#about">About</a></li>

                @auth
                @if (Auth::user()->type == "user")
                    <li><h5 class="d-block d-sm-none pt-4 ps-4 text-white">Submit</h5></li>
                    <li><a class="d-block d-sm-none nav-link" href="/profile">My Profile</a></li>
                    <li><a class="d-block d-sm-none nav-link" href="/submit">Submit Proposal</a></li>
                @elseif (Auth::user()->type == "admin")
                    <li><h5 class="d-block d-sm-none pt-4 ps-4 text-white">Menu</h5></li>
                    <li><a class="d-block d-sm-none nav-link" href="/users">Users</a></li>
                    <li><a class="d-block d-sm-none nav-link" href="/projects">Projects</a></li>
                    <li><a class="d-block d-sm-none nav-link" href="/email_responses">Email Responses</a></li>
                @endif
                    <li>
                        <a class="d-block d-sm-none" href="{{ route('logout') }}" id="logout-btn"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span>{{ __('Logout') }}</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @else
                    <li><a class="nav-link d-block d-sm-none" href="/register">Register</a></li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

        
        @auth
        @if (Auth::user()->type == "user")
            <a href="javascript:void(0);" data-bs-toggle="dropdown">
                <button id="register-btn" class="d-none d-sm-block btn btn-primary btn-header-primary ms-1 ms-lg-4" type="button">Submit</button>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="/profile">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="/submit">
                        <i class="bx bx-upload me-2"></i>
                        <span class="align-middle">Submit Proposal</span>
                    </a>
                </li>
        @elseif (Auth::user()->type == "admin")
            <a href="javascript:void(0);" data-bs-toggle="dropdown">
                <button id="register-btn" class="d-none d-sm-block btn btn-primary btn-header-primary ms-1 ms-lg-4"
                    type="button">Menu</button>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="/users">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Users</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="/projects">
                        <i class="bx bx-upload me-2"></i>
                        <span class="align-middle">Projects</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="/email_responses">
                        <i class="bx bx-envelope me-2"></i>
                        <span class="align-middle">Email Responses</span>
                    </a>
                </li>
        @endif
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" id="logout-btn"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bx bx-power-off me-2 text-danger"></i>
                        <span class="align-middle">{{ __('Logout') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        @else
            <a href="/register">
                <button id="register-btn" class="d-none d-sm-block btn btn-primary btn-header-primary ms-1 ms-lg-4" type="button">Register</button>
            </a>
        @endauth
    </div>
</header><!-- End Header -->