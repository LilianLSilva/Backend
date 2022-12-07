<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlanetRestRepository extends BaseRepository
{

    public function all()
    {
        return Http::get('https://swapi.dev/api/planets/');
    }

    public function getPlanet(int $id)
    {
        return Http::get('https://swapi.dev/api/planets/'.$id.'/')->json();
    }

    public function getPlanets(Request $request){
        return Http::get('https://swapi.dev/api/planets', $request->query())->json();
    }
}
