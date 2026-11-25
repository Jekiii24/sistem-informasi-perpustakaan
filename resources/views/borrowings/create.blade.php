blade
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Peminjaman</h1>

    <form action="{{ route('borrowings.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Anggota</label>
            <select name="member_id" class="form-control" required>
                <option value="">Pilih Anggota</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->member_code }})</option>
                @endforeach
            </select>
        </div>

        <h4>Pilih Buku yang Dipinjam</h4>
        <div id="books-container">
            <div class="book-item mb-3">
                <div class="row">
                    <div class="col-md-8">
                        <label>Buku</label>
                        <select name="books[0][book_id]" class="form-control" required>
                            <option value="">Pilih Buku</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }} (Stok: {{ $book->stock }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Jumlah</label>
                        <input type="number" name="books[0][qty]" class="form-control" value="1" min="1" required>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger mt-4 remove-book">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-secondary mb-3" id="add-book">+ Tambah Buku</button>

        <hr>
        <button type="submit" class="btn btn-success">Simpan Peminjaman</button>
        <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Batal</a>
    </form>

    <script>
        let bookIndex = 1;
        document.getElementById('add-book').addEventListener('click', function() {
            const container = document.getElementById('books-container');
            const newItem = `
                <div class="book-item mb-3">
                    <div class="row">
                        <div class="col-md-8">
                            <select name="books[${bookIndex}][book_id]" class="form-control" required>
                                <option value="">Pilih Buku</option>
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }} (Stok: {{ $book->stock }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="books[${bookIndex}][qty]" class="form-control" value="1" min="1" required>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger remove-book">Hapus</button>
                        </div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', newItem);
            bookIndex++;
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-book')) {
                e.target.closest('.book-item').remove();
            }
        });
    </script>
</div>
@endsection