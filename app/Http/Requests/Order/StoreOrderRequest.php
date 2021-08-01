<?php

namespace App\Http\Requests\Order;

use App\Models\Order\Order;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'contact_phone' => 'required|min:3|max:255',
            'contact_name' => 'required|min:3|max:255',

            'delivery_mode' => [
               'required', Rule::in(array_keys(Order::DELIVERY_MODES))
            ],
           'payment_mode' => [
               'required', Rule::in(array_keys(Order::PAYMENT_MODES))
            ],

            'products'     => ['required', 'array', 'min:1'],
            'products.*.id'   => ['required', 'exists:products,id'],

            'address.zip_code' => 'required|min:3|max:255',
            'address.street' => 'required|min:3|max:655',
            'address.city' => 'required|min:3|max:255',
            'address.country' => 'required|min:3|max:255',
            'address.district' => 'required|min:3|max:655',
            'address.state' => 'required|max:255',
            'address.number' => 'required|max:255',
        ];
    }
}
