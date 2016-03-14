<?php

namespace LearnParty;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'avatar',
        'provider_id',
        'provider',
        'password',
        'about',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * A user can have many videos
     *
     * @return Object
     */
    public function videos()
    {
        return $this->hasMany('LearnParty\Video');
    }
}
