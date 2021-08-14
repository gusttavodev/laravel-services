<?php

namespace App\Http\Requests\Order;

use App\Models\Order\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'status' => [
               'required', Rule::in(array_keys(Order::STATUSES)),
            ],
        ];
    }
}
