<!DOCTYPE html>
<html lang="en">

@include('auth.layouts.header')

<body>
  <main id="main" style="min-height: 100vh;">

    <!-- ======= Register Section ======= -->
    <section id="register" class="register">
      	<div class="container">
			@yield('form')
      	</div>
    </section>
    <!-- End Register Section -->

  </main><!-- End #main -->

</body>

@include('auth.layouts.footer')

</html>