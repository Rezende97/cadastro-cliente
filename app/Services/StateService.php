<?php 

    namespace App\Services;

    use App\Contracts\StateContract;
    use App\Repositories\StateRepository;

    class StateService implements StateContract
    {
        protected $state;

        public function __construct(StateRepository $stateModel)
        {
            $this->state = $stateModel;
        }

        public function state()
        {
            return $this->state->states();
        }
    }