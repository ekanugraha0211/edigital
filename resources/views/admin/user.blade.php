@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pesan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pesan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        

       

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <!-- /.col -->
         
          
          <div class="col-md-12">
            {{-- <div class="col-sm-12"> --}}
                <a href="{{ route('User.create') }}" class="btn btn-success">
                  <i class="fas fa-plus"></i> Tambah
                </a>
              {{-- </div> --}}
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="margin: 10px">
                <div class="table-responsive">
                  <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>UMKM</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($user as $k)
    @if($k->role != 'admin')
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $k->name }}</td>
            <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $k->email }}</div>
            </td>
            <td>{{ $k->umkm->nama ?? '-' }}</td>
            <td>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="switch{{ $loop->index }}" {{ $k->role == 'umkm' ? 'checked' : '' }} disabled>
                    <label class="custom-control-label" for="switch{{ $loop->index }}"></label>
                </div>
            </td> 
            <td>
                <a href="{{ route('User.edit', $k->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('User.destroy', $k->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn  btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endif
@endforeach

                  
                    </tbody>
                    
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              
            </div>
          </div>
          <!-- /.col -->

         
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
  new DataTable('#example', {
    layout: {
        bottomEnd: {
            paging: {
                boundaryNumbers: false
            }
        }
    }
});
</script>
@endsection
