<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Event[] $events
 * @property int $id
 * @property string $gebouw
 * @property string $lokaal
 * @property string $created_at
 * @property string $updated_at
 */
class Lokaal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lokaal';

    /**
     * @var array
     */
    protected $fillable = ['gebouw', 'lokaal', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany('App\Event', 'lokaalId');
    }
}
