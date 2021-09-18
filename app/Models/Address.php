<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'street',
        'suite',
        'city',
        'zipcode',
        'user_id'
    ];

    public function getFullAddressAttribute(): string
    {
        return $this->city . ' ' . $this->zipcode . ',' . $this->street . ' ' . $this->suite;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function geo()
    {
        return $this->hasOne(Geo::class);
    }
}
