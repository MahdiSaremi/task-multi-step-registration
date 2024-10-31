<?php

namespace App\ServerApi\Test;

use App\Jobs\UpdateReTransferJob;
use App\ServerApi\Contracts\ApiClient;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class TestApiClient implements ApiClient
{

    protected function request(string $uri, array $params)
    {
        return Http::post("http://localhost:8001/$uri", $params)
            ->throw()->json();
    }

    public function upload(UploadedFile $file) : string
    {
        return Http::attach('file', $file->getContent(), $file->getPath())
            ->post("http://localhost:8001/upload")
            ->throw()->json();
    }


    public function getUser($id) : ?array
    {
        return $this->request('getUser', compact('id'));
    }

    public function update($id, array $data) : bool
    {
        $data['id'] = $id;

        return (bool) $this->request('update', $data);
    }

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

    public function verify($id, string $method, array $data) : bool
    {
        $data['id'] = $id;
        $data['method'] = $method;

        return (bool) $this->request('verify', $data);
    }

}
