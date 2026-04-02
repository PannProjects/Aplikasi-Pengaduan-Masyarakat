<section>
    <header>
        <h2 class="text-xl font-bold text-titanium-900">
            Informasi Profil
        </h2>

        <p class="mt-1 text-sm text-titanium-500">
            Perbarui informasi nama, username, NIK, dan nomor telepon akun Anda.
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="nik" class="block text-sm font-medium text-titanium-700 mb-2">NIK (16 Digit)</label>
            <input id="nik" name="nik" type="text" class="input-field" value="{{ old('nik', $user->nik) }}" required autofocus autocomplete="nik" />
            <x-input-error class="mt-2" :messages="$errors->get('nik')" />
        </div>

        <div>
            <label for="nama" class="block text-sm font-medium text-titanium-700 mb-2">Nama Lengkap</label>
            <input id="nama" name="nama" type="text" class="input-field" value="{{ old('nama', $user->nama) }}" required autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
        </div>

        <div>
            <label for="username" class="block text-sm font-medium text-titanium-700 mb-2">Nama Pengguna (Username)</label>
            <input id="username" name="username" type="text" class="input-field" value="{{ old('username', $user->username) }}" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
            <label for="telp" class="block text-sm font-medium text-titanium-700 mb-2">Nomor Telepon</label>
            <input id="telp" name="telp" type="text" class="input-field" value="{{ old('telp', $user->telp) }}" required autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('telp')" />
        </div>

        <div class="flex items-center gap-4">
            <button class="btn-primary">Simpan</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-medium"
                >Berhasil disimpan.</p>
            @endif
        </div>
    </form>
</section>
