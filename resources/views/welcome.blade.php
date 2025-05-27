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
				<a href="#" class="logo me-1 me-lg-3"><img src="/img/logo-bi.png" alt="" class="img-fluid logo-img"></a>
				<a href="#" class="logo me-lg-0"><img src="/img/logo.png" alt="" class="img-fluid logo-img fekdi"></a>
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
	</header><!-- End Header -->


	<!-- ======= Hero Section ======= -->
	<section>
		<div class="vh-auto">
			<img src="/img/hero/hero-hackathon-2025.jpg" class="w-100 object-fit-cover" alt=""/>
		</div>
	</section>

	<section id="hero" class="d-flex align-items-center justify-content-center">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-lg-6">
					<img src="/img/hero/bi-hackathon-2025.png" class="img-fluid mb-3" alt="">
					<h5>
						Empowering the Future: Innovating Digital Services and Financial Solutions for Inclusive Growth
						and
						Resilient Economy
					</h5>
					<div class="hero-vr d-flex align-items-center justify-content-center">
						<img src="/img/hero/component/bg.webp" width="400" class="img-fluid hero-vr-bg" alt="">
						<img src="/img/hero/hero-vr.webp" width="500" class="img-fluid hero-vr" alt="">
						<img src="/img/hero/component/1.webp" width="70" class="img-fluid hero-component" alt="">
						<img src="/img/hero/component/2.webp" width="70" class="img-fluid hero-component2" alt="">
						<img src="/img/hero/component/3.webp" width="100" class="img-fluid hero-component3" alt="">
						<img src="/img/hero/component/4.webp" width="70" class="img-fluid hero-component4" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Hero -->

	<main id="main">
		<!-- ======= Announcement Section ======= -->
		<!-- <section id="announcement" class="announcement">
			<div class="container" >
				<div class="section-title pb-2 ms-2">
					<h2>Announcements</h2>
					<p>Announcements</p>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="announcement-poster">
							<a href="/img/announcement/2.jpeg" data-glightbox="announcement-gallery" data-title="Hackathon Bank Indonesia 2024">
								<img src="/img/announcement/2.jpeg" class="img-fluid" alt="Hackathon Bank Indonesia 2024">
							</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="announcement-details">
							<h3>Registrasi Hackathon - 29 April s.d 6 Juni 2024</h3>
							<p>Daftarkan dirimu menjadi bagian dari Hackathon Bank Indonesia 2024.</p>
							<a href="/register" class="btn btn-primary">Register Now</a>
						</div>
					</div>
				</div>
			</div>
		</section>  -->
		<!-- End  Announcement Section -->

		<!-- ======= About Section ======= -->
		<section id="about" class="about">
			<div class="container">
				<div class="content section-content">
					<h3 class="fst-italic">
						Selamat datang para inovator, pengembang, dan pemikir kreatif!
					</h3>
					<p>
						Dengan semangat yang berkobar, Bank Indonesia mengundang Anda untuk menjadi bagian dari [Nama Lomba Hackathon]
					</p>

					<p>
						Sebuah ajang pertarungan intelektual yang dirancang untuk menggali potensi terbaik dari setiap individu dalam memecahkan masalah menggunakan teknologi. Lomba ini bukan sekadar kompetisi; ini adalah perjalanan untuk mengeksplorasi batas-batas kemampuan Anda, untuk berkolaborasi dengan pikiran-pikiran hebat lainnya, dan untuk memberikan solusi inovatif yang dapat membuat perbedaan di dunia kita.
					</p>

					<p>
						Tujuan kami adalah menciptakan sebuah ekosistem di mana ide-ide baru bisa tumbuh dan berkembang, di mana kerjasama tim menjadi kunci utama, dan di mana kreativitas serta inovasi dihargai di atas segalanya. Kami percaya bahwa setiap peserta memiliki potensi yang unik dan dapat memberikan kontribusi signifikan melalui pendekatan dan solusi yang inovatif.
					</p>

					<p>
						[Nama Lomba Hackathon] merupakan kesempatan emas untuk menunjukkan kemampuan Anda dalam coding, pemecahan masalah, dan kerjasama tim. Selain itu, ini adalah kesempatan untuk belajar, bertumbuh, dan membangun jaringan dengan sesama pengembang dan profesional industri dari berbagai latar belakang.
					</p>

					<p>
						Kami mengajak Anda untuk menantang diri sendiri, untuk melampaui batas-batas yang telah Anda tetapkan, dan untuk menjadi bagian dari komunitas yang berupaya menciptakan dampak positif melalui teknologi. Mari kita buktikan bahwa melalui kolaborasi dan inovasi, kita bisa memecahkan tantangan terbesar yang dihadapi dunia kita hari ini.
					</p>

					<p>
						Terima kasih telah memilih untuk berbagi perjalanan ini dengan kami. Kami tidak sabar untuk melihat apa yang akan Anda ciptakan.
					</p>
					<p>
						<strong>Selamat berkompetisi!</strong>
					</p>
				</div>
			</div>
		</section>
		<!-- End About Section -->

		<!-- ======= Problem Statements Section ======= -->
		<section id="problem-statements" class="problem-statements">
			<div class="container">
				<div class="section-title">
					<p>Problem Statements</p>
				</div>
				<!-- <h4>Tema Utama:</h4>
				<div class="section-content mb-5">
					<h4 class="mb-0">
						Empowering Indonesia's Digital Economy and Finance Landscape: "A Call for Data-driven Solutions
						through
						Implementation of AI & ML for the Integration of National Digital Economy and Finance"
					</h4>
				</div> -->
				<!-- <h4>Subtema:</h4>
				<p>
					*Bisa mengambil lebih dari 1 problem statement.
				</p> -->
				<div class="row">
					<div class="col-12 col-lg-4 px-2 mb-3">
						<div class="section-content main">
							<div class="h-100" style="min-height: 260px;">
								<h4>AI as a Service (AIaaS) for Digital Delivered Service Export</h4>
								<p class="paragraph mb-auto">
									Solusi berdasarkan AIaaS dapat meningkatkan daya saing global, efisiensi serta mendukung transformasi digital dan pertumbuhan ekonomi melalui ekspor layanan digital
								</p>
								<div class="section-content py-2 px-4 text-center">
									Bagaimana AIaaS dapat memberdayakan pembelajaran, keamanan siber, sistem pembayaran lintas batas, dan chatbot?
								</div>
								<h5>Sub Tema</h5>
								<div class="section-content p-1">Personalized Training</div>
								<div class="section-content p-1">Multi Language Visual Autheriziaod</div>
								<div class="section-content p-1">Cross Border Settlement</div>
							</div>
							<!-- <div data-bs-toggle="collapse" href="#ps1" class="collapsed">
								<h5 class="mb-1">
									Scope of work:
									<i class="bx bx-chevron-down icon-show"></i>
									<i class="bx bx-chevron-up icon-close"></i>
								</h5>
							</div>
							<div id="ps1" class="collapse">
								<div class="scope-of-work section-content">
									<p class="mb-2"></p>
									<p class="mb-0">Use Case:</p>
									<span class="badge badge-pill badge-light">Modelling</span>
									<span class="badge badge-pill badge-light">Forecasting</span>
									<span class="badge badge-pill badge-light">Nowcasting</span>
									<span class="badge badge-pill badge-light">Sentiment Analysis</span>
									<span class="badge badge-pill badge-light">Leader's Opinion</span>
									<span class="badge badge-pill badge-light">Prediksi pencapaian Key Performance
										Indicator (KPI)</span>
									<span class="badge badge-pill badge-light">Prescriptive recommendation</span>
									</li>
								</div>
								<div class="scope-of-work section-content">
									<p class="mb-2">2. Bagaimana AI/ML dapat mendukung pengelolaan sumber daya manusia?
									</p>
									<p class="mb-0">Use Case:</p>
									<span class="badge badge-pill badge-light">Rekrutmen</span>
									<span class="badge badge-pill badge-light">Training & development</span>
									<span class="badge badge-pill badge-light">Manajemen karier</span>
									<span class="badge badge-pill badge-light">Alokasi SDM</span>
									</li>
								</div>
								<div class="scope-of-work section-content">
									<p class="mb-2">3. Bagaimana AI/ML dapat meningkatkan efisiensi pengelolaan asset
										institusi/perusahaan?</p>
									<p class="mb-0">Use Case:</p>
									<span class="badge badge-pill badge-light">Pengadaan strategis barang dan
										jasa</span>
									<span class="badge badge-pill badge-light">Pengelolaan dan distribusi aset</span>
									<span class="badge badge-pill badge-light">Optimalisasi alokasi aset</span>
									<span class="badge badge-pill badge-light">Analisis prediktif kebutuhan dan
										distribusi aset</span>
									</li>
								</div>
							</div> -->
						</div>
					</div>
					<div class="col-12 col-lg-4 px-2 mb-3">
						<div class="section-content main">
							<div class="h-100" style="min-height: 260px;">
								<h4>Financial Innovation & Public Services</h4>
								<p class="paragraph mb-auto">
									Solusi dalam memperluas literasi inkusi keuangan digital termasuk menghasilkan produk/layanan baru yang inovatif serta mendukung layanan publik
								</p>
								<div class="section-content py-2 px-4 text-center">
									Bagaimana AI/LM dapat memperluas literasi, inklusi keuangan digital termasuk menghasilkan produk/layanan baru yang inovatif serta mendukung layanan publik
								</div>
								<h5>Sub Tema</h5>
								<div class="section-content p-1">Financial Literacy Improvement MSME Business and Financial Solution</div>
								<div class="section-content p-1">Public Services Optimization, ex: Bansos</div>
								<div class="section-content p-1">Fraud Detection System</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-4 px-2 mb-3">
						<div class="section-content main">
							<div class="h-100" style="min-height: 260px;">
								<h4>Risk Management & Consumer Protection</h4>
								<p class="paragraph mb-auto">
									Solusi dalam rangka memitigasi risiko fraud transaksi dan kebocoran data pada sektor pemerintah maupun swasta serta aktivitas judi online
								</p>
								<div class="section-content py-2 px-4 text-center">
									Bagaimana AI/ML dapat mendukung deteksi anomali transaksi keuangan/pembayaran yang mengarah kepada fraud maupun kegiatan ilegal
								</div>
								<h5>Sub Tema</h5>
								<div class="section-content p-1">Fraud Protection</div>
								<div class="section-content p-1">AI Compliance</div>
								<div class="section-content p-1">Capidal Outflow Detection</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End  Problem Statements Section -->

		<!-- ======= Timeline Section ======= -->
		<section id="timeline">
			<div class="section-title">
				<p>Timeline</p>
			</div>
			<div class="timeline-container">
				<div class="timeline-item">
					<div class="timeline-date">23 Mei 2025</div>
					<div class="timeline-content">
						Kick off dan Seminar Hackathon
					</div>
				</div>
				<div class="timeline-item">
					<div class="timeline-date">29 Juni 2025</div>
					<div class="timeline-content">
						Last Submission
					</div>
				</div>
				<!-- <div class="timeline-item">
					<div class="timeline-date">4 Juli 2025</div>
					<div class="timeline-content">
						Pengumuman Semi Finalis
					</div>
				</div> -->
				<!-- <div class="timeline-item">
					<div class="timeline-date">11 Juli 2025</div>
					<div class="timeline-content">
						Submission video
					</div>
				</div> -->
				<div class="timeline-item">
					<div class="timeline-date">18 Juli 2025</div>
					<div class="timeline-content">
						Pengumuman Finalis
					</div>
				</div>
				<!-- <div class="timeline-item">
					<div class="timeline-date">21 Juli sd 24 Agustus 2025</div>
					<div class="timeline-content">
						Pengembangan Prototype dan Mentoring
					</div>
				</div> -->
				<div class="timeline-item">
					<div class="timeline-date">1 sd 2 September 2025</div>
					<div class="timeline-content">
						Karantina dan Penjurian Akhir
					</div>
				</div>
				<div class="timeline-item">
					<div class="timeline-date">Week 1 September 2025</div>
					<div class="timeline-content">
						Pengumuman pemenang, Showcase Finalis di FEKDI 2025
					</div>
				</div>
			</div>
		</section>
		<!-- End  Timeline Section -->

		<!-- ======= Prizes Section ======= -->
		<section id="prizes" class="prizes d-flex flex-column align-items-center justify-content-center">
			<div class="container">
				<div class="section-content">
					<div class="section-title text-center pb-5">
						<p>Prizes</p>
					</div>
					<div class="prize-content mx-0 mx-lg-5 mb-3">
						<h5 class="mb-0">
							Business Matching dengan venture capital dan industri
						</h5>
					</div>
					<div class="prize-content mx-0 mx-lg-5">
						<h5 class="mb-0">
							Kesempatan terlibat pengembangan inovasi dalam BI Digital Innovation Center (BI-DIC)s
						</h5>
					</div>
					<div class="section-content mt-3">
						<div class="text-center pt-5 pb-1">
							<h2>Juara Kategori Professional</h2>
						</div>
						<div class="row mb-4">
							<div class="col-12 col-md-6 col-lg-3">
								<div class="prize">
									<img src="/img/prizes/juara1.png" width="300" class="img-prize" alt="">
									<h3>Rp.200.000.000</h3>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="prize">
									<img src="/img/prizes/juara2.png" width="300" class="img-prize" alt="">
									<h3>Rp.100.000.000</h3>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="prize">
									<img src="/img/prizes/juara3.png" width="300" class="img-prize" alt="">
									<h3>Rp.50.000.000</h3>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="prize">
									<img src="/img/prizes/juara4.png" width="300" class="img-prize" alt="">
									<h3>Rp.15.000.000</h3>
								</div>
							</div>
						</div>
					</div>
					<div class="section-content mt-3">
						<div class="text-center pt-5 pb-1">
							<h2>Juara Kategori Mahasiswa</h2>
						</div>
						<div class="row mb-4">
							<div class="col-12 col-md-6 col-lg-3">
								<div class="prize">
									<img src="/img/prizes/juara1.png" width="300" class="img-prize" alt="">
									<h3>Rp.100.000.000</h3>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="prize">
									<img src="/img/prizes/juara2.png" width="300" class="img-prize" alt="">
									<h3>Rp.50.000.000</h3>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="prize">
									<img src="/img/prizes/juara3.png" width="300" class="img-prize" alt="">
									<h3>Rp.20.000.000</h3>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="prize">
									<img src="/img/prizes/juara4.png" width="300" class="img-prize" alt="">
									<h3>Rp.10.000.000</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Prizes Section -->

		<!-- ======= Frequently Asked Questions Section ======= -->
		<section id="faq" class="faq section-bg">
			<div class="container">
				<div class="section-content">
					<div class="section-title">
						<p>Frequently Asked Questions</p>
					</div>
					<div class="row justify-content-center">
						<div class="col-xl-10">
							<ul class="faq-list">
								<li>
									<div data-bs-toggle="collapse" class="question" href="#faq1" aria-expanded="true">
										Apa sajakah syarat & ketentuan pendaftaran?
										<i class="bx bx-chevron-down icon-show"></i>
										<i class="bx bx-chevron-up icon-close"></i>
									</div>
									<div id="faq1" class="collapse show" data-bs-parent=".faq-list">
										<p>WNI, 1 tim maksimal 4 peserta minimal 1 peserta. atas nama perorangan atau perusahaan/universitas/institusi/komunitas</p>
									</div>
								</li>
								<li>
									<div data-bs-toggle="collapse" href="#faq2" class="collapsed question">
										Apa yang diserahkan pada saat Pendaftaran?
										<i class="bx bx-chevron-down icon-show"></i>
										<i class="bx bx-chevron-up icon-close"></i>
									</div>
									<div id="faq2" class="collapse" data-bs-parent=".faq-list">
										<p>Tim dapat menyerahkan Ide dari Inovasi dalam bentuk Mockup, PoC, Prototype atau Pilot</p>
									</div>
								</li>
								<li>
									<div data-bs-toggle="collapse" href="#faq3" class="collapsed question">
										Apakah acara Bank Indonesia Hackathon 2025 ini dikenakan biaya?
										<i class="bx bx-chevron-down icon-show"></i>
										<i class="bx bx-chevron-up icon-close"></i>
									</div>
									<div id="faq3" class="collapse" data-bs-parent=".faq-list">
										<p>Tidak ada biaya pendaftaran atau biaya apapun yang diminta kepada peserta.</p>
									</div>
								</li>
								<li>
									<div data-bs-toggle="collapse" href="#faq4" class="collapsed question">
										Apa yang peserta akan dapatkan selama kegiatan Hacakathon?
										<i class="bx bx-chevron-down icon-show"></i>
										<i class="bx bx-chevron-up icon-close"></i>
									</div>
									<div id="faq4" class="collapse" data-bs-parent=".faq-list">
										<p>Finalis: Akomodasi transportasi & Penginapan selama masa karantina</p>
										<p>
											Pemenang: <br />
											-Hadiah dengan total 600 Juta<br />
											-Eksposur ke business matching, scouting innovator,dan in-depth piloting pada inisiatif digital Bank Indonesia
										</p>
									</div>
								</li>
								<li>
									<div data-bs-toggle="collapse" href="#faq5" class="collapsed question">
										Apakah diperbolehkan memilih lebih dari satu Problem Statement?
										<i class="bx bx-chevron-down icon-show"></i>
										<i class="bx bx-chevron-up icon-close"></i>
									</div>
									<div id="faq5" class="collapse" data-bs-parent=".faq-list">
										<p>Peserta dapat memilih lebih dari satu problem statement, namun tetap dihitung sesuai dengan relevansi masalah dan solusi yang dihasilkan.</p>
									</div>
								</li>
								<li>
									<div data-bs-toggle="collapse" href="#faq7" class="collapsed question">
										Apakah tim dapat beranggotakan peserta yang berasal dari institusi yang berbeda?
										<i class="bx bx-chevron-down icon-show"></i>
										<i class="bx bx-chevron-up icon-close"></i>
									</div>
									<div id="faq7" class="collapse" data-bs-parent=".faq-list">
										<p>Satu tim diperbolehkan terdiri dari anggota yang berasal dari institusi yang berbeda.</p>
									</div>
								</li>
								<!-- <li>
									<div data-bs-toggle="collapse" href="#faq6" class="collapsed question">
										Bagaimana dataset yang digunakan untuk proses submisi proposal?
										<i class="bx bx-chevron-down icon-show"></i>
										<i class="bx bx-chevron-up icon-close"></i>
									</div>
									<div id="faq6" class="collapse" data-bs-parent=".faq-list">
										<p>Tidak ada pengaturan penggunaan dataset pada tahap awal (pembuatan proposal),
											dan peserta dapat
											memanfaatkan berbagai sumber data sepanjang relevan dengan use case yang
											diangkat (e.g., open data
											dan data instansi/Lembaga). Namun, peserta diharapkan agar memperhatikan
											etika dan ketentuan yang
											ada dalam penggunaan data, a.l. UU Perlindungan Data Pribadi dan
											lisensi/perjanjian kerahasiaan
											pemilik data.</p>
									</div>
								</li> -->
								<!-- <li>
									<div data-bs-toggle="collapse" href="#faq8" class="collapsed question">
										Apakah peserta boleh terdaftar pada lebih dari satu tim?
										<i class="bx bx-chevron-down icon-show"></i>
										<i class="bx bx-chevron-up icon-close"></i>
									</div>
									<div id="faq8" class="collapse" data-bs-parent=".faq-list">
										<p>Peserta tidak diperkenankan untuk mendaftar pada lebih dari satu tim.</p>
									</div>
								</li> -->
							</ul>
						</div>
					</div>
				</div>

			</div>
		</section>
		<!-- End  Frequently Asked Questions Section -->

		<!-- ======= Video Section ======= -->
		<section id="podcast" class="podcast">
			<div class="section-title text-center pb-1">
				<p>Podcast</p>
			</div>
			<div class="pb-2 ms-2">
				<div class="swiper mySwiper">
					<div class="swiper-wrapper">
						<div class="swiper-slide d-flex flex-column align-items-center justify-content-center">
							<iframe width="100%" height="100%" src="https://www.youtube.com/embed/wZNEcVOppH0"></iframe>
							<h5>Podcast 1</h5>
						</div>
						<div class="swiper-slide d-flex flex-column align-items-center justify-content-center">
							<iframe width="100%" height="100%" src="https://www.youtube.com/embed/wZNEcVOppH0"></iframe>
							<h5>Podcast 2</h5>
						</div>
						<div class="swiper-slide d-flex flex-column align-items-center justify-content-center">
							<iframe width="100%" height="100%" src="https://www.youtube.com/embed/wZNEcVOppH0"></iframe>
							<h5>Podcast 3</h5>
						</div>
					</div>
					<div class="swiper-pagination"></div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>
		</section>
		<!-- End Video Section -->

		<!-- ======= 2024 Section ======= -->
		<section id="hackathon2024" class="hackathon2024">
			<div class="section-title text-center pb-4">
				<p>2024</p>
			</div>
			<div class="container">
				<div class="row g-3">
					<div class="col-6 col-md-4 col-lg-3">
						<a href="/img/hero/bi-hackathon-2025.png" data-glightbox="gallery2024">
						<img src="/img/hero/bi-hackathon-2025.png" class="img-fluid rounded shadow-sm" alt="Gallery Image 1">
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-3">
						<a href="/img/hero/bi-hackathon-2025.png" data-glightbox="gallery2024">
						<img src="/img/hero/bi-hackathon-2025.png" class="img-fluid rounded shadow-sm" alt="Gallery Image 2">
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-3">
						<a href="/img/hero/bi-hackathon-2025.png" data-glightbox="gallery2024">
						<img src="/img/hero/bi-hackathon-2025.png" class="img-fluid rounded shadow-sm" alt="Gallery Image 3">
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-3">
						<a href="/img/hero/bi-hackathon-2025.png" data-glightbox="gallery2024">
						<img src="/img/hero/bi-hackathon-2025.png" class="img-fluid rounded shadow-sm" alt="Gallery Image 4">
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-3">
						<a href="/img/hero/bi-hackathon-2025.png" data-glightbox="gallery2024">
						<img src="/img/hero/bi-hackathon-2025.png" class="img-fluid rounded shadow-sm" alt="Gallery Image 1">
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-3">
						<a href="/img/hero/bi-hackathon-2025.png" data-glightbox="gallery2024">
						<img src="/img/hero/bi-hackathon-2025.png" class="img-fluid rounded shadow-sm" alt="Gallery Image 2">
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-3">
						<a href="/img/hero/bi-hackathon-2025.png" data-glightbox="gallery2024">
						<img src="/img/hero/bi-hackathon-2025.png" class="img-fluid rounded shadow-sm" alt="Gallery Image 3">
						</a>
					</div>
					<div class="col-6 col-md-4 col-lg-3">
						<a href="/img/hero/bi-hackathon-2025.png" data-glightbox="gallery2024">
						<img src="/img/hero/bi-hackathon-2025.png" class="img-fluid rounded shadow-sm" alt="Gallery Image 4">
						</a>
					</div>
				</div>
			</div>
		</section>
		<!-- End 2024 Section -->
	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
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
						<strong>Email:</strong> hackathonfekdi@bi.go.id
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