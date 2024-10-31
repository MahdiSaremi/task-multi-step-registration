<?php

namespace App\Http\Controllers;

use App\Models\RegistrationState;
use App\MultiStep\PersonalInfoState;
use App\ServerApi\Contracts\ApiClient;

class UserController extends Controller
{

    public function __invoke($id, ApiClient $api)
    {
        if ($user = $api->getUser($id))
        {
            $state = new RegistrationState;
            $state->user_id = $id;
            $state->state = new PersonalInfoState($state, $api);
            $state->save();

            return to_route('register-state', ['state' => $state]);
        }
        else
        {
            abort(404);
        }
    }

}
