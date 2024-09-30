<?php

namespace Database\Seeders;

use App\Models\CityModel;
use App\Models\StateModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class StatesCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estadosResponse = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados');

        foreach ($estadosResponse->json() as $estado) {

            StateModel::create([
                'state_id'  => $estado['id'],
                'state'     => $estado['nome'],
                'acronym'   => $estado['sigla'],
            ]);
        }

        $state = StateModel::select('state_id')->get();

        $state->each(function($states){
            $cityResponse = Http::get("https://servicodados.ibge.gov.br/api/v1/localidades/estados/{$states->state_id}/municipios");

            foreach ($cityResponse->json() as $key => $city) {

                CityModel::create([
                    'city'     =>  $city['nome'],
                    'state_id' => $city["microrregiao"]["mesorregiao"]["UF"]["id"]
                ]);
            }
        });
    }
}
