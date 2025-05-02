<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Etalase Digital Sumenep</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/eDisplay3.png" rel="icon">
  <!-- <link href="assets/img/fashion.png" rel="icon"> -->
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
 

  <!-- Template Main CSS File -->
  <link href="/assets/css/main.css" rel="stylesheet">
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
          <li class="dropdown "><a href="#" class="nav link {{ $title === "kuliner" ? 'active' : '' }}"><span>Kategori</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              @foreach($SektorUsaha as $p)
                  <li>
                      <a href="{{ route('produk.sektor', ['sektor' => urlencode($p->nama)]) }}" class="nav link {{ ($title === ucfirst($p->nama)) ? 'active' : '' }}">{{ ucfirst($p->nama) }}</a>
                  </li>
              @endforeach
          </ul>
          
          
          </li>
          <li><a href="/kontak"class="nav link {{ ($title === "kontak") ? 'active' : '' }}">Kontak</a></li>
          <li><a href="/bantuan" class="nav link {{ ($title === "bantuan") ? 'active' : '' }}">Bantuan</a></li>
          <li class="dropdown profile-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{ Auth::check() && Auth::user()->umkm && Auth::user()->umkm->logo ? asset(Auth::user()->umkm->logo): asset('assets/img/eDisplay3.png') }}" alt="Profile logo" style="width: 40px; height: 40px; border-radius: 50%;">
            </a>
            <ul>
              @if (Auth::check())
              <li><a class="dropdown-item bi bi-person me-1" href="profilumkm">Profil saya</a></li>
              <li>
                <form method="post" action="{{ route('logout') }}" class="dropdown-item p-0 m-0">
                  @csrf
                  <button type="submit" class="btn w-100 text-start d-flex align-items-center">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                  </button>
                </form>
              </li>
              @else
              <li><a class="dropdown-item" href="/login">Login</a></li>
              <li><a class="dropdown-item" href="/register">Register</a></li>
              @endif
            </ul>
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
            <a href="https://www.tiktok.com/@kominfo.sumenep?_t=8kqyabI6xJn&_r=1" class="tiktok"><i class="bi bi-tiktok"></i></a>
            {{-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> --}}
          </div>
        </div>

        <div class="col-lg-3 col-6 footer-links">
          <p>Pengembang</p>
          {{-- <ul>
            <li><a href="https://www.instagram.com/ekanugraha0211/">Eka Prasetya Nugraha <br> (Teknologi Informasi Universitas Jember)</a></li>
            <li><a href="https://www.instagram.com/_nailasdh/">Nailatus Sa'adah Sarmadiyah <br>(Ilmu Komunikasi UPN Veteran Jatim)</a></li>
          </ul> --}}
          <p><a style="color: white;" href="https://ekaprofile.vercel.app/" target="_blank">Eka Prasetya Nugraha <br> (Teknologi Informasi Universitas Jember)</a></p>
          <p><a style="color: white;" href="https://www.instagram.com/_nailasdh/" target="_blank">Nailatus Sa'adah Sarmadiyah <br> (Ilmu Komunikasi UPN Veteran Jatim)</a></p>
          {{-- <p>Nailatus Sa'adah Sarmadiyah <br>(Ilmu Komunikasi UPN Veteran Jatim)</p> --}}
          <p>Pembimbing</p>
          <p>Irwan Sujatmiko <br>(Kepala Bidang IKP Diskominfo Sumenep)</p>
        </div>

        <div class="col-lg-4 col-md-12 footer-contact  ">
          <h4>Kontak Kami</h4>
          
          <p>Dinas Komunikasi dan Informatika <br>Jl. KH Mansyur No. 71 Sumenep</p>
          
          <strong>WhatsApp:</strong> +62 877-1237-7783<br>
          <strong>Email:</strong> kominfo.sumenep@gmail.com<br>

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