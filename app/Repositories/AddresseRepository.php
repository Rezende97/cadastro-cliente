<?php 

    namespace App\Repositories;

    use App\Models\AddresseModel;

    class AddresseRepository
    {
        public function registerAddresse($addresse)
        {
            return AddresseModel::create($addresse);
        }        
    }