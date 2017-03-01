<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $primaryKey = 'serie';

    protected $fillable = [
        'color',
        'power',
        'capacity',
        'speed',
    ];

    protected $hidden = [
        'serie',
        'created_at',
        'updated_at',
    ];

    function maker() {
        return $this->belongsTo('App\Maker');
    }
}
