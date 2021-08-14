<?php

namespace App\Models\Establishment;

use App\Models\Order\Order;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;

    protected $fillable = [
        'public_link_name', 'name', 'description', 'phone', 'picture', 'default_delivery_tax',
        'background_picture', 'delivery_time', 'min_value', 'need_confirm_order',
        'address_id', 'user_id',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function openingHours()
    {
        return $this->hasMany(OpeningHour::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
