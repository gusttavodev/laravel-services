<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'         => 'required|string|max:255',
            'description'  => 'required|string|max:600',
            'price'        => 'required|numeric|min:0|max:1000',
            'priority'     => 'required|numeric|min:0|max:1000',
            'enable'       => 'required|boolean',
            'categories'   => 'required|min:3',
            'picture'      => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'additionals'  => 'nullable',
        ];
    }
}
