<?php

    namespace App\Http\Controllers\Customer;

    use App\Contracts\CustomerContract;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\CustomerRegisteRequest;
    use Illuminate\Http\Request;

    class CustomerController extends Controller
    {
        protected $customer;

        public function __construct(CustomerContract $customerContract)
        {
            $this->customer = $customerContract;
        }
        
        public function registerCustomer(CustomerRegisteRequest $customerRegisteRequest)
        {
            return $this->customer->register($customerRegisteRequest);
        }

        public function show(Request $request)
        {
            return $this->customer->customers();
        }

        public function representativeCustomer($id)
        {
            return $this->customer->representative($id);
        }

        public function showRepresentativeCity($id_city)
        {
            return $this->customer->representativeCity($id_city);
        }
    }
