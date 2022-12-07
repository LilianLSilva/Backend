<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    protected $table ='planets';

    protected $fillable = [
        'planet_id',
        'rotation_period',
        'diameter' ,
        'orbital_period',
        'gravity',
        'population',
        'climate',
        'terrain',
        'surface_water',
        'residents',
        'films',
        'url',
        'created',
        'edited'
    ];

    protected $hidden = ['updated_at', 'created_at'];

}
