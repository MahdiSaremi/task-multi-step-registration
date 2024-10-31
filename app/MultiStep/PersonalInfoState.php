<?php

namespace App\MultiStep;

use App\Models\RegistrationState;
use App\MultiStep\Contracts\State;
use App\MultiStep\Exceptions\NotMoreStateExists;
use App\ServerApi\Contracts\ApiClient;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PersonalInfoState implements State
{

    public function __construct(
        protected RegistrationState $context,
        protected ApiClient $api
    )
    {
    }

    public function next() : State
    {
        return new PhoneState($this->context, $this->api);
    }

    public function prev() : State
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
            'name' => 'required|string',
            'age' => 'required|integer|min:5|max:200',
        ]);

        $this->api->forceUpdate($this->context->user_id, $data);

        $this->context->nextState();
    }

    public function getView() : View
    {
        // TODO: Implement getView() method.
    }

}
