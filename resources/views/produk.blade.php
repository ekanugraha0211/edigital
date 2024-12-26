@extends('layouts.main')
@section('container')
  <section id="portfolio" class="portfolio sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>PRODUK UMKM SUMENEP</h2>
        <!-- <p>Quam sed id excepturi ccusantium dolorem ut quis dolores nisi llum nostrum enim velit qui ut et autem uia reprehenderit sunt deleniti</p> -->
      </div>
        <div class="portfolio-flters d-flex flex-row justify-content-center">
          <!-- Input pencarian menggunakan komponen form Bootstrap -->
          <form class="d-flex w-75" method="GET" action="/produk">
            <input id="search-input" name="search" class="form-control me-2" type="search" placeholder="Cari Produk" aria-label="Search" value="{{ request('search') }}">
            <button id="search-button" class="btn btn-success" type="submit">Cari</button>
          </form>
        </div>
      <section id="blog" class="blog">
  <div class="container">
    <div class="row gy-4 posts-list">
      @forelse($produk->sortByDesc('id')->take(12) as $p)
      <div class="col-xl-4 col-md-6 mb-4">
        <a href="{{ route('produkdetail', $p->id) }}" class="text-decoration-none">
        <article class="post border rounded shadow-sm overflow-hidden">
          <div class="post-img" style="height: 200px; overflow: hidden; position: relative;">
            <img src="{{ asset($p->foto1 ?? '/assets/img/default.png') }}" alt="{{ $p->nama_produk }}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
            <span class="post-category" style="position: absolute; top: 10px; right: 10px; background-color: rgba(0,0,0,0.5); color: #fff; padding: 5px 10px; border-radius: 5px; font-size: 0.9rem;">
              {{ $p->umkm->sektorUsaha->nama }}
            </span>
            
          </div>
          <div class="p-3">
            <h2 class="title mb-2" style="font-size: 1.25rem; font-weight: bold;">
              <a href="{{ route('produkdetail', $p->id) }}" class="text-dark text-decoration-none">{{ $p->nama_produk }}</a>
            </h2>
            @if($p->harga)
            <div class="d-flex align-items-center mb-3">
              <p class="mb-0 text-danger" style="font-size: 1.2rem; font-weight: bold;">
                &#x20B9; <!-- Simbol Rupee untuk contoh -->
                {{ number_format($p->harga, 0, ',', '.') }}
              </p>
            </div>
            @else
              <p class="text-muted mb-3" style="font-size: 1rem;">Harga tidak tersedia</p>
            @endif

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
      @empty
      <div class="col">
        <p>Produk tidak ditemukan.</p>
      </div>
      @endforelse
    </div>
  </div>
</section>
<!-- End Portfolio Container -->

      </div>

    </div>
  </section><!-- End Portfolio Section -->
@endsection