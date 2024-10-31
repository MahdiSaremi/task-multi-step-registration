<?php

namespace App\Secondary\Contracts;

interface SecondaryApi
{

    public function getUser($id) : array;

    public function updateEmailPhone($id, string $email, string $phone) : void;

    public function updatePassword($id, string $password) : void;

    public function updatePersonalInfo($id, string $name, string $address) : void;

    public function finish($id) : void;

}
