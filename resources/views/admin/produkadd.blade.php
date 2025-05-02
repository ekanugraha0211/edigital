@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
      <section class="content-header">
      
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk Tambah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
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
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Produk</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="{{ route('adminProduk.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- @method('post') --}}
              <div class="form-group">
                <label for="inputName">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" class="form-control" >
              </div>
              <div class="form-group">
                <label for="inputDescription">Deskripsi</label>
                <textarea id="inputDescription" name="deskripsi" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" class="form-control">
              </div>
              <div class="form-group">
                <input type="file" id="inputFotoProduk" class="form-control" name="foto1" accept="assets\img\produk\">
                <img src="" alt="Foto Awal" width="100">
              </div>
              
            {{-- </form> --}}
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
        
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Simpan" class="btn btn-success float-right">
        </div>
      </div>
    </form>
{{-- </form> --}}
  @endsection