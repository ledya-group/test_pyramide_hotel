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
			->withoutGlobalScopes();
	}

	public function hasNoActiveReservation()
	{
		return $this->hasMany(Reservation::class)
			->withoutGlobalScopes();
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
		// return !! $this->countable != 0;
		return $this->free;
	}
}
