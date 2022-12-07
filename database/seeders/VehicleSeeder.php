<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class VehicleSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->pageSeeder('https://swapi.dev/api/vehicles/');
    }

    public function pageSeeder(String $url){

        $starships = Http::get($url)->json();
        foreach ($starships['results'] as $value){
            DB::table('vehicles')->insert([
                'vehicle_id' => preg_replace('/[^0-9]+/', '', $value['url']),
                'name' => $value['name'],
                'model' => $value['model'],
                'vehicle_class' => $value['vehicle_class'],
                'manufacturer' => $value['manufacturer'],
                'length' => $value['length'],
                'cost_in_credits' => $value['cost_in_credits'],
                'crew' => $value['crew'],
                'passengers' => $value['passengers'],
                'max_atmosphering_speed' => $value['max_atmosphering_speed'],
                'cargo_capacity' => $value['cargo_capacity'],
                'consumables' => $value['consumables'],
                'films' => json_encode($value['films']),
                'pilots' => json_encode($value['pilots']),
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
