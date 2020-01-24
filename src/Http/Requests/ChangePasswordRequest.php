<?php

namespace TopDigital\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'password' => ['required', 'string', 'min:10'],
        ];
    }
}
