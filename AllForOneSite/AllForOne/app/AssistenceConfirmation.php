<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property int $event_id
 * @property boolean $attended
 * @property boolean $missed
 */

class AssistenceConfirmation extends Model
{
    protected $table = 'assistance_confirmation';

    protected $fillable = [
        'user_id',
        'event_id',
        'attended',
        'missed',
    ];
}
