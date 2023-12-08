<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => 'required|unique:user',
            'password' => 'required',
            'konfirmasi_password' => 'required|same:password'
        ];
    }
}
