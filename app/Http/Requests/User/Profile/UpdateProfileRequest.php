<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => [ 'required', Rule::unique('users')->ignore($this->user()->id)],
            'name' => ['required', 'min:3', 'max:255'],
            'phone' => ['required', 'min:3', 'max:255']
        ];
    }
}
