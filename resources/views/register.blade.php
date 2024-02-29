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
      display: flex;
      align-items: center;
    }

    .register-form {
      margin: 20px auto;
      padding: 30px;
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
  </style>
</head>
<body>

<div class="container">
  <div class="overlay"></div>
  <div class="row ">
    <div class="col-lg-10 offset-lg-1" style="padding-top: 100px">
      <form class="register-form mt-50" action="/register" method="POST">
        <img src="assets/img/eDisplay3.png" alt="Logo UMKM" class="logo"> <!-- Ganti path-to-your-logo.png dengan path logo Anda -->
        <h2 class="text-center mb-4">Register UMKM</h2>
        <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="logo_umkm">Logo UMKM</label>
                 <input type="file" id="logo_umkm" class="form-control-file" accept="image/*" required>
              </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="nama_umkm">Nama UMKM</label>
              <input type="text" id="nama_umkm" class="form-control" placeholder="Enter UMKM name" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="nama_pemilik">Nama Pemilik</label>
              <input type="text" id="nama_pemilik" class="form-control" placeholder="Enter owner's name" required>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="nik">NIK (Nomor Induk Kependudukan)</label>
                <input type="text" id="nik" class="form-control" placeholder="Enter NIK" required>
              </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" id="alamat" class="form-control" placeholder="Enter address (Jalan, Desa, Kecamatan)" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="sosial_media">Sosial Media</label>
              <input type="text" id="sosial_media" class="form-control" placeholder="Enter social media links" required>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="deskripsi">Deskripsi UMKM</label>
                <textarea id="deskripsi" class="form-control" placeholder="Enter UMKM description" required></textarea>
              </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" class="form-control" placeholder="Enter your email" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" class="form-control" placeholder="Enter your password" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="confirm-password">Confirm Password</label>
              <input type="password" id="confirm-password" class="form-control" placeholder="Confirm your password" required>
            </div>
          </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <p class="text-center">Already have an account? <a href="/login">Login here</a></p>
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
