<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register UMKM</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styles for registration form */
    body {
      background-image: url('assets/img/masjid.jpg'); /* Ganti URL dengan URL gambar latar belakang Anda */
      background-size: cover;
      background-position: center;
      height: 100vh;
      margin: 0;
      margin-top: 150px;
      display: flex;
      align-items: center;
    }

    .register-form {
      margin: 20px auto;
      padding: 30px 20px;
      background: rgba(255, 255, 255, 0.8); /* Opacity untuk membuat latar belakang semi-transparan */
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5); /* Warna latar belakang semi-transparan */
    }

    .logo {
      max-width: 100px;
      display: block;
      margin: 0 auto 20px; /* Membuat jarak antara logo dan judul "Register" */
    }
    @media (max-width: 576px) {
      .register-form {
        max-width: 350px;
      }
    }
    .back-to-home {
      position: absolute;
      top: 20px;
      left: 20px;
      color: #fff;
      text-decoration: none;
    }
    .back-to-home:hover {
      color: #019765;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="overlay"></div>
  <a href="/" class="back-to-home">< Beranda</a>
  <div class="row ">
    <div class="col-lg-10 offset-lg-1" style="padding-top: 100px">
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('gagal'))
    <div class="alert alert-danger">
        {{ session('gagal') }}
    </div>
