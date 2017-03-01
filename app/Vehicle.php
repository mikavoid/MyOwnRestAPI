<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'color',
        'power',
        'capacity',
        'speed',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'maker_id',
    ];

    function maker() {
        return $this->belongsTo('App\Maker');
    }
}
