<?php 

    namespace App\Services;

    use App\Contracts\CustomerContract;
    use App\Repositories\CustomerRepository;
    use App\Repositories\AddresseRepository;
    use App\Repositories\CustomerStateCitiesRepository;
    use App\Repositories\RepresentativeRepository;

    class CustomerService implements CustomerContract
    {
        protected $customer;
        protected $addresse;
        protected $customerStateCities;
        protected $representative;

        public function __construct(CustomerRepository $customerModel, 
                                    AddresseRepository $addresseModel,
                                    CustomerStateCitiesRepository $customerStateCitiesModel,
                                    RepresentativeRepository $representativeModel)
        {
            $this->customer            = $customerModel;
            $this->addresse            = $addresseModel;
            $this->customerStateCities = $customerStateCitiesModel;
            $this->representative      = $representativeModel;
        }

        public function register($customer)
        {
            // precisa fazer as validações dos dados
            try {

                $id_customer = $this->customer->registerCustomer([
                    'name'            => $customer->name, 
                    'cpf'             => $customer->cpf, 
                    'dateOfBirth'     => $customer->dateOfBirth, 
                    'sex'             => $customer->sex
                ]);
    
                $this->addresse->registerAddresse([
                    'customer_id'     => $id_customer, 
                    'cep'             => $customer->cep, 
                    'address'         => $customer->address, 
                    'number'          => $customer->number
                ]);
    
                $this->customerStateCities->registerCustomerStateCities([
                    'customer_id'     => $id_customer, 
                    'state_id'        => $customer->state, 
                    'city_id'         => $customer->city
                ]);
    
                if (in_array($customer->representative, [1])) {
                    $this->representative->registeRepresentative([
                        'city_id'     => $customer->city, 
                        'customer_id' => $id_customer
                    ]);
                }

                return response()->json(['message' => 'customer registration completed successfully'], 201)->setEncodingOptions(JSON_UNESCAPED_UNICODE);

            } catch (\Throwable $th) {
                return response()->json(['message' => 'Error registering customer'], 404)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
            }
        }

        public function customers()
        {
            return $this->customer->showCustomer();
        }

        public function representative($id)
        {
            $id_city                  = $this->customer->representativeCustomer($id);

            $representatives          = $this->representative->representativeCliente($id_city);

            $representativeCustomer   = [];

            foreach ($representatives as $key => $representative) {
                array_push($representativeCustomer, [
                    'representative'  => $representative['customer']['name'],
                    'city'            => $representative['city']['city']
                ]);
            }   
            
            return response()->json(['message' => $representativeCustomer])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }

        public function representativeCity($id_city)
        {
            $representatives          = $this->representative->representativeCliente($id_city);

            $representativeCustomer   = [];

            foreach ($representatives as $key => $representative) {
                array_push($representativeCustomer, [
                    'representative'  => $representative['customer']['name'],
                    'city'            => $representative['city']['city']
                ]);
            }   
            
            return response()->json(['message' => $representativeCustomer])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        }
    }