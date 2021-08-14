<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatusChanges extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'status',
    ];

    protected $casts = [
        'date'                    => 'datetime:m/d/Y',
        'created_at'              => 'datetime:d/m/Y H:i',
        'updated_at'              => 'datetime:d/m/Y H:i',
    ];

    protected $appends  = [
        'statusName',
    ];

    public function getStatusNameAttribute()
    {
        return Order::STATUSES[$this->status];
    }
}
