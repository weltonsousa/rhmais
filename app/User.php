<?php

namespace App;

use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
use Illuminate\Contracts\Auth\MustVerifyEmail;
=======
>>>>>>> 2215e0e2d723ef7c81cf215bf832dbb425588a3c
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
