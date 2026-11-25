@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Buku</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control" required>
                <option value="">Pilih Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>ISBN</label>
            <input type="text" name="isbn" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Pengarang</label>
            <input type="text" name="author" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Penerbit</label>
            <input type="text" name="publisher" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stock" class="form-control" value="0" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection