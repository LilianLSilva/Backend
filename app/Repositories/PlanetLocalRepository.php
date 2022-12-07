<?php

namespace App\Repositories;

use App\Models\Planet;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PlanetLocalRepository extends BaseRepository
{
    public function __construct(Planet $planet)
    {
        parent::__construct($planet);
    }

    public function getPlanet(int $id)
    {
        return $this->model->where('planet_id', '=', "{$id}")->first();
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
