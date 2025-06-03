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

</body>

@include('auth.layouts.footer')

</html>