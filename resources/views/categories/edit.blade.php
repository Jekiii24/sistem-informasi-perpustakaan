@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Edit Kategori</h1>
            <p class="page-head-sub">Perbarui klasifikasi {{ $category->name }}.</p>
        </div>
    </div>

    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="form-shell">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea id="description" name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection