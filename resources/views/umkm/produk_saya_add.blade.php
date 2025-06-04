@extends('umkm.layouts.main')

@section('container')
<div class="container">
    <h2 class="mb-4">Tambah Produk UMKM Saya</h2>

    <form action="{{ route('produksaya.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Produk (boleh lebih dari satu)</label>
            <input type="file" name="gambar[]" class="form-control" multiple accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save me-2"></i> Simpan Produk
        </button>
    </form>
</div>
@endsection
