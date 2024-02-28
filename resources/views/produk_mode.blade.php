@extends('layouts.main')
@section('container')
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Produk Fashion</h2>
              <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Beranda</a></li>
            <li>Fashion</li>
          </ol>
        </div>
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
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4 posts-list">

          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="assets/img/batik.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Fashion</p>

              <h2 class="title">
                <a href="/detail">Batik Tulis sumenep</a>
              </h2>
              <div class="d-flex align-items-center">
                <img src="assets/img/fashion.png" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author-list">Batik Sumenep</p>
                  <!-- <p class="post-date">
                    <time datetime="2022-01-01">Jan 1, 2022</time>
                  </p> -->
                </div>
              </div>

            </article>
          </div><!-- End post list item -->
          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="assets/img/batik.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Fashion</p>

              <h2 class="title">
                <a href="/detail">Batik Tulis sumenep</a>
              </h2>
              <div class="d-flex align-items-center">
                <img src="assets/img/fashion.png" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author-list">Batik Sumenep</p>
                  <!-- <p class="post-date">
                    <time datetime="2022-01-01">Jan 1, 2022</time>
                  </p> -->
                </div>
              </div>

            </article>
          </div><!-- End post list item -->
          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="assets/img/batik.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Fashion</p>

              <h2 class="title">
                <a href="/detail">Batik Tulis sumenep</a>
              </h2>
              <div class="d-flex align-items-center">
                <img src="assets/img/fashion.png" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author-list">Batik Sumenep</p>
                  <!-- <p class="post-date">
                    <time datetime="2022-01-01">Jan 1, 2022</time>
                  </p> -->
                </div>
              </div>

            </article>
          </div><!-- End post list item -->
          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="assets/img/batik.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Fashion</p>

              <h2 class="title">
                <a href="/detail">Batik Tulis sumenep</a>
              </h2>
              <div class="d-flex align-items-center">
                <img src="assets/img/fashion.png" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author-list">Batik Sumenep</p>
                  <!-- <p class="post-date">
                    <time datetime="2022-01-01">Jan 1, 2022</time>
                  </p> -->
                </div>
              </div>

            </article>
          </div><!-- End post list item -->
          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="assets/img/batik.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Fashion</p>

              <h2 class="title">
                <a href="/detail">Batik Tulis sumenep</a>
              </h2>
              <div class="d-flex align-items-center">
                <img src="assets/img/fashion.png" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author-list">Batik Sumenep</p>
                  <!-- <p class="post-date">
                    <time datetime="2022-01-01">Jan 1, 2022</time>
                  </p> -->
                </div>
              </div>

            </article>
          </div><!-- End post list item -->
          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="assets/img/batik.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Fashion</p>

              <h2 class="title">
                <a href="/detail">Batik Tulis sumenep</a>
              </h2>
              <div class="d-flex align-items-center">
                <img src="assets/img/fashion.png" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author-list">Batik Sumenep</p>
                  <!-- <p class="post-date">
                    <time datetime="2022-01-01">Jan 1, 2022</time>
                  </p> -->
                </div>
              </div>

            </article>
          </div><!-- End post list item -->

        </div><!-- End blog posts list -->

        <div class="blog-pagination">
          <ul class="justify-content-center">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
          </ul>
        </div><!-- End blog pagination -->

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
@endsection