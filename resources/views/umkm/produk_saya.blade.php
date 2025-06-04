@extends('umkm.layouts.main')
@section('container')

<section class="py-5 bg-light">
  <div class="container">

    <!-- Header dan Pencarian -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
      <h2 class="fw-bold mb-0">Produk Saya</h2>

      <div class="d-flex flex-column flex-md-row align-items-md-center gap-2">
        <form class="d-flex" method="GET" action="/produk">
          <input name="search" class="form-control me-2" type="search" placeholder="Cari produk..." value="{{ request('search') }}">
          <button class="btn btn-outline-primary" type="submit">Cari</button>
        </form>

        <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#tambahProdukModal">
          <i class="bi bi-plus-lg"></i>
        </button>
      </div>
    </div>

    <!-- Daftar Produk -->
    <div class="row g-4 post-list">
      @forelse($produk->sortByDesc('id')->take(12) as $p)
        <div class="col-xl-4 col-md-6">
          <div class="card border-0 shadow-sm rounded-2 overflow-hidden position-relative">

            <!-- Tombol Hapus -->
            <form action="{{ route('produksaya.destroy', $p->id) }}" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
              class="position-absolute top-0 end-0 m-2 z-3">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger rounded-circle shadow-sm" title="Hapus Produk">
                <i class="bi bi-trash"></i>
              </button>
            </form>

            <a href="{{ route('produksaya.show', $p->id) }}" class="text-decoration-none">
              <!-- Gambar Produk -->
              <div class="position-relative" style="height: 220px;">
                @if ($p->gambarProduk->isNotEmpty())
                  <img src="{{ asset('storage/' . $p->gambarProduk->first()->path) }}" class="w-100 h-100 object-fit-cover" alt="{{ $p->nama_produk }}">
                @else
                  <img src="{{ asset('assets/img/default.png') }}" class="w-100 h-100 object-fit-cover" alt="{{ $p->nama_produk }}">
                @endif

                <!-- Label sektor usaha -->
                <span class="position-absolute top-0 end-0 m-2 px-3 py-1 bg-secondary text-white rounded small fw-bold">
                  {{ $p->umkm->sektorUsaha->nama }}
                </span>
              </div>

              <!-- Konten Produk -->
              <div class="p-3">
                <h5 class="fw-bold text-dark mb-1">{{ $p->nama }}</h5>
                @if($p->harga)
                  <p class="text-success fw-bold mb-2">Rp{{ number_format($p->harga, 0, ',', '.') }}</p>
                @else
                  <p class="text-muted mb-2">Harga tidak tersedia</p>
                @endif

                <!-- Info UMKM -->
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
            </a>

          </div>
        </div>
      @empty
        <div class="col">
          <p>Produk tidak ditemukan.</p>
        </div>
      @endforelse
    </div>

  </div>
</section>

<!-- Modal Tambah Produk -->
<div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-labelledby="tambahProdukLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('produksaya.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="tambahProdukLabel">Tambah Produk UMKM</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Produk (boleh lebih dari satu)</label>
            <input type="file" name="gambar[]" class="form-control" multiple accept="image/*">
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> -->
          <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
