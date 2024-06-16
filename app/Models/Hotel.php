<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotel';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'hotel_name',
        'rate',
        'phone_one',
        'phone_two',
        'address',
        'is_active',
        'created_at',
        'updated_at',
    ];

    public function hotelCityDetails() {
        return $this->hasOne( HotelCityMap::class, 'hotel_id', 'id' );
    }

    public function hotelRoomTypeDetails() {
        return $this->hasMany( HotelRoomTypeMap::class, 'hotel_id', 'id' );
    }

}
