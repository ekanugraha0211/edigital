@extends('admin.layouts.main')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <h1>UMKM</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">UMKM</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row mb-2">
      <div class="col-sm-12">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahUmkmModal">
          <i class="fas fa-plus"></i> Tambah
        </button>
      </div>
@include('admin.umkmadd')
@include('admin.umkmedit')

    </div>
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            @foreach($umkm as $k)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                    {{ $k->sektorUsaha->nama ?? '-' }}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><a href="{{ route('adminUmkm.edit', $k->id) }}"><b>{{ $k->nama_produk }}</b></a></h2>
                      <p class="text-muted text-sm"><b>{{ $k->nama_umkm ?? '-' }}</b> </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-quote-left"></i></span>{{ $k->BentukUsaha->nama ?? '-' }}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> {{ $k->alamat?? '-' }}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{ $k->logo }}" alt="user-avatar" style="width: 100px; height: 100px" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                  <form action="{{ route('adminUmkm.destroy', $k->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus UMKM ini beserta user terkait?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">
                          <i class="fas fa-trash"></i> Hapus
                      </button>
                  </form>

                  <!-- Tombol Trigger Modal -->
                  <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editUmkmModal{{ $k->id }}">
                    <i class="fas fa-search"></i> Detail
                  </a>


                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection
