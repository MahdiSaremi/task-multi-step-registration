<?php

namespace App\MultiStep;

use App\Models\UserFormState;
use App\MultiStep\Contracts\StepState;
use App\Secondary\Contracts\SecondaryApi;

class FillPasswordState implements StepState
{

    public function __construct(
        protected UserFormState $context,
        protected SecondaryApi $api,
    )
    {
    }

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
