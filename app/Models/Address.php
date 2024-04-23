<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'type',
        'address_line',
        'city',
        'state',
        'zip_code',
        'country',
    ];

    function getFullAddress($seperator = "\n") {
        return join($seperator, $this->only([
            'address_line',
            'city',
            'state',
            'zip_code',
            'country',
        ]));
    }
}
