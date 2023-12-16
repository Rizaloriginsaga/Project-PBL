<?php

namespace App\Http\Controllers;

use App\Library\UploadImage;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Mahasiswa;
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
                return redirect()->intended('/');
            } else if ($user->role == 'mahasiswa') {
                return redirect()->intended('/');
            }
            return redirect()->intended('/');
        }
        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Username atau Password Salah']);
    }

    public function register_view(Request $request)
    {
        $link = $request->segment('2');
        if ($link == 'admin') {
            $route = 'register_admin';
        } else {
            $route = 'register_mahasiswa';
        }
        return view('auth.register', compact('route'));
    }


    public function register_admin(RegisterRequest $request)
    {
        $credential = $request->only('username', 'password');
        $request['role'] = 'admin';
        $request['password'] = bcrypt($request->password);
        User::create($request->except('konfirmasi_password'));
        if (Auth::attempt($credential)) {
            Auth::user();
            return redirect()->intended('/edit-profile');
        }
    }

    public function register_mahasiswa(RegisterRequest $request)
    {
        $credential = $request->only('username', 'password');
        $request['role'] = 'mahasiswa';
        $request['password'] = bcrypt($request->password);
        User::create($request->except('konfirmasi_password'));
        Mahasiswa::create(['nim' => $request->username, 'nama' => 'null', 'tahun_angkatan' => 'null']);
        if (Auth::attempt($credential)) {
            Auth::user();
            return redirect()->intended('/edit-profile');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }

    public function edit_profile_view()
    {
        $id = Auth::user()->id;
        $data = User::where('id', '=', $id)->firstOrFail();
        if (Auth::user()->role == 'mahasiswa') {
            $mahasiswa = Mahasiswa::where('nim', '=', $data->username)->firstOrFail();
            return view('auth.edit_profile', compact('data', 'mahasiswa'));
        }
        return view('auth.edit_profile', compact('data'));
    }

    public function edit_profile(EditProfileRequest $request)
    {
        $user = User::where('id', '=', Auth::user()->id)->firstOrFail();
        if (!empty($request->file('foto_profile'))) {
            $file = $request->file('foto_profile');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/foto-profile'), $fileName);
            $user->foto = $fileName;
        }
        $user->username = $request->username;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->tanggal_lahir = $request->tanggal_lahir;
        if ($request->passwrod != null) {
            $user->password = bcrypt($request->password);
        }
        $user->update();
        if (Auth::user()->role == 'mahasiswa') {
            $mahasiswa = Mahasiswa::where('nim', '=', $user->username)->firstOrFail();
            $mahasiswa->nama = $request->nama_lengkap;
            $mahasiswa->tahun_angkatan = $request->tahun_angkatan;
            $mahasiswa->update();
        }
        return redirect('/edit-profile')->with('success', 'Data berhasil diubah!');
    }
}
