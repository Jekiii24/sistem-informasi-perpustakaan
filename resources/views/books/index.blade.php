@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Daftar Buku</h1>
            <p class="page-head-sub">Koleksi judul, pengarang, dan ketersediaan stok.</p>
        </div>
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>
        @endif
    </div>

    <form action="{{ route('books.index') }}" method="GET" class="mb-3">
        <div class="input-group" style="max-width: 520px;">
            <input type="text" name="search" class="form-control" placeholder="Cari judul atau pengarang..."
                value="{{ request('search') }}" aria-label="Cari buku">
            <button type="submit" class="btn btn-primary">Cari</button>
            @if(request('search'))
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Reset</a>
            @endif
        </div>
    </form>

    <div class="book-grid">
        @forelse($books as $book)
            <div class="book-card">
                @if($book->cover_image)
                    <img src="{{ Storage::url($book->cover_image) }}" alt="Cover {{ $book->title }}" class="book-card-cover">
                @else
                    <div class="book-card-cover" style="display: flex; align-items: center; justify-content: center; background: var(--primary-soft); color: var(--ink-light); font-size: 0.85rem;">
                        Tidak ada cover
                    </div>
                @endif
                <div class="book-card-body">
                    <h3 class="book-card-title">{{ $book->title }}</h3>
                    <p class="book-card-author">{{ $book->author }}</p>
                    <div class="book-card-meta">
                        <span class="book-card-category">{{ $book->category->name }}</span>
                        <span class="book-card-stock">Stok: {{ $book->stock }}</span>
                    </div>
                    <div class="book-card-actions">
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Detail</a>
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus buku ini?')">Hapus</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 2rem; color: var(--ink-light);">
                Belum ada buku.
            </div>
        @endforelse
    </div>

    <div class="mt-3">
        {{ $books->links() }}
    </div>
@endsection
