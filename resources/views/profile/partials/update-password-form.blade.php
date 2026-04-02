<section>
    <header>
        <h2 class="text-xl font-bold text-titanium-900">
            Perbarui Kata Sandi
        </h2>

        <p class="mt-1 text-sm text-titanium-500">
            Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-titanium-700 mb-2">Kata Sandi Saat Ini</label>
            <input id="update_password_current_password" name="current_password" type="password" class="input-field" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-medium text-titanium-700 mb-2">Kata Sandi Baru</label>
            <input id="update_password_password" name="password" type="password" class="input-field" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-titanium-700 mb-2">Konfirmasi Kata Sandi</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="input-field" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button class="btn-primary">Simpan Sandi</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-medium"
                >Berhasil diperbarui.</p>
            @endif
        </div>
    </form>
</section>
