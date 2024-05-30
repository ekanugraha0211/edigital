<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('assets/img/masjid.jpg');
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
      background: rgba(255, 255, 255, 0.8);
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }
    .logo {
      max-width: 100px;
      display: block;
      margin: 0 auto 20px;
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
    <a href="/" class="back-to-home">&lt; Beranda</a>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form class="login-form" action="{{ route('login') }}" method="POST">
        @csrf
        <img src="assets/img/eDisplay3.png" alt="Logo" class="logo">
        <h2 class="text-center mb-4">Login</h2>
        <div class="form-group">
          <label for="name">Email</label>
          <input type="text" id="name" name="name" class="form-control" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </div>
        <p class="text-center">Belum punya akun? <a href="/register">Daftar disini</a></p>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
