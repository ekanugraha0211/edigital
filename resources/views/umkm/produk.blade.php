@extends('umkm.layouts.main')
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
      <div class="col-xl-4 col-md-6">
              <a href="{{ route('umkm.produkdetail', $p->id) }}" class="text-decoration-none">
                <article class="post border rounded shadow-sm overflow-hidden bg-white position-relative">
                  <div class="post-img position-relative" style="height: 220px; overflow: hidden;">
                    <img src="{{ asset($p->foto1 ?? '/assets/img/default.png') }}" alt="{{ $p->nama_produk }}" class="img-fluid w-100 h-100 object-fit-cover">
                    <span class="position-absolute top-0 end-0 m-2 px-3 py-1 text-white rounded bg-dark opacity-75">{{ $p->umkm->sektorUsaha->nama }}</span>
                  </div>
                  <div class="p-3">
                    <h2 class="title fs-5 fw-bold text-dark mb-2">
                      {{ $p->nama_produk }}
                    </h2>
                    @if($p->harga)
                      <p class="text-danger fw-bold fs-6">Rp{{ number_format($p->harga, 0, ',', '.') }}</p>
                    @else
                      <p class="text-muted fs-6">Harga tidak tersedia</p>
                    @endif
                    <div class="d-flex align-items-center mt-3">
                      <div class="rounded-circle overflow-hidden" style="width: 50px; height: 50px;">
                        <img src="/{{ $p->umkm->logo ?? 'path/to/default-logo.jpg' }}" alt="{{ $p->umkm->nama }}" class="img-fluid w-100 h-100 object-fit-cover">
                      </div>
                      <div class="ms-3">
                        <p class="mb-1 fw-semibold">{{ $p->umkm->nama }}</p>
                        <p class="text-muted small mb-0"><i class="bi bi-geo-alt"></i> {{ $p->umkm->alamat }}</p>
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