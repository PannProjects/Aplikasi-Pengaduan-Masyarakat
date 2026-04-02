<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-titanium-950 tracking-tight">
                {{ __('Detail Pengaduan') }}
            </h2>
            <a href="{{ route('pengaduan.index') }}" class="btn-secondary">Kembali</a>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2 space-y-6">
            <!-- Laporan Detail -->
            <div class="glass-panel p-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h3 class="text-xl font-semibold text-titanium-900">{{ $pengaduan->pelapor->nama }}</h3>
                        <p class="text-sm text-titanium-500">{{ \Carbon\Carbon::parse($pengaduan->tg_pengaduan)->format('l, d F Y') }}</p>
                    </div>
                    <div>
                        @if($pengaduan->status == '0')
                            <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-medium">Baru</span>
                        @elseif($pengaduan->status == 'proses')
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium">Proses</span>
                        @else
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">Selesai</span>
                        @endif
                    </div>
                </div>

                <div class="prose max-w-none text-titanium-700 bg-white/50 p-4 rounded-xl border border-titanium-100">
                    {{ $pengaduan->isi_laporan }}
                </div>

                @if($pengaduan->foto)
                    <div class="mt-6 border rounded-xl overflow-hidden shadow-sm">
                        <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Foto Bukti" class="w-full object-cover">
                    </div>
                @endif
            </div>

            <!-- List Tanggapan -->
            <div class="space-y-4">
                <h4 class="text-lg font-bold text-titanium-900 border-b pb-2">Tanggapan ({{ $pengaduan->tanggapans->count() }})</h4>
                @forelse($pengaduan->tanggapans as $tanggapan)
                    <div class="glass-panel p-5 border-l-4 border-l-titanium-500">
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold text-sm text-titanium-900">{{ $tanggapan->petugas->nama }} <span class="text-xs text-titanium-400">({{ ucfirst($tanggapan->petugas->level) }})</span></span>
                            <span class="text-xs text-titanium-500">{{ \Carbon\Carbon::parse($tanggapan->tg_tanggapan)->format('d/m/Y H:i') }}</span>
                        </div>
                        <p class="text-titanium-700 text-sm">{{ $tanggapan->isi_tanggapan }}</p>
                    </div>
                @empty
                    <p class="text-titanium-500 text-sm italic">Belum ada tanggapan.</p>
                @endforelse
            </div>
        </div>

        <!-- Form Tanggapan (Khusus Petugas/Admin) -->
        <div class="md:col-span-1">
            @if(auth()->user()->level !== 'masyarakat')
                <div class="glass-panel p-6 sticky top-6">
                    <h3 class="text-lg font-bold text-titanium-900 mb-4">Berikan Tanggapan</h3>
                    <form action="{{ route('tanggapan.store', $pengaduan->id) }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="tg_tanggapan" value="{{ date('Y-m-d') }}">
                        
                        <div>
                            <label class="block text-sm font-medium text-titanium-700 mb-1">Status Laporan</label>
                            <select name="status" class="input-field">
                                <option value="0" {{ $pengaduan->status == '0' ? 'selected' : '' }}>Baru</option>
                                <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-titanium-700 mb-1">Catatan Tanggapan</label>
                            <textarea name="isi_tanggapan" rows="4" class="input-field resize-none" required></textarea>
                        </div>

                        <button type="submit" class="btn-primary w-full text-sm">Kirim Tanggapan</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
