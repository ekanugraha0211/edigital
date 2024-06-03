@extends('customer.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
      <section class="content-header">
      
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>UMKM Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/umkm">Home</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
<form action="{{ route('custUmkm.update',$umkm->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Primer</h3>

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
                  <input type="text" id="nama" name="nama" class="form-control" value="{{ $umkm->nama }}">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Logo</label>
                <img src="/{{ $umkm->logo}}"  width="100">
                <input type="file" id="inputEstimatedDuration" name="logo" class="form-control"  accept="assets\img\produk\">
              </div>
              <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $umkm->alamat }}">
              </div>
              <div class="form-group">
                  <label for="desa">Desa</label>
                  <input type="text" id="desa" name="desa" class="form-control" value="{{ $umkm->desa }}">
              </div>
              <div class="form-group">
                  <label for="kecamatan">Kecamatan</label>
                  <input type="text" id="kecamatan" name="kecamatan" class="form-control" value="{{ $umkm->kecamatan }}">
              </div>
              <div class="form-group">
                  <label for="kodepos">Kode Pos</label>
                  <input type="text" id="kodepos" name="kodepos" class="form-control" value="{{ $umkm->kodepos }}">
              </div>
              <div class="form-group">
                  <label for="no_telp_kantor">Nomor Telepon Kantor</label>
                  <input type="text" id="no_telp_kantor" name="no_telp_kantor" class="form-control" value="{{ $umkm->no_telp_kantor }}">
              </div>
              <div class="form-group">
                  <label for="website">Website</label>
                  <input type="text" id="website" name="website" class="form-control" value="{{ $umkm->website }}">
              </div>
              {{-- <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" id="email" name="email" class="form-control" value="{{ $umkm->email }}">
              </div> --}}
              <div class="form-group">
                  <label for="whatsapp">Whatsapp</label>
                  <input type="text" id="whatsapp" name="whatsapp" class="form-control" value="{{ $umkm->whatsapp }}">
              </div>
              
            </div>
              
            {{-- </form> --}}
              
            {{-- </div> --}}
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Sekunder</h3>

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
                  <label for="nomor_surat_ijin">Nomor Surat Ijin</label>
                  <input type="text" id="nomor_surat_ijin" name="nomor_surat_ijin" class="form-control" value="{{ $umkm->nomor_surat_ijin }}">
              </div>
             
              <div class="form-group">
                  <label for="faksimili">Faksimili</label>
                  <input type="text" id="faksimili" name="faksimili" class="form-control" value="{{ $umkm->faksimili }}">
              </div>
              <div class="form-group">
                  <label for="tgl_mulai">Tanggal Mulai</label>
                  <input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control" value="{{ $umkm->tgl_mulai }}">
              </div>
              <div class="form-group">
                  <label for="NPWP">NPWP</label>
                  <input type="text" id="NPWP" name="NPWP" class="form-control" value="{{ $umkm->NPWP }}">
              </div>
              <div class="form-group">
                  <label for="status">Status</label>
                  <input type="text" id="status" name="status" class="form-control" value="{{ $umkm->status }}">
              </div>
              <div class="form-group">
                  <label for="jumlah_karyawan_pria">Jumlah Karyawan Pria</label>
                  <input type="text" id="jumlah_karyawan_pria" name="jumlah_karyawan_pria" class="form-control" value="{{ $umkm->jumlah_karyawan_pria }}">
              </div>
              <div class="form-group">
                  <label for="jumlah_karyawan_wanita">Jumlah Karyawan Wanita</label>
                  <input type="text" id="jumlah_karyawan_wanita" name="jumlah_karyawan_wanita" class="form-control" value="{{ $umkm->jumlah_karyawan_wanita }}">
              </div>
              <div class="form-group">
                  <label for="akses_perbankan">Akses Perbankan</label>
                  <input type="text" id="akses_perbankan" name="akses_perbankan" class="form-control" value="{{ $umkm->akses_perbankan }}">
              </div>
              <div class="form-group">
                  <label for="modal_awal">Modal Awal</label>
                  <input type="text" id="modal_awal" name="modal_awal" class="form-control" value="{{ $umkm->modal_awal }}">
              </div>
              <div class="form-group">
                  <label for="omset">Omset</label>
                  <input type="text" id="omset" name="omset" class="form-control" value="{{ $umkm->omset }}">
              </div>
              <div class="form-group">
                  <label for="id_bentuk_usaha">ID Bentuk Usaha</label>
                  <select class="custom-select rounded-0" id="exampleSelectRounded0" name="id_bentuk_usaha">
                    @foreach ($bentuk as $p)
                        <option value="{{ $p->id }}" {{ $umkm->id_bentuk_usaha == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                    @endforeach
                </select>              
              </div>
              <div class="form-group">
                  <label for="id_bentuk_usaha">ID Sektor Usaha</label>
                  <select class="custom-select rounded-0" id="exampleSelectRounded0" name="id_sektor_usaha">
                    @foreach ($sektor as $p)
                        <option value="{{ $p->id }}" {{ $umkm->id_sektor_usaha == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                    @endforeach
                </select>              
              </div>
              <div class="form-group">
                  <label for="id_bentuk_usaha">ID Skala Usaha</label>
                  <select class="custom-select rounded-0" id="exampleSelectRounded0" name="id_skala_usaha">
                    @foreach ($skala as $p)
                        <option value="{{ $p->id }}" {{ $umkm->id_skala_usaha == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                    @endforeach
                </select>              
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
          <input type="submit" value="Simpan" class="btn btn-success float-right">
        </div>
      </div>
    </form>
    <script>
        document.getElementById('statusSwitch').addEventListener('change', function() {
            let statusLabel = document.querySelector('.custom-control-label');
            statusLabel.textContent = this.checked ? 'Aktif' : 'Nonaktif';
        });
    </script>
{{-- </form> --}}
  @endsection