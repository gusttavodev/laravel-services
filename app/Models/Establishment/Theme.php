<?php

namespace App\Models\Establishment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'colors',
        'user_id',
    ];
    protected $casts = [
        'colors' => 'array',
    ];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }
}
