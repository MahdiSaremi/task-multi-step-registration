<?php

namespace App\MultiStep;

use App\MultiStep\Contracts\StepState;
use App\MultiStep\Exceptions\NotMoreStateExists;
use App\Secondary\Contracts\SecondaryApi;

class FillEmailPhoneState implements StepState
{

    public function next() : StepState
    {
        return new FillPasswordState();
    }

    public function prev() : StepState
    {
        throw new NotMoreStateExists();
    }

    public function hasNext() : bool
    {
        return true;
    }

    public function hasPrev() : bool
    {
        return false;
    }

    public function submit(array $data, SecondaryApi $api) : void
    {

    }

}
