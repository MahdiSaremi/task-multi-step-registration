<?php

namespace App\Http\Controllers;

use App\Models\RegistrationState;
use App\MultiStep\FillEmailPhoneState;
use App\Secondary\Contracts\ApiClient;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __invoke($id, ApiClient $api)
    {
        if ($user = $api->getUser($id))
        {
            $formState = new RegistrationState;
            $formState->user_id = $id;
            $formState->state = new FillEmailPhoneState($formState, $api);
            $formState->save();

            return to_route('show-form-state', ['formState' => $formState]);
        }
        else
        {
            abort(404);
        }
    }

}
