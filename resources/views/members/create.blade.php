@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Tambah Anggota</h1>
            <p class="page-head-sub">Daftarkan anggota baru perpustakaan.</p>
        </div>
    </div>

    <form action="{{ route('members.store') }}" method="POST" class="form-shell">
        @csrf

        <div class="row g-3">
            <div class="col-sm-5">
                <label for="member_code" class="form-label">Kode Anggota</label>
                <input type="text" id="member_code" name="member_code" class="form-control" required>
            </div>
            <div class="col-sm-7">
                <label for="name" class="form-label">Nama</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
        </div>

        <div class="row g-3 mt-0">
            <div class="col-sm-7">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="col-sm-5">
                <label for="phone" class="form-label">Telepon</label>
                <input type="text" id="phone" name="phone" class="form-control">
            </div>
        </div>

        <div class="mb-3 mt-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea id="address" name="address" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('members.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection