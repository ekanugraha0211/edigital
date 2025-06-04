@extends('umkm.layouts.main')

@section('container')
<div class="container mt-5 pt-5">
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <!-- <th>Email</th> -->
                    <th>whatsapp</th>
                    <th>Jumlah</th>
                    <th>Alamat</th>
                    <th>catatan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $u)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $u->users->nama  }}</td>
                    <!-- <td>{{ $u->users->email  }}</td> -->
                    <td>{{ $u->whatsapp }}</td>
                    <td>{{ $u->jumlah }}</td>
                    <td>{{ $u->alamat }}</td>
                    <td>{{ $u->catatan }}</td>
                    <td>{{ $u->created_at }}</td>
                    <td>
                        <div class="dropdown">
                            @php
                                $badgeClass = match($u->status) {
                                    'proses' => 'bg-warning',
                                    'selesai' => 'bg-success',
                                    default => 'bg-secondary'
                                };
                            @endphp

                            <button class="btn btn-sm {{ $badgeClass }} dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ ucfirst($u->status) }}
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <form method="POST" action="{{ route('pesanan.status.update', $u->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="pending">
                                        <button type="submit" class="dropdown-item">Pending</button>
                                    </form>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('pesanan.status.update', $u->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="proses">
                                        <button type="submit" class="dropdown-item">Proses</button>
                                    </form>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('pesanan.status.update', $u->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="selesai">
                                        <button type="submit" class="dropdown-item">Selesai</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
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
