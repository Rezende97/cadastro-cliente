<?php 

    namespace App\Repositories;

    use App\Models\StateModel;

    class StateRepository
    {
        public function states()
        {
            return StateModel::select(['id', 'state', 'acronym'])->get();
        }        
    }