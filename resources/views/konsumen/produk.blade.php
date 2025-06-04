@extends('konsumen.layouts.main')
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
    <div class="row gy-4 post-list">
  @forelse($produk->sortByDesc('id')->take(12) as $p)
    <div class="col-xl-4 col-md-6">
      <a href="{{ route('produk.show', $p->id) }}" class="text-decoration-none">
        <div class="card border-0 shadow-sm rounded-2 overflow-hidden position-relative">
          
          {{-- Gambar produk --}}
          <div class="position-relative" style="height: 220px;">
            @if ($p->gambarProduk->isNotEmpty())
              <img src="{{ asset('storage/' . $p->gambarProduk->first()->path) }}" class="w-100 h-100 object-fit-cover rounded-2" alt="{{ $p->nama_produk }}">
            @else
              <img src="{{ asset('assets/img/default.png') }}" class="w-100 h-100 object-fit-cover" alt="{{ $p->nama_produk }}">
            @endif

            {{-- Label sektor usaha --}}
            <span class="position-absolute top-0 end-0 m-2 px-3 py-1 bg-success text-white rounded small fw-bold">
              {{ $p->umkm->sektorUsaha->nama }}
            </span>
          </div>

          {{-- Konten Produk --}}
          <div class="p-3">
            <h5 class="fw-bold text-dark mb-1">{{ $p->nama }}</h5>
            @if($p->harga)
              <p class="text-success fw-bold mb-2">Rp{{ number_format($p->harga, 0, ',', '.') }}</p>
            @else
              <p class="text-muted mb-2">Harga tidak tersedia</p>
            @endif

            {{-- Info UMKM --}}
            <div class="d-flex align-items-center mt-3">
              <div class="rounded-circle overflow-hidden" style="width: 40px; height: 40px; background-color: #e0e0e0;">
                <img src="{{ $p->umkm->logo ? asset('storage/'.$p->umkm->logo) : asset('assets/img/default.png') }}" class="w-100 h-100 object-fit-cover" alt="{{ $p->umkm->nama }}">
              </div>
              <div class="ms-3">
                <p class="mb-0 fw-semibold text-dark small">{{ $p->umkm->nama }}</p>
                <p class="mb-0 text-muted small">{{ $p->umkm->alamat }}</p>
              </div>
            </div>
          </div>

        </div>
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