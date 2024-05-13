@extends('layouts.main')

@section('container')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>PRODUK DETAIL</h2>
              <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="/">Beranda</a></li>
            <li>Produk Detail</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

        <div class="position-relative h-100">
          <div class="slides-1 portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
              
              <div class="swiper-slide">
                <img src="{{ $produk->foto1 }}" alt="">
              </div>
              <div class="swiper-slide">
                <img src="{{ $produk->foto2 }}" alt="">
              </div>
              <div class="swiper-slide">
                <img src="{{ $produk->foto3 }}" alt="">
              </div>
              
              

              {{-- <div class="swiper-slide">
                <img src="assets/img/bakdabak-2.jpg" alt="">
              </div>

              <div class="swiper-slide">
                <img src="assets/img/bakdabak-3.jpg" alt="">
              </div> --}}
            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

        </div>

        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8">
            
            <div class="portfolio-description">
              <div class="formatted-text">
                <h2>{{ $produk->tagline }}</h2>
                <p>{{ $produk->deskripsi }}</p>
            </div>

            </div>
            
          </div>

          <div class="col-lg-3">
            <div class="portfolio-info">
              <h3>Informasi UMKM</h3>
              <ul>
                <li><strong>Kategori</strong> <span>{{ $produk->umkm ? $produk->umkm->SektorUsaha->nama : '-' }}
                </span></li>
                <li><strong>Nama UMKM</strong> <span>{{ $produk->umkm ? $produk->umkm->nama : '-' }}</span></li>
                <li><strong>Alamat</strong> <span>{{ $produk->umkm ? $produk->umkm->alamat : '-'  }}</span></li>
                <!-- <li><strong>Project URL</strong> <a href="#">www.example.com</a></li> -->
                <li><a href="https://wa.me/{{ $produk->umkm ? $produk->umkm->whatsapp : '-' }}" class="btn-visit align-self-start">Hubungi</a></li>
                <!-- <li>
                  <a href="#" class="btn-visit align-self-start">
                      <img src="/assets/img/shopee.png" style="width: 20px;" alt="Shopee">
                  </a>
                  <a href="#" class="btn-visit align-self-start">
                      <img src="/assets/img/whatsapp.png" alt="Tokopedia">
                  </a>
                  <a href="#" class="btn-visit align-self-start">
                      <img src="/assets/img/instagram.png" alt="Instagram">
                  </a>
              </li> -->
              </ul>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
@endsection

