<?php

namespace App\Repositories;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;

class VehicleLocalRepository extends BaseRepository
{
    public function __construct(Vehicle $vehicle)
    {
        parent::__construct($vehicle);
    }

    public function getVehicle(int $id)
    {
        return $this->model->where('vehicle_id', '=', "{$id}")->first();
    }

    public function all(Request $request)
    {
        if (($request->get('offset') !== null) && ($request->get('limit') !== null)){
            return $this->model->offset($request->get('offset'))
                ->limit($request->get('limit'))
                ->get();
        } else {
            return $this->model->all();
        }
    }

}
