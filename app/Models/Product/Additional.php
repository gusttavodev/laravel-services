<?php

namespace App\Models\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Additional extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'quantity_limit'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_additionals');
    }

}
