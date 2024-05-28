@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pertanyaan dan Jawaban</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Bantuan</li>
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
        <form action="{{ route('adminBantuan.updateAll') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="row">
              <div class="col-md-12">
                  <div class="card card-primary">
                      <div class="card-header">
                          <h3 class="card-title">List QnA</h3>
                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                  <i class="fas fa-minus"></i>
                              </button>
                          </div>
                      </div>

                      @foreach ($bantuan as $b)
                          <div class="card-body">
                              <input type="hidden" name="ids[]" value="{{ $b->id }}">
                              <div class="form-group">
                                  <label for="pertanyaan_{{ $b->id }}">Pertanyaan</label>
                                  <input type="text" id="pertanyaan_{{ $b->id }}" name="pertanyaan[{{ $b->id }}]" class="form-control" value="{{ $b->pertanyaan }}">
                              </div>
                              <div class="form-group">
                                  <label for="jawaban_{{ $b->id }}">Jawaban</label>
                                  <textarea id="jawaban_{{ $b->id }}" name="jawaban[{{ $b->id }}]" class="form-control" rows="5">{{ $b->jawaban }}</textarea>
                              </div>
                          </div>
                      @endforeach 
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
    </section>
    <!-- /.content -->
</div>
@endsection
