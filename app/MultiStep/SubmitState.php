<?php

namespace App\MultiStep;

use App\Models\UserFormState;
use App\MultiStep\Contracts\StepState;
use App\MultiStep\Exceptions\NotMoreStateExists;
use App\Secondary\Contracts\SecondaryApi;
use Illuminate\Http\Request;

class SubmitState implements StepState
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
        return new FillPersonalState($this->context, $this->api);
    }

    public function hasNext() : bool
    {
        return false;
    }

    public function hasPrev() : bool
    {
        return true;
    }

    public function submit(Request $request) : void
    {
        $request->validate([
            'confirm' => 'required|accepted',
        ]);

        $this->api->finish($this->context->user_id);
    }

}
