<?php

namespace App\Services;

use App\Repositories\VehicleLocalRepository;
use Illuminate\Http\Request;

class VehicleService
{

    private $vehicleLocalRepository;

    public function __construct( VehicleLocalRepository $vehicleLocalRepository)
    {
        $this->vehicleLocalRepository = $vehicleLocalRepository;
    }

    public function getVehicle(int $id)
    {
        return $this->vehicleLocalRepository->getVehicle($id);
    }

    public function getVehicles(Request $request)
    {
        return $this->vehicleLocalRepository->all($request);
    }

}
