<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table ='vehicles';

    protected $fillable = [
        'vehicle_id',
        'name',
        'model',
        'vehicle_class',
        'manufacturer',
        'length',
        'cost_in_credits',
        'crew' ,
        'passengers',
        'max_atmosphering_speed',
        'cargo_capacity',
        'consumables',
        'films',
        'pilots',
        'url'
    ];

    protected $hidden = ['updated_at', 'created_at'];

}
