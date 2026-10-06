@extends('layouts.main')
@section('title', 'Kategori')
@section('content')
<div class="container-fluid p-0">
    <div class="card card-custom">
        <div class="card-header">
            <div class="d-flex align-items-center gap-3">
                <div class="p-2 rounded-circle" style="background: rgba(99, 102, 241, 0.15); color: #818cf8;">
                    <i class="bi bi-grid-fill fs-4"></i>
                </div>
                <div>
                    <h5 class="mb-0 text-white font-weight-bold">Data Kategori</h5>
                    <small class="text-muted">Statistik pembagian kategori film berdasarkan genre</small>
                </div>
            </div>
        </div>

        <div class="card-body p-4">
            <div class="row">
                @forelse($genresCount as $gc)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="p-4 rounded-3 d-flex align-items-center justify-content-between" style="background: #1e293b; border: 1px solid var(--border-color);">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 rounded-circle" style="background: rgba(99, 102, 241, 0.2); color: #a5b4fc;">
                                <i class="bi bi-collection-play fs-3"></i>
                            </div>
                            <div>
                                <h5 class="font-weight-bold text-white mb-0">{{ $gc->genre }}</h5>
                                <small class="text-muted">Kategori Film</small>
                            </div>
                        </div>
                        <span class="badge badge-primary px-3 py-2 font-weight-bold" style="background: var(--accent-gradient); font-size: 0.9rem;">
                            {{ $gc->total }} Movie
                        </span>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5 text-muted">
                    Belum ada kategori movie yang tersedia.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
