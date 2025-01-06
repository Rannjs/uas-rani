@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="text-align: center; font-family: serif;">Daftar Transaksi</h2>
    <a href="{{ route('transactions.create') }}" class="btn btn-sm mb-3" style="box-shadow: 12px 12px 5px rgba(0, 0, 255, .2);">
        Tambah Transaksi
    </a>

    <table class="table table-bordered table-hover text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Anggota</th>
                <th>Arisan</th>
                <th>Jumlah</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->member->name_members }}</td>
                    <td>{{ $transaction->arisan->name }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline;">
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
