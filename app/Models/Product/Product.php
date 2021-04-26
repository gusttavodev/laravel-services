<?php

namespace App\Models\Product;

use App\Models\Product\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'picture', 'priority', 'enable', 'user_id', 'description', 'price', 'user_id'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }
}
