<?php

    namespace App\Http\Controllers;

    use App\Contracts\StateContract;
    use Illuminate\Http\Request;

    class StateController extends Controller
    {
        protected $state;

        public function __construct(StateContract $stateContract)
        {
            $this->state = $stateContract;
        }

        public function showState(Request $request)
        {
            return $this->state->state();
        }
    }
