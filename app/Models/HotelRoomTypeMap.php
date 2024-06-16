<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomTypeMap extends Model
{
    use HasFactory;

    protected $table = 'hotel_room_type_map';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'hotel_id',
        'room_category_id',
        'room_type_id',
    ];

    public $timestamps = false;

    public function categoryDetails() {
        return $this->hasOne( RoomCategory::class, 'id', 'room_category_id' );
    }

    public function roomTypeDetails() {
        return $this->hasOne( RoomType::class, 'id', 'room_type_id' );
    }
}
