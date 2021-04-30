<?php

namespace App\Http\Requests\Establishment;

use Illuminate\Foundation\Http\FormRequest;

class EstablishmentStoreRequest extends FormRequest
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
            'name' => ['required','unique:establishments'],
            'phone' => ['required'],
            'description' => ['required'],
            'delivery_time' => ['required'],
            'min_value' => ['required'],
            'picture' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
            'background_picture' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048']
        ];
    }
}
