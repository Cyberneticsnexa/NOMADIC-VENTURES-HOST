<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationVoucher extends Model
{
    use HasFactory;

    protected $table='hotel_reservation_voucher';
    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'tour_schedule_id',
        'tour_id',
        'hotel_id',
        'checkin_date',
        'checkout_date',
        'no_of_nights',
        'rate',
        'special_requirement',
        'created_at',
        'updated_at',
    ];
}
