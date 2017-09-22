<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarder = [];

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }
}
