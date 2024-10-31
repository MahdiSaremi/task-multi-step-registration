<?php

namespace App\MultiStep\Casts;

use App\MultiStep\Contracts\State;
use App\ServerApi\Contracts\ApiClient;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class StateCast implements CastsAttributes
{

    /**
     * Convert the string class name of state to state object
     *
     * @return State
     */
    public function get(Model $model, string $key, mixed $value, array $attributes) : State
    {
        return new $value($model, app(ApiClient::class));
    }

    /**
     * Convert the state object to string class name for storing
     *
     * @return string
     */
    public function set(Model $model, string $key, mixed $value, array $attributes) : string
    {
        return get_class($value);
    }

}
