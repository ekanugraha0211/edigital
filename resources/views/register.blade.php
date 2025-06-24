<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registrasi Pengguna</title>

  <!-- Link Bootstrap CSS untuk gaya antarmuka -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- CSS internal untuk tampilan halaman -->
  <style>
    body {
      background: url('assets/img/masjid.jpg') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .register-card {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 2rem;
      margin: 2rem;
      border-radius: 10px;
      width: 100%;
      max-width: 900px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    .form-title {
      margin-bottom: 1.5rem;
    }

    .logo {
      width: 100px;
      margin: 0 auto 1rem;
      display: block;
    }

    .tab-content {
      margin-top: 1rem;
    }
  </style>
</head>
<body>

<div class="register-card">
  <!-- Logo aplikasi -->
  <img src="{{ asset('assets/img/eDisplay3.png') }}" class="logo" alt="Logo">

  <!-- Menampilkan notifikasi sukses -->
  @if (session('success'))
    <div class="alert alert-success text-center">
      {{ session('success') }}
    </div>
  @endif

  <!-- Menampilkan notifikasi error -->
  @if (session('error'))
    <div class="alert alert-danger text-center">
      {{ session('error') }}
    </div>
  @endif

  <!-- Tab navigasi antara UMKM dan Konsumen -->
  <ul class="nav nav-tabs justify-content-center" id="registerTabs" role="tablist">
    <li class="nav-item">
      <!-- Tab UMKM akan aktif jika session form_type bernilai 'umkm' -->
      <button class="nav-link {{ session('form_type', 'umkm') === 'umkm' ? 'active' : '' }}" id="umkm-tab" data-bs-toggle="tab" data-bs-target="#umkm" type="button" role="tab">UMKM</button>
    </li>
    <li class="nav-item">
      <!-- Tab Konsumen akan aktif jika session form_type bernilai 'konsumen' -->
      <button class="nav-link {{ session('form_type') === 'konsumen' ? 'active' : '' }}" id="konsumen-tab" data-bs-toggle="tab" data-bs-target="#konsumen" type="button" role="tab">Konsumen</button>
    </li>
  </ul>

  <!-- Konten form sesuai tab yang aktif -->
  <div class="tab-content mt-3">

    <!-- Formulir Registrasi UMKM -->
    <div class="tab-pane fade {{ session('form_type', 'umkm') === 'umkm' ? 'show active' : '' }}" id="umkm" role="tabpanel">
      <form action="/register/umkm-input" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Menampilkan validasi error jika ada -->
        @if (session('form_type') === 'umkm' && $errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <h4 class="text-center mb-3">Formulir Pendaftaran UMKM</h4>

        <!-- Input data pribadi dan login -->
        <div class="row">
          <div class="col-md-4 mb-3">
            <label>Nama Pemilik</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
          </div>
          <div class="col-md-4 mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
          </div>
          <div class="col-md-4 mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required minlength="6">
          </div>
        </div>

        <!-- Informasi usaha -->
        <div class="row">
          <div class="col-md-4 mb-3">
            <label>Nama UMKM</label>
            <input type="text" name="nama_umkm" class="form-control" value="{{ old('nama_umkm') }}" required>
          </div>
          <div class="col-md-4 mb-3">
            <label>Akses Perbankan</label>
            <select name="akses_perbankan" class="form-select" required>
              <option value="">-- Pilih --</option>
              <option value="Ya" {{ old('akses_perbankan') == 'Ya' ? 'selected' : '' }}>Ya</option>
              <option value="Tidak" {{ old('akses_perbankan') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label>Desa</label>
            <input type="text" name="desa" class="form-control" value="{{ old('desa') }}" required>
          </div>
          <div class="col-md-8 mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi') }}</textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label>Faksimili</label>
            <input type="text" name="faksimili" class="form-control" value="{{ old('faksimili') }}">
          </div>
          <div class="col-md-4 mb-3">
            <label>Jumlah Karyawan Pria</label>
            <input type="number" name="jumlah_karyawan_pria" class="form-control" value="{{ old('jumlah_karyawan_pria') }}" required min="0">
          </div>
          <div class="col-md-4 mb-3">
            <label>Jumlah Karyawan Wanita</label>
            <input type="number" name="jumlah_karyawan_wanita" class="form-control" value="{{ old('jumlah_karyawan_wanita') }}" required min="0">
          </div>
        </div>

        <!-- Informasi tambahan -->
        <div class="row">
          <div class="col-md-4 mb-3">
            <label>Kode Pos</label>
            <input type="text" name="kodepos" class="form-control" value="{{ old('kodepos') }}">
          </div>
          <div class="col-md-4 mb-3">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control">
          </div>
          <div class="col-md-4 mb-3">
            <label>No Surat Izin</label>
            <input type="text" name="no_surat_ijin" class="form-control" value="{{ old('no_surat_ijin') }}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label>NPWP</label>
            <input type="text" name="npwp" class="form-control" value="{{ old('npwp') }}">
          </div>
          <div class="col-md-4 mb-3">
            <label>Website</label>
            <input type="url" name="website" class="form-control" value="{{ old('website') }}">
          </div>
          <div class="col-md-4 mb-3">
            <label>Sektor Usaha</label>
            <select name="sektor_usaha_id" class="form-select" required>
              <option value="">-- Pilih --</option>
              @foreach ($sektor as $s)
                <option value="{{ $s->id }}" {{ old('sektor_usaha_id') == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label>Bentuk Usaha</label>
            <select name="bentuk_usaha_id" class="form-select" required>
              <option value="">-- Pilih --</option>
              @foreach ($bentuk as $s)
                <option value="{{ $s->id }}" {{ old('bentuk_usaha_id') == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label>Skala Usaha</label>
            <select name="skala_usaha_id" class="form-select" required>
              <option value="">-- Pilih --</option>
              @foreach ($skala as $s)
                <option value="{{ $s->id }}" {{ old('skala_usaha_id') == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- Tombol submit -->
        <button type="submit" class="btn btn-success w-100">Daftar UMKM</button>
        <p class="text-center mt-3">Sudah punya akun? <a href="/login">Masuk di sini</a></p>
      </form>
    </div>

    <!-- Formulir Registrasi Konsumen -->
    <div class="tab-pane fade {{ session('form_type') === 'konsumen' ? 'show active' : '' }}" id="konsumen" role="tabpanel">
      <form action="/register/konsumen-input" method="POST">
        @csrf

        <!-- Validasi error untuk form konsumen -->
        @if (session('form_type') === 'konsumen' && $errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <h4 class="text-center mb-3">Formulir Pendaftaran Konsumen</h4>

        <!-- Input data konsumen -->
        <div class="row">
          <div class="col-md-4 mb-3">
            <label>Nama Konsumen</label>
            <input type="text" name="nama_konsumen" class="form-control" value="{{ old('nama_konsumen') }}" required>
          </div>
          <div class="col-md-4 mb-3">
            <label>Email</label>
            <input type="email" name="email_konsumen" class="form-control" value="{{ old('email_konsumen') }}" required>
          </div>
          <div class="col-md-4 mb-3">
            <label>Password</label>
            <input type="password" name="password_konsumen" class="form-control" required minlength="6">
          </div>
          <div class="col-md-4 mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" required>
          </div>
          <div class="col-md-4 mb-3">
            <label>No. WhatsApp</label>
            <input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp') }}" required>
          </div>
        </div>

        <!-- Tombol submit konsumen -->
        <button type="submit" class="btn btn-primary w-100">Daftar Konsumen</button>
        <p class="text-center mt-3">Sudah punya akun? <a href="/login">Masuk di sini</a></p>
      </form>
    </div>
  </div>
</div>

<!-- Script untuk mengaktifkan tab yang sesuai dengan session form_type -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    let tabToActivate = "{{ session('form_type', 'umkm') }}";
    let targetTab = document.querySelector(`#${tabToActivate}-tab`);
    if (targetTab) {
      new bootstrap.Tab(targetTab).show();
    }
  });
</script>

<!-- Script bootstrap bundle (termasuk popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
