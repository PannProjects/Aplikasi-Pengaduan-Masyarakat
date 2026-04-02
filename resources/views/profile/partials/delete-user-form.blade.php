<section class="space-y-6">
    <header>
        <h2 class="text-xl font-bold text-red-600">
            Hapus Akun Anda
        </h2>

        <p class="mt-1 text-sm text-titanium-500">
            Setelah akun Anda dihapus, semua sumber daya dan data di dalamnya akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.
        </p>
    </header>

    <button
        class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-xl transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >Hapus Akun</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 glass-panel border-0">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-titanium-900">
                Apakah Anda yakin ingin menghapus akun Anda?
            </h2>

            <p class="mt-1 text-sm text-titanium-500">
                Setelah akun Anda dihapus, semua sumber daya dan data di dalamnya akan dihapus secara permanen. Masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.
            </p>

            <div class="mt-6">
                <label for="password" class="sr-only cursor-pointer">Kata Sandi</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="input-field"
                    placeholder="Kata Sandi"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" class="btn-secondary mr-3" x-on:click="$dispatch('close')">
                    Batal
                </button>

                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-xl transition duration-150 ease-in-out">
                    Ya, Hapus Akun Saya
                </button>
            </div>
        </form>
    </x-modal>
</section>
