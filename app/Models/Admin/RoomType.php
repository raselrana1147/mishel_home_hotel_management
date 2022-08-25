<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\AmenityRoomType;
use App\Models\Admin\Amenity;

class RoomType extends Model
{
    use HasFactory;

    
    public function amenities() 
    {
       return $this->belongsToMany(Amenity::class, 'amenity_room_types', 'room_type_id', 'amenity_id');
    }
}
