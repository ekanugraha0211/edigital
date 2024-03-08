<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Etalase Digital Sumenep</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/eDisplay3.png" rel="icon">
  <!-- <link href="assets/img/fashion.png" rel="icon"> -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
 

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
     <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/eDisplayborder.png" class="img fluid" alt="">
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/" class="nav link {{ ($title === "beranda") ? 'active' : '' }}" >Beranda</a></li>
          <li><a href="/produk" class="nav link {{ ($title === 'produk' || $title === 'detail') ? 'active' : '' }}">Produk Terbaru</a></li>
          <li class="dropdown "><a href="#" class="nav link {{ ($title === "kuliner" || $title === "mode" || $title === "kriya") ? 'active' : '' }}"><span>Kategori</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="/kuliner" class="nav link {{ ($title === "kuliner") ? 'active' : '' }}">Kuliner</a></li>
              <li><a href="/mode" class="nav link {{ ($title === "mode") ? 'active' : '' }}">Mode</a></li>
              <li><a href="/kriya" class="nav link {{ ($title === "kriya") ? 'active' : '' }}">Kriya</a></li>
            </ul>
          </li>
          <li><a href="/kontak"class="nav link {{ ($title === "kontak") ? 'active' : '' }}">Kontak</a></li>
          <li><a href="/bantuan" class="nav link {{ ($title === "bantuan") ? 'active' : '' }}">Bantuan</a></li>
          <li><button type="button" onclick="window.location.href='/login'" class=" login-button btn btn-success btn-lg">Login</button>
          </li>
        </ul>
</div>

      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

@yield('container')

   <!-- ======= Footer ======= -->
   <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <img src="assets/img/eDisplayborder.png" alt="">
          </a>
          <p>Dinas Kominfo Sumenep menghadirkan eDisplay, platform online untuk mempertemukan UMKM dengan konsumen. Temukan produk lokal berkualitas, kaya budaya, dan tradisi Sumenep di eDisplay. Dukung UMKM Sumenep, kunjungi eDisplay sekarang!</p>
          <div class="social-links d-flex mt-4">
            <a href="https://www.youtube.com/channel/UC3brb61Fk7YAyNHdjP0ogTA" class="youtube"><i class="bi bi-youtube"></i></a>
            <a href="https://www.facebook.com/diskominfosumenep/" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href=" https://twitter.com/kominfosumenep" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="https://www.instagram.com/kominfosumenep/" class="instagram"><i class="bi bi-instagram"></i></a>
            {{-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> --}}
          </div>
        </div>

        <div class="col-lg-3 col-6 footer-links">
          <h4>Pengembang</h4>
          <ul>
            <li><a href="https://www.instagram.com/ekanugraha0211/">Eka Prasetya Nugraha <br> (Teknologi Informasi Universitas Jember)</a></li>
            <li><a href="https://www.instagram.com/_nailasdh/">Nailatus Sa'adah Sarmadiyah <br>(Ilmu Komunikasi UPN Veteran Jember)</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-contact  text-md-start">
          <h4>Kontak Kami</h4>
          <p>
            Dinas Komunikasi dan Informatika <br>
            Jl. KH Mansyur No. 71 Sumenep<br><br>
            <strong>WhatsApp:</strong> +62 877-1237-7783<br>
            <strong>Email:</strong> kominfo.sumenep@gmail.com<br>
          </p>

        </div>

      </div>
    </div>

  </footer><!-- End Footer -->

      <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>