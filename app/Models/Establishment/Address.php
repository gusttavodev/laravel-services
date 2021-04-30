<?php

namespace App\Models\Establishment;

use Illuminate\Database\Eloquent\Model;
use App\Models\Establishment\Establishment;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'zip_code', 'street', 'city', 'country', 'district', 'state', 'number',
        'complement', 'latitude', 'longitude'
    ];

    public function establishment()
    {
        return $this->hasOne(Establishment::class);
    }
}
