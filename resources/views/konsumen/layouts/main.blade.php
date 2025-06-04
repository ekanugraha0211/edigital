<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Etalase Digital Sumenep</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicon -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Nunito&family=Poppins&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 CSS (lokal) -->
  <link href="{{ asset('') }}assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- DataTables Bootstrap 5 CSS -->
  <link href="https://cdn.datatables.net/2.3.0/css/dataTables.bootstrap5.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<body>
     <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/eDisplayborder.png') }}" class="img fluid" alt="">
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/konsumen" class="nav-link {{ ($title === "beranda") ? 'active' : '' }}" >Beranda</a></li>
          <li><a href="{{ route('produk.index') }}" class="nav-link {{ ($title === 'produk' || $title === 'detail') ? 'active' : '' }}">Produk</a></li>
          <li><a href="{{ route('Umkm.index') }}" class="nav-link {{ ($title === 'umkm' ) ? 'active' : '' }}">UMKM</a></li>
          <li><a href="{{ route('aduan.index') }}"class="nav-link {{ ($title === "aduan") ? 'active' : '' }}">Aduan</a></li>
          <!-- <li><a href="/konsumen/bantuan" class="nav-link {{ ($title === "bantuan") ? 'active' : '' }}">Bantuan</a></li> -->
          <li class="dropdown profile-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src=" {{ asset('assets/img/eDisplay3.png') }}" alt="Profile logo" style="width: 40px; height: 40px; border-radius: 50%;">
            </a>
            <ul class="dropdown-menu dropdown-menu-end p-2 shadow rounded-3" style="min-width: 220px;">
  @if (Auth::check())
    @if (Auth::user())
      <li>
        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('pesanan.index') }}">
          <i class="bi bi-box fs-5"></i>
          <span class="flex-grow-1">Pesanan</span>
        </a>
      </li>
      <li>
        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('riwayat.index') }}">
          <i class="bi bi-clock-history fs-5"></i>
          <span class="flex-grow-1">Riwayat Transaksi</span>
        </a>
      </li>
    @endif

    <li><hr class="dropdown-divider my-2"></li>

    <li>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger">
          <i class="bi bi-box-arrow-right fs-5"></i>
          <span class="flex-grow-1">Logout</span>
        </button>
      </form>
    </li>
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
            <img src="{{ asset('assets/img/eDisplayborder.png') }}" alt="">
          </a>
          <p>Dinas Koperasi Usaha Kecil dan Menengah perindustrian dan Perdagangan Sumenep menghadirkan eDisplay, platform online untuk mempertemukan UMKM dengan konsumen. Temukan produk lokal berkualitas, kaya budaya, dan tradisi Sumenep di eDisplay. Dukung UMKM Sumenep, kunjungi eDisplay sekarang!</p>
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
          
          <p>Dinas Koperasi Usaha Kecil dan Menengah perindustrian dan Perdagangan <br>Jl. KH Mansyur No. 71 Sumenep</p>
          
          <strong>WhatsApp:</strong> +62 877-1237-7783<br>
          <strong>Email:</strong> diskopukmperiendag.sumenep@gmail.com<br>
        </div>

      </div>
    </div>

  </footer><!-- End Footer -->

    <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
   <!-- JS dependencies -->
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> -->
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
   <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap4.js"></script>

    @stack('scripts')

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>