<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Event[] $events
 * @property Feedbackuser[] $feedbackusers
 * @property int $id
 * @property string $naam
 * @property string $created_at
 * @property string $updated_at
 */
class Categorie extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categorie';

    /**
     * @var array
     */
    protected $fillable = ['naam', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany('App\Event', 'categorieId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feedbackusers()
    {
        return $this->hasMany('App\Feedbackuser', 'categroieId');
    }
}
