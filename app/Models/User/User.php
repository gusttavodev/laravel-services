<?php

namespace App\Models\User;

use App\Models\Product\Product;
use App\Models\Product\Category;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Models\Establishment\Establishment;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
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

    public function establishments()
    {
        return $this->hasMany(Establishment::class, 'user_id');
    }

    public function themes()
    {
        return $this->hasMany(Theme::class, 'user_id');
    }
}
