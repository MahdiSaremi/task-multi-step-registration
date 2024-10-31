<?php

namespace App\Secondary\Test;

use App\Secondary\Contracts\ApiClient;
use Illuminate\Support\Facades\Http;

class TestApiClient implements ApiClient
{

    protected function request(string $uri, array $params)
    {
        return Http::post("http://localhost:8001/$uri", $params)->throw()->json();
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

    public function verify($id, string $method, array $data) : bool
    {
        $data['id'] = $id;
        $data['method'] = $method;

        return (bool) $this->request('verify', $data);
    }

}
