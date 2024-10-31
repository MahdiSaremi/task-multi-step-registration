<?php

namespace App\Http\Controllers;

use App\Secondary\Contracts\SecondaryApi;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __invoke($id, SecondaryApi $api)
    {
        $user = $api->getUser($id);
    }

}
