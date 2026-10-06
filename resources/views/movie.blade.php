@extends('layouts.main')
@section('title', 'Movie')
@section('content')
<div class="container-fluid p-0">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-lg mb-4" style="background: rgba(16, 185, 129, 0.2); border-left: 4px solid #10b981 !important; color: #34d399;" role="alert">
            <i class="bi bi-check-circle-fill mr-2"></i> {{ session('success') }}
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card card-custom">
        <div class="card-header">
            <div class="d-flex align-items-center gap-3">
                <div class="p-2 rounded-circle" style="background: rgba(99, 102, 241, 0.15); color: #818cf8;">
                    <i class="bi bi-film fs-4"></i>
                </div>
                <div>
                    <h5 class="mb-0 text-white font-weight-bold">Data Movie</h5>
                    <small class="text-muted">Kelola koleksi film yang terdaftar dalam database</small>
                </div>
            </div>
            
            <button type="button" class="btn btn-primary font-weight-bold px-3" style="background: var(--accent-gradient); border: none; border-radius: 10px;" data-toggle="modal" data-target="#addMovieModal">
                <i class="bi bi-plus-square mr-1"></i> Tambah Movie
            </button>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="example" class="table table-hover align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>imDB</th>
                            <th>Title</th>
                            <th>Year</th>
                            <th>Genre</th>
                            <th>Poster</th>
                            <th style="width: 80px;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mv as $idx => $m)
                        <tr>
                            <td class="font-weight-bold text-muted">{{ $idx + 1 }}</td>
                            <td><span class="badge badge-dark p-2" style="background: #1e293b; color: #fbbf24; font-size: 0.85rem;"><i class="bi bi-star-fill text-warning mr-1"></i> {{ $m->imDB }}</span></td>
                            <td><span class="font-weight-bold text-white fs-6">{{ $m->title }}</span></td>
                            <td><span class="badge badge-secondary p-2" style="background: rgba(255,255,255,0.08);">{{ $m->year }}</span></td>
                            <td><span class="badge p-2" style="background: rgba(99, 102, 241, 0.2); color: #a5b4fc;">{{ $m->genre }}</span></td>
                            <td>
                                @if(Str::startsWith($m->poster, 'http'))
                                    <img src="{{ $m->poster }}" alt="{{ $m->title }}" class="rounded shadow-sm" style="width: 45px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded d-flex align-items-center justify-content-center" style="width: 45px; height: 60px; background: #1e293b; border: 1px solid var(--border-color); color: #818cf8;">
                                            <i class="bi bi-image"></i>
                                        </div>
                                        <small class="text-muted">{{ $m->poster }}</small>
                                    </div>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="/movie/delete/{{ $m->id }}" onclick="return confirm('Apakah Anda yakin ingin menghapus film ini?')" class="btn btn-sm btn-outline-danger border-0 rounded-circle p-2" title="Hapus">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Movie -->
<div class="modal fade" id="addMovieModal" tabindex="-1" role="dialog" aria-labelledby="addMovieModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background: var(--bg-card); border: 1px solid var(--border-color); color: var(--text-main); border-radius: 16px;">
            <div class="modal-header border-bottom border-secondary">
                <h5 class="modal-title font-weight-bold" id="addMovieModalLabel"><i class="bi bi-plus-circle text-indigo mr-2"></i> Tambah Movie Baru</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/movie/store" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="form-group mb-3">
                        <label class="font-weight-semibold text-muted">ID imDB</label>
                        <input type="number" class="form-control" style="background: #0f1623; border: 1px solid var(--border-color); color: #fff;" name="imDB" placeholder="Contoh: 111555" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-semibold text-muted">Judul Film (Title)</label>
                        <input type="text" class="form-control" style="background: #0f1623; border: 1px solid var(--border-color); color: #fff;" name="title" placeholder="Contoh: Kuyang" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-3">
                            <label class="font-weight-semibold text-muted">Tahun (Year)</label>
                            <input type="number" class="form-control" style="background: #0f1623; border: 1px solid var(--border-color); color: #fff;" name="year" placeholder="2024" required>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="font-weight-semibold text-muted">Genre</label>
                            <input type="text" class="form-control" style="background: #0f1623; border: 1px solid var(--border-color); color: #fff;" name="genre" placeholder="Horor / Action / Sci-Fi" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-semibold text-muted">URL Poster / Filename</label>
                        <input type="text" class="form-control" style="background: #0f1623; border: 1px solid var(--border-color); color: #fff;" name="poster" placeholder="https://... atau kuyang.png">
                    </div>
                </div>
                <div class="modal-footer border-top border-secondary">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" style="background: var(--accent-gradient); border: none;">Simpan Film</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "search": "Cari Movie:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Tidak ada movie yang ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data tersedia",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Lanjut",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>
@endsection
