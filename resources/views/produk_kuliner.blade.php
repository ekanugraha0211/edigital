@extends('layouts.main')
@section('container')
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Produk Kuliner</h2>
              <p>Selamat datang di halaman produk kuliner! Di sini, Anda akan menemukan beragam produk UMKM lokal dari kategori kuliner di Sumenep. Dari makanan ringan hingga makanan siap saji, setiap produk kami menampilkan keunikan dan kualitas yang berasal dari para pengusaha kecil Sumenep. Selamat menelusuri pilihan kuliner khas Sumenep yang menggugah selera!</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Beranda</a></li>
            <li>Kuliner</li>
          </ol>
        </div>
      </nav>
    </div>
    <div class="portfolio-flters d-flex flex-row justify-content-center">
      <!-- Input pencarian menggunakan komponen form Bootstrap -->
      <input id="search-input" class="form-control me-2 w-75"  type="search" placeholder="Cari Produk" aria-label="Search">
    </select>
      <button id="search-button" class="btn btn-success" type="button">Cari</button>
  </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4 posts-list">
          @foreach($produk as $p)
          @if($p->id_kategori == '1')
          <div class="col-xl-4 col-md-6">
            <article>
              <div class="post-img">
                <img src="{{ $p->foto }}" alt="" class="img-fluid">
              </div>
              <p class="post-category">{{ $p->kategori->nama_kategori }}</p>
              <h2 class="title">
              <a href="/detail">{{ $p->tagline }}</a>
              </h2>
              <div class="d-flex align-items-center">
                <img src="{{ $p->umkm->logo }}" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author-list">{{ $p->umkm->nama_umkm }}</p>
                  <!-- <p class="post-date">
                    <time datetime="2022-01-01">Jan 1, 2022</time>
                  </p> -->
                </div>
              </div>
            </article>
          </div>
          @endif
          @endforeach
          <!-- End post list item -->
        </div><!-- End blog posts list -->
        
        <div class="blog-pagination">
          <ul class="pagination justify-content-center">
              {{-- Previous Page Link --}}
              @if ($produk->onFirstPage())
                  <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
              @else
                  <li class="page-item"><a href="{{ $produk->previousPageUrl() }}" class="page-link" rel="prev">&laquo;</a></li>
              @endif
      
              {{-- Pagination Elements --}}
              @for ($i = 1; $i <= $produk->lastPage(); $i++)
                  @if ($i == $produk->currentPage())
                      <li class="page-item active"><span class="page-link bg-success">{{ $i }}</span></li>
                  @else
                      <li class="page-item"><a href="{{ $produk->url($i) }}" class="page-link">{{ $i }}</a></li>
                  @endif
              @endfor
      
              {{-- Next Page Link --}}
              @if ($produk->hasMorePages())
                  <li class="page-item"><a href="{{ $produk->nextPageUrl() }}" class="page-link" rel="next">&raquo;</a></li>
              @else
                  <li class="page-item disabled"><span class="page-link ">&raquo;</span></li>
              @endif
          </ul>
      </div><!-- End blog pagination -->
      <!-- End blog pagination -->
      <!-- End blog pagination -->
      
        {{-- <div class="blog-pagination">
          <ul class="justify-content-center">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
          </ul>
        </div><!-- End blog pagination -->
      </div> --}}
    </section><!-- End Blog Section -->

  </main>
  @include('layouts.filter')
<!-- End #main -->
@endsection