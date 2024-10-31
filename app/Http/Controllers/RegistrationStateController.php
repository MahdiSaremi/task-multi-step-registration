<?php

namespace App\Http\Controllers;

use App\Models\RegistrationState;

class RegistrationStateController extends Controller
{

    public function show(RegistrationState $state)
    {
        return view('registration.index', compact('state'));
    }

    public function submit(RegistrationState $state)
    {
        $state->state->submit(request());
        return back();
    }

    public function prev(RegistrationState $state)
    {
        $state->prevState();
        return back();
    }

}
