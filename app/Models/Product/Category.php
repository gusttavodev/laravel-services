<?php

namespace App\Models\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'picture', 'priority', 'enable', 'user_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
