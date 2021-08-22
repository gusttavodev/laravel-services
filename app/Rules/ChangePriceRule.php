<?php

namespace App\Rules;

use App\Models\Order\Order;
use Illuminate\Contracts\Validation\Rule;

class ChangePriceRule implements Rule
{
    private $need_change;
    private $payment_mode;
    private $amount_total_price;
    private $amount_value_paid_cash;

    public function __construct($need_change, $payment_mode, $amount_total_price, $amount_value_paid_cash)
    {
        $this->need_change = $need_change;
        $this->payment_mode = $payment_mode;
        $this->amount_total_price = $amount_total_price;
        $this->amount_value_paid_cash = $amount_value_paid_cash;
    }

    public function passes($attribute, $value)
    {
        if($this->need_change && $this->payment_mode == Order::MONEY){
            if($this->amount_value_paid_cash >= $this->amount_total_price){
                return true;
            } else {
                return false;
            }
        }
        return true;
    }

    public function message()
    {
        return 'O valor pago deve ser maior ou igual o total.';
    }
}
