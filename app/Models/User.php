<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User.
 *
 * @package namespace App\Models;
 */
class User extends Authenticatable implements MustVerifyEmail
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }
    public function programs()
    {
        return $this->hasMany('App\Models\Program');
    }
}
