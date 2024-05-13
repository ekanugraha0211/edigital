@extends('layouts.mainadmin')
@section('content')

<section class="content">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Tambah Layanan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Layanan</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Layanan">

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Link Layanan</label>
                            <input class="form-control @error('link_layanan') is-invalid @enderror" id="link_layanan" name="link_layanan" value="{{ old('link_layanan') }}" placeholder="Masukkan Link Web">

                            @error('link_layanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputFile">Logo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="logo" name="logo" onchange="showSelectedFileInfo()">
                                    <label class="custom-file-label" for="exampleInputFile" id="selectedFileName">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div id="filePreview"></div> --}}
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" id="logo" name="logo" accept="image/*" onchange="showSelectedFileInfo('logo', 'filePreviewLogo', 'selectedFileNameLogo')">
                                <label class="custom-file-label" for="logo">Pilih file...</label>
                            </div>
                            <small id="fileHelpLogo" class="form-text text-muted">Format: JPG, PNG, GIF</small>
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="filePreviewLogo" class="mb-2">
                            <!-- Pratinjau file akan ditampilkan di sini -->
                        </div>
                        <span id="selectedFileNameLogo"></span>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('layanan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
          </div>
        </div>
    </div>
</section>

<footer>
    @include('adminnav.footer')
</footer>

@endsection