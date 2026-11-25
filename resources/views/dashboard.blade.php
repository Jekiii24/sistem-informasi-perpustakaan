@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Dashboard</h1>
            <p class="page-head-sub">Ringkasan koleksi dan aktivitas perpustakaan.</p>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card">
                <p class="stat-label">Jumlah Judul Buku</p>
                <p class="stat-value">{{ $totalBooks }}</p>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="stat-card stat-green">
                <p class="stat-label">Total Stok Buku</p>
                <p class="stat-value">{{ $totalStock }}</p>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="stat-card stat-wood">
                <p class="stat-label">Jumlah Anggota</p>
                <p class="stat-value">{{ $totalMembers }}</p>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="stat-card stat-stamp">
                <p class="stat-label">Sedang Dipinjam</p>
                <p class="stat-value">{{ $borrowedCount }}</p>
            </div>
        </div>
    </div>
@endsection
