<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nik' => ['required', 'string', 'max:16', 'unique:'.Petugas::class],
            'nama' => ['required', 'string', 'max:35'],
            'username' => ['required', 'string', 'max:25', 'unique:'.Petugas::class],
            'telp' => ['required', 'string', 'max:14'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $petugas = Petugas::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'telp' => $request->telp,
            'level' => 'masyarakat',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($petugas));

        Auth::login($petugas);

        return redirect(route('dashboard', absolute: false));
    }
}
