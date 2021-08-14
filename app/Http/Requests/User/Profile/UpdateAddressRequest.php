<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'zip_code' => 'required|min:3|max:255',
            'street'   => 'required|min:3|max:655',
            'city'     => 'required|min:3|max:255',
            'country'  => 'required|min:3|max:255',
            'district' => 'required|min:3|max:655',
            'state'    => 'required|max:255',
            'number'   => 'required|max:255',
        ];
    }
}
