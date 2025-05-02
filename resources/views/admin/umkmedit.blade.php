<!-- Modal Edit UMKM -->
@foreach ($umkm as $k)
<div class="modal fade" id="editUmkmModal{{ $k->id }}" tabindex="-1" aria-labelledby="editUmkmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="editUmkmModalLabel">Edit Data UMKM - {{ $k->nama_umkm }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('adminUmkm.update', $k->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="row">
            <div class="col-md-6">
              <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                  <h3 class="card-title">Data User</h3>
                </div>
                <div class="card-body">
                  <div class="form-group mb-3">
                    <label for="name" class="form-label">Nama Pemilik</label>
                    <input type="text" id="name" name="nama_user" class="form-control" value="{{ $k->user->nama }}" required>
                  </div>
                  <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $k->user->email }}" required>
                  </div>
                  <div class="form-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                  <h3 class="card-title">Data UMKM</h3>
                </div>
                <div class="card-body">
                  <div class="form-group mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" id="logo" name="logo" class="form-control-file">
                    @if ($k->logo)
                      <img src="{{ asset($k->logo) }}" alt="Logo UMKM" class="img-thumbnail mt-2" style="width: 100px;">
                    @endif
                  </div>
                  <div class="form-group mb-3">
                    <label for="nama_umkm" class="form-label">Nama UMKM</label>
                    <input type="text" id="nama_umkm" name="nama_umkm" class="form-control" value="{{ $k->nama_umkm }}" required>
                  </div>
                  <div class="form-group mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $k->alamat }}">
                  </div>
                  <div class="form-group mb-3">
                    <label for="desa" class="form-label">Desa</label>
                    <input type="text" id="desa" name="desa" class="form-control" value="{{ $k->desa }}">
                  </div>
                  <div class="form-group mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <input type="text" id="kecamatan" name="kecamatan" class="form-control" value="{{ $k->kecamatan }}">
                  </div>
                  <div class="form-group mb-3">
                    <label for="kodepos" class="form-label">Kode Pos</label>
                    <input type="text" id="kodepos" name="kodepos" class="form-control" value="{{ $k->kodepos }}">
                  </div>
                  <div class="form-group mb-3">
                    <label for="faksimili" class="form-label">Faksimili</label>
                    <input type="text" id="faksimili" name="faksimili" class="form-control" value="{{ $k->faksimili }}">
                  </div>
                  <div class="form-group mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input type="text" id="website" name="website" class="form-control" value="{{ $k->website }}">
                  </div>
                  <div class="form-group mb-3">
                    <label for="whatsapp" class="form-label">Whatsapp</label>
                    <input type="text" id="whatsapp" name="whatsapp" class="form-control" value="{{ $k->whatsapp }}">
                  </div>
                  <div class="form-group mb-3">
                    <label for="modal_awal" class="form-label">Modal Awal</label>
                    <input type="text" id="modal_awal" name="modal_awal" class="form-control" value="{{ $k->modal_awal }}">
                  </div>
                  <div class="form-group mb-3">
                    <label for="omset" class="form-label">Omset</label>
                    <input type="text" id="omset" name="omset" class="form-control" value="{{ $k->omset }}">
                  </div>
                  <div class="form-group mb-3">
                    <label for="id_bentuk_usaha" class="form-label">Bentuk Usaha</label>
                    <select class="form-select" name="bentuk_usaha_id">
                      @foreach ($bentuk as $p)
                        <option value="{{ $p->id }}" {{ $p->id == $k->bentuk_usaha_id ? 'selected' : '' }}>{{ $p->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label for="id_sektor_usaha" class="form-label">Sektor Usaha</label>
                    <select class="form-select" name="sektor_usaha_id">
                      @foreach ($sektor as $p)
                        <option value="{{ $p->id }}" {{ $p->id == $k->sektor_usaha_id ? 'selected' : '' }}>{{ $p->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label for="id_skala_usaha" class="form-label">Skala Usaha</label>
                    <select class="form-select" name="skala_usaha_id">
                      @foreach ($skala as $p)
                        <option value="{{ $p->id }}" {{ $p->id == $k->skala_usaha_id ? 'selected' : '' }}>{{ $p->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="text-start mt-3">
                    <a href="{{ route('adminProduk.show',  $k->id) }}" class="btn btn-info">
                      <i class="fas fa-box"></i> Kelola Produk UMKM
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 text-end">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
