<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Event $event
 * @property User $user
 * @property int $eventId
 * @property int $userId
 * @property string $titel
 * @property string $tekst
 * @property string $created_at
 * @property string $updated_at
 */
class Feedbackevent extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feedbackevent';

    /**
     * @var array
     */
    protected $fillable = ['titel', 'tekst', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Event', 'eventId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }
}
