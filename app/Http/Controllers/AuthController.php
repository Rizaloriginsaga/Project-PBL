<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_view()
    {
        $user = Auth::user();
        if ($user != null) {
            if ($user->role == 'admin') {
                return redirect()->intended('/');
            } else if ($user->role == 'mahasiswa') {
                return redirect()->intended('/');
            }
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credential = $request->only('username', 'password');
        if (Auth::attempt($credential)) {
            $user =  Auth::user();
            if ($user->role == 'admin') {
                return redirect()->intended('admin');
            } else if ($user->role == 'mahasiswa') {
                return redirect()->intended('user');
            }
            return redirect()->intended('/');
        }
        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Username atau Password Salah']);
    }

    public function register_view()
    {
        return view('auth.register');
    }


    public function register(RegisterRequest $request)
    {
        $request['role'] = 'mahasiswa';
        $request['password'] = bcrypt($request->password);

        User::create($request->except('konfirmasi_password'));
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }

    public function edit_profile_view($username)
    {
        $user = User::where('username', '=', $username)->firstOrFail();
        return view('auth.edit_profile', compact('user'));
    }

    public function edit_profile(EditProfileRequest $request)
    {
        $data = $request->all();
        dd($data);
    }
}
