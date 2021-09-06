<?php

namespace App\Http\Requests\Order;

use App\Models\Order\Order;
use App\Rules\ChangePriceRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'contact_phone.required' => 'Preencha o telefone de contato',
            'contact_name.required'  => 'Preencha o nome de contato',

            'zip_code.required' => 'Preencha o CEP',
            'street.required'   => 'Preencha a Rua',
            'city.required'     => 'Preencha a Cidade',
            'state.required'    => 'Preencha a Estado',
            'country.required'  => 'Preencha o Pais',
            'district.required' => 'Preencha o Bairro',
            'number.required'   => 'Preencha o Número',

            'delivery_mode.required' => 'Preencha a Forma de Entrega',
            'payment_mode.required'  => 'Preencha o Forma de pagamento',
        ];
    }

    public function rules()
    {
        return [
            'establishment_id' => 'required|exists:establishments,id',

            'need_change' => 'required',

            // TODO need most then total price
            'value_paid_cash' => [
                Rule::requiredIf($this->need_change && $this->payment_mode == Order::MONEY),
                new ChangePriceRule($this->need_change, $this->payment_mode, $this->amount_total_price, $this->amount_value_paid_cash),
            ],

            'contact_phone' => 'required|min:3|max:255',
            'contact_name'  => 'required|min:3|max:255',

            'delivery_mode' => [
               'required', Rule::in(array_keys(Order::DELIVERY_MODES)),
            ],
           'payment_mode' => [
               'required', Rule::in(array_keys(Order::PAYMENT_MODES)),
            ],

            'products'        => ['required', 'array', 'min:1'],
            'products.*.id'   => ['required', 'exists:products,id'],

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
