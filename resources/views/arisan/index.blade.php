@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="text-align: center; font-family: serif;">Daftar Arisan</h2>
    <a href="{{ route('arisan.create') }}">
        <button class="btn btn-sm mb-3" style="box-shadow: 12px 12px 5px rgba(0, 0, 255, .2);">
            Tambah Data Arisan
        </button>
    </a>

    <table class="table table-bordered table-hover text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tanggal Mulai</th>
                <th>Total Anggota</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($arisans as $arisan)
                <tr>
                    <td>{{ $arisan->id }}</td>
                    <td>{{ $arisan->name }}</td>
                    <td>{{ $arisan->start_date }}</td>
                    <td>{{ $arisan->total_members }}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('arisan.edit', $arisan->id) }}">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('arisan.destroy', $arisan->id) }}" method="POST" style="display: inline;">
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
