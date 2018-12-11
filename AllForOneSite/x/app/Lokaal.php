<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Event[] $events
 * @property int $id
 * @property string $gebouw
 * @property string $lokaal
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
    protected $fillable = ['gebouw', 'lokaal'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany('App\Event', 'lokaalId');
    }
}
