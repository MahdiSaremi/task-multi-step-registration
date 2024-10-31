<?php

namespace App\Secondary\Test;

use App\Secondary\Contracts\SecondaryApi;
use Illuminate\Support\Facades\Http;

class TestApi implements SecondaryApi
{

    public function fetch(string $uri, array $params)
    {
        return Http::post("http://localhost:8001/$uri", $params)->json();
    }

    public function getUser($id) : array
    {
        return $this->fetch('getUser', compact('id'));
    }

    public function updateEmailPhone($id, string $email, string $phone) : void
    {
        $this->fetch('updateEmailPhone', compact('id', 'email', 'phone'));
    }

    public function updatePassword($id, string $password) : void
    {
        $this->fetch('updatePassword', compact('id', 'password'));
    }

    public function updatePersonalInfo($id, string $name, string $address) : void
    {
        $this->fetch('updatePersonalInfo', compact('id', 'name', 'address'));
    }
    
}
