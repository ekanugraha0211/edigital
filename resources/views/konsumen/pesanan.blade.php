@extends('konsumen.layouts.main')

@section('container')
<div class="container mt-5 pt-5">
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>UMKM</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Alamat</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $u)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $u->produk->umkm->nama_umkm }}</td>
                    <td>{{ $u->produk->nama  }}</td>
                    <td>{{ $u->jumlah }}</td>
                    <td>{{ $u->alamat }}</td>
                    <td>{{ $u->created_at }}</td>
                    <td>
                        @if($u->status === 'approved')
                            <span class="badge bg-warning">Proses</span>
                        @elseif($u->status === 'selesai')
                            <span class="badge bg-success">Selesai</span>
                        @else
                            <span class="badge bg-secondary">{{ ucfirst($u->status) }}</span>
                        @endif
                    </td>
                    <!-- <td>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $u->id }}">
                            Lihat
                        </button>
                    </td> -->
                </tr>

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
