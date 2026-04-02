<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-titanium-950 tracking-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="space-y-6">
        <!-- Widget Counts -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="glass-panel p-6 flex flex-col justify-center relative overflow-hidden group">
                <div class="text-titanium-500 text-sm font-medium mb-1">Total Laporan</div>
                <div class="text-4xl font-bold text-titanium-950">{{ $stats['total'] }}</div>
                <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-titanium-100 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
            </div>
            
            <div class="glass-panel p-6 flex flex-col justify-center relative overflow-hidden group">
                <div class="text-titanium-500 text-sm font-medium mb-1">Status Baru</div>
                <div class="text-4xl font-bold text-red-600">{{ $stats['baru'] }}</div>
                <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-red-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
            </div>

            <div class="glass-panel p-6 flex flex-col justify-center relative overflow-hidden group">
                <div class="text-titanium-500 text-sm font-medium mb-1">Sedang Diproses</div>
                <div class="text-4xl font-bold text-yellow-600">{{ $stats['proses'] }}</div>
                <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-yellow-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
            </div>

            <div class="glass-panel p-6 flex flex-col justify-center relative overflow-hidden group">
                <div class="text-titanium-500 text-sm font-medium mb-1">Selesai</div>
                <div class="text-4xl font-bold text-green-600">{{ $stats['selesai'] }}</div>
                <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-green-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="glass-panel p-6 mt-8">
            <h3 class="text-lg font-semibold text-titanium-900 mb-6">Statistik Pengaduan</h3>
            <div class="relative h-72 w-full">
                <canvas id="pengaduanChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Chart Configuration -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('pengaduanChart').getContext('2d');
            const dataStats = {
                baru: {{ $stats['baru'] }},
                proses: {{ $stats['proses'] }},
                selesai: {{ $stats['selesai'] }}
            };

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Baru', 'Proses', 'Selesai'],
                    datasets: [{
                        label: 'Jumlah Pengaduan',
                        data: [dataStats.baru, dataStats.proses, dataStats.selesai],
                        backgroundColor: [
                            '#ef4444', // red-500
                            '#eab308', // yellow-500
                            '#22c55e'  // green-500
                        ],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '75%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                font: {
                                    family: "'Inter', sans-serif",
                                    size: 14
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
