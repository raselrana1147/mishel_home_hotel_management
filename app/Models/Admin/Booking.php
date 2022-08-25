<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Room;

class Booking extends Model
{
    use HasFactory;

    public function room()
    {
    	return $this->belongsTo(Room::class);
    }
}
