<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styles for login form */
    body {
      background-image: url('assets/img/masjid.jpg'); /* Ganti URL dengan URL gambar latar belakang Anda */
      background-size: cover;
      background-position: center;
      height: 100vh;
      margin: 0;
      display: flex;
      align-items: center;
    }

    .login-form {
      max-width: 350px;
      margin: auto;
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
      margin: 0 auto 20px; /* Membuat jarak antara logo dan judul "Login" */
    }
  </style>
</head>
<body>

<div class="container">
    <div class="overlay"></div>
  <div class="row">
    <div class="col-md-6 offset-md-3">
        
      <form class="login-form">
        <img src="assets/img/eDisplay3.png" alt="Logo" class="logo"> <!-- Ganti path-to-your-logo.png dengan path logo Anda -->
        <h2 class="text-center mb-4">Login</h2>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" class="form-control" placeholder="Enter your username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" class="form-control" placeholder="Enter your password" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </div>
        <p class="text-center">Belum punya akun? <a href="/register">Daftar disini</a></p>
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
