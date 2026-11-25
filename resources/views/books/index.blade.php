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

    <div class="table-wrap">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td class="serif">{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category->name }}</td>
                        <td>{{ $book->stock }}</td>
                        <td class="text-end">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Detail</a>
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus buku ini?')">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center muted py-4">Belum ada buku.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $books->links() }}
    </div>
@endsection
