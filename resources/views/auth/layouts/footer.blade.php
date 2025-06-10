
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



<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bx bx-chevron-up"></i></a>

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

<script src="/js/main.js"></script>

<script>
	$(document).ready(function () {
		$('[data-bs-toggle="tooltip"]').tooltip();
	});
</script>

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
<script>
	const lightbox = GLightbox({
		selector: 'a[data-glightbox="gallery2024"]'
	});

    const galleryTarikTambang = GLightbox({
        selector: 'a[data-glightbox="TarikTambang"]'
    });
    const galleryFortuneAvenue = GLightbox({
        selector: 'a[data-glightbox="FortuneAvenue"]'
    });
    const galleryAI4Indonesia = GLightbox({
        selector: 'a[data-glightbox="AI4Indonesia"]'
    });
    const galleryArtaJasaTech = GLightbox({
        selector: 'a[data-glightbox="ArtaJasaTech"]'
    });
    const galleryBravoSix = GLightbox({
        selector: 'a[data-glightbox="BravoSix"]'
    });
    const galleryBeaSmart = GLightbox({
        selector: 'a[data-glightbox="BeaSmart"]'
    });
    const galleryBRISIC = GLightbox({
        selector: 'a[data-glightbox="BRISIC"]'
    });
    const galleryFraudRanger = GLightbox({
        selector: 'a[data-glightbox="FraudRanger"]'
    });
    const galleryMicromotion = GLightbox({
        selector: 'a[data-glightbox="Micromotion"]'
    });
    const galleryTuringTeam = GLightbox({
        selector: 'a[data-glightbox="TuringTeam"]'
    });
</script>