<?php

namespace App\Secondary\Contracts;

interface ApiClient
{

    /**
     * Get user by id
     *
     * @param $id
     * @return array|null
     */
    public function getUser($id) : ?array;

    /**
     * Update the user and wait for response
     *
     * @param       $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data) : bool;

    /**
     * Verify the action
     *
     * @param        $id
     * @param string $method
     * @param array  $data
     * @return bool
     */
    public function verify($id, string $method, array $data) : bool;

}
