<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', function () {
        $stats = [
            'baru' => \App\Models\Pengaduan::where('status', '0')->count(),
            'proses' => \App\Models\Pengaduan::where('status', 'proses')->count(),
            'selesai' => \App\Models\Pengaduan::where('status', 'selesai')->count(),
            'total' => \App\Models\Pengaduan::count(),
        ];
        return view('dashboard', compact('stats'));
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Pengaduan routes
    Route::resource('pengaduan', PengaduanController::class);

    // Tanggapan routes
    Route::post('pengaduan/{pengaduan}/tanggapan', [TanggapanController::class, 'store'])->name('tanggapan.store');

    // Petugas routes (Only Admin)
    Route::resource('petugas', PetugasController::class)->middleware('can:is-admin');
});

require __DIR__.'/auth.php';
