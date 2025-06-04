@extends('admin.layouts.main')

@section('container')
<div class="container mt-5 pt-5">
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $u->nama }}</td>
                    <td>{{ $u->role  }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                        @if($u->status === 'approved')
                            <span class="badge bg-success">Approved</span>
                        @elseif($u->status === 'disabled')
                            <span class="badge bg-danger">Disabled</span>
                        @else
                            <span class="badge bg-secondary">{{ ucfirst($u->status) }}</span>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $u->id }}">
                            Lihat
                        </button>
                    </td>
                </tr>
                <div class="modal fade" id="detailModal{{ $u->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $u->id }}" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content rounded-3 shadow">
                      <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="detailModalLabel{{ $u->id }}">
                          Detail User: {{ $u->umkm->nama_umkm ?? '-' }}
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      
                      <div class="modal-body py-4 px-4">
                        <div class="row">
                          <div class="col-md-6 mb-2">
                            <strong>Nama Pengguna:</strong><br>{{ $u->nama ?? '-' }}
                          </div>
                          <div class="col-md-6 mb-2">
                            <strong>Email:</strong><br>{{ $u->email ?? '-' }}
                          </div>
                          <div class="col-md-6 mb-2">
                            <strong>Alamat:</strong><br>{{ $u->alamat ?? '-' }}
                          </div>
                          <div class="col-md-6 mb-2">
                            <strong>Desa:</strong><br>{{ $u->desa ?? '-' }}
                          </div>
                          <div class="col-md-6 mb-2">
                            <strong>Jumlah Karyawan Pria:</strong><br>{{ $u->jumlah_karyawan_pria ?? '-' }}
                          </div>
                          <div class="col-md-6 mb-2">
                            <strong>Jumlah Karyawan Wanita:</strong><br>{{ $u->jumlah_karyawan_wanita ?? '-' }}
                          </div>
                          <div class="col-md-6 mb-2">
                            <strong>Kode Pos:</strong><br>{{ $u->kodepos ?? '-' }}
                          </div>
                          <div class="col-md-6 mb-2">
                            <strong>No. Surat Ijin:</strong><br>{{ $u->no_surat_ijin ?? '-' }}
                          </div>
                          <div class="col-md-6 mb-2">
                            <strong>NPWP:</strong><br>{{ $u->NPWP ?? '-' }}
                          </div>
                          <div class="col-md-6 mb-2">
                            <strong>Sektor Usaha:</strong><br>{{ $u->umkm->SektorUsaha->nama ?? '-' }}
                          </div>
                          <div class="col-md-6 mb-2">
                            <strong>Skala Usaha:</strong><br>{{ $u->umkm->SkalaUsaha->nama ?? '-' }}
                          </div>
                          <div class="col-md-6 mb-2">
                            <strong>Bentuk Usaha:</strong><br>{{ $u->umkm->BentukUsaha->nama ?? '-' }}
                          </div>
                          <div class="col-md-6 mb-2">
                            <strong>Nama UMKM:</strong><br>{{ $u->umkm->nama_umkm ?? '-' }}
                          </div>
                          <div class="col-12 mt-3">
                            <strong>Deskripsi:</strong><br>{{ $u->umkm->deskripsi ?? '-' }}
                          </div>
                        </div>
                      </div>
                      
                      <div class="modal-footer">
                      <form action="{{ route('user.update', $u->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="nama" value="{{ $u->nama }}">
                        <input type="hidden" name="email" value="{{ $u->email }}">
                        <input type="hidden" name="password" value="{{ $u->password }}">
                        <input type="hidden" name="role" value="{{ $u->role }}">
                        <input type="hidden" name="status" value="approved">
                        <button type="submit" class="btn btn-success">Terima</button>
                    </form>
        <!-- <button type="button" class="btn btn-success" data-bs-dismiss="modal">Terima</button> -->
        <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tolak</button> -->
                        <form action="{{ route('user.destroy', $u->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menolak dan menghapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Tolak</button>
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
