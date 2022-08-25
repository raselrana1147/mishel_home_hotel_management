<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\RoomKeeper;
use App\Models\Admin\RoomType;
use App\Models\Admin\Floor;
use App\Models\Review;

class Room extends Model
{
    use HasFactory;


    public function room_type()
    {
    	return $this->belongsTo(RoomType::class);
    }

    public function floor()
    {
    	return $this->belongsTo(Floor::class);
    }

    public function room_keeper()
    {
    	return $this->belongsTo(RoomKeeper::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }




    
}
