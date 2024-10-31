<?php

namespace App\Http\Controllers;

use App\Models\RegistrationState;

class RegistrationStateController extends Controller
{

    public function show(RegistrationState $state)
    {
        return view('registration.index', compact('state'));
    }

}
