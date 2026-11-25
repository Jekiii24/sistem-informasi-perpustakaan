@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Peminjaman</h1>

    @if(in_array(auth()->user()->role, ['admin', 'petugas']))
        <a href="{{ route('borrowings.create') }}" class="btn btn-primary">Tambah Peminjaman</a>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Anggota</th>
                <th>Petugas</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Jatuh Tempo</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowings as $borrow)
            <tr>
                <td>{{ $borrow->member->name }}</td>
                <td>{{ $borrow->user->name }}</td>
                <td>{{ $borrow->borrow_date->format('d/m/Y') }}</td>
                <td>{{ $borrow->due_date->format('d/m/Y') }}</td>
                <td>
                    <span class="badge @if($borrow->status === 'borrowed') bg-warning @else bg-success @endif">
                        {{ ucfirst($borrow->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('borrowings.show', $borrow->id) }}" class="btn btn-info btn-sm">Detail</a>
                    @if($borrow->status === 'borrowed' && in_array(auth()->user()->role, ['admin', 'petugas']))
                        <a href="{{ route('borrowings.returnBook', $borrow->id) }}" class="btn btn-success btn-sm">Kembalikan</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $borrowings->links() }}
</div>
@endsection