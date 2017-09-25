<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomType extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->rooms()->delete();
        });
    }

    // to be *allRooms()*
    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_type_id');
    }

    // To review
    // public function freeRooms()
    // {
    //     return $this->rooms->whereDoesntHave('reservation', function ($query) {
	// 		$query->where('checkout', '>', \Carbon\Carbon::today());
	// 	})->orWhere(function ($query) {
	// 		$query->doesntHave('reservation');
	// 	});
    // }
}
