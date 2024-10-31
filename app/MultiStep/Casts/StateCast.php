<?php

namespace App\MultiStep\Casts;

use App\ServerApi\Contracts\ApiClient;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class StateCast implements CastsAttributes
{

    /**
     * Convert the string class name of state to state object
     *
     * @return StateCast
     */
    public function get(Model $model, string $key, mixed $value, array $attributes) : StateCast
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
