<?php

namespace TopDigital\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'login' => ['required', 'string'],
        ];
    }
}
