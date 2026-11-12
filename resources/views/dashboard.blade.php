@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <h1 class="mb-4">Dashboard</h1>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Judul Buku</h5>
                        <h2>{{ $totalBooks }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Stok Buku</h5>
                        <h2>{{ $totalStock }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Anggota</h5>
                        <h2>{{ $totalMembers }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Sedang Dipinjam</h5>
                        <h2>{{ $borrowedCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
