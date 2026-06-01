<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORM LOGIN
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        return view('auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN
    |--------------------------------------------------------------------------
    */

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([

            'email' => ['required', 'email'],

            'password' => ['required'],

        ]);

        // LOGIN
        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect('/dashboard');
        }

        // JIKA GAGAL
        return back()->with(

            'error',

            'Email atau Password salah'

        );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM REGISTER
    |--------------------------------------------------------------------------
    */

    public function register()
    {
        return view('auth.register');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES REGISTER
    |--------------------------------------------------------------------------
    */

    public function storeRegister(Request $request)
{
    // VALIDASI
    $request->validate([

        'name' => 'required',

        'nim' => 'required',

        'prodi' => 'required',

        'no_hp' => 'required',

        'email' => [
            'required',
            'email',
            'unique:users',
            'regex:/^[A-Za-z0-9._%+-]+@untad\.ac\.id$/'
        ],

        'password' => 'required|confirmed|min:6',

    ], [

        'email.regex' => 'Gunakan email kampus Untad (@untad.ac.id)',

    ]);

    // SIMPAN USER
    User::create([

        'name' => $request->name,

        'nim' => $request->nim,

        'prodi' => $request->prodi,

        'no_hp' => $request->no_hp,

        'email' => $request->email,

        'password' => Hash::make(
            $request->password
        ),

        'role' => 'user'

    ]);

    return redirect('/login')
        ->with(
            'success',
            'Register berhasil'
        );
}
    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