@endif

    
      <form class="register-form mt-50" action="/register/input" method="POST" id="registration-form">
        @csrf
        <img src="assets/img/eDisplay3.png" alt="Logo UMKM" class="logo"> <!-- Ganti path-to-your-logo.png dengan path logo Anda -->
        <h2 class="text-center mb-4">Register UMKM</h2>
        
        <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama" required>
              </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan alamat" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" required>
            </div>
        </div>
        
          {{-- <div class="col-md-4">
              <div class="form-group">
                  <label for="nomor_surat_ijin">Nomor Surat Ijin</label>
                  <input type="text" id="nomor_surat_ijin" name="nomor_surat_ijin" class="form-control" placeholder="Masukkan nomor surat ijin" required>
              </div>
          </div> --}}
          {{-- <div class="col-md-4">
              <div class="form-group">
                  <label for="logo">Logo</label>
                  <input type="file" id="logo" class="form-control-file" accept="assets/img/*" required>
              </div>
          </div> --}}
      </div>
    
      <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="whatsapp">WhatsApp</label>
                <input type="tel" id="whatsapp" name="whatsapp" class="form-control" placeholder="Masukkan nomor WhatsApp">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="nama_pemilik">Nama Pemilik</label>
                <input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control" placeholder="Masukkan nama pemilik" required>
            </div>
        </div>
          
          {{-- <div class="col-md-4">
              <div class="form-group">
                  <label for="desa">Desa</label>
                  <input type="text" id="desa" class="form-control" placeholder="Masukkan desa" required>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="kecamatan">Kecamatan</label>
                  <input type="text" id="kecamatan" class="form-control" placeholder="Masukkan kecamatan" required>
              </div>
          </div> --}}
        {{-- </div> --}}
        {{-- <div class="row"> --}}
          {{-- <div class="col-md-4">
              <div class="form-group">
                  <label for="kodepos">Kodepos</label>
                  <input type="text" id="kodepos" class="form-control" placeholder="Masukkan kodepos" required>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="no_telp_kantor">No. Telepon Kantor</label>
                  <input type="tel" id="no_telp_kantor" class="form-control" placeholder="Masukkan nomor telepon kantor" required>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="faksimili">Faksimili</label>
                  <input type="tel" id="faksimili" class="form-control" placeholder="Masukkan faksimili">
              </div>
          </div>
        </div> --}}
        {{-- <div class="row"> --}}
          {{-- <div class="col-md-4">
              <div class="form-group">
                  <label for="website">Website</label>
                  <input type="url" id="website" class="form-control" placeholder="Masukkan alamat website">
              </div>
          </div> --}}
         
        </div>
        {{-- <div class="row"> --}}
          
          {{-- <div class="col-md-4">
              <div class="form-group">
                  <label for="tgl_mulai">Tanggal Mulai</label>
                  <input type="date" id="tgl_mulai" class="form-control" required>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="NPWP">NPWP</label>
                  <input type="text" id="NPWP" class="form-control" placeholder="Masukkan NPWP">
              </div>
          </div> --}}
          {{-- <div class="col-md-4">
              <div class="form-group">
                  <label for="status">Status</label>
                  <select id="status" class="form-control" required>
                      <option value="">Pilih Status</option>
                      <option value="Aktif">Aktif</option>
                      <option value="Tidak Aktif">Tidak Aktif</option>
                  </select>
              </div>
          </div> --}}
      {{-- </div> --}}
      {{-- <div class="row"> --}}
          {{-- <div class="col-md-4">
              <div class="form-group">
                  <label for="sektor_usaha">Sektor Usaha</label>
                  <select class="form-control" id="sektor_usaha" required>
                    <option value="">Pilih Sektor Usaha</option>
                    <option value="1">Kreatif</option>
                    <option value="2">Pakaian</option>
                    <option value="3">Jasa</option>
                    <option value="4">Pertanian</option>
                    <option value="5">Teknologi</option>
                    <option value="6">Pendidikan</option>
                    <option value="7">Kesehatan</option>
                    <option value="8">Transportasi</option>
                    <option value="9">Properti</option>
                    <option value="10">Kuliner</option>
                  </select> --}}
                  {{-- <input type="text" id="sektor_usaha" class="form-control" placeholder="Masukkan sektor usaha"> --}}
              {{-- </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="skala_usaha">Skala Usaha</label>
                  <select class="form-control" id="sektor_usaha">
                    <option value="">Pilih skala Usaha</option>
                    <option value="1">Makro</option>
                    <option value="2">Kecil</option>
                    <option value="3">Menengah</option>
                  </select> --}}
                  {{-- <input type="text" id="skala_usaha" class="form-control" placeholder="Masukkan skala usaha"> --}}
              {{-- </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="jumlah_karyawan_pria">Jumlah Karyawan (Pria)</label>
                  <input type="number" id="jumlah_karyawan_pria" class="form-control" placeholder="Masukkan jumlah karyawan (pria)">
              </div>
          </div> --}}
      {{-- </div> --}}
      {{-- <div class="row"> --}}
          {{-- <div class="col-md-4">
              <div class="form-group">
                  <label for="jumlah_karyawan_wanita">Jumlah Karyawan (Wanita)</label>
                  <input type="number" id="jumlah_karyawan_wanita" class="form-control" placeholder="Masukkan jumlah karyawan (wanita)">
              </div>
          </div> --}}
          
          {{-- <div class="col-md-4">
            <div class="form-group">
                <label for="akses_perbankan">Akses Perbankan</label>
                <input type="text" id="akses_perbankan" class="form-control" placeholder="Masukkan akses perbankan">
            </div>
        </div> --}}
    {{-- </div> --}}
    {{-- <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="modal_awal">Modal Awal</label>
                <input type="text" id="modal_awal" class="form-control" placeholder="Masukkan modal awal">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="omset">Omset</label>
                <input type="text" id="omset" class="form-control" placeholder="Masukkan omset">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="bentuk_usaha">Bentuk Usaha</label>
                <select class="form-control" id="bentuk_usaha" required>
                    <option value="">Pilih Bentuk Usahaha</option>
                    <option value="1">Badan Usaha Milik Negara (BUMN)</option>
                    <option value="2">Badan Usaha Milik Daerah (BUMD)</option>
                    <option value="3">Perusahaan Perseorangan (PO)</option>
                    <option value="4">Perseorangan Terbatas (PT)</option>
                    <option value="5">Firma</option>
                    <option value="6">Commanditaire Vennootschap (CV)</option>
                    <option value="7">Koperasi</option>
                </select>
                <input type="text" id="bentuk_usaha" class="form-control" placeholder="Masukkan bentuk usaha"> --}}
            {{-- </div>
        </div>
    </div> --}}
    
      
            {{-- <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message">Pesan anda tidak terkirim</div>
                <div class="sent-message">YPesan anda terkirim. Terima kasih!</div>
              </div> --}}
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        
        <p class="text-center">Sudah punya akun ? <a href="/login">Masuk disini</a></p>
    </form>
</div>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</body>
</html>
