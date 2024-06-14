<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelledReservation extends Model
{
    use HasFactory;

    protected $table='cancelled_reservation';
    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'tour_number',
        'tour_id',
        'tour_schedule_id',
        'hotel_id',
        'no_of_nights',
        'reservation_voucher_no',
        'checkin_date',
        'checkout_date',
        'rate',
        'special_requirement',
        'reservation_sended',
        'confirmation_no',
        'booking_status',
        'created_at',
        'updated_at',
    ];

    public function hotelDetails() {
        return $this->hasOne( Hotel::class, 'id', 'hotel_id' );
    }
    public function tourDetails() {
        return $this->hasOne( Tour::class, 'id', 'tour_id' );
    }
}
