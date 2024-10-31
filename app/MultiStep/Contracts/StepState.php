<?php

namespace App\MultiStep\Contracts;

use App\Models\UserFormState;
use App\Secondary\Contracts\SecondaryApi;
use Illuminate\Http\Request;

interface StepState
{

    /**
     * Construct the state with context and api value
     *
     * @param UserFormState $context
     * @param SecondaryApi  $api
     */
    public function __construct(UserFormState $context, SecondaryApi $api);

    /**
     * Go to the next state
     *
     * @return StepState
     */
    public function next() : StepState;

    /**
     * Go to the previous state
     *
     * @return StepState
     */
    public function prev() : StepState;

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
