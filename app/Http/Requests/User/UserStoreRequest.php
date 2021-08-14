<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'             => 'required|string',
            'email'            => 'required|email|unique:users,email',
            'password'         => 'required|string|min:8|max:30',
            'confirm_password' => 'required|same:password|min:8|max:30',
            'picture'          => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // 'password' => 'required|string|min:8|max:30|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/',
            // 'confirm_password' => 'required|same:password|min:8|max:30|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/'
        ];
    }
}
