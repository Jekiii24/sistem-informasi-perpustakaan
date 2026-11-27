@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Tambah Kategori</h1>
            <p class="page-head-sub">Tambahkan klasifikasi baru untuk koleksi.</p>
        </div>
    </div>

    <form action="{{ route('categories.store') }}" method="POST" class="form-shell">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea id="description" name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection