<?php

namespace App\Http\Requests\Establishment\Address;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
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
            'zip_code' => 'required|min:3|max:255',
            'street' => 'required|min:3|max:655',
            'city' => 'required|min:3|max:255',
            'country' => 'required|min:3|max:255',
            'district' => 'required|min:3|max:655',
            'state' => 'required|max:255',
            'number' => 'required|max:255',
        ];
    }
}
