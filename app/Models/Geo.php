<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'geo_lat',
        'geo_lng'
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
