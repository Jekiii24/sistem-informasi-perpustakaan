@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Buku</h1>

    @if(auth()->user()->role === 'admin')
        <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->category->name }}</td>
                <td>{{ $book->stock }}</td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Detail</a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $books->links() }}
</div>
@endsection