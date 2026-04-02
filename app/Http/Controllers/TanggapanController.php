<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function store(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'tg_tanggapan' => ['required', 'date'],
            'isi_tanggapan' => ['required', 'string'],
        ]);

        Tanggapan::create([
            'tg_tanggapan' => $request->tg_tanggapan,
            'isi_tanggapan' => $request->isi_tanggapan,
            'pengaduan_id' => $pengaduan->id,
            'petugas_id' => $request->user()->id,
        ]);

        // Opsional: Update status pengaduan menjadi proses atau selesai tergantung pilihan form
        if ($request->has('status') && in_array($request->status, ['proses', 'selesai'])) {
            $pengaduan->update(['status' => $request->status]);
        }

        return redirect()->route('pengaduan.show', $pengaduan->id)->with('success', 'Tanggapan berhasil ditambahkan.');
    }
}
