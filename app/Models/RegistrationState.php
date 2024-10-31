<?php

namespace App\Models;

use App\MultiStep\Casts\StateCast;
use App\MultiStep\Contracts\State;
use Illuminate\Database\Eloquent\Model;

/**
 * @property State $state
 */
class RegistrationState extends Model
{

    protected $fillable = [
        'user_id',
        'state',
    ];

    protected $casts = [
        'state' => StateCast::class,
    ];

    public function nextState()
    {
        $this->state = $this->state->next();
    }

    public function prevState()
    {
        $this->state = $this->state->prev();
    }

}
