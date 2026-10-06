@extends('layouts.main')
@section('title', 'Genre')
@section('content')
<div class="container-fluid p-0">
    <div class="card card-custom">
        <div class="card-header">
            <div class="d-flex align-items-center gap-3">
                <div class="p-2 rounded-circle" style="background: rgba(99, 102, 241, 0.15); color: #818cf8;">
                    <i class="bi bi-tags-fill fs-4"></i>
                </div>
                <div>
                    <h5 class="mb-0 text-white font-weight-bold">Data Genre</h5>
                    <small class="text-muted">Daftar genre beserta rincian jumlah koleksi movie</small>
                </div>
            </div>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Genre</th>
                            <th>Jumlah Movie</th>
                            <th>Rilis Terbaru</th>
                            <th>Status Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($genres as $idx => $g)
                        <tr>
                            <td class="font-weight-bold text-muted">{{ $idx + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-bookmark-star text-indigo"></i>
                                    <span class="font-weight-bold text-white">{{ $g->genre }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge p-2" style="background: rgba(99, 102, 241, 0.2); color: #a5b4fc; font-size: 0.85rem;">
                                    {{ $g->total_movie }} Judul
                                </span>
                            </td>
                            <td>
                                <span class="badge badge-secondary p-2" style="background: rgba(255, 255, 255, 0.08);">
                                    {{ $g->latest_year }}
                                </span>
                            </td>
                            <td>
                                <span class="badge badge-success p-2" style="background: rgba(16, 185, 129, 0.2); color: #34d399;">
                                    <i class="bi bi-check-circle mr-1"></i> Aktif
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Belum ada genre movie.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
