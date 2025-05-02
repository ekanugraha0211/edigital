@extends('admin.layouts.main')
@section('content')
@if($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ $errors->first() }}',
        showConfirmButton: true,
    });
</script>
@endif

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: '{{ session("success") }}',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row mb-2">
        <div class="col-sm-12">
          @include('admin.produktambah')
          <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal">
  <i class="fas fa-plus"></i> Tambah
</a>
        </div>
    </div>
      <!-- Default box -->
      @if($produk->isEmpty())
        <div class="col-12 text-center">
          <h3 class="text-muted">Belum ada produk dari UMKM ini</h3>
        </div>
      @else
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
              @foreach($produk as $k)
              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                      {{ $k->umkm->SektorUsaha->nama ?? '-' }}
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><a href="{{ route('adminProduk.edit', $k->id) }}"><b>{{ $k->nama }}</b></a></h2>
                        <p class="text-muted text-sm"><b>{{ $k->umkm->nama ?? '-' }}</b> </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-quote-left"></i></span>{{ $k->tagline }}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> {{ $k->umkm->alamat?? '-' }}</li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                      <img src="{{ optional($k->gambarProduk->first())->path_gambar }}" alt="user-avatar" style="width: 100px; height: 100px" class="img-circle img-fluid">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <form action="{{ route('adminProduk.destroy', $k->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                      </form>
                      <a href="{{ route('adminProduk.edit', $k->id) }}" class="btn btn-sm btn-primary">
                          <i class="fas fa-search"></i> Detail
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        @endif
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection
