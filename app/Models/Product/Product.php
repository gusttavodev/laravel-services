<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'picture', 'priority', 'enable', 'user_id', 'description', 'price', 'user_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function additionals()
    {
        return $this->belongsToMany(Additional::class, 'product_additionals');
    }

    public function order_additionals()
    {
        return $this
            ->belongsToMany(Additional::class, 'order_product_additionals')
            ->withPivot('quantity', 'order_id');
    }

    public function scopeSearch($query)
    {
        if (!empty(request()->query('name') && request()->query('name') !== 'null')) {
            $query->where('name', 'like', '%' . request()->query('name') . '%');
        }

        if (!empty(request()->query('enable') && request()->query('enable') !== 'null')) {
            $query->where('enable', request()->query('enable') === 'true' ? true : false);
        }

        if (!empty(request()->query('categories') && request()->query('categories') !== 'null')) {
            $categories = explode(',', request()->query('categories'));
            $query->with('categories')->
                whereHas('categories', function ($query) use ($categories) {
                    $query->whereIn('categories.id', $categories);
                });
        }

        return $query;
    }
}
