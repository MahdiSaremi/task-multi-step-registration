<?php

namespace App\MultiStep;

use App\Models\UserFormState;
use App\MultiStep\Contracts\StepState;
use App\MultiStep\Exceptions\NotMoreStateExists;
use App\Secondary\Contracts\SecondaryApi;

class FillPersonalState implements StepState
{

    public function __construct(
        protected UserFormState $context,
        protected SecondaryApi $api,
    )
    {
    }

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
