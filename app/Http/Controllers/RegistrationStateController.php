<?php

namespace App\Http\Controllers;

use App\Models\RegistrationState;
use Illuminate\Http\Request;

class RegistrationStateController extends Controller
{

    public function show(RegistrationState $state)
    {
        return view('register-step');
    }

}
