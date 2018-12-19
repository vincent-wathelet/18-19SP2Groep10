<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Event $event
 * @property User $user
 * @property int $id
 * @property int $eventid
 * @property int $userid
 * @property boolean $bevestigt
 * @property boolean $aanwezig
 * @property string $created_at
 * @property string $updated_at
 */
class Inschrijving extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inschrijvings';
    /**
     * @var array
     */
    protected $fillable = ['eventid', 'userid', 'bevestigt', 'aanwezig', 'active','created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Event', 'eventid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'userid');
    }
}
