<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Client extends Model
{
    use PresentableTrait;

    protected $guarded = [];

    protected $with = ['profile'];
	
    protected $presenter = 'App\Presenters\Client';

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
    // public function scopeWithReservationsInProcess($query)
    // {
    //     return $query->whereHas('reservations', function($query) {
    //         $query->where('checkout', '<', \Carbon\Carbon::today());
    //     });
    // }
}
