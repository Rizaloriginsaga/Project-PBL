<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => 'required',
            'nama_lengkap' => 'required',
            'tanggal_lahir' => 'date',
            'foto_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'tahun_angkatan' => (Auth::user()->role == 'mahasiswa') ? 'required' : '',
        ];
    }
}
