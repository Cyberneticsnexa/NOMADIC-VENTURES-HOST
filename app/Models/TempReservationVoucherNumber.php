<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempReservationVoucherNumber extends Model
{
    use HasFactory;
    protected $table='temp_hotel_reservation_voucher_number';
    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'tour_id',
        'hotel_id',
        'voucher_number',
    ];

    public $timestamps = false;
}
