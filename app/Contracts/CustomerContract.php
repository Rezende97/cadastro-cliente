<?php 

    namespace App\Contracts;

    interface CustomerContract
    {
        public function customers();
        public function register($customer);
        public function representative($id);
        public function representativeCity($id);
        public function filterCustomer($customer);
    }