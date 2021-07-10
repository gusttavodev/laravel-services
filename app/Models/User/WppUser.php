<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WppUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'name'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'wpp_user_id');
    }
}
