<?php 

    namespace App\Repositories;

    use App\Models\representativeModel;

    class RepresentativeRepository
    {
        public function registeRepresentative($representative)
        {
            return representativeModel::create($representative);
        }        

        public function representativeCliente($id_customer)
        {
            return representativeModel::with(['city', 'customer'])->where('city_id', $id_customer)->get();
        }

    }