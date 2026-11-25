@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Peminjaman</h1>

    <div class="card mb-4">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <td><strong>Anggota</strong></td>
                    <td>{{ $borrowing->member->name }}</td>
                </tr>
                <tr>
                    <td><strong>Petugas</strong></td>
                    <td>{{ $borrowing->user->name }}</td>
                </tr>
                <tr>
                    <td><strong>Tanggal Pinjam</strong></td>
                    <td>{{ $borrowing->borrow_date->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Jatuh Tempo</strong></td>
                    <td>{{ $borrowing->due_date->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Tanggal Kembali</strong></td>
                    <td>{{ $borrowing->return_date ? $borrowing->return_date->format('d/m/Y') : '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Status</strong></td>
                    <td>
                        <span class="badge @if($borrowing->status === 'borrowed') bg-warning @else bg-success @endif">
                            {{ ucfirst($borrowing->status) }}
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <h3>Detail Buku</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Judul Buku</th>
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

    <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Kembali</a>
    @if($borrowing->status === 'borrowed' && in_array(auth()->user()->role, ['admin', 'petugas']))
        <a href="{{ route('borrowings.returnBook', $borrowing->id) }}" class="btn btn-success">Kembalikan</a>
    @endif
</div>
@endsection