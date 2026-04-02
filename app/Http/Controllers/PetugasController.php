<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PetugasController extends Controller
{
    public function index(Request $request)
    {
        // Hanya admin yang umumnya kelola semua petugas, tapi kita akan perbolehkan admin
        $petugas = Petugas::latest()->paginate(10);
        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'string', 'max:16', 'unique:petugas'],
            'nama' => ['required', 'string', 'max:35'],
            'username' => ['required', 'string', 'max:25', 'unique:petugas'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telp' => ['required', 'string', 'max:14'],
            'level' => ['required', 'in:admin,petugas,masyarakat'],
        ]);

        Petugas::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'level' => $request->level,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil ditambahkan.');
    }

    public function edit(Petugas $petuga)
    {
        return view('petugas.edit', compact('petuga'));
    }

    public function update(Request $request, Petugas $petuga)
    {
        $request->validate([
            'nik' => ['required', 'string', 'max:16', Rule::unique('petugas')->ignore($petuga->id)],
            'nama' => ['required', 'string', 'max:35'],
            'username' => ['required', 'string', 'max:25', Rule::unique('petugas')->ignore($petuga->id)],
            'telp' => ['required', 'string', 'max:14'],
            'level' => ['required', 'in:admin,petugas,masyarakat'],
        ]);

        $data = $request->only(['nik', 'nama', 'username', 'telp', 'level']);
        
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $petuga->update($data);

        return redirect()->route('petugas.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Request $request, Petugas $petuga)
    {
        if ($request->user()->id === $petuga->id) {
            return redirect()->back()->withErrors(['error' => 'Anda tidak dapat menghapus akun Anda sendiri.']);
        }

        $petuga->delete();
        return redirect()->route('petugas.index')->with('success', 'Data berhasil dihapus.');
    }
}
