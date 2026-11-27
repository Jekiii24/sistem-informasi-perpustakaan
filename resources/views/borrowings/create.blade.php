@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Buat Transaksi Peminjaman</h1>
            <p class="page-head-sub">Pilih anggota dan judul buku yang dipinjam.</p>
        </div>
    </div>

    <form action="{{ route('borrowings.store') }}" method="POST" class="form-shell" style="max-width: 860px;">
        @csrf

        <div class="mb-4">
            <label for="member_id" class="form-label">Anggota</label>
            <select id="member_id" name="member_id" class="form-select" required>
                <option value="">Pilih Anggota</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->member_code }})</option>
                @endforeach
            </select>
        </div>

        <h3 class="section-title">Pilih Buku</h3>

        <div id="books-container">
            <div class="book-item">
                <div class="row g-2 align-items-end">
                    <div class="col-md-7">
                        <label class="form-label">Buku</label>
                        <select name="books[0][book_id]" class="form-select" required>
                            <option value="">Pilih Buku</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }} (Stok: {{ $book->stock }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Jumlah</label>
                        <input type="number" name="books[0][qty]" class="form-control" value="1" min="1" required>
                    </div>
                    <div class="col-md-2 text-end">
                        <button type="button" class="btn btn-outline-secondary w-100 remove-book">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-book">+ Tambah Item Buku</button>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Simpan Peminjaman</button>
            <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>

    <script>
        let bookIndex = 1;
        document.getElementById('add-book').addEventListener('click', function() {
            const container = document.getElementById('books-container');
            const newItem = `
                <div class="book-item">
                    <div class="row g-2 align-items-end">
                        <div class="col-md-7">
                            <label class="form-label">Buku</label>
                            <select name="books[${bookIndex}][book_id]" class="form-select" required>
                                <option value="">Pilih Buku</option>
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }} (Stok: {{ $book->stock }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="books[${bookIndex}][qty]" class="form-control" value="1" min="1" required>
                        </div>
                        <div class="col-md-2 text-end">
                            <button type="button" class="btn btn-outline-secondary w-100 remove-book">Hapus</button>
                        </div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', newItem);
            bookIndex++;
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-book')) {
                const items = document.querySelectorAll('.book-item');
                if (items.length > 1) {
                    e.target.closest('.book-item').remove();
                } else {
                    alert('Peminjaman minimal harus berisi 1 buku.');
                }
            }
        });
    </script>
@endsection