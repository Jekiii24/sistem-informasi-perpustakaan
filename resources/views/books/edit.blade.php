@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Edit Buku</h1>
            <p class="page-head-sub">Perbarui data koleksi {{ $book->title }}.</p>
        </div>
    </div>

    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="form-shell">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select id="category_id" name="category_id" class="form-select" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected($cat->id === $book->category_id)>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <div class="row g-3">
            <div class="col-sm-7">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" id="isbn" name="isbn" class="form-control" value="{{ $book->isbn }}" required>
            </div>
            <div class="col-sm-5">
                <label for="stock" class="form-label">Stok</label>
                <input type="number" id="stock" name="stock" class="form-control" value="{{ $book->stock }}" min="0" required>
            </div>
        </div>

        <div class="mb-3 mt-3">
            <label for="author" class="form-label">Pengarang</label>
            <input type="text" id="author" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>

        <div class="mb-3">
            <label for="publisher" class="form-label">Penerbit</label>
            <input type="text" id="publisher" name="publisher" class="form-control" value="{{ $book->publisher }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea id="description" name="description" class="form-control" rows="3">{{ $book->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Foto Buku</label>
            @if($book->cover_image)
                <div class="mb-2">
                    <img src="{{ Storage::url($book->cover_image) }}" alt="Cover {{ $book->title }}"
                        class="img-thumbnail" style="max-height: 160px;">
                </div>
            @endif
            <input type="file" id="cover_image" name="cover_image" class="form-control" accept="image/*">
            <div class="form-text">Biarkan kosong jika tidak ingin mengganti foto.</div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection