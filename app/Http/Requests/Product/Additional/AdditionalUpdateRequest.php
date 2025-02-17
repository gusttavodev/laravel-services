<?php

namespace App\Http\Requests\Product\Additional;

use Illuminate\Foundation\Http\FormRequest;

class AdditionalUpdateRequest extends FormRequest
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
            'name'           => 'required',
            'price'          => 'required|numeric|min:0',
            'quantity_limit' => 'required|integer|digits_between:0,999',
            'products'       => 'required',
        ];
    }
}
