@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="text-align: center; font-family: serif;">Daftar Anggota</h2>
    <a href="{{ route('members.create') }}">
        <button class="btn btn-sm mb-3" style="box-shadow: 12px 12px 5px rgba(0, 0, 255, .2);">
            Tambah Anggota
        </button>
    </a>

    <table class="table table-bordered table-hover text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th style="width: 5%;">ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th style="width: 10%;">EDIT</th>
                <th style="width: 10%;">DELETE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name_members }}</td>
                    <td>{{ $member->email_members }}</td>
                    <td>{{ $member->phone_members }}</td>
                    <td>{{ $member->address_members }}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('members.edit', $member->id) }}">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
