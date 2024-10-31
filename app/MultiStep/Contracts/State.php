<?php

namespace App\MultiStep\Contracts;

use App\Models\RegistrationState;
use App\Secondary\Contracts\ApiClient;
use Illuminate\Http\Request;

interface State
{

    /**
     * Construct the state with context and api value
     *
     * @param RegistrationState $context
     * @param ApiClient         $api
     */
    public function __construct(RegistrationState $context, ApiClient $api);

    /**
     * Go to the next state
     *
     * @return State
     */
    public function next() : State;

    /**
     * Go to the previous state
     *
     * @return State
     */
    public function prev() : State;

    /**
     * Checks the state has next state
     *
     * @return bool
     */
    public function hasNext() : bool;

    /**
     * Checks the state has previous state
     *
     * @return bool
     */
    public function hasPrev() : bool;

    /**
     * Submit the form and update the data
     *
     * @param Request      $request
     * @return void
     */
    public function submit(Request $request) : void;

}
