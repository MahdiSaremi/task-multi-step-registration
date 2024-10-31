<?php

namespace App\Secondary\Contracts;

interface SecondaryApi
{

    public function getUser($id) : ?array;

    public function updateEmailPhone($id, string $email, string $phone) : bool;

    public function updatePassword($id, string $password) : bool;

    public function updatePersonalInfo($id, string $name, string $address) : bool;

    public function finish($id) : bool;

}
