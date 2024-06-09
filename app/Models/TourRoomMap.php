<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourRoomMap extends Model
{
    use HasFactory;

    protected $table = 'tour_room_map';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'tour_id',
        'tour_schedule_id',
        'hotel_id',
        'room_category_id',
        'room_type_id',
        'basis_id',
        'no_of_room',
        'created_at',
        'updated_at',
    ];

    public function roomCategory() {
        return $this->hasOne( RoomCategory::class, 'id', 'room_category_id' );
    }

    public function roomType() {
        return $this->hasOne( RoomType::class, 'id', 'room_type_id' );
    }

    public function roomBasis() {
        return $this->hasOne( Basis::class, 'id', 'basis_id' );
    }
}
