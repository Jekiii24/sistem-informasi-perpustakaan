@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Dashboard</h1>
            <p class="page-head-sub">Ringkasan koleksi dan aktivitas perpustakaan.</p>
        </div>
        <div class="page-head-meta">{{ now()->translatedFormat('l, d F Y') }}</div>
    </div>

    <div class="dash-grid">
        <a href="{{ route('borrowings.index') }}" class="dash-feature">
            <span class="dash-feature-label">Sedang Dipinjam</span>
            <span class="dash-feature-value">{{ $borrowedCount }}</span>
            <span class="dash-feature-foot">
                @if($overdueCount > 0)
                    <span class="dash-feature-alert">{{ $overdueCount }} terlambat</span>
                @else
                    Semua tepat waktu
                @endif
                <span class="dash-feature-arrow">&rarr;</span>
            </span>
        </a>

        <div class="stat-card">
            <p class="stat-label">Judul Buku</p>
            <p class="stat-value">{{ $totalBooks }}</p>
        </div>
        <div class="stat-card stat-green">
            <p class="stat-label">Total Stok</p>
            <p class="stat-value">{{ $totalStock }}</p>
        </div>
        <div class="stat-card stat-wood">
            <p class="stat-label">Anggota</p>
            <p class="stat-value">{{ $totalMembers }}</p>
        </div>
    </div>

    <div class="dash-cols">
        <section class="dash-panel">
            <header class="dash-panel-head">
                <h2>Aktivitas Terbaru</h2>
                <a href="{{ route('borrowings.index') }}">Lihat semua</a>
            </header>
            <ul class="dash-list">
                @forelse($recentBorrowings as $borrow)
                    <li>
                        <a href="{{ route('borrowings.show', $borrow->id) }}" class="dash-list-item">
                            <span class="dash-list-main">
                                <span class="serif">{{ $borrow->member->name }}</span>
                                <span class="dash-list-sub">
                                    {{ $borrow->details->sum('qty') }} buku &middot;
                                    {{ $borrow->borrow_date->format('d/m/Y') }}
                                </span>
                            </span>
                            <span class="badge @if($borrow->status === 'borrowed') bg-warning @else bg-success @endif">
                                {{ ucfirst($borrow->status) }}
                            </span>
                        </a>
                    </li>
                @empty
                    <li class="dash-empty">Belum ada peminjaman.</li>
                @endforelse
            </ul>
        </section>

        <section class="dash-panel">
            <header class="dash-panel-head">
                <h2>Buku Terbaru</h2>
                <a href="{{ route('books.index') }}">Lihat semua</a>
            </header>
            <ul class="dash-list">
                @forelse($recentBooks as $book)
                    <li>
                        <a href="{{ route('books.show', $book->id) }}" class="dash-list-item">
                            <span class="dash-list-main">
                                <span class="serif">{{ $book->title }}</span>
                                <span class="dash-list-sub">{{ $book->author }} &middot; {{ $book->category->name }}</span>
                            </span>
                            <span class="dash-list-stock">{{ $book->stock }}</span>
                        </a>
                    </li>
                @empty
                    <li class="dash-empty">Belum ada buku.</li>
                @endforelse
            </ul>
        </section>
    </div>
@endsection
