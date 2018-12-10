<?php

namespace App;

use DateTime;
use App\Admin;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Categorie $categorie
 * @property Lokaal $lokaal
 * @property Feedbackevent[] $feedbackevents
 * @property Inschrijving[] $inschrijvings
 * @property Organisatoren[] $organisatorens
 * @property int $id
 * @property int $categorieId
 * @property string $naam
 * @property int $lokaalId
 * @property int $maxInschrijvingen
 * @property string $date
 * @property string $duur
 * @property boolean $autoaccept
 * @property string $description
 * @property boolean $hidden
 * @property string $created_at
 * @property string $updated_at
 */
class Event extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'event';

    /**
     * @var array
     */
    protected $fillable = ['categorieId', 'naam', 'lokaalId', 'maxInschrijvingen', 'begindate', 'enddate', 'date', 'autoaccept', 'description', 'hidden', 'user_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie()
    {
        return $this->belongsTo('App\Categorie', 'categorieId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lokaal()
    {
        return $this->belongsTo('App\Lokaal', 'lokaalId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feedbackevents()
    {
        return $this->hasMany('App\Feedbackevent', 'eventId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inschrijvings()
    {
        return $this->hasMany('App\Inschrijving', 'eventid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function organisatorens()
    {
        return $this->hasMany('App\Organisatoren', 'eventId');
    }

    public function addtime($time1,$time2)
    {
        $x = new DateTime($time1);
        $y = new DateTime($time2);

        $interval1 = $x->diff(new DateTime('0000-00-00 00:00:00')) ;
        $interval2 = $y->diff(new DateTime('0000-00-00 00:00:00')) ;

        $e = new DateTime('0000-00-00 00:00:00');
        $f = clone $e;
        $e->add($interval1);
        $e->add($interval2);
        $total = $f->diff($e)->format("%M/%D/%Y %H:%I");
        return $total;
    }
}
