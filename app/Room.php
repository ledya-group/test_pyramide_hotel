<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Room extends Model
{
	use SoftDeletes;
	use PresentableTrait;

    protected $guarded = [];
	
    protected $presenter = 'App\Presenters\Room';

	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('type', function ($query) {
			$query->with('type');
		});

		static::deleting(function ($room) {
			$room->reservation()->delete();
		});
	}
	
	public function reservation()
	{
		return $this->hasMany(Reservation::class)
			->latest()
			->withoutGlobalScopes();
	}

	public function hasNoActiveReservation()
	{
		return $this->hasMany(Reservation::class)
			->orderBy('id', 'desc')
			->limit(1)
			;
	}

	public function getPriceAttribute()
	{
		return $this->type->base_price;
	}

	public function type()
	{
		return $this->belongsTo(RoomType::class, 'room_type_id');
	}

	public function available()
	{
		$freeRooms = $this->whereDoesntHave('reservation', function ($query) {
			$query->where('checkout', '>', \Carbon\Carbon::today());
		})->orWhere(function ($query) {
			$query->doesntHave('reservation');
		});

		return $freeRooms->get();
	}

	public function scopeOpen($query, $room_type_id)
	{
		return $query->whereDoesntHave('reservation', function ($query) {
			$query->where('checkout', '>', \Carbon\Carbon::today());
		})->orWhere(function ($query) {
			$query->doesntHave('reservation');
		})->where('room_type_id', $room_type_id);
	}

	public function isFree()
	{
		$today = \Carbon\Carbon::today();

		$reservation = $this->reservation;

		if ($reservation->count() == 0) return true;

		if (
			$reservation->count() > 0 and (
				$reservation->where('checkout', '<', $today)
					->where('checkin', '>=', $today)
					->count() !== 0 
			)
		) { return true; }

		if (
			$reservation->count() > 0 and (
				$reservation->where('checkout', '>', $today)
					->where('checkin', '>=', $today)
					->count() !== 0 
			)
		) { return true; }

		// if () { return true; }
		
		return false;
		$this->reservation->where('checkout', '<', $today);
		if ($this->reservation)
		return ;
	}

	public function getStatus()
	{
		$data = [];

		switch($this->free()) {
			case false:
				$data = [
					'level' => 'danger',
					'label' => 'Occupé'
				];
				break;

			case true:
				$data = [
					'level' => 'success',
					'label' => 'Libre'
				];
				break;
		}

		return $data;
	}

	public function occupant()
	{
		return $this->reservation()
			->where('checkin', '<=', \Carbon\Carbon::today())
			->first();

		return $this->whereId($this->id)
			->where(function ($query) {
				$query->whereHas('reservation', function ($query) {
					$query->where('checkin', '<=', \Carbon\Carbon::today());
				});		
			})->with('reservation')->get();
	}

	public function free()
	{
		// if($this->reservation->count() == 0) {
		// 	return true;
		// }

		return true;
	}
}
