@extends('layouts.main')
@section('container')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Produk {{ $title }}</h2>
              <p>Selamat datang di halaman produk {{ strtolower($title) }}! Di sini, Anda akan menemukan beragam produk UMKM lokal dari kategori {{ strtolower($title) }} di Sumenep.
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="/">Beranda</a></li>
            <li>{{ $title }}</li>
          </ol>
        </div>
      </nav>
    </div>

    <div class="portfolio-flters d-flex flex-row justify-content-center">
      <!-- Input pencarian menggunakan komponen form Bootstrap -->
      <form class="d-flex w-75" method="GET" action="{{ route('produk.sektor', ['sektor' => request()->route('sektor')]) }}">
        <input id="search-input" name="search" class="form-control me-2" type="search" placeholder="Cari Produk" aria-label="Search" value="{{ request('search') }}">
        <button id="search-button" class="btn btn-success" type="submit">Cari</button>
      </form>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" >
        {{-- @dd($produk) --}}
        <div class="row gy-4 posts-list">
          @forelse($produk as $p)
          @if($p->umkm->sektorUsaha->nama == $title)
          <div class="col-xl-4 col-md-6">
              <article class="post">
                <div class="post-img" style="height: 200px; overflow: hidden;">
                  <img src="/{{ $p->foto1 }}" alt="Produk" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
              </div>
              
                  <p class="post-category">
                      <i class="bi bi-folder"></i> {{ $p->umkm->sektorUsaha->nama }}
                  </p>
                  <h2 class="title">
                    <a href="{{ route('produkdetail', $p->id) }}">{{ $p->nama_produk }}</a>
                </h2>
                  <div class="d-flex align-items-center">
                      <div class="post-author-img flex-shrink-0 rounded-circle" style="width: 50px; height: 50px;">
                          <img src="/{{ $p->umkm->logo }}" alt="Logo UMKM" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                      </div>
                      <div class="post-meta ms-3">
                          <p class="post-author-list mb-0">
                              <i class="bi bi-person"></i> {{ $p->umkm->nama }}
                          </p>
                          <p class="post-author-list mb-0">
                              <i class="bi bi-geo-alt"></i> {{ $p->umkm->alamat }}
                          </p>
                      </div>
                  </div>
              </article>
          </div>
          @endif
          @empty
          <div class="col">
              <p>Produk tidak ditemukan untuk sektor ini.</p>
          </div>
          @endforelse
      </div>
      
      
      
        
        <!-- End blog posts list -->

        <div style="margin-top: 20px">
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
                  <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
              @endif
          </ul>
        </div>

      </div>
    </section><!-- End Blog Section -->

  </main>
@endsection
