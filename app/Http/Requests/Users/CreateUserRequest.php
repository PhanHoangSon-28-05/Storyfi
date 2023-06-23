<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'birthday' => 'required',
            'gender' => 'required',
            'phone' => 'required|unique:users,phone',
        ];
    }
}
