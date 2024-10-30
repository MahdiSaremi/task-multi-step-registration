<?php

namespace App\MultiStep;

use App\MultiStep\Contracts\StepState;
use App\MultiStep\Exceptions\NotMoreStateExists;

class FillPersonalState implements StepState
{

    public function next() : StepState
    {
        throw new NotMoreStateExists();
    }

    public function prev() : StepState
    {
        return new FillPasswordState();
    }

    public function hasNext() : bool
    {
        return false;
    }

    public function hasPrev() : bool
    {
        return true;
    }

}
