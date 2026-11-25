@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Buku</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected($cat->id === $book->category_id)>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <div class="mb-3">
            <label>ISBN</label>
            <input type="text" name="isbn" class="form-control" value="{{ $book->isbn }}" required>
        </div>

        <div class="mb-3">
            <label>Pengarang</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>

        <div class="mb-3">
            <label>Penerbit</label>
            <input type="text" name="publisher" class="form-control" value="{{ $book->publisher }}" required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stock" class="form-control" value="{{ $book->stock }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ $book->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection