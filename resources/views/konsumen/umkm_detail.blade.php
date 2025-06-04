@extends('konsumen.layouts.main')

@section('container')
<section id="hero" class="hero bg-white">
  <div class="container bg-white p-0 rounded">
    
    <!-- Info UMKM -->
    <div class="row align-items-center mb-4 flex-wrap gy-3">
      <div class="col-12 col-md-3 text-center">
        <img 
          src="{{ $umkm->logo ? asset('storage/' . $umkm->logo) : asset('assets/img/eDisplay3.png') }}" 
          alt="Logo UMKM" 
          class="img-fluid shadow"
          style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover;">
      </div>

      <div class="col-12 col-md-9">
        <h2 class="fw-bold text-dark mb-1">
          {{ $umkm->nama_umkm ?? 'NAMA UMKM' }}
        </h2>
        <p class="text-muted mb-1">
          {{ $umkm->SektorUsaha->nama ?? 'Sektor Usaha' }} &nbsp;•&nbsp;
          {{ $umkm->SkalaUsaha->nama ?? 'Skala Usaha' }} &nbsp;•&nbsp;
          {{ $umkm->BentukUsaha->nama ?? 'Bentuk Usaha' }}
        </p>
        <p class="text-muted fst-italic mb-2">
          {{ $umkm->alamat ?? 'Alamat UMKM' }}, Kode pos {{ $umkm->kode_pos ?? '-' }}<br>
          Kecamatan {{ $umkm->desa ?? '-' }}
        </p>

        <div class="d-flex gap-3 mt-2 flex-wrap">
          @if ($umkm->instagram)
            <a href="https://www.instagram.com/{{ $umkm->instagram }}/" class="text-success" target="_blank">
              <i class="bi bi-instagram fs-4"></i>
            </a>
          @endif
          @if ($umkm->website)
            <a href="https://{{ $umkm->website }}" class="text-success" target="_blank">
              <i class="bi bi-globe fs-4"></i>
            </a>
          @endif
          @if ($umkm->whatsapp)
            <a href="https://wa.me/{{ $umkm->whatsapp }}" class="text-success" target="_blank">
              <i class="bi bi-whatsapp fs-4"></i>
            </a>
          @endif
        </div>
      </div>
    </div>

    <!-- Deskripsi -->
    <div class="row mt-2">
      <div class="col-12">
        <h5 class="fw-bold text-dark">Deskripsi</h5>
        <p class="text-muted text-justify">
          {{ $umkm->deskripsi ?? 'Belum ada deskripsi yang ditambahkan.' }}
        </p>
      </div>
    </div>

    <!-- Produk -->
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mt-4">
  @forelse ($umkm->produk as $p)
    <div class="col">
      <a href="{{ route('produk.show', $p->id) }}" class="text-decoration-none">
        <div class="card shadow-sm h-100">
          <img 
            src="{{ $p->gambarProduk->first()?->path ? asset('storage/' . $p->gambarProduk->first()->path) : asset('assets/img/default-product.png') }}" 
            class="card-img-top" 
            alt="Foto Produk"
            style="height: 160px; object-fit: cover;">
          <div class="card-body p-2">
            <p class="fw-semibold text-dark text-truncate mb-1" title="{{ $p->nama }}">
              {{ $p->nama }}
            </p>
            <p class="text-success fw-bold mb-0">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
          </div>
        </div>
      </a>
    </div>
  @empty
    <div class="col-12 text-center">
      <p class="text-muted">Belum ada produk yang ditampilkan.</p>
    </div>
  @endforelse
</div>



  </div>
</section>
@endsection
