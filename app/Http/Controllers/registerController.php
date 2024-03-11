<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function register(Request $request)
    {
        
        return view('layout.sesi.register',[
            "title" => "Register"
        ]);

        
    }

    public function registeraksi(Request $request)
{
    // Validasi data yang dikirimkan oleh formulir
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Simpan data pengguna ke dalam database
    $user = User::create([
        'name' => $request->name,
        'level' => $request->input('level', 'user'),
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Autentikasi pengguna setelah pendaftaran jika dibutuhkan
    Auth::login($user);

    // Redirect ke halaman setelah pendaftaran
    return redirect('sesi')->with('success', 'Pendaftaran berhasil!');
}


}
