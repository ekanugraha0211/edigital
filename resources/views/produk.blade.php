@extends('layouts.main')
@section('container')
  <section id="portfolio" class="portfolio sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>PRODUK UMKM SUMENEP</h2>
        <!-- <p>Quam sed id excepturi ccusantium dolorem ut quis dolores nisi llum nostrum enim velit qui ut et autem uia reprehenderit sunt deleniti</p> -->
      </div>

      {{-- <div class="portfolio-isotope d-flex flex-column" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100"> --}}

      <div class="portfolio-flters d-flex flex-row justify-content-center">
        <!-- Input pencarian menggunakan komponen form Bootstrap -->
        <input id="search-input" class="form-control me-2 w-75"  type="search" placeholder="Cari Produk" aria-label="Search">
      </select>
        <button id="search-button" class="btn btn-success" type="button">Cari</button>
      </div>
      
        
                           

        <div class="row gy-4 portfolio-container">
          @foreach ($produk->sortByDesc('id') as $p)
          <div class="col-xl-4 col-md-6 portfolio-item">
            <div class="portfolio-wrap">
              <a href="{{ $p->foto1 }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ $p->foto1 }}" class="img-fluid" alt=""></a>
              <div class="portfolio-info">
                <h4><a href="{{ route('produkdetail', $p->id) }}" title="More Details">{{  $p->nama_produk }}</a></h4>
                <p>{{ $p->tagline }}</p>
              </div>
            </div>
          </div>
          @endforeach<!-- End Portfolio Item -->       

        </div><!-- End Portfolio Container -->

      </div>

    </div>
  </section><!-- End Portfolio Section -->
@endsection