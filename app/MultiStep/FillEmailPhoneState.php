<?php

namespace App\MultiStep;

use App\Models\UserFormState;
use App\MultiStep\Contracts\StepState;
use App\MultiStep\Exceptions\NotMoreStateExists;
use App\Secondary\Contracts\SecondaryApi;
use Illuminate\Http\Request;

class FillEmailPhoneState implements StepState
{

    public function __construct(
        protected UserFormState $context,
        protected SecondaryApi $api,
    )
    {
    }

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

    public function submit(Request $request) : void
    {
        $data = $request->validate([
            'email' => 'required|string|email',
            'phone' => ['required', 'string', 'regex:/^(+?98|0)?\d{11}$/'],
        ]);

        $this->api->updateEmailPhone($data['email'], $data['phone']);
    }

}
