<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Reservation extends Model
{
	use SoftDeletes;
	use PresentableTrait;

    protected $guarded = [];

    protected $dates = ['checkin', 'checkout'];
	
    protected $presenter = 'App\Presenters\Reservation';

	protected static function boot()
	{
		parent::boot();

        static::addGlobalScope('client', function ($query) {
			$query->with('client');
		});

        static::addGlobalScope('room', function ($query) {
			$query->with('room');
		});

        static::addGlobalScope('client', function ($query) {
			$query->with('client');
		});
	}
	
	public function room()
	{
		return $this->belongsTo(Room::class);
	}

	public function client()
	{
		return $this->belongsTo(Client::class);
	}

	public function scopeActive($query)
	{
		$today = \Carbon\Carbon::today();

		$query = $query->where(function ($query) use ($today) {
			$query->where('checkin', '<=', $today)
				->where('checkout', '>=', $today);
		})->orWhere(function ($query) use ($today) {
			$query->where('checkin', '>=', $today);
		});

		return $query;
	}
}
