<?php 

    namespace App\Repositories;

    use App\Models\CustomerModel;
    use App\Models\customerStateCitieModel;

    class CustomerRepository
    {
        public function registerCustomer($customer)
        {
            $record = CustomerModel::create($customer);

            return $record->id;
        }        

        public function showCustomer()
        {
            return CustomerModel::select(['id', 'name'])->get();
        }   

        public function representativeCustomer($id)
        {
            $cityCustomer = customerStateCitieModel::select('city_id')->where('customer_id', $id)->first();

            return $cityCustomer["city_id"];
        }

        public function filterCustomers($key, $customer)
        {
            return CustomerModel::where($key, 'like', $customer)->get();
        }
    }