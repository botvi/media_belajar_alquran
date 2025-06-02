<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pojok Islam - Belajar Islam dengan Menyenangkan</title>
  <meta content="Website pembelajaran Islam untuk anak-anak" name="description">
  <meta content="islam, anak-anak, pembelajaran, pendidikan islam" name="keywords">

  <!-- Favicons -->
  <link href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTEON_Ztq3iFWbbw7Tza5b_sr5C9y7LC6yoMw-1gmFaZ1IoUIUzlsakfgcgsOwE11O3uk&usqp=CAU" rel="icon">
  <link href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTEON_Ztq3iFWbbw7Tza5b_sr5C9y7LC6yoMw-1gmFaZ1IoUIUzlsakfgcgsOwE11O3uk&usqp=CAU" rel="apple-touch-icon">
  @yield('style')

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300;400;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('web') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('web') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('web') }}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('web') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('web') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('web') }}/assets/css/main.css" rel="stylesheet">

  <style>
    :root {
      --primary-color: #FF6B6B;
      --secondary-color: #4ECDC4;
      --accent-color: #FFE66D;
      --text-color: #2C3E50;
    }

    body {
      font-family: 'Quicksand', sans-serif;
      background-color: #F7F9FC;
    }

    h1, h2, h3, h4, h5, h6 {
      font-family: 'Comic Neue', cursive;
      color: var(--primary-color);
    }

    .navbar {
      background-color: var(--primary-color) !important;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      border-radius: 25px;
      padding: 10px 25px;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(255,107,107,0.4);
    }

    .card {
      border-radius: 20px;
      border: none;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .footer {
      background-color: var(--secondary-color) !important;
      color: white;
    }

    .social-links a {
      background-color: var(--accent-color);
      color: var(--text-color);
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 10px;
      transition: all 0.3s ease;
    }

    .social-links a:hover {
      transform: scale(1.1);
      background-color: var(--primary-color);
      color: white;
    }

    #scroll-top {
      background-color: var(--primary-color);
      border-radius: 50%;
      width: 45px;
      height: 45px;
    }

    .preloader {
      background-color: var(--primary-color);
    }
  </style>

  <!-- =======================================================
  * Template Name: MyResume
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  @include('template-web.navbar')

  <main class="main">

   @yield('content')



  </main>

  <footer id="footer" class="footer position-relative light-background">
    <div class="container">
      <h3 class="sitename">Pojok Islam</h3>
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-skype"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
      <div class="container">
        <div class="copyright">
          <span>Copyright</span> <strong class="px-1 sitename">Pojok Islam</strong> <span>All Rights Reserved</span>
        </div>
   
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>
  @include('sweetalert::alert')

  @yield('script')
  <!-- Vendor JS Files -->
  <script src="{{ asset('web') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/aos/aos.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/typed.js/typed.umd.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('web') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="{{ asset('web') }}/assets/js/main.js"></script>

</body>

</html>