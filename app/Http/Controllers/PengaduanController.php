<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        
        $query = Pengaduan::with('pelapor');

        if ($user->level === 'masyarakat') {
            $query->where('petugas_id', $user->id);
        } elseif ($user->level === 'petugas') {
            // Petugas melihat datanya sendiri & data masyarakat
            $query->whereHas('pelapor', function ($q) use ($user) {
                $q->where('level', 'masyarakat')
                  ->orWhere('id', $user->id);
            });
        }
        // Admin melihat semua (tidak ada where clause tambahan)

        $pengaduans = $query->latest()->paginate(10);
        return view('pengaduan.index', compact('pengaduans'));
    }

    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tg_pengaduan' => ['required', 'date'],
            'isi_laporan' => ['required', 'string'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:10240'],
        ]);

        $data = $request->only(['tg_pengaduan', 'isi_laporan']);
        $data['petugas_id'] = $request->user()->id;
        $data['status'] = '0';

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('pengaduan_fotos', 'public');
            $data['foto'] = $path;
        }

        Pengaduan::create($data);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function show(Pengaduan $pengaduan)
    {
        // Pengecekan otorisasi tambahan jika perlu
        $pengaduan->load(['tanggapans.petugas', 'pelapor']);
        return view('pengaduan.show', compact('pengaduan'));
    }

    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->tanggapans()->count() > 0) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus pengaduan karena sudah memiliki tanggapan.');
        }

        if ($pengaduan->foto && Storage::disk('public')->exists($pengaduan->foto)) {
            Storage::disk('public')->delete($pengaduan->foto);
        }

        $pengaduan->delete();

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }
}
