<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function do_register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'min:8'],
            'email' => 'required|email|unique:users',
            'nohp' => ['required', 'unique:users', 'min:10'],
            'password' => 'required|min:6'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = "user";
        $user = User::create($validatedData);
        $user->assignRole('user');

        Alert::success('Success', 'Anda berhasil melakukan registrasi');


        return redirect('/login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function do_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|exists:users,email|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('success', 'Anda berhasil masuk');
            return redirect('login');
        } else {
            Alert::error('Error', 'Kata sandi yang anda masukkan salah');
            return back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
