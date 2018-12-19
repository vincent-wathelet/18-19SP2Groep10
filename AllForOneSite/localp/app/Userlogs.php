<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Log $log
 * @property User $user
 * @property int $userid
 * @property int $logId
 * @property string $created_at
 * @property string $updated_at
 */
class Userlogs extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function log()
    {
        return $this->belongsTo('App\Log', 'logId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'userid');
    }
}
