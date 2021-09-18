<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'lat',
        'lng',
        'address_id'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
