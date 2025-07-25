<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-TRPK83HY1G"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-TRPK83HY1G');
  </script>

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
  <link
    href="https://fonts.googleapis.com/css?family=Exo:300,300i,400,400i,600,600i,700,700i|family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/vendor/aos/aos.css" rel="stylesheet">
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/css/css.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <!-- Logo -->
      <div class="nav-logo flex-grow-1">
        <a href="#" class="logo me-1 me-lg-3"><img src="/img/logo-bi.png" alt="" class="img-fluid logo-img"></a>
        <a href="#" class="logo me-lg-0"><img src="/img/logo.png" alt="" class="img-fluid logo-img"></a>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0 ms-auto">
        <ul>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#problem-statements">Problem Statements</a></li>
          <li><a class="nav-link scrollto" href="#timeline">Timeline</a></li>
          <li><a class="nav-link scrollto" href="#prizes">Prizes</a></li>
          <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
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
            <button id="register-btn" class="btn btn-primary btn-header-primary ms-4" type="button">Menu</button>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item" href="/users">
                    <i class="bx bx-upload me-2"></i>
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
              <a class="dropdown-item" href="{{ route('logout') }}"
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
  <main id="main">


    <!-- ======= Prizes Section ======= -->
    <section id="prizes" class="prizes d-flex flex-column align-items-center justify-content-center">
      <div class="container" data-aos="zoom-in">
        <div class="" data-aos="fade-left" data-aos-delay="100">
          <div class="section-title text-center mb-3">
            <p>THANK YOU</p>
          </div>
          <div class="section-content text-center" data-aos="fade-left" data-aos-delay="100">
                <h5 class="py-3 mb-0">Thank you for your response!</h5>
          </div>
        </div><!-- End .content-->

      </div>
    </section><!-- End Prizes Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 col-md-6">
          <img src="/img/hero/logo-bi.png" style="max-height:30px !important; width:auto;" class="img-fluid mb-3" alt="">
          <p>
            <strong>Address:</strong>
            Jalan M.H. Thamrin No. 2, <br>
            Jakarta Pusat, DKI Jakarta 10350
          </p>
                  <img src="/img/hero/component/logo-ojk.png" style="max-height:30px !important; width:auto;" class="img-fluid mt-3 mb-3" alt="">
          <p>
            <strong>Address:</strong>
                      Gedung Soemitro Djojohadikusumo, <br> 
                      Jalan Lapangan Banteng Timur 2-4, <br>
            Jakarta Pusat, DKI Jakarta 10710
          </p>
        </div>
        <div class="col-lg-4 col-md-6">
          <h4>Contact</h4>
          <p>Contact Center BI :</p>
          <p>
            <strong>Email:</strong> hackathonfekdi@bi.go.id<br/>
            <strong>Telp:</strong> (131) 1500131<br/>
            <strong>Whatsapp (24 Jam):</strong> +62 81 131 131 131<br/>
            <strong>Line (24 jam):</strong> @bank_indonesia
          </p>
          <p>
            <strong>Call Center OJK:</strong> 157
          </p>
        </div>
        <div class="col-lg-4 col-md-6">
          <h4>Social Media</h4>
          <p>Bank Indonesia</p>
          <div class="social-links">
            <a href="https://www.bi.go.id/"><i class="bx bx-globe"></i></a>
            <a href="https://www.instagram.com/bank_indonesia/"><i class="bx bxl-instagram"></i></a>
            <a href="https://www.instagram.com/fekdi_official/"><i class="bx bxl-instagram"></i></a>
            <a href="https://www.youtube.com/@KanalBankIndonesia/"><i class="bx bxl-youtube"></i></a>
            <a href="https://www.facebook.com/BankIndonesiaOfficial/"><i class="bx bxl-facebook"></i></a>
          </div>
          <p class="pt-4">Otoritas Jasa Keuangan</p>
          <div class="social-links">
            <a href="https://www.ojk.go.id/"><i class="bx bx-globe"></i></a>
            <a href="https://www.instagram.com/ojkindonesia/"><i class="bx bxl-instagram"></i></a>
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

  <div id="preloader">
    <!-- <img src="https://cdn.dribbble.com/users/507150/screenshots/5380757/black_sphere_processing.gif" alt="Loading..." /> -->
    <img
      src="https://cdn.dribbble.com/users/126066/screenshots/6605444/__-organic-artificial-intelligence-design-by-gleb-kuznetsov_-for-milkinside7_1-__.gif"
      alt="Loading..." />
    <h5>Loading</h5>
  </div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <!--<script src="/vendor/popper/popper.min.js"></script>-->
  <script src="/vendor/aos/aos.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="/js/main.js"></script>

  <script>
    /* ---- tooltips config ---- */
    $(document).ready(function(){
      $('[data-bs-toggle="tooltip"]').tooltip();
    });
  </script>
</body>

</html>