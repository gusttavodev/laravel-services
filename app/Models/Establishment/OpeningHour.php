<?php

namespace App\Models\Establishment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time', 'end_time', 'day',
    ];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }
}
