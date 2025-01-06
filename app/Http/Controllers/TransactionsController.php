<?php

namespace App\Http\Controllers;

use App\Models\Transactions; // Pastikan nama model benar
use App\Models\Members;
use App\Models\Arisan;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    // Menampilkan semua transaksi
    public function index()
{
    // Ambil semua data transaksi dengan relasi member dan arisan
    $transactions = Transactions::with(['member', 'arisan'])->get(); // Menggunakan 'member', bukan 'members'

    return view('transactions.index', compact('transactions'));
}


    // Menampilkan form tambah transaksi
    public function create()
    {
        // Ambil semua anggota dan arisan
        $members = Members::all();
        $arisan = Arisan::all(); // Menggunakan variabel $arisan tanpa huruf 's'

        return view('transactions.create', compact('members', 'arisan'));
    }

    // Menyimpan data transaksi
    public function store(Request $request)
    {
        $request->validate([
            'members_id' => 'required|exists:tb_members,id',
            'arisan_id' => 'required|exists:tb_arisan,id',
            'amount' => 'required|numeric|min:0',
        ]);

        // Simpan transaksi baru
        Transactions::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function edit($id)
{
    // Ambil data transaksi yang akan diedit
    $transaction = Transactions::findOrFail($id); // Pastikan variabel yang diteruskan adalah $transaction
    $members = Members::all();
    $arisan = Arisan::all();

    // Kirimkan data ke view dengan nama variabel 'transaction'
    return view('transactions.edit', compact('transaction', 'members', 'arisan'));
}

public function update(Request $request, $id)
{
    // Validasi data yang diterima
    $request->validate([
        'members_id' => 'required|exists:tb_members,id',
        'arisan_id' => 'required|exists:tb_arisan,id',
        'amount' => 'required|numeric|min:0',
    ]);

    // Temukan transaksi yang akan diperbarui
    $transaction = Transactions::findOrFail($id);

    // Perbarui transaksi
    $transaction->update($request->all());

    // Redirect ke halaman transaksi dengan pesan sukses
    return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui');
}

    // Menghapus transaksi
    public function destroy($id)
    {
        // Hapus transaksi
        $transactions = Transactions::findOrFail($id);
        $transactions->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
