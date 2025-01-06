@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="text-align: center; font-family: serif;">Edit Transaksi</h2>

    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="members_id" class="form-label">Anggota</label>
            <select name="members_id" id="members_id" class="form-control" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" {{ $transaction->members_id == $member->id ? 'selected' : '' }}>
                        {{ $member->name_members }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="arisan_id" class="form-label">Arisan</label>
            <select name="arisan_id" id="arisan_id" class="form-control" required>
                <option value="">-- Pilih Arisan --</option>
                @foreach ($arisan as $item) <!-- Menggunakan variabel $arisan -->
                    <option value="{{ $item->id }}" {{ $transaction->arisan_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ $transaction->amount }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
