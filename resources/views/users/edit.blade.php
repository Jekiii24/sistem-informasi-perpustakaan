@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Edit User</h1>
            <p class="page-head-sub">Perbarui data akun {{ $user->name }}.</p>
        </div>
    </div>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="form-shell">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select id="role" name="role" class="form-select" required>
                <option value="admin" @selected($user->role === 'admin')>Admin</option>
                <option value="petugas" @selected($user->role === 'petugas')>Petugas</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection