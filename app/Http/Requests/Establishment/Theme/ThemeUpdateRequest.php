<?php

namespace App\Http\Requests\Establishment\Theme;

use Illuminate\Foundation\Http\FormRequest;

class ThemeUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                     => ['required', 'string', 'max:255'],
            'colors'                   => ['required', 'array'],
        ];
    }
}
