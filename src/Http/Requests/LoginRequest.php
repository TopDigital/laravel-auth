<?php

namespace TopDigital\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->guest();
    }

    public function rules()
    {
        return [
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }
}
