<?php

namespace App\Models\User;

use App\Models\Establishment\Address;
use App\Models\Establishment\Establishment;
use App\Models\Establishment\Theme;
use App\Models\Order\Order;
use App\Models\Product\Additional;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasRoles;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'picture',
        'first_name',
        'last_name',
        'phone',
        'establishment_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function categories()
    {
        return $this->HasMany(Category::class);
    }

    public function products()
    {
        return $this->HasMany(Product::class);
    }

    public function orders()
    {
        return $this->HasMany(Order::class);
    }

    public function additionals()
    {
        return $this->HasMany(Additional::class);
    }

    public function establishments()
    {
        return $this->hasMany(Establishment::class, 'user_id');
    }

    public function themes()
    {
        return $this->hasMany(Theme::class, 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function establishmentOnRegister()
    {
        return $this->belongsTo(Establishment::class);
    }

    public function scopeSearchUser($query)
    {
        if (!empty(request()->query('name') && request()->query('name') !== 'null')) {
            $query->where('name', 'like', '%' . request()->query('name') . '%');
        }

        if (!empty(request()->query('email') && request()->query('email') !== 'null')) {
            $query->where('email', 'like', '%' . request()->query('email') . '%');
        }

        if (!empty(request()->query('roles') && request()->query('roles') !== 'null')) {
            $roles = explode(',', request()->query('roles'));
            $query->with('roles')->
                whereHas('roles', function ($query) use ($roles) {
                    $query->whereIn('roles.id', $roles);
                });
        }

        return $query;
    }
}
