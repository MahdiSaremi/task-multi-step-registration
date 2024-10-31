<?php

namespace App\ServerApi\Test;

use App\Jobs\UpdateReTransferJob;
use App\ServerApi\Contracts\ApiClient;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class TestApiClient implements ApiClient
{

    /**
     * Send new post request to the api server
     *
     * @param string $uri
     * @param array  $params
     * @return array|mixed
     */
    protected function request(string $uri, array $params)
    {
        return Http::post("http://localhost:8001/$uri", $params)
            ->throw()->json();
    }

    /**
     * Upload a file
     *
     * @param UploadedFile $file
     * @return string
     */
    public function upload(UploadedFile $file) : string
    {
        return Http::attach('file', $file->getContent(), $file->getPath())
            ->post("http://localhost:8001/upload")
            ->throw()->json();
    }

    /**
     * Get user by id
     *
     * @param $id
     * @return array|null
     */
    public function getUser($id) : ?array
    {
        return $this->request('getUser', compact('id'));
    }

    /**
     * Update the user and wait for response
     *
     * @param       $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data) : bool
    {
        $data['id'] = $id;

        return (bool) $this->request('update', $data);
    }

    /**
     * Update the user and retry in a queue if failed
     *
     * @param       $id
     * @param array $data
     * @return void
     */
    public function forceUpdate($id, array $data) : void
    {
        try
        {
            $this->update($id, $data);
        }
        catch (\Throwable)
        {
            dispatch(new UpdateReTransferJob($id, $data))->delay(now()->addSecond());
        }
    }

    /**
     * Verify the action
     *
     * @param        $id
     * @param string $method
     * @param array  $data
     * @return bool
     */
    public function verify($id, string $method, array $data) : bool
    {
        $data['id'] = $id;
        $data['method'] = $method;

        return (bool) $this->request('verify', $data);
    }

}
