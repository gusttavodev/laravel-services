<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProduct extends Model
{
    use HasFactory;
    protected $table = 'order_products';

    protected $fillable = [
        'quantity', 'unity_price'
    ];

    public function additionals()
    {
        return $this->belongsToMany(Additional::class, 'order_product_additionals')->withPivot('quantity');
    }
}
