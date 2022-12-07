<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PeopleRestRepository extends BaseRepository
{

    public function all()
    {
        return Http::get('https://swapi.dev/api/people/');
    }

    public function getPerson(int $id)
    {
        return Http::get('https://swapi.dev/api/people/'.$id.'/')->json();
    }

    public function getPeople(Request $request){
        return Http::get('https://swapi.dev/api/people', $request->query())->json();
    }
}
