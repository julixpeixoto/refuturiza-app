<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required||max:255',
            'email' => 'required|max:255|email|unique:users,email',
            'github_url' => 'nullable|url',
            'admin' => 'nullable|boolean',
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password|min:8',
        ];
    }
}
