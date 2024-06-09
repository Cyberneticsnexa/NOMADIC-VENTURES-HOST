<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelCityMap extends Model
{
    use HasFactory;

    protected $table = 'hotel_city_map';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'hotel_id',
        'city_id',
    ];

    public $timestamps = false;

    public function cityName() {
        return $this->hasOne( HotelCity::class, 'id', 'city_id' );
    }
}
