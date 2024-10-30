<?php

namespace App\MultiStep\Contracts;

use App\Secondary\Contracts\SecondaryApi;

interface StepState
{

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
     * Submit the form with data
     *
     * @param array        $data
     * @param SecondaryApi $api
     * @return void
     */
    public function submit(array $data, SecondaryApi $api) : void;

}
