@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
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
                      <th>Subjek</th>
                      <th>Pesan</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($kontak->sortByDesc('id') as $k)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $k->nama }}</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $k->email }}</div>
                      </td>
                      <td>{{ $k->subjek }}</td>
                      <td>{{ $k->pesan }}</td>
                    </tr>
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
