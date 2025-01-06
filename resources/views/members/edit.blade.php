@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="text-align: center; font-family: serif;">Edit Anggota</h2>

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name_members" class="form-label">Nama</label>
            <input type="text" name="name_members" id="name_members" class="form-control" value="{{ $member->name_members }}" required>
        </div>

        <div class="mb-3">
            <label for="email_members" class="form-label">Email</label>
            <input type="email" name="email_members" id="email_members" class="form-control" value="{{ $member->email_members }}" required>
        </div>

        <div class="mb-3">
            <label for="phone_members" class="form-label">Nomor Telepon</label>
            <input type="text" name="phone_members" id="phone_members" class="form-control" value="{{ $member->phone_members }}" required>
        </div>

        <div class="mb-3">
            <label for="address_members" class="form-label">Alamat</label>
            <input type="text" name="address_members" id="address_members" class="form-control" value="{{ $member->address_members }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
