<?php

namespace App\Models\Establishment;

use Illuminate\Database\Eloquent\Model;
use App\Models\Establishment\Establishment;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time', 'end_time', 'day'
    ];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }
}
