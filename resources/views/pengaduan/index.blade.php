<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-titanium-950 tracking-tight">
                {{ __('Daftar Pengaduan') }}
            </h2>
            @can('is-masyarakat')
                <a href="{{ route('pengaduan.create') }}" class="btn-primary">
                    + Buat Pengaduan
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="glass-panel overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-titanium-50/50 text-titanium-500 text-sm border-b border-titanium-100">
                        <th class="px-6 py-4 font-medium">Tanggal</th>
                        <th class="px-6 py-4 font-medium">Pelapor</th>
                        <th class="px-6 py-4 font-medium">Isi Laporan</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                        <th class="px-6 py-4 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-titanium-100">
                    @forelse ($pengaduans as $item)
                        <tr class="hover:bg-titanium-50/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-titanium-700">
                                {{ \Carbon\Carbon::parse($item->tg_pengaduan)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-titanium-900 font-medium">
                                {{ $item->pelapor->nama ?? 'Tidak diketahui' }}
                            </td>
                            <td class="px-6 py-4 text-titanium-600 max-w-xs truncate">
                                {{ $item->isi_laporan }}
                            </td>
                            <td class="px-6 py-4">
                                @if($item->status == '0')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Baru
                                    </span>
                                @elseif($item->status == 'proses')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Proses
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Selesai
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('pengaduan.show', $item->id) }}" class="text-titanium-500 hover:text-titanium-900 font-medium text-sm transition-colors">Detail</a>
                                
                                @if(auth()->user()->level == 'masyarakat' && $item->status == '0' && $item->tanggapans->count() == 0)
                                    <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-medium text-sm transition-colors ml-2">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-titanium-500">
                                Belum ada data pengaduan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($pengaduans->hasPages())
            <div class="px-6 py-4 border-t border-titanium-100 bg-white/30">
                {{ $pengaduans->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
