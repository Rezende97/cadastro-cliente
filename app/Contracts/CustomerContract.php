<?php 

    namespace App\Contracts;

    interface CustomerContract
    {
        public function customers();
        public function register($information);
        public function representative($id);
        public function representativeCity($id);
    }