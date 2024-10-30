<?php

namespace App\MultiStep;

use App\MultiStep\Contracts\StepState;

class FillPasswordState implements StepState
{

    public function next() : StepState
    {
        return new FillEmailPhoneState();
    }

    public function prev() : StepState
    {
        return new FillPersonalState();
    }

    public function hasNext() : bool
    {
        return true;
    }

    public function hasPrev() : bool
    {
        return true;
    }

}
