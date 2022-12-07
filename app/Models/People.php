<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $table ='people';

    protected $fillable = [
        'people_id',
        'name',
        'birth_year',
        'eye_color',
        'gender',
        'hair_color',
        'height',
        'mass',
        'skin_color',
        'homeworld',
        'films',
        'species',
        'starships',
        'vehicles',
        'url'
    ];

    protected $hidden = ['updated_at', 'created_at'];

}
