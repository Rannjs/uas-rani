<?php

namespace App\Http\Controllers;

use App\Models\Arisan;
use Illuminate\Http\Request;

class ArisanController extends Controller
{
    // Menampilkan semua data arisan
    public function index()
    {
        $arisans = Arisan::all();
        return view('arisan.index', compact('arisans'));
    }

    // Menampilkan form tambah data arisan
    public function create()
    {
        return view('arisan.create');
    }

    // Menyimpan data arisan baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'total_members' => 'required|integer|min:0',
        ]);

        Arisan::create($request->all());

        return redirect()->route('arisan.index')->with('success', 'Data arisan berhasil ditambahkan.');
    }

    // Menampilkan form edit data arisan
    public function edit($id)
    {
        $arisan = Arisan::findOrFail($id);
        return view('arisan.edit', compact('arisan'));
    }

    // Memperbarui data arisan
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'total_members' => 'required|integer|min:0',
        ]);

        $arisan = Arisan::findOrFail($id);
        $arisan->update($request->all());

        return redirect()->route('arisan.index')->with('success', 'Data arisan berhasil diperbarui.');
    }

    // Menghapus data arisan
    public function destroy($id)
    {
        $arisan = Arisan::findOrFail($id);
        $arisan->delete();

        return redirect()->route('arisan.index')->with('success', 'Data arisan berhasil dihapus.');
    }
}
