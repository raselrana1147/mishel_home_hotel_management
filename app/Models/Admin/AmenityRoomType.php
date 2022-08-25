<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomType;
use App\Models\Amenity;

class AmenityRoomType extends Model
{
    use HasFactory;

    public function room_type()
    {
    	return $this->belongsTo(RoomType::class,'room_type_id');
    }

    public function amenity()
    {
    	return $this->belongsTo(Amenity::class,'amenity_id');
    }
}
