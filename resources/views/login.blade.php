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
      position: relative;
      z-index: 2;
    }
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1;
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

  <div class="overlay"></div>
<div class="container">
    <a href="/" class="back-to-home">&lt; Beranda</a>

  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form class="login-form" action="{{ route('login') }}" method="POST">
        @csrf
        <img src="assets/img/eDisplay3.png" alt="Logo" class="logo">
        <h2 class="text-center mb-4">Login</h2>
        <!-- Success and Error Messages -->
        @if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

@if ($errors->has('custom'))
  <div class="alert alert-danger">
    <p>{{ $errors->first('custom') }}</p>
  </div>
@elseif ($errors->any())
  <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  </div>
@endif


        <div class="form-group">
          <label for="name">Username</label>
          <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama') }}" autocomplete="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group">
            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
            <div class="input-group-append bg-white">
            <button class="btn text-dark" type="button" id="togglePassword">
              <i class="fas fa-eye-slash text-dark" id="eyeIcon"></i>
            </button>
            </div>
            </div>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div>

            <!-- @if (Route::has('password.request'))
              <div class="form-group text-center">
                <a href="{{ route('password.request') }}">Lupa Password?</a>
              </div>
            @endif -->

            <p class="text-center">UMKM Belum Terdaftar ? <a href="/register">Daftar disini</a></p>

      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $('#togglePassword').on('click', function () {
      const passwordInput = $('#password');
      const icon = $('#eyeIcon');
      const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
      passwordInput.attr('type', type);
      icon.toggleClass('fa-eye fa-eye-slash');
    });
  </script>

</body>
</html>
