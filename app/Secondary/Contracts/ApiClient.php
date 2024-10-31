<?php

namespace App\Secondary\Contracts;

interface ApiClient
{

    public function getUser($id) : ?array;

    public function update($id, array $data) : void;

    public function verify($id, string $method, array $data) : bool;

}
