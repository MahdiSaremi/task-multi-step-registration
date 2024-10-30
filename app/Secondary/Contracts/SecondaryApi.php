<?php

namespace App\Secondary\Contracts;

interface SecondaryApi
{

    public function getUser($id) : array;

}
