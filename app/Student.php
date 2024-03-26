<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Uuid;
use SMartins\PassportMultiauth\HasMultiAuthApiTokens;

class Student extends Authenticatable
{
    use Notifiable;
    use HasMultiAuthApiTokens;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}