@extends('umkm.layouts.main')

@section('container')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero bg-white">
  <div class="container mt-4">
    <div class="row">
      <!-- Product Image -->
      <div class="col-md-5 text-center">
  <img id="mainImage" src="{{ $produk->foto1 }}" class="img-fluid w-50 h-50" alt="Product Image">
  <div class="d-flex mt-3">
    <img onclick="changeImage('{{ $produk->foto1 }}')" src="{{ $produk->foto1 }}" class="img-thumbnail me-2" width="60" height="60" alt="Thumbnail 1">
    <img onclick="changeImage('{{ $produk->foto2 }}')" src="{{ $produk->foto2 }}" class="img-thumbnail me-2" width="60" height="60" alt="Thumbnail 2">
    <img onclick="changeImage('{{ $produk->foto3 }}')" src="{{ $produk->foto3 }}" class="img-thumbnail" width="60" height="60" alt="Thumbnail 3">
  </div>
</div>

<script>
  function changeImage(imageUrl) {
    document.getElementById("mainImage").src = imageUrl;
  }
</script>


      <!-- Product Details -->
      <div class="col-md-7" style="color:black;">
        <h3><b>{{ $produk->nama_produk }}</b></h3>
        <p class="text-warning">⭐ 4.9 (121.7RB Penilaian) | 10RB+ Terjual</p>
        <h3 class="text-success"><b>Rp37.580</b></h3>

        <!-- <div class="voucher">
          <strong>Voucher Toko:</strong>
          <span>{{$produk->tagline}}</span>
          <span>Rp5RB OFF</span>
          <span>Rp15RB OFF</span>
          <span class="text-muted">Rp20RB OFF</span>
          <span class="text-danger">Tampilkan Semua ⮟</span>
        </div> -->

        <!-- Informasi Produk -->
        <div class="mt-3">
          @foreach([
            'Deskripsi' => $produk->deskripsi,
            'Alamat' => $produk->umkm->alamat,
            'Desa' => $produk->umkm->desa,
            'Kecamatan' => $produk->umkm->kecamatan,
          ] as $label => $value)
          <div class="row mb-2">
            <div class="col-md-2"><b>{{ $label }}</b></div>
            <div class="col-md-10 bg-light rounded p-2">{{ $value }}</div>
          </div>
          @endforeach
        </div>

        <!-- Tombol Aksi -->
        <!-- <div class="mt-3">
          <button class="btn btn-outline-danger me-2">Masukkan Keranjang</button>
          <button class="btn btn-danger">Beli Dengan Voucher Rp37.580</button>
        </div> -->

        <!-- Store Information -->
        <div class="mt-4 p-3 border rounded">
          <div class="d-flex align-items-center">
            <img src="{{$produk->umkm->logo}}" alt="" style="width: 70px; height: 70px; border-radius: 50%;">
            <div class="ms-3">
              <h5>{{$produk->umkm->nama}}</h5>
              <p class="text-muted">{{$produk->umkm->SektorUsaha->nama}}</p>
              <div class="mt-3 d-flex">
                <a href="https://wa.me/{{$produk->umkm->whatsapp}}" target="_blank" class="btn btn-success me-2 d-flex align-items-center">
                  <i class="bi bi-whatsapp "></i>
                </a>
                <a href="#" class="btn btn-primary me-2 d-flex align-items-center">
                  <i class="bi bi-instagram"></i>
                </a>
                <a href="#" class="btn btn-warning d-flex align-items-center">
                  <i class="bi bi-shop-window"></i>
                </a>
              </div>

            </div>
          </div>

          <!-- Store Stats Section -->
          <div class="row mt-2">
            <div class="col-md-6 text-muted">
              <h6>Skala <span class="text-success">{{$produk->umkm->SkalaUsaha->nama}}</span></h6>
              <h6>Bentuk <span class="text-success">{{$produk->umkm->BentukUsaha->nama}}</span></h6>
            </div>
            <div class="col-md-6 text-muted">
              <h6>Website <span class="text-success">{{$produk->umkm->website}}</span></h6>
              <h6>Waktu Chat Dibalas <span class="text-success">Hitungan Jam</span></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Hero Section -->
@endsection
