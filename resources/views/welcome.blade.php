<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-EPG8DF2B75"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-EPG8DF2B75');
  </script>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta property="og:locale" content="id_ID" />
  <meta http-equiv="Cache-control" content="public">

  <meta name="theme-color" content="#2A73AC">

  <meta name="author" content="rabbanext" />
  <meta name="description" content="Bank Indonesia Hackathon 2024" />

  <meta property="og:site_name" content="Bank Indonesia Hackathon 2024" />
  <meta property="og:title" content="Bank Indonesia Hackathon 2024" />
  <meta property="og:description" content="Artificial Intelligence & Machine Learning for Digital Economy and Finance in Indonesia" />
  <meta property="og:url" content="https://hackathon.fekdi.co.id" />
  <meta property="og:image" content="/img/hero/hero-hackathon.png" />
  <meta property="og:image:secure_url" content="/img/hero/hero-hackathon.png" />
  <meta property="og:image:type" content="image/png" />
  <meta property="og:image:width" content="660" />
  <meta property="og:image:height" content="176" />
  <meta property="og:image:alt" content="Rabbanext" />
  <title>Bank Indonesia Hackathon 2024</title>

  <!-- Favicons -->
  <link href="/img/favicon.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Exo:300,400,600,700|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

  <!-- Template Main CSS File -->
  <link href="/css/style.min.css" rel="stylesheet">

  <style>
    .swiper {
      width: 100%;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 600px;
      height: 300px;
      max-width: 100%;
      max-height: 100%;
      margin-bottom: 120px;
    }

    .swiper-slide iframe {
      display: block;
      width: 100%;
      margin-bottom: 10px;
    }

    .swiper-button-next:after, .swiper-button-prev:after{
      color: #FFF;
    }
    </style>

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
            <button id="register-btn" class="btn btn-primary btn-header-primary ms-4" type="button">Menu</button>
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
          <img src="/img/hero/bi_hackathon.webp" class="img-fluid mb-3" alt="">
          <h5>
            Artificial Intelligence & Machine Learning<br />for Digital Economy and Finance in Indonesia
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
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Announcement Section ======= -->
    <section id="announcement" class="announcement">
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
    </section> 
    <!-- End Announcement Section -->

    <!-- ======= Video Section ======= -->
    <section id="video-section" class="video-section">
      <div class="section-title text-center pb-1">
        <p>Video Hackathon</p>
      </div>
      <div class="pb-2 ms-2">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide text-center">
              <iframe width="100%" height="100%" src="https://www.youtube.com/embed/wZNEcVOppH0"></iframe>
                <h5 class="mb-0">Kick Off & Seminar Bank Indonesia Hackaton 2024</h5>
                <p class="mb-0">Materi Seminar:</p>
                <h5><a class="btn btn-sm btn-info" href="https://drive.google.com/file/d/1fxMK9OSCDuSsnEKC_r_FDCIRCc5dH6XF/view?usp=share_link" target="#">Building an AI Product at The Current Dizzying Speed of Development - William Tjhi</a></h5>
                <h5><a class="btn btn-sm btn-info" href="https://drive.google.com/file/d/1NF7UikrpN-0K6CbC5k2gTpXfwU2BgSqm/view?usp=share_link" target="#">Tren AI Indonesia - Ayu Purwarianti</a></h5>
            </div>
            <div class="swiper-slide text-center">
              <iframe width="100%" height="100%" src="https://drive.google.com/file/d/1uY2Zgf8nz92aZbv8x9mvW9TxOoYH-6H6/preview"></iframe>
                <h5>Tektok Podcast Volume 1</h5>
                <h5>Bank Indonesia Hackathon 2024</h5>
            </div>
            <div class="swiper-slide text-center">
              <iframe width="100%" height="100%" src="https://drive.google.com/file/d/1tKxoQcb9HeOHIVX5K2oqz8jKbqnksAbn/preview"></iframe>
                <h5>Tektok Podcast Volume 2</h5>
                <h5>Bank Indonesia Hackathon 2024</h5>
            </div>
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </section><!-- End Video Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" >
        <div class="row">
          <div class="col-lg-4">
            
          </div>
          <div class="col-lg-8" >
            <div class="content section-content">
              <h3 class="fst-italic">
                Selamat datang para inovator, pengembang, dan pemikir kreatif!
              </h3>
              <p>
                Dengan semangat yang berkobar, <strong>Bank Indonesia</strong> mengundang para Inovator untuk menjadi bagian dari <strong>Bank Indonesia Hackathon 2024</strong>
              </p>
              <p>
                Sebuah ajang pertarungan intelektual yang dirancang untuk menggali potensi terbaik dari setiap individu dalam memecahkan masalah menggunakan teknologi. Lomba ini bukan sekadar kompetisi; ini adalah perjalanan untuk mengeksplorasi batas-batas kemampuan, untuk berkolaborasi dengan pikiran-pikiran hebat lainnya, dan untuk memberikan solusi inovatif yang dapat membuat perubahaan.
              </p>
              <p>
                Tujuan kami adalah menciptakan sebuah ekosistem di mana ide-ide baru bisa tumbuh dan berkembang, di mana kerjasama tim menjadi kunci utama, dan di mana kreativitas serta inovasi dihargai di atas segalanya. Kami percaya bahwa setiap peserta memiliki potensi yang unik dan dapat memberikan kontribusi signifikan melalui pendekatan dan solusi yang inovatif.
              </p>
              <p>
                <strong>Bank Indonesia Hackathon 2024</strong> merupakan kesempatan emas untuk menunjukkan kemampuan dalam pemecahan masalah, pengembangan solusi, dan kerjasama tim. Selain itu, ini adalah kesempatan untuk belajar, bertumbuh, dan membangun jaringan dengan sesama pengembang dan profesional industri dari berbagai latar belakang.
              </p>
              <p>
                Kami mengajak para inovator, pengembang dan pemikir kreatif untuk menantang diri sendiri, untuk melampaui batas-batas yang telah ditetapkan, dan untuk menjadi bagian dari komunitas yang berupaya menciptakan dampak positif melalui teknologi. Mari kita buktikan bahwa melalui kolaborasi dan inovasi, kita bisa memecahkan tantangan terbesar yang dihadapi dunia kita hari ini.
              </p>
              <p>
                Terima kasih telah memilih untuk berbagi perjalanan ini dengan kami. Kami tidak sabar untuk melihat perubahan yang akan diciptakan.
              </p>
              <p>
                <strong>Segera Hadir!</strong>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Problem Statements Section ======= -->
    <section id="problem-statements" class="problem-statements">
      <div class="container" >
        <div class="section-title">
          <h2>Problem Statements</h2>
          <p>Problem Statements</p>
        </div>
        <h4>Tema Utama:</h4>
        <div class="section-content mb-5">
          <h4 class="mb-0">
            Empowering Indonesia's Digital Economy and Finance Landscape: "A Call for Data-driven Solutions through Implementation of AI & ML for the Integration of National Digital Economy and Finance"
          </h4>
        </div>
        <h4>Subtema:</h4>
        <p>
          *Bisa mengambil lebih dari 1 problem statement.
        </p>
        <div class="row">
          <div class="col-12 col-lg-4 px-2 mb-3">
            <div class="section-content">
              <div class="h-100" style="min-height: 260px;">
                <h4>Efficient Decision Making Process and Data Processing</h4>
                <p class="paragraph mb-auto">
                  Dalam sub tema Hackathon ini, peserta perlu mengeksplorasi bagaimana AI/ML dapat memanfaatkan kehandalan dalam menangani data terstruktur maupun tidak terstruktur untuk meningkatkan proses pengambilan keputusan dalam institusi/perusahaan secara lebih cepat dan akurat.
                </p>
              </div>
              <div data-bs-toggle="collapse" href="#ps1" class="collapsed">
                <h5 class="mb-1">
                  Scope of work:
                  <i class="bx bx-chevron-down icon-show"></i>
                  <i class="bx bx-chevron-up icon-close"></i>
                </h5>
              </div>
              <div id="ps1" class="collapse">
                <div class="scope-of-work section-content">
                  <p class="mb-2">1. Bagaimana AI/ML dapat mendukung perumusan kebijakan, pengambilan keputusan dan respons manajemen suatu institusi/perusahaan?</p>
                  <p class="mb-0">Use Case:</p>
                  <span class="badge badge-pill badge-light">Modelling</span>
                  <span class="badge badge-pill badge-light">Forecasting</span>
                  <span class="badge badge-pill badge-light">Nowcasting</span>
                  <span class="badge badge-pill badge-light">Sentiment Analysis</span>
                  <span class="badge badge-pill badge-light">Leader's Opinion</span>
                  <span class="badge badge-pill badge-light">Prediksi pencapaian Key Performance Indicator (KPI)</span>
                  <span class="badge badge-pill badge-light">Prescriptive recommendation</span>
                </li>
                </div>
                <div class="scope-of-work section-content">
                  <p class="mb-2">2. Bagaimana AI/ML dapat mendukung pengelolaan sumber daya manusia?</p>
                  <p class="mb-0">Use Case:</p>
                  <span class="badge badge-pill badge-light">Rekrutmen</span>
                  <span class="badge badge-pill badge-light">Training & development</span>
                  <span class="badge badge-pill badge-light">Manajemen karier</span>
                  <span class="badge badge-pill badge-light">Alokasi SDM</span>
                </li>
                </div>
                <div class="scope-of-work section-content">
                  <p class="mb-2">3. Bagaimana AI/ML dapat meningkatkan efisiensi pengelolaan asset institusi/perusahaan?</p>
                  <p class="mb-0">Use Case:</p>
                  <span class="badge badge-pill badge-light">Pengadaan strategis barang dan jasa</span>
                  <span class="badge badge-pill badge-light">Pengelolaan dan distribusi aset</span>
                  <span class="badge badge-pill badge-light">Optimalisasi alokasi aset</span>
                  <span class="badge badge-pill badge-light">Analisis prediktif kebutuhan dan distribusi aset</span>
                </li>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4 px-2 mb-3">
            <div class="section-content">
              <div class="h-100" style="min-height: 260px;">
                <h4>Expanding Market Acceptance and Innovative Services</h4>
                <p class="paragraph mb-auto">
                  Dalam sub tema Hackathon ini, peserta perlu mengeksplorasi bagaimana AI/ML dapat menjadi pendorong  dalam memperluas penerimaan pasar serta menyajikan layanan-layanan yang inovatif, yang pada gilirannya akan memperkuat posisi perusahaan dalam industri yang dinamis serta meningkatkan inklusi keuangan.
                </p>
              </div>
              <div data-bs-toggle="collapse" href="#ps2" class="collapsed">
                <h5 class="mb-1">
                  Scope of work:
                  <i class="bx bx-chevron-down icon-show"></i>
                  <i class="bx bx-chevron-up icon-close"></i>
                </h5>
              </div>
              <div id="ps2" class="collapse">
                <div class="scope-of-work section-content">
                  <p class="mb-2">1. Bagaimana AI/ML dapat memperluas literasi dan inklusi keuangan?</p>
                  <p class="mb-0">Use case:</p>
                  <span class="badge badge-pill badge-light">Seamless registration</span> 
                  <span class="badge badge-pill badge-light">Perluasan layanan/pembayaran bagi difabel</span>
                  <span class="badge badge-pill badge-light">Pemetaan potensi pasar berbasis geografis dan sectoral</span>
                  <span class="badge badge-pill badge-light">Akses pasar bagi UMKM</span>
                  <span class="badge badge-pill badge-light">Chatbot</span>
                </div>
                <div class="scope-of-work section-content">
                  <p class="mb-2">2. Bagaimana AI/ML dapat mendukung pembentukan produk dan layanan keuangan baru (termasuk pembayaran) yang inovatif?</p>
                  <p class="mb-0">Use case:</p>
                  <span class="badge badge-pill badge-light">Analisis risiko kredit berbasis data non-tradisional (Riwayat transaksi digital, aktivitas media social, dll)</span>
                  <span class="badge badge-pill badge-light">Personalized financial product</span>
                </div>
                <div class="scope-of-work section-content">
                  <p class="mb-2">3. Bagaimana AI/ML dapat mendukung solusi yang memerhatikan aspek Environmental, Social and Governance (ESG)?</p>
                  <p class="mb-0">Use case:</p>
                  <span class="badge badge-pill badge-light">Penerbitan dan pengelolaan instrument green finance</span>
                  <span class="badge badge-pill badge-light">Pengukuran, tracking dan validasi data ESG.</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4 px-2 mb-3">
            <div class="section-content">
              <div class="h-100" style="min-height: 260px;">
                <h4>Risk Management and Customer Protection</h4>
                <p class="paragraph mb-auto"> 
                  Dalam sub tema Hackathon ini, peserta perlu mengeksplorasi bagaimana AI/ML dapat menyediakan manajemen risiko, peringatan dini, rekomendasi, perlindungan pelanggan, dan dispute resolution yang lebih efektif dalam industri keuangan dan sistem pembayaran.
                </p>
              </div>
              <div data-bs-toggle="collapse" href="#ps3" class="collapsed">
                <h5 class="mb-1">
                  Scope of work:
                  <i class="bx bx-chevron-down icon-show"></i>
                  <i class="bx bx-chevron-up icon-close"></i>
                </h5>
              </div>
              <div id="ps3" class="collapse">
                <div class="scope-of-work section-content">
                  <p class="mb-2">1. Bagaimana AI/ML dapat mendukung deteksi anomali transaksi keuangan maupun pembayaran yang mengarah kepada fraud maupun kegiatan ilegal?</p>
                  <p class="mb-0">Use case:</p>
                  <span class="badge badge-pill badge-light">Know Your Customer (KYC) yang akurat namun cepat dan mudah</span>
                  <span class="badge badge-pill badge-light">Collaborative fraud detection system</span>
                  <span class="badge badge-pill badge-light">Penerapan AML/CFT</span>
                </div>
                <div class="scope-of-work section-content">
                  <p class="mb-2">2. Bagaimana AI/ML dapat mendukung pengawasan dan manajemen risiko di area sistem keuangan, dan sistem pembayaran?</p>
                  <p class="mb-0">Use case:</p>
                  <span class="badge badge-pill badge-light">Surveilans</span>
                  <span class="badge badge-pill badge-light">Early warning system risiko stabilitas sistem keuangan</span>
                  <span class="badge badge-pill badge-light">Analisis laporan keuangan institusi keuangan menggunakan NLP dan Key Information Extraction</span>
                </div>
                <div class="scope-of-work section-content">
                  <p class="mb-2">3. Bagaimana AI/ML dapat mendukung penyelesaian perselisihan di industri sistem keuangan dan pembayaran?</p>
                  <p class="mb-0">Use case:</p>
                  <span class="badge badge-pill badge-light">Dispute management system</span>
                  <span class="badge badge-pill badge-light">Chatbot untuk dispute resolution</span>
                  <span class="badge badge-pill badge-light">Analisis perilaku pengguna, optimasi proses klaim dan penyelesaian</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Problem Statements Section -->

    <!-- ======= Timeline Section ======= -->
    <section id="timeline" class="timeline">
      <div class="container">
        <div class="section-title">
          <h2>Timeline</h2>
          <p>Timeline</p>
        </div>
        <div class="timeline-events">
          <div class="timeline-item" date="29 April 2024">
            <div class="section-content">
              <h4>Kick off dan Seminar Hackathon</h4>
              <p>
                Kick-Off dan seminar sebagai acara pembuka rangkaian kegiatan Bank Indonesia Hackathon 2024 yang dilakukan bersama Subject Matter Expert, Akademisi, serta Komunitas AI/ML di Indonesia.
              </p>
            </div>
          </div>

          <div class="timeline-item" date="29 April - 6 Juni 2024">
            <div class="section-content">
              <h4>Registrasi Hackathon</h4>
              <p>
                Pendaftaran tim serta pengunggahan solusi terhadap Problem Statement Bank Indonesia Hackathon 2024 yang dilakukan via website.
              </p>
            </div>
          </div>

          <div class="timeline-item" date="14 Juni 2024">
            <div class="section-content">
              <h4>Pengumuman Finalis</h4>
              <p>
                Pengumuman 10 finalis Bank Indonesia Hackathon 2024. Seluruh finalis wajib menghadiri kegiatan Karantina, Penjurian Akhir serta Showcasing.
              </p>
            </div>
          </div>

          <div class="timeline-item" date="19 Juni - 30 Juli 2024">
            <div class="section-content">
              <h4>Pengembangan Prototype dan Virtual Mentoring</h4>
              <p>
                Penyediaan fasilitas platform dan virtual mentoring kepada 10 finalis dalam rangka pengembangan prototype.
              </p>
            </div>
          </div>

          <div class="timeline-item" date="31 Juli - 4 Agustus 2024">
            <div class="section-content">
              <h4>Karantina dan Penjurian Akhir</h4>
              <p>
                Karantina yang dilakukan selama beberapa hari di Jakarta dalam rangka finalisasi prototype, pitching deck dan penjurian.
              </p>
            </div>
          </div>

          <div class="timeline-item" date="2 Agustus - 3 Agustus 2024">
            <div class="section-content">
              <h4>Showcase Finalis di FEKDI 2024</h4>
              <p>
                Presentasi prototype akan dilakukan pada Mini Stage acara Festival Ekonomi Digital Indonesia (FEKDI) 2024 secara live dan dipamerkan di Booth.
              </p>
            </div>
          </div>

          <div class="timeline-item" date="4 Agustus 2024">
            <div class="section-content">
              <h4>Pengumuman Pemenang Hackathon</h4>
              <p>
                Pengumuman pemenang pada hari ke 4 FEKDI 2024.
              </p>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End Timeline Section -->

    <!-- ======= Prizes Section ======= -->
    <section id="prizes" class="prizes d-flex flex-column align-items-center justify-content-center">
      <div class="container" >
        <div class="">
          <div class="section-title text-center pb-1">
            <p>HADIAH</p>
          </div>
          <div class="row mb-4">
            <div class="col-12 col-md-6 col-lg-3" >
              <div class="prize">
                <img src="/img/prizes/juara1.png" width="300" class="img-prize mb-3" alt="">
                <h3>Rp.200.000.000</h3>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3" >
              <div class="prize">
                <img src="/img/prizes/juara2.png" width="300" class="img-prize mb-3" alt="">
                <h3>Rp.100.000.000</h3>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3" >
              <div class="prize">
                <img src="/img/prizes/juara3.png" width="300" class="img-prize mb-3" alt="">
                <h3>Rp.50.000.000</h3>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3" >
              <div class="prize">
                <img src="/img/prizes/juara4.png" width="300" class="img-prize mb-3" alt="">
                <h3>Rp.15.000.000</h3>
              </div>
            </div>
          </div>
          <div class="prize-content mx-0 mx-lg-5 mb-3">
            <h5 class="fst-italic">Including other attractive prizes for favourite finalist</h5>
          </div>
          <div class="prize-content mx-0 mx-lg-5">
            <h5 class="fst-italic">Kesempatan untuk mendapatkan peluang dalam business matching, innovator scouting, dan in-depth piloting pada inisiatif digital Bank Indonesia</h5>
          </div>
        </div><!-- End .content-->

      </div>
    </section><!-- End Prizes Section -->

    <!-- ======= Media Partners Section ======= -->
    <section id="media-partners" class="media-partners">
      <div class="container" >
        <div class="section-title text-center">
          <p>Media Partners</p>
        </div>
        <div class="section-content">
          <div class="media-partners-wrapper d-flex justify-content-center flex-wrap"><!-- Updated: Removed row and column classes -->
            <div class="media-partner-img-container">
              <img src="/img/media-partners/korika.png" class="img-media-partner mb-3" alt="">
            </div>
            <div class="media-partner-img-container">
              <img src="/img/media-partners/dsi.png" class="img-media-partner mb-3" alt="">
            </div>
            <div class="media-partner-img-container">
              <img src="/img/media-partners/gdsc.png" class="img-media-partner mb-3" alt="">
            </div>
          </div>
        </div><!-- End .content-->
      </div>
    </section><!-- End Media Partners Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" >

        <div class="section-content">
          <div class="section-title">
            <h2>F.A.Q</h2>
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
                    <p>a. Calon peserta merupakan Warga Negara Indonesia.</p>
                    <p>b. Calon peserta dapat membentuk tim dengan jumlah maksimal 4 anggota.</p>
                    <p>c. Calon peserta bukan merupakan pegawai Organik Bank Indonesia.</p>
                    <p>Silakan cek syarat dan ketentuan registrasi pada link berikut <a class="text-info" href="https://drive.google.com/file/d/1z0F7rhKOMln5YM4239JRbqaU1fYJnXRW/view?usp=sharing">Guideline</a> </p>
                    <p>Pastikan format submisi proposal kamu sesuai dengan format berikut <a class="text-info" href="https://drive.google.com/file/d/1i6f29tivKJYggfPOI6WGHLhWhhJsJ5uO/view?usp=sharing">Format Proposal</a> </p>
                  </div>
                </li>

                <li>
                  <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">
                    Apa yang diserahkan pada saat Pendaftaran?
                    <i class="bx bx-chevron-down icon-show"></i>
                    <i class="bx bx-chevron-up icon-close"></i>
                  </div>
                  <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                    <p>1. Tim akan diminta untuk memberikan Ide Inovasi dalam bentuk Mockup, PoC, Prototype atau Pilot yang dapat berupa Dokumen, URL, atau Aplikasi.</p>
                    <p>2. Tim akan diminta untuk memberikan profil tim serta anggota masing-masing.</p>
                  </div>
                </li>

                <li>
                  <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">
                    Apakah acara Hackathon 2024 ini dikenakan biaya?
                    <i class="bx bx-chevron-down icon-show"></i>
                    <i class="bx bx-chevron-up icon-close"></i>
                  </div>
                  <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                    <p>Peserta tidak akan dikenakan biaya dalam bentuk apapun.</p>
                  </div>
                </li>

                <li>
                  <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">
                    Apa yang peserta akan dapatkan selama kegiatan Hacakathon?
                    <i class="bx bx-chevron-down icon-show"></i>
                    <i class="bx bx-chevron-up icon-close"></i>
                  </div>
                  <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                    <p>1. Para Finalis akan mendapatkan fasilitas Akomodasi Transportasi & Penginapan selama masa karantina berlangsung.</p>
                    <p>2. Para Pemenang berkesempatan untuk mendapatkan Hadiah dengan total 500 juta. Selain itu berkesempatan untuk mendapat exposure dalam kegiatan business matching, innovator scouting, dan in-depth piloting dalam insiaitif digital Bank Indonesia.</p>
                  </div>
                </li>

                <li>
                  <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">
                    Apakah peserta dapat memilih 2 atau lebih problem statement untuk dijadikan 1 proposal invoasi gabungan?
                    <i class="bx bx-chevron-down icon-show"></i>
                    <i class="bx bx-chevron-up icon-close"></i>
                  </div>
                  <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                    <p>Peserta dapat memilih lebih dari satu problem statement, namun tetap dihitung sesuai dengan relevansi masalah dan solusi yang dihasilkan.</p>
                  </div>
                </li>
                
                <li>
                  <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">
                    Bagaimana dataset yang digunakan untuk proses submisi proposal?
                    <i class="bx bx-chevron-down icon-show"></i>
                    <i class="bx bx-chevron-up icon-close"></i>
                  </div>
                  <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                    <p>Tidak ada pengaturan penggunaan dataset pada tahap awal (pembuatan proposal), dan peserta dapat memanfaatkan berbagai sumber data sepanjang relevan dengan use case yang diangkat (e.g., open data dan data instansi/Lembaga). Namun, peserta diharapkan agar memperhatikan etika dan ketentuan yang ada dalam penggunaan data, a.l. UU Perlindungan Data Pribadi dan lisensi/perjanjian kerahasiaan pemilik data.</p>
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

                <li>
                  <div data-bs-toggle="collapse" href="#faq8" class="collapsed question">
                    Apakah peserta boleh terdaftar pada lebih dari satu tim?
                    <i class="bx bx-chevron-down icon-show"></i>
                    <i class="bx bx-chevron-up icon-close"></i>
                  </div>
                  <div id="faq8" class="collapse" data-bs-parent=".faq-list">
                    <p>Peserta tidak diperkenankan untuk mendaftar pada lebih dari satu tim.</p>
                  </div>
                </li>

              </ul>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End Frequently Asked Questions Section -->
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
          &copy; Copyright 2024 <strong><span>Bank Indonesia</span></strong>
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
    $(document).ready(function(){
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
</body>

</html>