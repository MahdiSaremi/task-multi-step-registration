<?php

namespace App\ServerApi\Contracts;

use Illuminate\Http\UploadedFile;

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
     * Update the user and retry in a queue if failed
     *
     * @param       $id
     * @param array $data
     * @return void
     */
    public function forceUpdate($id, array $data) : void;

    /**
     * Verify the action
     *
     * @param        $id
     * @param string $method
     * @param array  $data
     * @return bool
     */
    public function verify($id, string $method, array $data) : bool;

    public function upload(UploadedFile $file) : string;

}
