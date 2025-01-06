<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    // Menampilkan semua anggota
    public function index()
    {
        $members = Members::all();
        return view('members.index', compact('members'));
    }

    // Menampilkan form tambah anggota
    public function create()
    {
        return view('members.create');
    }

    // Menyimpan data anggota
    public function store(Request $request)
    {
        $request->validate([
            'name_members' => 'required|string|max:255',
            'email_members' => 'required|email|unique:tb_members,email_members',
            'phone_members' => 'required|string|max:15',
            'address_members' => 'required|string|max:255',
        ]);

        Members::create([
            'name_members' => $request->name_members,
            'email_members' => $request->email_members,
            'phone_members' => $request->phone_members,
            'address_members' => $request->address_members,
        ]);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan');
    }

    // Menampilkan form edit anggota
    public function edit($id)
    {
        $member = Members::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    // Memperbarui data anggota
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_members' => 'required|string|max:255',
            'email_members' => 'required|email|unique:tb_members,email_members,' . $id,
            'phone_members' => 'required|string|max:15',
            'address_members' => 'required|string|max:255',
        ]);

        $member = Members::findOrFail($id);
        $member->update([
            'name_members' => $request->name_members,
            'email_members' => $request->email_members,
            'phone_members' => $request->phone_members,
            'address_members' => $request->address_members,
        ]);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil diperbarui');
    }

    // Menghapus anggota
    public function destroy($id)
    {
        $member = Members::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus');
    }
}
