@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit User</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control" required>
                    <option value="admin" @selected($user->role === 'admin')>Admin</option>
                    <option value="petugas" @selected($user->role === 'petugas')>Petugas</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
