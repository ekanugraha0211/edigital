@extends('konsumen.layouts.main')

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
    <!-- Modal Pemesanan -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('pesanan.store') }}" method="POST">
      @csrf
      <input type="hidden" name="produk_id" value="{{ $produk->id }}">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Form Pemesanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          @auth
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" value="{{ auth()->user()->nama }}" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Whatsapp</label>
              <input type="text" class="form-control" name="whatsapp">
            </div>
            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <textarea class="form-control" name="alamat" required>{{ auth()->user()->konsumen->alamat ?? '' }}</textarea>
            </div>
          @else
            <!-- Untuk guest, input manual -->
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <textarea class="form-control" name="alamat" required></textarea>
            </div>
          @endauth

          <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" min="1" value="1" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Catatan (opsional)</label>
            <textarea class="form-control" name="catatan"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
      </div>
    </form>
  </div>
</div>

  </div>
  <!-- JS Bootstrap (v5) -->

</section>
@endsection
