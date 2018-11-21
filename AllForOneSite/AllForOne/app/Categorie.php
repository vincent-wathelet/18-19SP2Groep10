<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Event[] $events
 * @property Feedbackuser[] $feedbackusers
 * @property int $id
 * @property string $naam
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
    protected $fillable = ['naam'];

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
