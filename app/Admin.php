<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    // protected $guarded = [];

    protected $fillable = [
        'name','image', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
