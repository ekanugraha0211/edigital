@extends('umkm.layouts.main')

@section('container')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-12">

      {{-- Judul Halaman --}}
      <div class="mb-5 text-center">
        <h2 class="fw-bold text-dark">📝 Edit Profil UMKM</h2>
        <p class="text-muted">Silakan perbarui data akun dan informasi bisnis UMKM Anda di bawah ini.</p>
      </div>

      {{-- Form Update UMKM --}}
      <form action="{{ route('umkmprofil.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
        @method('PUT')

        {{-- Informasi Akun --}}
        <div class="row d-flex justify-content-center">
        <div class="card border-0 shadow mb-4 col-lg-4 m-3">
          <div class="card-header bg-light border-bottom fw-semibold">
            <i class="bi bi-person-circle me-2 text-primary"></i>Informasi Akun
          </div>
          <div class="card-body row g-3">
            <div class="col-12">
              <label class="form-label">Nama Pengguna</label>
              <input type="text" class="form-control" name="nama" value="{{ old('nama', $user->nama) }}" required>
            </div>
            <div class="col-12">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="col-12">
              <label class="form-label" for="password">Password Baru</label>
              <input  type="password" id="password" name="password" class="form-control">
              <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            </div>
          </div>
        </div>

        {{-- Identitas UMKM --}}
        <div class="card border-0 shadow mb-4 col-lg-4 m-3">
          <div class="card-header bg-light border-bottom fw-semibold">
            <i class="bi bi-building me-2 text-primary"></i>Identitas UMKM
          </div>
          <div class="card-body row g-3">
            <div class="col-12">
              <label class="form-label">Nama UMKM</label>
              <input type="text" class="form-control" name="nama_umkm" value="{{ old('nama_umkm', $user->umkm->nama_umkm) }}" required>
            </div>
            <div class="col-12">
              <label class="form-label">Desa</label>
              <input type="text" class="form-control" name="desa" value="{{ old('desa', $user->umkm->desa) }}">
            </div>
            <div class="col-12">
              <label class="form-label">Alamat Lengkap</label>
              <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $user->umkm->alamat) }}">
            </div>
            <div class="col-12">
              <label class="form-label">Deskripsi UMKM</label>
              <textarea class="form-control" name="deskripsi" rows="4">{{ old('deskripsi', $user->umkm->deskripsi) }}</textarea>
            </div>
          </div>
        </div>

        {{-- Informasi Tambahan --}}
        <div class="card border-0 shadow mb-4 col-lg-4 m-3">
          <div class="card-header bg-light border-bottom fw-semibold">
            <i class="bi bi-info-circle me-2 text-primary"></i>Informasi Tambahan
          </div>
          <div class="card-body row g-3">
            <div class="col-12">
              <label class="form-label">Akses Perbankan</label>
              <input type="text" class="form-control" name="akses_perbankan" value="{{ old('akses_perbankan', $user->umkm->akses_perbankan) }}">
            </div>
            <div class="col-12">
              <label class="form-label">Faksimili</label>
              <input type="text" class="form-control" name="faksimili" value="{{ old('faksimili', $user->umkm->faksimili) }}">
            </div>
            <div class="col-12">
              <label class="form-label">Karyawan Pria</label>
              <input type="number" class="form-control" name="jumlah_karyawan_pria" value="{{ old('jumlah_karyawan_pria', $user->umkm->jumlah_karyawan_pria) }}">
            </div>
            <div class="col-12">
              <label class="form-label">Karyawan Wanita</label>
              <input type="number" class="form-control" name="jumlah_karyawan_wanita" value="{{ old('jumlah_karyawan_wanita', $user->umkm->jumlah_karyawan_wanita) }}">
            </div>
          </div>
        </div>
        </div>

        {{-- Dokumen Legal --}}
        <div class="row d-flex justify-content-center">
        <div class="card border-0 shadow mb-4 col-6 m-3">
          <div class="card-header bg-light border-bottom fw-semibold">
            <i class="bi bi-file-earmark-text me-2 text-primary"></i>Dokumen Legal
          </div>
          <div class="card-body row g-3">
            <div class="col-12">
              <label class="form-label">No Surat Izin</label>
              <input type="text" class="form-control" name="no_surat_ijin" value="{{ old('no_surat_ijin', $user->umkm->no_surat_ijin) }}">
            </div>
            <div class="col-12">
              <label class="form-label">NPWP</label>
              <input type="text" class="form-control" name="NPWP" value="{{ old('NPWP', $user->umkm->NPWP) }}">
            </div>
            <div class="col-12">
              <label class="form-label">Kode Pos</label>
              <input type="text" class="form-control" name="kodepos" value="{{ old('kodepos', $user->umkm->kodepos) }}">
            </div>
          </div>
        </div>
        

        {{-- Informasi Usaha --}}
        
        <div class="card border-0 shadow mb-4 col-6 m-3">
          <div class="card-header bg-light border-bottom fw-semibold">
            <i class="bi bi-briefcase me-2 text-primary"></i>Informasi Usaha
          </div>
          <div class="card-body row g-3">
            <div class="col-12">
              <label class="form-label">Skala Usaha</label>
              <select class="form-select" name="skala_usaha_id">
                @foreach($skala as $item)
                  <option value="{{ $item->id }}" {{ $item->id == $user->umkm->skala_usaha_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Sektor Usaha</label>
              <select class="form-select" name="sektor_usaha_id">
                @foreach($sektor as $item)
                  <option value="{{ $item->id }}" {{ $item->id == $user->umkm->sektor_usaha_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Bentuk Usaha</label>
              <select class="form-select" name="bentuk_usaha_id">
                @foreach($bentuk as $item)
                  <option value="{{ $item->id }}" {{ $item->id == $user->umkm->bentuk_usaha_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-6">
              <label class="form-label">Website</label>
              <input type="url" class="form-control" name="website" value="{{ old('website', $user->umkm->website) }}">
            </div>
            <div class="col-6">
              <label class="form-label">Logo UMKM</label>
              <input type="file" class="form-control" name="logo">
              @if ($user->umkm->logo)
              <div class="mt-2">  
                <small class="text-muted">Logo saat ini:</small><br>
                <img src="{{ asset('storage/' . $user->umkm->logo) }}?v={{ time() }}" alt="Logo UMKM" height="50">

                <!-- <img src="{{ asset('storage/' . $user->umkm->logo) }}" alt="Logo UMKM" height="50"> -->
              </div>
              @endif
            </div>
          </div>
        </div>
        </div>

        {{-- Tombol Aksi --}}
        <div class="d-flex justify-content-end mt-4">
          <a href="{{ route('umkmprofil.index') }}" class="btn btn-outline-secondary me-2">Batal</a>
          <button type="submit" class="btn btn-success"><i class="bi bi-save"></i></button>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
