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
          <input id="search-input" class="form-control me-2 w-50"  type="search" placeholder="Cari Produk Fashion" aria-label="Search">
          <select id="district-filter" class="form-select me-2 w-auto">
            <option value="">Pilih Kecamatan</option>
            <option value="kecamatan1">Kecamatan 1</option>
            <option value="kecamatan2">Kecamatan 2</option>
            <option value="kecamatan3">Kecamatan 3</option>
            <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
        </select>
        <select id="district-filter" class="form-select me-2 w-auto">
            <option value="">Pilih Desa</option> 
            <option value="Desa1">Desa 1</option>
            <option value="Desa2">Desa 2</option>
            <option value="Desa3">Desa 3</option>
            <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
        </select>
          <button id="search-button" class="btn btn-success" type="button">Cari</button>
        </div>     
      
        
                           

        <div class="row gy-4 portfolio-container">

          <div class="col-xl-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <a href="assets/img/portfolio/kuliner-1.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/kuliner-1.jpg" class="img-fluid" alt=""></a>
              <div class="portfolio-info">
                <h4><a href="/detail" title="More Details">Soto Babat</a></h4>
                <p>Makanan dari bahan tepung dan ikan</p>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-product">
            <div class="portfolio-wrap">
              <a href="assets/img/portfolio/kuliner-2.jpeg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/kuliner-2.jpeg" class="img-fluid" alt=""></a>
              <div class="portfolio-info">
                <h4><a href="/detail" title="More Details">Product 1</a></h4>
                <p>Lorem ipsum, dolor sit amet consectetur</p>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
            <div class="portfolio-wrap">
              <a href="assets/img/portfolio/kuliner-3.webp" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/kuliner-3.webp" class="img-fluid" alt=""></a>
              <div class="portfolio-info">
                <h4><a href="/detail" title="More Details">Branding 1</a></h4>
                <p>Lorem ipsum, dolor sit amet consectetur</p>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-books">
            <div class="portfolio-wrap">
              <a href="assets/img/portfolio/books-1.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/books-1.jpg" class="img-fluid" alt=""></a>
              <div class="portfolio-info">
                <h4><a href="/detail" title="More Details">Books 1</a></h4>
                <p>Lorem ipsum, dolor sit amet consectetur</p>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <a href="assets/img/portfolio/kuliner-2.jpeg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/kuliner-2.jpeg" class="img-fluid" alt=""></a>
              <div class="portfolio-info">
                <h4><a href="/detail" title="More Details">Pentol Tahu</a></h4>
                <p>Lorem ipsum, dolor sit amet consectetur</p>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-product">
            <div class="portfolio-wrap">
              <a href="assets/img/portfolio/product-2.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/product-2.jpg" class="img-fluid" alt=""></a>
              <div class="portfolio-info">
                <h4><a href="portfolio-details.html" title="More Details">Product 2</a></h4>
                <p>Lorem ipsum, dolor sit amet consectetur</p>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
            <div class="portfolio-wrap">
              <a href="assets/img/portfolio/branding-2.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/branding-2.jpg" class="img-fluid" alt=""></a>
              <div class="portfolio-info">
                <h4><a href="portfolio-details.html" title="More Details">Branding 2</a></h4>
                <p>Lorem ipsum, dolor sit amet consectetur</p>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-books">
            <div class="portfolio-wrap">
              <a href="assets/img/portfolio/books-2.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/books-2.jpg" class="img-fluid" alt=""></a>
              <div class="portfolio-info">
                <h4><a href="portfolio-details.html" title="More Details">Books 2</a></h4>
                <p>Lorem ipsum, dolor sit amet consectetur</p>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <a href="assets/img/portfolio/kuliner-3.webp" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/kuliner-3.webp" class="img-fluid" alt=""></a>
              <div class="portfolio-info">
                <h4><a href="portfolio-details.html" title="More Details">Pentol Ghepek</a></h4>
                <p>Lorem ipsum, dolor sit amet consectetur</p>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-product">
            <div class="portfolio-wrap">
              <a href="assets/img/portfolio/product-3.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/product-3.jpg" class="img-fluid" alt=""></a>
              <div class="portfolio-info">
                <h4><a href="portfolio-details.html" title="More Details">Product 3</a></h4>
                <p>Lorem ipsum, dolor sit amet consectetur</p>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
            <div class="portfolio-wrap">
              <a href="assets/img/portfolio/branding-3.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/branding-3.jpg" class="img-fluid" alt=""></a>
              <div class="portfolio-info">
                <h4><a href="portfolio-details.html" title="More Details">Branding 3</a></h4>
                <p>Lorem ipsum, dolor sit amet consectetur</p>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-xl-4 col-md-6 portfolio-item filter-books">
            <div class="portfolio-wrap">
              <a href="assets/img/portfolio/books-3.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/books-3.jpg" class="img-fluid" alt=""></a>
              <div class="portfolio-info">
                <h4><a href="portfolio-details.html" title="More Details">Books 3</a></h4>
                <p>Lorem ipsum, dolor sit amet consectetur</p>
              </div>
            </div>
          </div><!-- End Portfolio Item -->

        </div><!-- End Portfolio Container -->

      </div>

    </div>
  </section><!-- End Portfolio Section -->
@endsection