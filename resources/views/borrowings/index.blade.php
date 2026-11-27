@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Daftar Peminjaman</h1>
            <p class="page-head-sub">Transaksi peminjaman dan pengembalian koleksi.</p>
        </div>
        @if(in_array(auth()->user()->role, ['admin', 'petugas']))
            <a href="{{ route('borrowings.create') }}" class="btn btn-primary">Tambah Peminjaman</a>
        @endif
    </div>

    <div class="table-wrap">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Anggota</th>
                    <th>Petugas</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Jatuh Tempo</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($borrowings as $borrow)
                    <tr>
                        <td class="serif">{{ $borrow->member->name }}</td>
                        <td>{{ $borrow->user->name }}</td>
                        <td>{{ $borrow->borrow_date->format('d/m/Y') }}</td>
                        <td>{{ $borrow->due_date->format('d/m/Y') }}</td>
                        <td>
                            <span class="badge @if($borrow->status === 'borrowed') bg-warning @else bg-success @endif">
                                {{ ucfirst($borrow->status) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('borrowings.show', $borrow->id) }}" class="btn btn-info btn-sm">Detail</a>
                            @if($borrow->status === 'borrowed' && in_array(auth()->user()->role, ['admin', 'petugas']))
                                <a href="{{ route('borrowings.returnBook', $borrow->id) }}" class="btn btn-success btn-sm">Kembalikan</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center muted py-4">Belum ada peminjaman.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $borrowings->links() }}
    </div>
@endsection