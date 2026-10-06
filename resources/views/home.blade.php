@extends('layouts.main')
@section('title', 'Home')
@section('content')
<div class="container-fluid p-0">
    
    <!-- Hero Banner -->
    <div class="p-4 p-md-5 mb-4 rounded-3 text-white card-custom" style="background: linear-gradient(135deg, rgba(30, 41, 59, 0.9) 0%, rgba(15, 23, 42, 0.95) 100%), url('https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?auto=format&fit=crop&w=1200&q=80') center/cover;">
        <div class="col-md-8 p-0">
            <span class="badge badge-primary px-3 py-2 mb-3" style="background: var(--accent-gradient); font-size: 0.85rem;">Dashboard Web Movies</span>
            <h1 class="display-4 font-weight-bold mb-3 text-white">Selamat Datang di Web Movies</h1>
            <p class="lead text-muted mb-4">Platform manajemen koleksi film modern dan cepat. Kelola data movie, genre, kategori, dan pengguna dalam satu dashboard yang terintegrasi.</p>
            <a href="/movie" class="btn btn-primary btn-lg font-weight-bold px-4" style="background: var(--accent-gradient); border: none; border-radius: 12px;">
                <i class="bi bi-film mr-2"></i> Lihat Semua Movie
            </a>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3 mb-md-0">
            <div class="card-custom p-4 d-flex align-items-center flex-row gap-3">
                <div class="p-3 rounded-circle" style="background: rgba(99, 102, 241, 0.15); color: #818cf8;">
                    <i class="bi bi-film fs-2"></i>
                </div>
                <div>
                    <h3 class="font-weight-bold text-white mb-0">{{ $totalMovies ?? 0 }}</h3>
                    <span class="text-muted font-weight-medium">Total Film Terdaftar</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
            <div class="card-custom p-4 d-flex align-items-center flex-row gap-3">
                <div class="p-3 rounded-circle" style="background: rgba(16, 185, 129, 0.15); color: #34d399;">
                    <i class="bi bi-people-fill fs-2"></i>
                </div>
                <div>
                    <h3 class="font-weight-bold text-white mb-0">{{ $totalUsers ?? 0 }}</h3>
                    <span class="text-muted font-weight-medium">Total Pengguna (Users)</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-custom p-4 d-flex align-items-center flex-row gap-3">
                <div class="p-3 rounded-circle" style="background: rgba(245, 158, 11, 0.15); color: #fbbf24;">
                    <i class="bi bi-tags-fill fs-2"></i>
                </div>
                <div>
                    <h3 class="font-weight-bold text-white mb-0">{{ count($genresCount ?? []) }}</h3>
                    <span class="text-muted font-weight-medium">Kategori Genre</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Movies Grid -->
    <div class="card card-custom">
        <div class="card-header">
            <h5 class="mb-0 text-white font-weight-bold"><i class="bi bi-stars text-warning mr-2"></i> Koleksi Movie Terbaru</h5>
            <a href="/movie" class="btn btn-sm btn-outline-light rounded-pill px-3">Lihat Semua</a>
        </div>
        <div class="card-body p-4">
            <div class="row">
                @forelse($recentMovies as $m)
                <div class="col-md-4 col-lg-2 mb-4">
                    <div class="h-100 rounded-3 overflow-hidden shadow-lg border" style="background: #1e293b; border-color: var(--border-color) !important; transition: transform 0.2s ease;">
                        @if(Str::startsWith($m->poster, 'http'))
                            <img src="{{ $m->poster }}" class="w-100" style="height: 200px; object-fit: cover;" alt="{{ $m->title }}">
                        @else
                            <div class="w-100 d-flex align-items-center justify-content-center" style="height: 200px; background: #0f1623; color: #818cf8;">
                                <i class="bi bi-film fs-1"></i>
                            </div>
                        @endif
                        <div class="p-3">
                            <span class="badge badge-warning mb-1" style="font-size: 0.75rem;"><i class="bi bi-star-fill"></i> {{ $m->imDB }}</span>
                            <h6 class="font-weight-bold text-white text-truncate mb-1" title="{{ $m->title }}">{{ $m->title }}</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">{{ $m->year }}</small>
                                <span class="badge p-1" style="background: rgba(99, 102, 241, 0.2); color: #a5b4fc; font-size: 0.75rem;">{{ $m->genre }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-4 text-muted">
                    Belum ada data movie.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
