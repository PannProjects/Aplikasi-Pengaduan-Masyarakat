<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-titanium-950 tracking-tight">
                {{ __('Kelola Pengguna & Petugas') }}
            </h2>
        </div>
    </x-slot>

    <div class="glass-panel overflow-hidden mt-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-titanium-50/50 text-titanium-500 text-sm border-b border-titanium-100">
                        <th class="px-6 py-4 font-medium">NIK</th>
                        <th class="px-6 py-4 font-medium">Nama</th>
                        <th class="px-6 py-4 font-medium">Username</th>
                        <th class="px-6 py-4 font-medium">Level</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-titanium-100">
                    @forelse ($petugas as $item)
                        <tr class="hover:bg-titanium-50/50 transition-colors">
                            <td class="px-6 py-4 text-titanium-700 font-mono text-sm">
                                {{ $item->nik }}
                            </td>
                            <td class="px-6 py-4 text-titanium-900 font-medium">
                                {{ $item->nama }}
                            </td>
                            <td class="px-6 py-4 text-titanium-600">
                                {{ $item->username }}
                            </td>
                            <td class="px-6 py-4">
                                @if($item->level == 'admin')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">Admin</span>
                                @elseif($item->level == 'petugas')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Petugas</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Masyarakat</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-titanium-500">
                                Data belum tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($petugas->hasPages())
            <div class="px-6 py-4 border-t border-titanium-100 bg-white/30">
                {{ $petugas->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
