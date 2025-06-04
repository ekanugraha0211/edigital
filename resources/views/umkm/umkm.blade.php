@extends('umkm.layouts.main')

@section('container')
<section id="umkm-list" class="portfolio sections-bg pt-5 mt-5" style="padding-top: 120px;">
  <div class="container" data-aos="fade-up">

    <!-- Header -->
    <div class="section-header">
      <h2>UMKM KAB. SUMENEP</h2>
    </div>

    <!-- Pencarian -->
    <div class="portfolio-flters d-flex flex-row justify-content-center mb-4">
      <form class="d-flex w-75" method="GET" action="{{ route('daftarumkm.index') }}">
        <input id="search-input" name="search" class="form-control me-2" type="search" placeholder="Cari Produk" aria-label="Search" value="{{ request('search') }}">
        <button id="search-button" class="btn btn-success" type="submit">Cari</button>
      </form>
    </div>

    <!-- Konten -->
    <div class="row g-4">
          @forelse($umkm as $k)
          <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            
          <div class="card border-0 shadow-sm h-100 rounded-4 position-relative">
  <div class="card-body">
    <div class="d-flex align-items-center mb-3">
      <img src="{{ asset('storage/' . ($k->logo ?? 'placeholder.png')) }}"
           alt="Logo"
           class="rounded-circle border"
           style="width: 70px; height: 70px; object-fit: cover;">
      <div class="ms-3">
        <h6 class="mb-1">
          <a href="{{ route('daftarumkm.show', $k->id) }}" class="text-decoration-none text-dark fw-semibold stretched-link">
            {{ $k->nama }}
          </a>
        </h6>
        <small class="text-muted d-block">{{ $k->nama_umkm ?? '-' }}</small>
      </div>
    </div>
    <p class="mb-1 small">
      <i class="fas fa-map-marker-alt me-1 text-muted"></i> {{ $k->alamat ?? '-' }}
    </p>
    <div class="d-flex flex-wrap gap-1 mt-2">
      <span class="badge rounded-pill bg-primary text-white">{{ $k->sektorUsaha->nama ?? 'Sektor tidak tersedia' }}</span>
      <span class="badge rounded-pill bg-info text-dark">{{ $k->BentukUsaha->nama ?? 'Bentuk tidak tersedia' }}</span>
    </div>
  </div>
</div>

          </div>
          @empty
          <div class="col-12 text-center">
            <p class="text-muted">Belum ada data UMKM yang tersedia.</p>
          </div>
          @endforelse
        </div>

  </div>
</section>
@endsection
