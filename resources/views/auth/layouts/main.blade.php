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
  <meta property="og:description"
    content="Artificial Intelligence & Machine Learning for Digital Economy and Finance in Indonesia" />
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
  <link href="/css/register.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <!-- Logo -->
      <div class="nav-logo">
        <a href="/" class="logo me-1 me-lg-3"><img src="/img/logo-bi.png" alt="" class="img-fluid"></a>
        <a href="/" class="logo me-lg-0"><img src="/img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0 ms-auto">
        <ul>
          <li><a class="nav-link scrollto" href="/#about">About</a></li>
          <li><a class="nav-link scrollto" href="/#problem-statements">Problem Statements</a></li>
          <li><a class="nav-link scrollto" href="/#timeline">Timeline</a></li>
          <li><a class="nav-link scrollto" href="/#prizes">Prizes</a></li>
          <!-- <li><a class="nav-link scrollto" href="/#">Registration</a></li> -->
          <li><a class="nav-link scrollto" href="/#faq">FAQ</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      @auth
        <a href="javascript:void(0);" data-bs-toggle="dropdown">
          <button id="register-btn" class="btn btn-primary btn-header-primary ms-4" type="button">Submit Proposal</button>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          @if (Auth::user()->type == "user")
            <li>
                <a class="dropdown-item" href="/profile">
                    <i class="bx bx-user me-2"></i>
                    <span class="align-middle">My Profile</span>
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="/submit">
                    <i class="bx bx-upload me-2"></i>
                    <span class="align-middle">Submit</span>
                </a>
            </li>
            @elseif (Auth::user()->type == "admin")
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
          <button id="register-btn" class="btn btn-primary btn-header-primary ms-4" type="button" disabled>Register</button>
        </a>
      @endauth

    </div>
  </header><!-- End Header -->

  <main id="main" style="min-height: 100vh;">

    <!-- ======= Register Section ======= -->
    <section id="register" class="register">
      	<div class="container" data-aos="zoom-in">
			@yield('form')
      	</div>
    </section>
    <!-- End Register Section -->

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
        <div id="particles-js" class="d-none"></div>
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
  <script src="/vendor/aos/aos.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

  <!-- Main JS File -->
  <script src="/js/main.js"></script>

  <!-- Add member JS -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
    var maxMembers = 4;
    var currentMembers = 0;
    var addMemberBtn = document.getElementById('add-member-btn');

    function toggleAddMemberButton() {
      if (currentMembers >= maxMembers) {
        addMemberBtn.style.display = 'none';
      } else {
        addMemberBtn.style.display = 'block';
      }
    }

    toggleAddMemberButton();

    addMemberBtn.addEventListener('click', function () {
      if (currentMembers < maxMembers) {
        var teamMembersContainer = document.getElementById('team-members');
        var newMemberDiv = document.createElement('div');
        newMemberDiv.innerHTML = `
          <div class="mb-3 section-content p-2">
            <div class="row">
              <div class="col-12 col-lg-6">
                <div class="form-floating mb-2">
                  <input type="text" class="form-control" id="name" placeholder="Rabbani" required>
                  <label for="name">Name</label>
                </div>
                <div class="form-floating mb-2">
                  <input type="text" class="form-control" id="domicile" placeholder="Jakarta" required>
                  <label for="domicile">Domicile</label>
                </div>
                <div class="form-floating mb-2">
                  <input type="date" class="form-control" id="date-birth" required>
                  <label for="date-birth">Date of Birth</label>
                </div>
                <div class="form-floating mb-2">
                  <input type="url" class="form-control" id="linkedin-member-url" placeholder="Software Engineer" required>
                  <label for="linkedin-member-url">LinkedIn URL</label>
                </div>
              </div>
              <div class="col-12 col-lg-6">
                <div class="form-floating mb-2">
                  <select class="form-select" id="role" aria-label="Select Role" name="member_role[]" required>
                    <option selected>Select Role</option>
                    <option value="leader">Group Leader</option>
                    <option value="member">Member</option>
                  </select>
                  <label for="role">Role</label>
                </div>
                <div class="form-floating mb-2">
                  <input type="email" class="form-control" id="email" placeholder="081264046414" required>
                  <label for="email">Email</label>
                </div>
                <div class="form-floating mb-2">
                  <input type="text" class="form-control" id="job" placeholder="Software Engineer" required>
                  <label for="job">Profession</label>
                </div>
                <div class="form-floating mb-2">
                  <input type="url" class="form-control" id="github-member-url" placeholder="Software Engineer" required>
                  <label for="github-member-url">GitHub URL</label>
                </div>
                </div>
                <div class="form-group">
                  <label for="cv">
                    CV
                  </label>
                  <input type="file" class="form-control" name="cv" id="cv" accept=".pdf" required>
                </div>
            </div>
            <div class="col-md-12 text-center mt-2">
              <button type="button" class="btn btn-danger remove-member-btn">Remove Member</button>
            </div>
          </div>
        `;
        teamMembersContainer.appendChild(newMemberDiv);
        currentMembers++;
        toggleAddMemberButton();
      }
    });

    document.getElementById('team-members').addEventListener('click', function (e) {
      if (e.target.classList.contains('remove-member-btn')) {
        e.target.parentElement.parentElement.remove();
        currentMembers--;
        toggleAddMemberButton();
      }
    });
  });
  </script>

  <!-- Add link JS -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var maxLinks = 9;
      var currentLinks = 0;

      document.getElementById('add-link-btn').addEventListener('click', function () {
        if (currentLinks < maxLinks) {
          var teamLinksContainer = document.getElementById('links');
          var newLinkDiv = document.createElement('div');
          newLinkDiv.innerHTML = `
            <div class="mb-3 section-content p-2">
              <div class="row">
                <div class="col-12 col-lg-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="title" placeholder="The H">
                    <label for="title">Proposal Name</label>
                  </div>
                </div>
                <div class="col-12 col-lg-4">
                  <div class="form-floating">
                    <input type="url" class="form-control" id="github" placeholder="Password">
                    <label for="github">Link (Github/Website/Drive/Other Link)</label>
                  </div>
                </div>
                <div class="col-12 col-lg-4">
                  <div class="form-group mt-1">
                    <input type="file" class="form-control form-control-lg" name="cv" id="cv" accept=".pdf" required>
                  </div>
                </div>
              </div>
              <div class="col-md-12 text-center mt-2">
                <button type="button" class="btn btn-danger remove-link-btn">Remove Item</button>
              </div>
            </div>
          `;
          teamLinksContainer.appendChild(newLinkDiv);
          currentLinks++;
        }
      });

      document.getElementById('links').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-link-btn')) {
          e.target.parentElement.parentElement.remove();
          currentLinks--;
        }
      });
    });
  </script>

  <!-- Upload File JS -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var dropZone = document.querySelector('.drop-zone');
      var fileInput = document.getElementById('file-input');
      var filePreview = document.querySelector('.file-preview');

      dropZone.addEventListener('dragover', function (e) {
        e.preventDefault();
        dropZone.classList.add('drop-zone--over');
      });

      dropZone.addEventListener('dragleave', function () {
        dropZone.classList.remove('drop-zone--over');
      });

      dropZone.addEventListener('drop', function (e) {
        e.preventDefault();
        dropZone.classList.remove('drop-zone--over');

        var files = e.dataTransfer.files;
        handleFiles(files);
      });

      fileInput.addEventListener('change', function () {
        var files = this.files;
        handleFiles(files);
      });

      filePreview.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-file')) {
          e.target.parentElement.remove();
        }
      });

      function handleFiles(files) {
        // Check if more than one file is selected
        if (files.length > 1) {
          alert('Please select only one file.');
          fileInput.value = '';
          return;
        }

        // Clear existing file preview items
        filePreview.innerHTML = '';

        // Handle the selected file
        var file = files[0];

        var fileItem = document.createElement('div');
        fileItem.classList.add('file-preview__item');
        fileItem.innerHTML = `
          <span>Selected Mockup File: ${file.name}</span>
          <span>${formatBytes(file.size)}</span>
          <span class="remove-file">x</span>
        `;
        filePreview.appendChild(fileItem);

        // Update file input value to reflect selected file
        fileInput.files = files;
      }

      function formatBytes(bytes, decimals = 2) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
      }
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