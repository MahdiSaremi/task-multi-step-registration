<?php

namespace App\Models;

use App\MultiStep\Casts\StateCast;
use Illuminate\Database\Eloquent\Model;

class UserFormState extends Model
{

    protected $fillable = [
        'user_id',
        'state',
    ];

    protected $casts = [
        'state' => StateCast::class,
    ];

}
