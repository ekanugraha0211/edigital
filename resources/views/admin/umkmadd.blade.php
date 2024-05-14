@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
      <section class="content-header">
      
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Edit</li>
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
<form action="{{ route('adminUmkm.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  {{-- @method('put') --}}
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">UMKM</h3>

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
                  <label for="nama">Nama UMKM</label>
                  <input type="text" id="nama" name="nama" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" id="alamat" name="alamat" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="desa">Desa</label>
                  <input type="text" id="desa" name="desa" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="kecamatan">Kecamatan</label>
                  <input type="text" id="kecamatan" name="kecamatan" class="form-control">
              </div>
              <div class="form-group">
                  <label for="kodepos">Kode Pos</label>
                  <input type="text" id="kodepos" name="kodepos" class="form-control">
              </div>
              <div class="form-group">
                  <label for="no_telp_kantor">Nomor Telepon Kantor</label>
                  <input type="text" id="no_telp_kantor" name="no_telp_kantor" class="form-control">
              </div>
              <div class="form-group">
                  <label for="website">Website</label>
                  <input type="text" id="website" name="website" class="form-control">
              </div>
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" id="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                  <label for="whatsapp">Whatsapp</label>
                  <input type="text" id="whatsapp" name="whatsapp" class="form-control">
              </div>
              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" id="password" name="password" class="form-control">
              </div>
              <div class="form-group">
                  <label for="status">Status</label>
                  <input type="text" id="status" name="status" class="form-control">
              </div>
              <div class="form-group">
                  <label for="nama_pemilik">Nama Pemilik</label>
                  <input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control">
              </div>
              
            {{-- </form> --}}
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">UMKM</h3>

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
                {{-- <div class="form-group">
                  <label for="nama">Nama UMKM</label>
                  <input type="text" id="nama" name="nama" class="form-control" ">
              </div> --}}
              <div class="form-group">
                  <label for="nomor_surat_ijin">Nomor Surat Ijin</label>
                  <input type="text" id="nomor_surat_ijin" name="nomor_surat_ijin" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" id="alamat" name="alamat" class="form-control" ">
              </div>
              <div class="form-group">
                  <label for="desa">Desa</label>
                  <input type="text" id="desa" name="desa" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="kecamatan">Kecamatan</label>
                  <input type="text" id="kecamatan" name="kecamatan" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="kodepos">Kode Pos</label>
                  <input type="text" id="kodepos" name="kodepos" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="no_telp_kantor">Nomor Telepon Kantor</label>
                  <input type="text" id="no_telp_kantor" name="no_telp_kantor" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="faksimili">Faksimili</label>
                  <input type="text" id="faksimili" name="faksimili" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="website">Website</label>
                  <input type="text" id="website" name="website" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" id="email" name="email" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="whatsapp">Whatsapp</label>
                  <input type="text" id="whatsapp" name="whatsapp" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" id="password" name="password" class="form-control">
              </div>
              <div class="form-group">
                  <label for="tgl_mulai">Tanggal Mulai</label>
                  <input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="NPWP">NPWP</label>
                  <input type="text" id="NPWP" name="NPWP" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="status">Status</label>
                  <input type="text" id="status" name="status" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="jumlah_karyawan_pria">Jumlah Karyawan Pria</label>
                  <input type="text" id="jumlah_karyawan_pria" name="jumlah_karyawan_pria" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="jumlah_karyawan_wanita">Jumlah Karyawan Wanita</label>
                  <input type="text" id="jumlah_karyawan_wanita" name="jumlah_karyawan_wanita" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="nama_pemilik">Nama Pemilik</label>
                  <input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="akses_perbankan">Akses Perbankan</label>
                  <input type="text" id="akses_perbankan" name="akses_perbankan" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="modal_awal">Modal Awal</label>
                  <input type="text" id="modal_awal" name="modal_awal" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="omset">Omset</label>
                  <input type="text" id="omset" name="omset" class="form-control" >
              </div>
              <div class="form-group">
                  <label for="id_bentuk_usaha">ID Bentuk Usaha</label>
                  <select class="custom-select rounded-0" id="exampleSelectRounded0" name="id_bentuk_usaha">
                    @foreach ($bentuk as $p)
                        <option value="{{ $p->id }}" >{{ $p->nama }}</option>
                    @endforeach
                </select>              
              </div>
              <div class="form-group">
                  <label for="id_bentuk_usaha">ID Sektor Usaha</label>
                  <select class="custom-select rounded-0" id="exampleSelectRounded0" name="id_sektor_usaha">
                    @foreach ($sektor as $p)
                        <option value="{{ $p->id }}" >{{ $p->nama }}</option>
                    @endforeach
                </select>              
              </div>
              <div class="form-group">
                  <label for="id_bentuk_usaha">ID Skala Usaha</label>
                  <select class="custom-select rounded-0" id="exampleSelectRounded0" name="id_skala_usaha">
                    @foreach ($skala as $p)
                        <option value="{{ $p->id }}" >{{ $p->nama }}</option>
                    @endforeach
                </select>              
              </div>
              
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
                {{-- <img src="{{ $umkm->logo}}"  width="100"> --}}
                <label for="inputEstimatedDuration">Logo</label>
                <input type="file" id="inputEstimatedDuration" name="logo" class="form-control"  accept="assets\img\produk\">
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
          {{-- <a href="#" class="btn btn-secondary">Cancel</a> --}}
          {{-- <button type="submit" class="btn-btn-primary">Simpan</button> --}}
          <input type="submit" value="Save Changes" class="btn btn-success float-right">
        </div>
      </div>
    </form>
{{-- </form> --}}
  @endsection