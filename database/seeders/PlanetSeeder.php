<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PlanetSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->pageSeeder('https://swapi.dev/api/planets/');
    }

    public function pageSeeder(String $url){

        $starships = Http::get($url)->json();
        foreach ($starships['results'] as $value){
            DB::table('planets')->insert([
                'planet_id' => preg_replace('/[^0-9]+/', '', $value['url']),
                'rotation_period' => $value['rotation_period'],
                'diameter' => $value['diameter'],
                'orbital_period' => $value['orbital_period'],
                'gravity' => $value['gravity'],
                'population' => $value['population'],
                'climate' => $value['climate'],
                'terrain' => $value['terrain'],
                'surface_water' => $value['surface_water'],
                'residents' => json_encode($value['residents']),
                'films' => json_encode($value['films']),
                'url' => $value['url'],
                'created' => $value['created'],
                'edited' => $value['edited'],
            ]);
        }

        if ($starships['next']){
            $this->pageSeeder($starships['next']);
        }
    }
}
