@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $book->title }}</h1>

    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <td><strong>ISBN</strong></td>
                    <td>{{ $book->isbn }}</td>
                </tr>
                <tr>
                    <td><strong>Pengarang</strong></td>
                    <td>{{ $book->author }}</td>
                </tr>
                <tr>
                    <td><strong>Penerbit</strong></td>
                    <td>{{ $book->publisher }}</td>
                </tr>
                <tr>
                    <td><strong>Kategori</strong></td>
                    <td>{{ $book->category->name }}</td>
                </tr>
                <tr>
                    <td><strong>Stok</strong></td>
                    <td>{{ $book->stock }}</td>
                </tr>
                <tr>
                    <td><strong>Deskripsi</strong></td>
                    <td>{{ $book->description }}</td>
                </tr>
            </table>
        </div>
    </div>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
    @endif
</div>
@endsection