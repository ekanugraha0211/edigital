@extends('customer.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
      <section class="content-header">
      
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/umkm">Home</a></li>
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
<form action="{{ route('custProduk.update',$produk->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
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
              {{-- <form action="{{ route('adminProduk.update',$produk->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put') --}}
              <div class="form-group">
                <label for="inputName">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" class="form-control" value="{{ $produk->nama_produk }}">
              </div>
              <div class="form-group">
                <label for="inputName">Headline</label>
                <input type="text" id="inputName" name="tagline" class="form-control" value="{{ $produk->tagline }}">
              </div>
              <div class="form-group">
                <label for="inputDescription">Produk Deskripsi</label>
                <textarea id="inputDescription" name="deskripsi" class="form-control" rows="4">{{ $produk->deskripsi }}</textarea>
              </div>
              {{-- <div class="form-group">
                <label for="exampleSelectRounded0">UMKM</label>
                <select class="custom-select rounded-0" id="exampleSelectRounded0" name="id_umkm">
                  @foreach ($umkm as $p)
                      <option value="{{ $p->id }}" {{ $produk->id_umkm == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                  @endforeach
              </select>
              
              </div> --}}
              
            {{-- </form> --}}
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Foto</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              {{-- <form action="{{ route('adminProduk.update',$produk->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put') --}}
              <div class="form-group">
                <img src="/{{ $produk->foto1 }}" alt="Foto Awal" width="100">
                <label for="inputFotoProduk">Foto Produk Utama</label>
                <input type="file" id="inputFotoProduk" class="form-control" name="foto1" accept="assets\img\produk\">
            </div>
            
              <div class="form-group">
                <img src="/{{ $produk->foto2 }}" alt="Foto Awal" width="100">
                <label for="inputSpentBudget">Foto Produk Kedua</label>
                <input type="file" value="{{ $produk->foto2 }}" id="inputSpentBudget" name="foto2" class="form-control"  accept="assets\img\produk\">
              </div>
              <div class="form-group">
                <img src="/{{ $produk->foto3 }}" alt="Foto Awal" width="100">
                <label for="inputEstimatedDuration">Foto Produk ketiga</label>
                <input type="file" id="inputEstimatedDuration" name="foto3" class="form-control"  accept="assets\img\produk\">
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