<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject

{
    use Notifiable;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // Returns custom claims for the token
    public function getJWTCustomClaims()
    {
        return [];
    }

    
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

    public function taskLists()
    {
        return $this->hasMany(TaskList::class);
    }
    
    public function tasks() {
        return $this->hasMany(Task::class);
    }    

    
}
