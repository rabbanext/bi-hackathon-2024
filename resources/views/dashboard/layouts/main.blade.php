<!DOCTYPE html>
<html lang="en">

@include('auth.layouts.header')

<body>

  <main id="main">

    <!-- ======= Register Section ======= -->
    <section id="register" class="register">
      	<div class="container">
		    <div class="layout-container">
				<!-- Content wrapper -->
				@yield('content')
				<!-- Content wrapper -->
			</div>
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
				<p>Contact Center BI :</p>
				<p>
					<strong>Email:</strong> hackathon2025@bi.go.id<br/>
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
					<a href="https://www.instagram.com/fekdi_indonesia/"><i class="bx bxl-instagram"></i></a>
					<a href="https://www.youtube.com/@BankIndonesiaChannel/"><i class="bx bxl-youtube"></i></a>
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
</footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="/js/main.js"></script>

  <script>
    function enableRegisterButton() {
      if (document.getElementById('register-btn')) {
        document.getElementById('register-btn').removeAttribute('disabled');
      }
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