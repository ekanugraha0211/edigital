@extends('customer.layouts.main')
@section('content')
@php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
@endphp
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk</h1>
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
      <div class="row mb-2">
        <div class="col-sm-12">
            <a href="{{ route('custProduk.create') }}" class="btn btn-primary">Tambah Produk</a>
        </div>
    </div>
    
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            @foreach($produk as $k)
            @if($k->umkm->user->id === $user->id)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                    {{ $k->umkm->SektorUsaha->nama ?? '-' }}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><a href="{{ route('custProduk.edit', $k->id) }}"><b>{{ $k->nama_produk }}</b></a></h2>
                      <p class="text-muted text-sm"><b>{{ $k->umkm->nama ?? '-' }}</b> </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-quote-left"></i></span>{{ $k->tagline }}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> {{ $k->umkm->alamat?? '-' }}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{ $k->foto1 }}" alt="user-avatar" style="width: 100px; height: 100px" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    
                    <form action="{{ route('custProduk.destroy', $k->id) }}" method="POST" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">
                          <i class="fas fa-trash"></i> Hapus
                      </button>
                  </form>
                  <a href="{{ route('custProduk.edit', $k->id) }}" class="btn btn-sm btn-primary">
                      <i class="fas fa-search"></i> Detail
                  </a>
                  </div>
                </div>
              </div>
            </div>
            @endif
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
