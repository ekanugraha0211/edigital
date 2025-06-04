<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registrasi Pengguna</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
  <img src="{{ asset('assets/img/eDisplay3.png') }}" class="logo" alt="Logo">

  <ul class="nav nav-tabs justify-content-center" id="registerTabs" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="umkm-tab" data-bs-toggle="tab" data-bs-target="#umkm" type="button" role="tab">UMKM</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="konsumen-tab" data-bs-toggle="tab" data-bs-target="#konsumen" type="button" role="tab">Konsumen</button>
    </li>
  </ul>

  <div class="tab-content" id="registerTabsContent">
    <!-- UMKM Form -->
    <div class="tab-pane fade show active" id="umkm" role="tabpanel">
      <form action="/register/umkm-input" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="role" value="umkm">

        <h4 class="form-title text-center">Formulir Pendaftaran UMKM</h4>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label>Nama Pemilik</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="col-md-4 mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="col-md-4 mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label>Nama UMKM</label>
            <input type="text" name="nama_umkm" class="form-control" required>
          </div>
          <div class="col-md-4 mb-3">
            <label>Akses Perbankan</label>
            <select name="akses_perbankan" class="form-select" required>
              <option value="">-- Pilih --</option>
              <option value="Ya">Ya</option>
              <option value="Tidak">Tidak</option>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label>Desa</label>
            <input type="text" name="desa" class="form-control" required>
          </div>
          <div class="col-md-8 mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="2" required></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label>Faksimili</label>
            <input type="text" name="faksimili" class="form-control">
          </div>
          <div class="col-md-4 mb-3">
            <label>Jumlah Karyawan Pria</label>
            <input type="number" name="jumlah_karyawan_pria" class="form-control" min="0" required>
          </div>
          <div class="col-md-4 mb-3">
            <label>Jumlah Karyawan Wanita</label>
            <input type="number" name="jumlah_karyawan_wanita" class="form-control" min="0" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label>Kode Pos</label>
            <input type="text" name="kodepos" class="form-control">
          </div>
          <div class="col-md-4 mb-3">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control">
          </div>
          <div class="col-md-4 mb-3">
            <label>No Surat Izin</label>
            <input type="text" name="no_surat_ijin" class="form-control">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label>NPWP</label>
            <input type="text" name="NPWP" class="form-control">
          </div>
          <div class="col-md-4 mb-3">
            <label>Website</label>
            <input type="url" name="website" class="form-control">
          </div>
          <div class="col-md-4 mb-3">
            <label>Sektor Usaha</label>
            <select name="sektor_usaha_id" class="form-select" required>
            <option value="">-- Pilih --</option>
            @foreach ($sektor as $s)
              <option value="{{ $s->id }}">{{ $s->nama }}</option>
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
              <option value="{{ $s->id }}">{{ $s->nama }}</option>
            @endforeach
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label>Skala Usaha</label>
            <select name="skala_usaha_id" class="form-select" required>
            <option value="">-- Pilih --</option>
            @foreach ($skala as $s)
              <option value="{{ $s->id }}">{{ $s->nama }}</option>
            @endforeach
            </select>
          </div>
        </div>

        <button type="submit" class="btn btn-success w-100">Daftar UMKM</button>
        <p class="text-center mt-3">Sudah punya akun? <a href="/login">Masuk di sini</a></p>
      </form>
    </div>

    <!-- Konsumen Form -->
    <div class="tab-pane fade" id="konsumen" role="tabpanel">
      <form action="/register/konsumen-input" method="POST">
        @csrf
        <h4 class="form-title text-center">Formulir Pendaftaran Konsumen</h4>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label>Nama Konsumen</label>
            <input type="text" name="nama_konsumen" class="form-control" required>
          </div>
          <div class="col-md-4 mb-3">
            <label>Email</label>
            <input type="email" name="email_konsumen" class="form-control" required>
          </div>
          <div class="col-md-4 mb-3">
            <label>Password</label>
            <input type="password" name="password_konsumen" class="form-control" required>
          </div>
          <div class="col-md-4 mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
          </div>
          <div class="col-md-4 mb-3">
            <label>No. HP</label>
            <input type="text" name="no_hp" class="form-control" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Daftar Konsumen</button>
        <p class="text-center mt-3">Sudah punya akun? <a href="/login">Masuk di sini</a></p>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
 