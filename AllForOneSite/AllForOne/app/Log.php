<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Userlog[] $userlogs
 * @property int $id
 * @property string $type
 * @property string $action
 * @property string $created_at
 * @property string $updated_at
 */
class Log extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['type', 'action', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userlogs()
    {
        return $this->hasMany('App\Userlog', 'logId');
    }
}
