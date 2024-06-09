<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelCity extends Model
{
    use HasFactory;

    protected $table = 'hotel_city';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'city',
        'is_active',
        'created_at',
        'updated_at',
    ];
}
