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
        'zipcode'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function geo()
    {
        return $this->hasOne(Address::class);
    }
}
