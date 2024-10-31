<?php

namespace App\MultiStep;

use App\Models\UserFormState;
use App\MultiStep\Contracts\StepState;
use App\Secondary\Contracts\SecondaryApi;
use Illuminate\Http\Request;

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
        return new FillEmailPhoneState($this->context, $this->api);
    }

    public function prev() : StepState
    {
        return new FillPersonalState($this->context, $this->api);
    }

    public function hasNext() : bool
    {
        return true;
    }

    public function hasPrev() : bool
    {
        return true;
    }

    public function submit(Request $request) : void
    {
        $data = $request->validate([
            'password' => 'required|string|min:8',
        ]);

        $this->api->updatePassword($this->context->user_id, $data['password']);
    }

}
