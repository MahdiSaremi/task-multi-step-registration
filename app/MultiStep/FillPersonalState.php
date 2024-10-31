<?php

namespace App\MultiStep;

use App\Models\UserFormState;
use App\MultiStep\Contracts\StepState;
use App\MultiStep\Exceptions\NotMoreStateExists;
use App\Secondary\Contracts\SecondaryApi;
use Illuminate\Http\Request;

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
        return new FillPasswordState($this->context, $this->api);
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
        $data = $request->validate([
            'name' => 'required|string|min:2|max:50',
            'address' => 'required|string|max:150',
        ]);

        $this->api->updatePersonalInfo($this->context->user_id, $data['name'], $data['address']);
    }

}
