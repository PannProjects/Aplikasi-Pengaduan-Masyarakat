<x-guest-layout>
    <div class="glass-panel p-8 max-w-md w-full mx-auto" style="border-radius: 24px;">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-titanium-950 tracking-tight">Daftar Akun</h2>
            <p class="text-titanium-500 mt-2 text-sm">Buat akun untuk mengajukan keluhan</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- NIK -->
            <div>
                <label for="nik" class="block text-sm font-medium text-titanium-700 mb-2">NIK (16 Digit)</label>
                <input id="nik" class="input-field" type="text" name="nik" value="{{ old('nik') }}" required autofocus autocomplete="nik" maxlength="16" />
                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
            </div>

            <!-- Nama -->
            <div>
                <label for="nama" class="block text-sm font-medium text-titanium-700 mb-2">Nama Lengkap</label>
                <input id="nama" class="input-field" type="text" name="nama" value="{{ old('nama') }}" required autocomplete="name" />
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>

            <!-- Username -->
            <div>
                <label for="username" class="block text-sm font-medium text-titanium-700 mb-2">Nama Pengguna (Username)</label>
                <input id="username" class="input-field" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Email (Deleted in this system, replaced by telp) -->
            
            <!-- Telp -->
            <div>
                <label for="telp" class="block text-sm font-medium text-titanium-700 mb-2">No. Telepon</label>
                <input id="telp" class="input-field" type="text" name="telp" value="{{ old('telp') }}" required autocomplete="tel" maxlength="13"/>
                <x-input-error :messages="$errors->get('telp')" class="mt-2" />
            </div>

            <!-- Password -->
            <div x-data="{ showPassword: false }">
                <label for="password" class="block text-sm font-medium text-titanium-700 mb-2">Kata Sandi</label>
                <div class="relative">
                    <input id="password" class="input-field w-full pr-10" :type="showPassword ? 'text' : 'password'" name="password" required autocomplete="new-password" />
                    <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-titanium-400 hover:text-titanium-600 focus:outline-none">
                        <svg x-show="!showPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="showPassword" style="display: none;" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div x-data="{ showPasswordConfirm: false }">
                <label for="password_confirmation" class="block text-sm font-medium text-titanium-700 mb-2">Konfirmasi Kata Sandi</label>
                <div class="relative">
                    <input id="password_confirmation" class="input-field w-full pr-10" :type="showPasswordConfirm ? 'text' : 'password'" name="password_confirmation" required autocomplete="new-password" />
                    <button type="button" @click="showPasswordConfirm = !showPasswordConfirm" class="absolute inset-y-0 right-0 flex items-center pr-3 text-titanium-400 hover:text-titanium-600 focus:outline-none">
                        <svg x-show="!showPasswordConfirm" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="showPasswordConfirm" style="display: none;" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between pt-4">
                <a class="underline text-sm text-titanium-500 hover:text-titanium-900 rounded-md focus:outline-none" href="{{ route('login') }}">
                    Sudah terdaftar?
                </a>

                <button type="submit" class="btn-primary">
                    Daftar
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
