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
      <form class="d-flex w-75" method="GET" action="{{ route('umkm.produk.sektor', ['sektor' => request()->route('sektor')]) }}">
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
          <div class="col-xl-4 col-md-6 mb-4">
            <a href="{{ route('umkm.produkdetail', $p->id) }}" class="text-decoration-none">
            <article class="post border rounded shadow-sm overflow-hidden">
              <div class="post-img" style="height: 200px; overflow: hidden; position: relative;">
                <img src="{{ asset($p->foto1 ?? '/assets/img/default.png') }}" alt="{{ $p->nama_produk }}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                <span class="post-category" style="position: absolute; top: 10px; right: 10px; background-color: rgba(0,0,0,0.5); color: #fff; padding: 5px 10px; border-radius: 5px; font-size: 0.9rem;">
                  {{ $p->umkm->sektorUsaha->nama }}
                </span>
                
              </div>
              <div class="p-3">
                <h2 class="title mb-2" style="font-size: 1.25rem; font-weight: bold;">
                  <a href="{{ route('umkm.produkdetail', $p->id) }}" class="text-dark text-decoration-none">{{ $p->nama_produk }}</a>
                </h2>
                <div class="d-flex align-items-center mb-2">
                  <div class="post-author-img flex-shrink-0 rounded-circle" style="width: 60px; height: 60px; overflow: hidden;">
                    <img src="/{{ $p->umkm->logo ?? 'path/to/default-logo.jpg' }}" alt="{{ $p->umkm->nama }}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                  </div>
                  <div class="post-meta ms-3" style="flex-grow: 1;">
                    <p class="post-author-list mb-1" style="font-size: 1rem; font-weight: bold;">
                      <i class="bi bi-person"></i> {{ $p->umkm->nama }}
                    </p>
                    <p class="post-author-list mb-0 text-muted" style="font-size: 0.9rem;">
                      <i class="bi bi-geo-alt"></i> {{ $p->umkm->alamat }}
                    </p>
                  </div>
                </div>
              </div>
            </article>
          </a>
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
