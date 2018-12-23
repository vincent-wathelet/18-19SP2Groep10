<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Categorie $categorie
 * @property User $userReciever
 * @property User $userSender
 * @property int $recieverId
 * @property int $senderId
 * @property int $categroieId
 * @property int $starrating
 * @property string $titel
 * @property string $tekst
 * @property string $created_at
 * @property string $updated_at
 */
class Feedbackuser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feedbackuser';

    public $primaryKey = 'eventId';
    public $incrementing = false;
    /**
     * @var array
     */
    protected $fillable = ['eventId','recieverId','starrating','senderId', 'titel', 'tekst', 'created_at', 'updated_at'];

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
    public function userReciever()
    {
        return $this->belongsTo('App\User', 'recieverId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userSender()
    {
        return $this->belongsTo('App\User', 'senderId');
    }
}
