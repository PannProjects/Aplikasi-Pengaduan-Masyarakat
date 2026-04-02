<nav x-data="{ open: false }" class="bg-white/70 backdrop-blur-xl border-b border-white/50 shadow-sm sticky top-0 z-50 transition-all">
    <!-- Primary Navigation Menu -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-xl font-bold tracking-tight text-titanium-900 hover:opacity-80 transition-opacity">
                        <span class="bg-titanium-900 text-white px-2 py-1 rounded-lg mr-1 text-lg">P</span> 
                        Pengaduan
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-titanium-600 hover:text-titanium-950 hover:border-titanium-900 border-b-2 font-medium">
                        Beranda
                    </x-nav-link>
                    
                    <x-nav-link :href="route('pengaduan.index')" :active="request()->routeIs('pengaduan.*')" class="text-titanium-600 hover:text-titanium-950 border-b-2 font-medium {{ request()->routeIs('pengaduan.*') ? 'border-titanium-900 text-titanium-900' : 'border-transparent' }}">
                        Laporan
                    </x-nav-link>
                    
                    @can('is-admin')
                    <x-nav-link :href="route('petugas.index')" :active="request()->routeIs('petugas.*')" class="text-titanium-600 hover:text-titanium-950 border-b-2 font-medium {{ request()->routeIs('petugas.*') ? 'border-titanium-900 text-titanium-900' : 'border-transparent' }}">
                        Kelola Akun
                    </x-nav-link>
                    @endcan
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-xl text-titanium-700 bg-white/50 hover:bg-white hover:text-titanium-900 hover:shadow-sm focus:outline-none transition ease-in-out duration-150">
                            <div class="flex flex-col items-start mr-2">
                                <span class="font-bold leading-tight">{{ Auth::user()->nama }}</span>
                                <span class="text-[10px] text-titanium-400 font-mono uppercase tracking-widest">{{ Auth::user()->level }}</span>
                            </div>

                            <svg class="fill-current h-4 w-4 text-titanium-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-titanium-100 bg-titanium-50">
                            <p class="text-xs text-titanium-500 uppercase tracking-wider font-semibold mb-1">Masuk sebagai</p>
                            <p class="text-sm font-bold text-titanium-900 truncate">{{ Auth::user()->username }}</p>
                        </div>
                        
                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-titanium-50">
                            Pengaturan Profil
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-red-600 hover:bg-red-50">
                                Keluar Sesi
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-titanium-500 hover:text-titanium-900 hover:bg-white/80 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-b border-titanium-200 shadow-lg">
        <div class="pt-2 pb-3 space-y-1 px-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-xl">
                Beranda
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('pengaduan.index')" :active="request()->routeIs('pengaduan.*')" class="rounded-xl">
                Laporan
            </x-responsive-nav-link>
            @can('is-admin')
            <x-responsive-nav-link :href="route('petugas.index')" :active="request()->routeIs('petugas.*')" class="rounded-xl">
                Kelola Akun
            </x-responsive-nav-link>
            @endcan
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-titanium-100 bg-titanium-50">
            <div class="px-4 mb-3">
                <div class="font-bold text-base text-titanium-900">{{ Auth::user()->nama }}</div>
                <div class="font-medium text-xs text-titanium-500 font-mono uppercase">{{ Auth::user()->level }}</div>
            </div>

            <div class="space-y-1 px-2">
                <x-responsive-nav-link :href="route('profile.edit')" class="rounded-xl">
                    Pengaturan Profil
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="text-red-600 rounded-xl">
                        Keluar Sesi
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
