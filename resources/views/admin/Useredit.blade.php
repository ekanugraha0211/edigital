@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
      <section class="content-header">
      
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="{{ route('User.update',$user->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">User</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
              </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
              </div>
                <div class="form-group">
                  <label for="role">Role</label>
                  <input type="role" id="role" name="role" class="form-control" value="{{ $user->role }}">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control" value="{{ $user->password }}">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </span>
                </div>
            </div>
            
            </div>
          </div>
          <!-- /.card -->
        </div>
        
        
      </div>
      <div class="row">
        <div class="col-12">
          {{-- <a href="#" class="btn btn-secondary">Cancel</a> --}}
          {{-- <button type="submit" class="btn-btn-primary">Simpan</button> --}}
          <input type="submit" value="Simpan" class="btn btn-success float-right">
        </div>
      </div>
    </form>
    <script>
        document.getElementById('statusSwitch').addEventListener('change', function() {
            let statusLabel = document.querySelector('.custom-control-label');
            statusLabel.textContent = this.checked ? 'Aktif' : 'Nonaktif';
        });
    </script>
    <script>
      const togglePassword = document.getElementById('togglePassword');
      const password = document.getElementById('password');
      const toggleIcon = document.getElementById('toggleIcon');
  
      togglePassword.addEventListener('click', function () {
          const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
          password.setAttribute('type', type);
  
          // Change the icon
          toggleIcon.classList.toggle('fa-eye-slash');
      });
  </script>
  
{{-- </form> --}}
  @endsection