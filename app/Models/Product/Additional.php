<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    use HasFactory;
    protected $hidden = ['pivot'];

    protected $fillable = [
        'name', 'price', 'quantity_limit',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_additionals');
    }
}
