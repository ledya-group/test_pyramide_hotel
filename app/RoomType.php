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

    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_type_id');
    }
}
