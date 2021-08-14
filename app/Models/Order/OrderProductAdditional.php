<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProductAdditional extends Model
{
    use HasFactory;
    protected $table    = 'order_product_additionals';
    protected $fillable = [
        'quantity', 'unity_price',
    ];

    public function product()
    {
        return $this->belongsTo(OrderProduct::class);
    }
}
