<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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

    public function getNameAttribute()
    {
        $owner = $this->owner();
        
        return $owner->title . ' ' . $owner->firstname . ' ' . $owner->lastname;
    }

    public function owner()
    {
        return $this->morphTo('owner');
    }

    public function isAdmin()
    {
        return !! $this->owner_type == "App\Agent";
    }

    public function isRoot()
    {
        return !! $this->owner->role == "admin";
    }
}
