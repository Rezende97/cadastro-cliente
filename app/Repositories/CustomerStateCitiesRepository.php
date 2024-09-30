<?php 

    namespace App\Repositories;

    use App\Models\customerStateCitieModel;

    class CustomerStateCitiesRepository
    {
        public function registerCustomerStateCities($customerStateCities)
        {
            return customerStateCitieModel::create($customerStateCities);
        }        
    }