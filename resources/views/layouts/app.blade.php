<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Layanan Pengaduan') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="font-sans text-titanium-950 bg-[#f6f6f7] antialiased">
        <div class="min-h-screen flex flex-col">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="pt-8 pb-4">
                    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-grow w-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <!-- Flash Messages -->
                @if (session('success'))
                    <div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="mb-6 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-xl shadow-sm">
                        {{ session('error') }}
                    </div>
                @endif
                
                {{ $slot }}
            </main>
            
            <footer class="py-6 text-center text-sm text-titanium-500">
                &copy; {{ date('Y') }} Layanan Pengaduan Masyarakat. All rights reserved.
            </footer>
        </div>
    </body>
</html>
