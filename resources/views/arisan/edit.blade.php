@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="text-align: center; font-family: serif;">Edit Data Arisan</h2>

    <form action="{{ route('arisan.update', $arisan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Arisan</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $arisan->name }}" required>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $arisan->start_date }}" required>
        </div>

        <div class="mb-3">
            <label for="total_members" class="form-label">Total Anggota</label>
            <input type="number" name="total_members" id="total_members" class="form-control" value="{{ $arisan->total_members }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
