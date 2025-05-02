@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
      <section class="content-header">
      
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah User</h1>
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
<form action="{{ route('User.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  {{-- @method('put') --}}
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
                  <label for="nama">Nama</label>
                  <input type="text" id="nama" name="nama" class="form-control" >
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="inputEstimatedDuration" name="email" class="form-control">
              </div>
              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" id="password" name="password" class="form-control" >
              </div>              
            </div>
          </div>
        </div>             
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Save Changes" class="btn btn-success float-right">
        </div>
      </div>
    </form>
{{-- </form> --}}
  @endsection