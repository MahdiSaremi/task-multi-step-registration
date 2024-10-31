<?php

namespace App\Secondary\Contracts;

interface SecondaryApi
{

    public function getUser($id) : array;

    public function updateEmailPhone(string $email, string $phone) : void;

}
