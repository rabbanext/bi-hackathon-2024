<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-EPG8DF2B75"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'G-EPG8DF2B75');
	</script>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta property="og:locale" content="id_ID" />
	<meta http-equiv="Cache-control" content="public">

	<meta name="theme-color" content="#001341">

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
	<link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="/css/css.css" rel="stylesheet">
</head>

<body>
	<header id="header" class="fixed-top">
		<div class="container d-flex align-items-center justify-content-lg-between">
			<!-- Logo -->
			<div class="nav-logo flex-grow-1">
				<a href="/" class="logo me-1 me-lg-3"><img src="/img/logo-bi.png" alt="" class="img-fluid logo-img"></a>
				<a href="/" class="logo me-lg-0"><img src="/img/logo.png" alt="" class="img-fluid logo-img fekdi"></a>
			</div>

			<nav id="navbar" class="navbar order-last order-lg-0 ms-auto">
				<ul>
					<!-- <li><a class="nav-link scrollto" href="#about">About</a></li> -->
					<li><a class="nav-link scrollto" href="#timeline">Timeline</a></li>
					<li><a class="nav-link scrollto" href="#problem-statements">Problem Statements</a></li>
					<li><a class="nav-link scrollto" href="#prizes">Prizes</a></li>
					<li><a class="nav-link scrollto" href="/register">Registrasi</a></li>
					<li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
					<li><a class="nav-link scrollto" href="#hackathon2024">2024</a></li>
					<li><a class="nav-link scrollto" href="#podcast">Podcast</a></li>
					<li><a class="nav-link scrollto" href="#about">About</a></li>
				</ul>
				<i class="bx bx-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->

			
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
				<!-- <a href="/register">
					<button id="register-btn" class="btn btn-primary btn-header-primary ms-4" type="button">Register</button>
				</a> -->
			@endauth

		</div>
	</header>

	

	<main id="hero-terms">
		<section id="about" class="about">
			<div class="container">
				<div class="content section-content">
					<h3 class="fst-italic">
						Syarat dan Ketentuan Lomba Hackathon Bank Indonesia 2025
					</h3>
					<p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
					</p>
					<p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
					</p>
					<p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
					</p>
				</div>
			</div>
		</section>
		
	</main>

	<footer id="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-md-6">
					<img src="/img/hero/logo-bi.png" width="150" class="img-fluid mb-3" alt="">
					<p>
						<strong>Address:</strong>
						Jalan M.H. Thamrin No. 2, <br>
						Jakarta Pusat, DKI Jakarta 10350
					</p>
				</div>
				<div class="col-lg-4 col-md-6">
					<h4>Contact</h4>
					<p>
						<strong>Phone:</strong> +62 81 131 131 131<br>
						<strong>Email:</strong> hackathon2025@bi.go.id
					</p>
				</div>
				<div class="col-lg-4 col-md-6">
					<h4>Social Media</h4>
					<div class="social-links">
						<a href="https://www.instagram.com/bank_indonesia/"><i class="bx bxl-instagram"></i></a>
						<a href="https://www.instagram.com/fekdi_indonesia/"><i class="bx bxl-instagram"></i></a>
						<a href="https://www.youtube.com/@BankIndonesiaChannel/"><i class="bx bxl-youtube"></i></a>
						<a href="https://www.facebook.com/BankIndonesiaOfficial/"><i class="bx bxl-facebook"></i></a>
						<a href="https://www.tiktok.com/@bank_indonesia/"><i class="bx bxl-tiktok"></i></a>
					</div>
				</div>

			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="copyright">
					&copy; Copyright 2025 <strong><span>Bank Indonesia</span></strong>
				</div>
				<div class="credits">
					All Rights Reserved
				</div>
			</div>
		</div>
	</footer><!-- End Footer -->

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
			class="bx bx-chevron-up"></i></a>

	<!-- Vendor JS Files -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>

	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script>
		var swiper = new Swiper(".mySwiper", {
			effect: "coverflow",
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: "auto",
			coverflowEffect: {
				rotate: 50,
				stretch: 0,
				depth: 100,
				modifier: 1,
				slideShadows: true,
			},
			pagination: {
				el: ".swiper-pagination",
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		});
	</script>

	<!-- Main JS File -->
	<script src="/js/main.js"></script>

	<script>
		/* ---- tooltips config ---- */
		$(document).ready(function () {
			$('[data-bs-toggle="tooltip"]').tooltip();
		});
	</script>

	<script>
		function enableRegisterButton() {
			document.getElementById('register-btn').removeAttribute('disabled');
		}

		const tomorrow = new Date();
		tomorrow.setDate(tomorrow.getDate());
		tomorrow.setHours(10, 0, 0, 0);
		const now = new Date();
		const timeRemaining = tomorrow.getTime() - now.getTime();

		if (timeRemaining > 0) {
			setTimeout(enableRegisterButton, timeRemaining);
		} else {
			enableRegisterButton();
		}
	</script>
	<script src="/vendor/glightbox/js/glightbox.min.js"></script>
<script>
  const lightbox = GLightbox({
    selector: 'a[data-glightbox="gallery2024"]'
  });
</script>

</body>

</html>