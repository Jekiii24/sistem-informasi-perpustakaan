
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah Judul Buku</h5>
                    <h2>{{ $totalBooks }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Stok Buku</h5>
                    <h2>{{ $totalStock }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah Anggota</h5>
                    <h2>{{ $totalMembers }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Sedang Dipinjam</h5>
                    <h2>{{ $borrowedCount }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection