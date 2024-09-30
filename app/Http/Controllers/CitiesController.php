<?php

    namespace App\Http\Controllers;

    use App\Contracts\CitiesContract;
    use Illuminate\Http\Request;

    class CitiesController extends Controller
    {
        protected $city;

        public function __construct(CitiesContract $citiesContract)
        {
            $this->city = $citiesContract;
        }

        public function showCity(Request $request)
        {
            return $this->city->city();
        } 
    }
