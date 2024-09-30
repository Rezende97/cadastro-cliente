<?php 

    namespace App\Services;

    use App\Contracts\CitiesContract;
    use App\Repositories\CitiesRepository;

    class CitieService implements CitiesContract
    {
        protected $city;

        public function __construct(CitiesRepository $cityModel)
        {
            $this->city = $cityModel;
        }

        public function city()
        {
            return $this->city->cities();
        }
    }