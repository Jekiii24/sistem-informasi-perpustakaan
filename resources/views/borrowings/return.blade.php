@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kembalikan Peminjaman</h1>

    <div class="alert alert-info">
        <p><strong>Anggota:</strong> {{ $borrowing->member->name }}</p>
        <p><strong>Tgl Pinjam:</strong> {{ $borrowing->borrow_date->format('d/m/Y') }}</p>
        <p><strong>Jatuh Tempo:</strong> {{ $borrowing->due_date->format('d/m/Y') }}</p>
    </div>

    <h3>Buku yang Dipinjam</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowing->details as $detail)
            <tr>
                <td>{{ $detail->book->title }}</td>
                <td>{{ $detail->qty }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('borrowings.storeReturn', $borrowing->id) }}" method="POST">
        @csrf

        <div class="alert alert-warning">
            <strong>Apakah Anda yakin semua buku sudah dikembalikan?</strong>
        </div>

        <button type="submit" class="btn btn-success">Konfirmasi Pengembalian</button>
        <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection