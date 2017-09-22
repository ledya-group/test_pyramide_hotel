<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Agent extends Model
{
    use PresentableTrait;

    protected $guarded = [];
	
    protected $presenter = 'App\Presenters\Agent';

    public function data()
    {
        return $this->morphOne(User::class, 'owner');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
