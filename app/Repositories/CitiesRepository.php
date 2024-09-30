<?php 

    namespace App\Repositories;

    use App\Models\CityModel;

    class CitiesRepository
    {
        public function cities()
        {
            return CityModel::select(['id', 'city', 'state_id'])->get();
        }
    }