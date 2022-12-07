<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PeopleSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->pageSeeder('https://swapi.dev/api/people/');
    }

    public function pageSeeder(String $url){

        $starships = Http::get($url)->json();
        foreach ($starships['results'] as $value){
            DB::table('people')->insert([
                'people_id' => preg_replace('/[^0-9]+/', '', $value['url']),
                'name' => $value['name'],
                'birth_year' => $value['birth_year'],
                'eye_color' => $value['eye_color'],
                'gender' => $value['gender'],
                'hair_color' => $value['hair_color'],
                'height' => $value['height'],
                'mass' => $value['mass'],
                'skin_color' => $value['skin_color'],
                'homeworld' => $value['homeworld'],
                'films' => json_encode($value['films']),
                'species' => json_encode($value['species']),
                'starships' => json_encode($value['starships']),
                'vehicles' => json_encode($value['vehicles']),
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
