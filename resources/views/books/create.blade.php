@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Tambah Buku</h1>
            <p class="page-head-sub">Daftarkan judul baru ke dalam koleksi.</p>
        </div>
    </div>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="form-shell">
        @csrf

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select id="category_id" name="category_id" class="form-select" required>
                <option value="">Pilih Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="row g-3">
            <div class="col-sm-7">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" id="isbn" name="isbn" class="form-control" required>
            </div>
            <div class="col-sm-5">
                <label for="stock" class="form-label">Stok</label>
                <input type="number" id="stock" name="stock" class="form-control" value="0" min="0" required>
            </div>
        </div>

        <div class="mb-3 mt-3">
            <label for="author" class="form-label">Pengarang</label>
            <input type="text" id="author" name="author" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="publisher" class="form-label">Penerbit</label>
            <input type="text" id="publisher" name="publisher" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea id="description" name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Foto Buku</label>
            <input type="file" id="cover_image" name="cover_image" class="form-control" accept="image/*">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection