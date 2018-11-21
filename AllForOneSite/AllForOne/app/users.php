<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Feedbackevent[] $feedbackevents
 * @property Feedbackuser[] $feedbackuserssender
 * @property Feedbackuser[] $feedbackusersreciever
 * @property Inschrijving[] $inschrijvings
 * @property Organisatoren[] $organisatorens
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property boolean $admin
 * @property boolean $banned
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 */
class users extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'admin', 'banned', 'remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feedbackevents()
    {
        return $this->hasMany('App\Feedbackevent', 'userId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feedbackusersreciever()
    {
        return $this->hasMany('App\Feedbackuser', 'recieverId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feedbackuserssender()
    {
        return $this->hasMany('App\Feedbackuser', 'senderId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inschrijvings()
    {
        return $this->hasMany('App\Inschrijving', 'userid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function organisatorens()
    {
        return $this->hasMany('App\Organisatoren', 'userId');
    }
}
