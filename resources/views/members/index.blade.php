@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Daftar Anggota</h1>
            <p class="page-head-sub">Kelola data anggota perpustakaan.</p>
        </div>
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('members.create') }}" class="btn btn-primary">Tambah Anggota</a>
        @endif
    </div>

    <div class="table-wrap">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Kode Anggota</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $member)
                    <tr>
                        <td class="serif">{{ $member->member_code }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->phone }}</td>
                        <td class="text-end">
                            <a href="{{ route('members.show', $member->id) }}" class="btn btn-info btn-sm">Detail</a>
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus anggota ini?')">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center muted py-4">Belum ada anggota.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $members->links() }}
    </div>
@endsection