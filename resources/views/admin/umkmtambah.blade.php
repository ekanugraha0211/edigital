<!-- Modal edit UMKM -->
 @foreach ($umkm as $k)
 

<div class="modal fade" id="editUmkmModal{{ $k->id }}" tabindex="-1" aria-labelledby="tambahUmkmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="tambahUmkmModalLabel">Tambah Data UMKM</h5>
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
                  <div class="form-group">
                    <label for="name" class="form-label d-block text-start">Nama Pemilik</label>
                    <input type="text" id="name" name="nama_user" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="email" class="form-label d-block text-start">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="password" class="form-label d-block text-start">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
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
                  <div class="form-group">
                    <label for="logo" class="form-label d-block text-start">Logo</label>
                    <input type="file" id="logo" name="logo" class="form-control-file" accept="image/*">
                  </div>
                  <div class="form-group">
                    <label for="nama_umkm" class="form-label d-block text-start">Nama UMKM</label>
                    <input type="text" id="nama_umkm" name="nama_umkm" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="alamat" class="form-label d-block text-start">Alamat</label>
                    <input type="text" id="alamat" name="alamat" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="desa" class="form-label d-block text-start">Desa</label>
                    <input type="text" id="desa" name="desa" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="kecamatan" class="form-label d-block text-start">Kecamatan</label>
                    <input type="text" id="kecamatan" name="kecamatan" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="kodepos" class="form-label d-block text-start">Kode Pos</label>
                    <input type="text" id="kodepos" name="kodepos" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="faksimili" class="form-label d-block text-start">Faksimili</label>
                    <input type="text" id="faksimili" name="faksimili" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="website" class="form-label d-block text-start">Website</label>
                    <input type="text" id="website" name="website" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="whatsapp" class="form-label d-block text-start">Whatsapp</label>
                    <input type="text" id="whatsapp" name="whatsapp" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="modal_awal" class="form-label d-block text-start">Modal Awal</label>
                    <input type="text" id="modal_awal" name="modal_awal" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="omset" class="form-label d-block text-start">Omset</label>
                    <input type="text" id="omset" name="omset" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="id_bentuk_usaha" class="form-label d-block text-start">Bentuk Usaha</label>
                    <select class="custom-select" name="bentuk_usaha_id">
                      @foreach ($bentuk as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="id_sektor_usaha" class="form-label d-block text-start">Sektor Usaha</label>
                    <select class="custom-select" name="sektor_usaha_id">
                      @foreach ($sektor as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="id_skala_usaha" class="form-label d-block text-start">Skala Usaha</label>
                    <select class="custom-select" name="skala_usaha_id">
                      @foreach ($skala as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 text-right">
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