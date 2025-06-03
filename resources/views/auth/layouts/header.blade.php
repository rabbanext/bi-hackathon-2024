
<?php
// header('Location: https://hackathon.fekdi.co.id/');
?>
<head>
	<!-- Google tag (gtag.js) -->
	<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-EPG8DF2B75"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'G-EPG8DF2B75');
	</script> -->
	<!-- Google tag (gtag.js) -->

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta property="og:locale" content="id_ID" />
	<meta http-equiv="Cache-control" content="public">

	<meta name="theme-color" content="#2A73AC">

	<meta name="author" content="rabbanext" />
	<meta name="description" content="Bank Indonesia Hackathon 2025" />

	<meta property="og:site_name" content="Bank Indonesia Hackathon 2025" />
	<meta property="og:title" content="Bank Indonesia Hackathon 2025" />
	<meta property="og:description" content="Artificial Intelligence & Machine Learning for Digital Economy and Finance in Indonesia" />
	<meta property="og:url" content="https://hackathon.fekdi.co.id" />
	<meta property="og:image" content="/img/hero/hero-hackathon.png" />
	<meta property="og:image:secure_url" content="/img/hero/hero-hackathon.png" />
	<meta property="og:image:type" content="image/png" />
	<meta property="og:image:width" content="660" />
	<meta property="og:image:height" content="176" />
	<meta property="og:image:alt" content="Rabbanext" />
	<title>Bank Indonesia Hackathon 2025</title>

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
            <a href="/" class="me-4"><img src="/img/logo-bi.png" alt="" class="img-fluid logo-img " style="max-height:30px !important; width:auto;"></a>
            <a href="/" class="me-4"><img src="/img/hero/component/logo-ojk.png" alt="" class="img-fluid logo-img fekdi" style="max-height:30px !important; width:auto;"></a>
            <a href="/" class=""><img src="/img/hero/component/logo-fekdi.png" alt="" class="img-fluid logo-img fekdi" style="max-height:30px !important; width:auto;"></a>
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

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

        
        @auth
        @if (Auth::user()->type == "user")
            <a href="javascript:void(0);" data-bs-toggle="dropdown">
                <button id="register-btn" class="btn btn-primary btn-header-primary ms-4" type="button">Submit</button>
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
                <button id="register-btn" class="btn btn-primary btn-header-primary ms-4"
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
                <button id="register-btn" class="btn btn-primary btn-header-primary ms-4" type="button">Register</button>
            </a>
        @endauth
    </div>
</header><!-- End Header -->