<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => 'required',
            'nama_lengkap' => 'required',
            'tanggal_lahir' => 'required|date',
            'password' => 'required',
        ];
    }
}
