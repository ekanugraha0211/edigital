@extends('admin.layouts.main')

@section('container')
<div class="container mt-5 pt-5">
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Judul</th>
                    <th>Pesan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aduan as $u)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $u->users->nama }}</td>
                    <td>{{ $u->users->email }}</td>
                    <td>{{ $u->judul }}</td>
                    <td>{{ $u->pesan }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $u->id }}">
                            Lihat
                        </button>
                    </td>
                </tr>
<!-- Modal Detail -->
<div class="modal fade" id="detailModal{{ $u->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $u->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel{{ $u->id }}">Detail Pesan Aduan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama:</strong> {{ $u->users->nama }}</p>
                <p><strong>Email:</strong> {{ $u->users->email }}</p>
                <p><strong>Judul:</strong> {{ $u->judul ?? '-' }}</p>
                <p><strong>Pesan:</strong></p>
                <div class="border rounded p-3 bg-light">
                    {!! nl2br(e($u->pesan)) !!}
                </div>
            </div>
            <div class="modal-footer d-flex">
                <!-- Tombol Hapus -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $u->id }}">
                    Hapus
                </button>
                <!-- Tombol Tutup -->
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button> -->
            </div>
        </div>
    </div>
</div>
<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal{{ $u->id }}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{ $u->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="confirmDeleteLabel{{ $u->id }}">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus pesan aduan dari <strong>{{ $u->users->nama }}</strong> dengan judul "<strong>{{ $u->judul }}</strong>"?
            </div>
            <div class="modal-footer">
                <form action="{{ route('aduan.delete', $u->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
@endpush

@endsection
