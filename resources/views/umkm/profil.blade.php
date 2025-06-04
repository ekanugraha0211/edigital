@extends('umkm.layouts.main')

@section('container')
<section id="hero" class="hero bg-white">
  <div class="container bg-white p-4 rounded">
    <div class="row">
      <!-- Kiri: Foto + Nama -->
      <div class="col-md-4 text-center d-flex flex-column align-items-center">
        <img 
          src="{{ Auth::check() && Auth::user()->umkm && Auth::user()->umkm->logo ? asset('storage/' . Auth::user()->umkm->logo) : asset('assets/img/eDisplay3.png') }}" 
          alt="Logo UMKM" 
          class="img-fluid shadow mb-3"
          style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover;">
        <h5 class="fw-semibold text-dark mb-1">{{ $user->nama ?? 'Nama Pemilik' }}</h5>
        <p class="text-muted mb-0">{{ $user->email ?? 'Email Pemilik' }}</p>
      </div>

      <!-- Kanan: Identitas UMKM -->
       
      <!-- Kanan: Identitas UMKM -->
<div class="col-md-8 position-relative">
  <!-- Tombol Edit di luar kotak -->
  <div class="d-flex justify-content-end mb-2">
    <a href="{{ route('umkmprofil.edit', $umkm->id) }}" 
       class="btn btn-sm btn-warning text-white ">
      <i class="bi bi-pen"></i></a>
  </div>

  <!-- Kotak utama berisi Identitas, Surat, Usaha -->
  <div class="bg-light rounded">

    <!-- Header dengan tombol -->
    <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
      <h5 class="fw-bold mb-0">Identitas</h5>
      <div class="d-flex align-items-center">
      <button class="btn btn-sm btn-outline-success" type="button" data-bs-toggle="collapse" data-bs-target="#identitasBody" aria-expanded="true" aria-controls="identitasBody">
        <i class="bi bi-chevron-down"></i>
      </button>
      </div>
      
    </div>
    <!-- Konten yang bisa di-collapse -->
    <div class="collapse hide" id="identitasBody">
  <div class="p-4">
    <p class="mt-3 mb-1 text-muted">Nama UMKM</p>
    <p class="fw-bold text-dark">{{ $umkm->nama_umkm ?? '-' }}</p>

    <p class="mb-1 text-muted">Alamat</p>
    <p class="fw-bold text-dark">{{ $umkm->alamat ?? '-' }}</p>

    <p class="mb-1 text-muted">Desa</p>
    <p class="fw-bold text-dark">{{ $umkm->desa ?? '-' }}</p>

    <p class="mb-1 text-muted">Deskripsi</p>
    <p class="fw-bold text-dark">{{ $umkm->deskripsi ?? '-' }}</p>

  </div>
</div>
    <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
      <h5 class="fw-bold mb-0">Surat</h5>
      <div class="d-flex align-items-center">
      <button class="btn btn-sm btn-outline-success" type="button" data-bs-toggle="collapse" data-bs-target="#suratBody" aria-expanded="true" aria-controls="identitasBody">
        <i class="bi bi-chevron-down"></i>
      </button>
      </div>
      
    </div>
    <!-- Konten yang bisa di-collapse -->
<div class="collapse hide" id="suratBody">
  <div class="p-4">
    <p class="mt-3 mb-1 text-muted">Nomor surat ijin</p>
    <p class="fw-bold text-dark">{{ $umkm->no_surat_ijin ?? '-' }}</p>

    <p class="mb-1 text-muted">NPWP</p>
    <p class="fw-bold text-dark">{{ $umkm->NPWP ?? '-' }}</p>

    <p class="mb-1 text-muted">Kodepos</p>
    <p class="fw-bold text-dark">{{ $umkm->kodepos ?? '-' }}</p>

  </div>
</div>

<div class="d-flex justify-content-between align-items-center p-3 border-bottom">
  <h5 class="fw-bold mb-0">Usaha</h5>
  <div class="d-flex align-items-center">
    <button class="btn btn-sm btn-outline-success" type="button" data-bs-toggle="collapse" data-bs-target="#usahaBody" aria-expanded="true" aria-controls="usahaBody">
      <i class="bi bi-chevron-down"></i>
    </button>
  </div>
</div>

    <!-- Konten yang bisa di-collapse -->
    <!-- Di bagian Usaha -->
<div class="collapse hide" id="usahaBody">
  <div class="p-4">
    <p class="mt-3 mb-1 text-muted">Skala usaha</p>
    <p class="fw-bold text-dark">{{ $umkm->SkalaUsaha->nama ?? '-' }}</p>

    <p class="mb-1 text-muted">Sektor usaha</p>
    <p class="fw-bold text-dark">{{ $umkm->SektorUsaha->nama ?? '-' }}</p>

    <p class="mb-1 text-muted">Bentuk usaha</p>
    <p class="fw-bold text-dark">{{ $umkm->BentukUsaha->nama ?? '-' }}</p>

  </div>
</div>
  </div>
</div>


    </div>
  </div>
</section>
@endsection
