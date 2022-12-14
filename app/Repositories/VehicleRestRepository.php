<?php

namespace App\Repositories;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VehicleRestRepository extends BaseRepository
{
    public function __construct(Vehicle $vehicle)
    {
        parent::__construct($vehicle);
    }

    public function all(Request $request)
    {
        return Http::get('https://swapi.dev/api/vehicles/');
    }

    public function getVehicle(int $id)
    {
        return Http::get('https://swapi.dev/api/vehicles/'.$id.'/')->json();
    }

    public function getVehicles(Request $request){
        return Http::get('https://swapi.dev/api/vehicles', $request->query())->json();
    }
}
