<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-titanium-950 tracking-tight">
                {{ __('Buat Pengaduan') }}
            </h2>
            <a href="{{ route('pengaduan.index') }}" class="text-titanium-500 hover:text-titanium-900 font-medium">Batal & Kembali</a>
        </div>
    </x-slot>

    <div class="glass-panel p-6 max-w-2xl mx-auto">
        <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div>
                <label for="tg_pengaduan" class="block text-sm font-medium text-titanium-700 mb-2">Tanggal Kejadian</label>
                <input type="date" name="tg_pengaduan" id="tg_pengaduan" class="input-field" value="{{ old('tg_pengaduan', date('Y-m-d')) }}" required>
                @error('tg_pengaduan') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="isi_laporan" class="block text-sm font-medium text-titanium-700 mb-2">Isi Laporan / Pengaduan</label>
                <textarea name="isi_laporan" id="isi_laporan" rows="5" class="input-field resize-none" placeholder="Ceritakan detail kejadian secara jelas..." required>{{ old('isi_laporan') }}</textarea>
                @error('isi_laporan') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="foto" class="block text-sm font-medium text-titanium-700 mb-2">Lampiran Foto Bukti (Opsional)</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-titanium-200 border-dashed rounded-xl bg-white/50 hover:bg-white transition-colors cursor-pointer" onclick="document.getElementById('foto').click()">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-titanium-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-titanium-600 justify-center">
                            <label for="foto" class="relative cursor-pointer bg-white rounded-md font-medium text-titanium-900 focus-within:outline-none hover:text-black">
                                <span>Pilih Gambar</span>
                                <input id="foto" name="foto" type="file" class="sr-only" accept="image/*">
                            </label>
                            <p class="pl-1">atau drag and drop</p>
                        </div>
                        <p class="text-xs text-titanium-500">PNG, JPG, WEBP hingga 10MB</p>
                    </div>
                </div>
                @error('foto') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4">
                <button type="submit" class="btn-primary w-full text-center">Kirim Laporan</button>
            </div>
        </form>
    </div>
</x-app-layout>
