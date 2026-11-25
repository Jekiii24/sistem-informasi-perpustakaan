@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kategori</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection