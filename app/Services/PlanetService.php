<?php

namespace App\Services;

use App\Repositories\PlanetLocalRepository;
use Illuminate\Http\Request;

class PlanetService
{
    private $planetLocalRepository;


    public function __construct(PlanetLocalRepository $planetLocalRepository)
    {
        $this->planetLocalRepository = $planetLocalRepository;
    }

    public function getPlanets(Request $request)
    {
        return $this->planetLocalRepository->all($request);
    }

    public function getPlanet(int $id)
    {
        return $this->planetLocalRepository->getPlanet($id);
    }

}
