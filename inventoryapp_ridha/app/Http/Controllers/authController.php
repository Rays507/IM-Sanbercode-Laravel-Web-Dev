<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Users;


class authController extends Controller
{
    public function formLogin()
    {
        return view ('auth.login');
    }

    public function login(request $inputanRequest)
    {
        $credentials = $inputanRequest->validate([
            'email' => 'required|string|email',
            'password' => 'required'
        ],
        [
            "required"=>"inputan :attribute wajib diisi",
            "email"=>"inputan :attribute harus berupa email (ex. name@mail.com)"
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return back()->withErrors(['email' => 'Email belum terdaftar'])->onlyInput('email');
    }

    public function createAccount()
    {
        return view ('auth.createAccount');
    }

    public function signup(request $inputanUser)
    {
        $inputanUser->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],
        [
            "required"=>"inputan :attribute wajib diisi",
            "max"=>"inputan :attribute maximum :max karakter",
            "min"=>"inputan :attribute minimal :min karakter",
            "unique"=>"inputan :attribute sudah pernah terpakai",
            "email"=>"inputan :attribute harus berupa email (ex. name@mail.com)"
        ]);

        $cekAdmin = users::where('role', 'admin')->exists();
        if (!$cekAdmin) {
            $roleData = 'admin';
        } else {
            $roleData = 'staff';
        }


         users::create(
            [
                'name' => $inputanUser->input('name'),
                'email' => $inputanUser->input('email'),
                'password' => hash::make ($inputanUser->input('password')),
                'role' => $roleData
            ]
         );

        return redirect('/login')->with('success', 'Akun Berhasil Ditambahkan');


    }

    public function logout(request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
