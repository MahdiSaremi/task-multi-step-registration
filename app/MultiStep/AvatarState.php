<?php

namespace App\MultiStep;

use App\Models\RegistrationState;
use App\MultiStep\Contracts\State;
use App\ServerApi\Contracts\ApiClient;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AvatarState implements State
{

    public function __construct(
        protected RegistrationState $context,
        protected ApiClient $api
    )
    {
    }

    public function next() : State
    {
        return new SubmitState($this->context, $this->api);
    }

    public function prev() : State
    {
        return new PhoneConfirmState($this->context, $this->api);
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
        // TODO: Implement submit() method.
    }

    public function getView() : View
    {
        // TODO: Implement getView() method.
    }

}
