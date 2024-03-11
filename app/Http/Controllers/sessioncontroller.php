<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class sessioncontroller extends Controller
{
    public function index()
    {
        return view('layout.sesi.login');
    }
    public function login(Request $request)
    {
        Session::flash('email', $request->email); 
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request -> email,
            'password' => $request -> password,
        ];
        

        if (Auth::attempt($infologin)) {
            $user = Auth::user(); // Dapatkan objek pengguna yang berhasil login
        
            if ($user->level === 'admin') {
                return redirect('/admin'); // Redirect ke halaman admin jika peran adalah 'admin'
            }
        
            return redirect('/')->with('success', 'Berhasil login'); // Redirect ke halaman beranda untuk peran 'user'
        } else {
            return redirect('sesi')->withErrors('Username dan password yang dimasukkan tidak valid');
        }
        
        
    
    }

    function logout() {
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil logout');
    }
    
  
}
