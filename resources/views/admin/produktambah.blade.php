<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductModalLabel">Tambah Produk Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('adminProduk.store', ['umkm_id' => $umkm->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
          <input type="hidden" name="umkm_id" value="{{ $umkm->id }}">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Produk</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="stok" class="form-label">stok</label>
            <input class="form-control" id="stok" name="stok" rows="3" required></input>
          </div>
          <div class="form-group">
              <label for="harga">Harga</label>
              <input type="text" name="harga" id="harga" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="gambar_produk">Upload Gambar Produk</label>
              <input type="file" id="gambar_produk" name="gambar_produk[]" class="form-control" multiple>
              <small class="text-muted">Dapat mengunggah lebih dari satu gambar.</small>
          </div>
          <button type="submit" class="btn btn-success">Simpan Produk</button>
        </form>
      </div>
    </div>
  </div>
</div>