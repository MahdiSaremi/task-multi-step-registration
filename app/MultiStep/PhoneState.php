<?php

namespace App\MultiStep;

use App\Models\RegistrationState;
use App\MultiStep\Contracts\State;
use App\ServerApi\Contracts\ApiClient;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PhoneState implements State
{

    public function __construct(
        protected RegistrationState $context,
        protected ApiClient $api
    )
    {
    }

    public function next() : State
    {
        return new PhoneConfirmState($this->context, $this->api);
    }

    public function prev() : State
    {
        return new PersonalInfoState($this->context, $this->api);
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
            'phone' => ['nullable', 'string', 'regex:/^(+?98|0)?\d{11}$/'],
        ]);

        $this->api->forceUpdate($this->context->user_id, $data);

        $this->context->nextState();
    }

    public function getView() : View
    {
        // TODO: Implement getView() method.
    }

}
