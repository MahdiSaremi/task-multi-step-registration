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
        $request->validate([
            'image' => 'required|image',
        ]);

        $uuid = $this->api->upload(
            $request->file('image')
        );

        $this->api->forceUpdate($this->context->user_id, ['image' => $uuid]);

        $this->context->nextState();
    }

    public function getView() : View
    {
        // TODO: Implement getView() method.
    }

}
