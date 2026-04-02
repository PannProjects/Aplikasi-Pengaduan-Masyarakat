<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Petugas;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('is-admin', function (Petugas $user) {
            return $user->level === 'admin';
        });

        Gate::define('is-petugas', function (Petugas $user) {
            return $user->level === 'petugas';
        });

        Gate::define('is-masyarakat', function (Petugas $user) {
            return $user->level === 'masyarakat';
        });
    }
}
