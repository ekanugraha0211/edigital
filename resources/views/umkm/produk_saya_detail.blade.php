@extends('umkm.layouts.main')

@section('container')
<section id="produk-detail" class="py-5 bg-white">
  <div class="container">
    <div class="row">

      <!-- Kolom Gambar -->
      <div class="col-md-6 text-center">
        @if($produk->gambarProduk->isNotEmpty())
          {{-- Gambar utama (gunakan gambar pertama sebagai default) --}}
          <img id="mainImage" 
               src="{{ asset('storage/' . $produk->gambarProduk->first()->path) }}" 
               class="img-fluid mb-3 rounded shadow-sm" 
               style="max-height: 350px; object-fit: cover;" 
               alt="Product Image">
        @else
          {{-- Gambar default jika tidak ada gambar --}}
          <img id="mainImage" 
               src="{{ asset('img/default.png') }}" 
               class="img-fluid mb-3 rounded shadow-sm" 
               style="max-height: 350px; object-fit: cover;" 
               alt="Default Image">
        @endif

        <!-- Thumbnail -->
        <div class="d-flex justify-content-center gap-2">
          @foreach ($produk->gambarProduk as $gambar)
            @php
              $imagePath = $gambar->path ? asset('storage/' . $gambar->path) : asset('img/default.png');
            @endphp
            <img 
              onclick="changeImage('{{ $imagePath }}')" 
              src="{{ $imagePath }}" 
              class="img-thumbnail" 
              style="width: 80px; height: 80px; object-fit: cover;" 
              alt="Thumbnail">
          @endforeach
        </div>

        <script>
          function changeImage(src) {
            document.getElementById('mainImage').src = src;
          }
        </script>
      </div>

      <!-- Kolom Informasi -->
      <div class="col-md-6">
        <h3 class="fw-bold">{{ $produk->nama }}</h3>
        <h4 class="text-success fw-bold">Rp{{ number_format($produk->harga, 0, ',', '.') }}</h4>
        <p class="text-muted">{{ $produk->deskripsi }}</p>
        <!-- Tombol Edit -->
<button class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#editModal">
  <i class="bi bi-pen text-white"></i>
</button>




      </div>
    </div>

    <!-- Informasi UMKM -->
    <div class="row mt-5">
      <div class="col">
        <div class="bg-light rounded d-flex align-items-center p-3 shadow-sm">
          <img src="{{ asset('storage/'.$produk->umkm->logo) }}" 
               class="rounded-circle" 
               style="width: 70px; height: 70px; object-fit: cover;" 
               alt="Logo UMKM">
          <div class="ms-3">
            <h5 class="mb-1 fw-semibold">{{ $produk->umkm->nama }}</h5>
            <p class="mb-0 text-muted">{{ $produk->umkm->alamat }}</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Edit Produk -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('produksaya.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $produk->nama }}" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $produk->deskripsi }}</textarea>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}" required>
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Baru (opsional, bisa lebih dari satu)</label>
            <input type="file" class="form-control" name="gambar[]" multiple>
          </div>
          <p class="text-muted">Gambar lama akan tetap ada jika tidak diganti.</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
  </div>
  <!-- JS Bootstrap (v5) -->

</section>
@endsection
