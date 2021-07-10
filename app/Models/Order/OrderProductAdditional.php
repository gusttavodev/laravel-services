<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProductAdditional extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(OrderProduct::class);
    }
}
