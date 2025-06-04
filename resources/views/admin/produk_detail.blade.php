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
<button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#editModal">
  Pesan
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
  </div>
  <!-- JS Bootstrap (v5) -->

</section>
@endsection
