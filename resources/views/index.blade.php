  @extends('layouts.main')

  @section('container')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero" >
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Etalase <span>Digital Sumenep</span></h2>
          <p>Dukung UMKM Sumenep dengan membeli produk-produk unggulan mereka. Temukan berbagai produk kreatif dan inovatif di etalase digital ini.</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started">Jelajahi</a>
            <!-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 d-flex justify-content-center">
          <img src="assets/img/logo.png" class="img-fluid  custom-img-size" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    <div class="icon-boxes position-relative ">
      <div class="container position-relative">
        <div class="row gy-4 mt-5 d-flex justify-content-center">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-graph-up"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Meningkatkan Intensitas Penjualan</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-flower1"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Membangun Branding Produk Yang Baik</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-geo-alt"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Memperluas Jangkauan Pasar</a></h4>
            </div>
          </div><!--End Icon Box -->
        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->
  @endsection