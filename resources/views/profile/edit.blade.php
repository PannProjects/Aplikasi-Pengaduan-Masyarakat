<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-titanium-950 tracking-tight">
            Pengaturan Profil
        </h2>
    </x-slot>

    <div class="space-y-6">
        <div class="glass-panel p-4 sm:p-8">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="glass-panel p-4 sm:p-8">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="glass-panel p-4 sm:p-8 border-red-200 bg-red-50/10">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
