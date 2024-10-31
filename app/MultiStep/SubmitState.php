<?php

namespace App\MultiStep;

use App\Models\RegistrationState;
use App\MultiStep\Contracts\State;
use App\MultiStep\Exceptions\NotMoreStateExists;
use App\ServerApi\Contracts\ApiClient;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubmitState implements State
{

    public function __construct(
        protected RegistrationState $context,
        protected ApiClient $api
    )
    {
    }

    public function next() : State
    {
        throw new NotMoreStateExists();
    }

    public function prev() : State
    {
        return new AvatarState($this->context, $this->api);
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
        // TODO: Implement submit() method.
    }

    public function getView() : View
    {
        // TODO: Implement getView() method.
    }

}
