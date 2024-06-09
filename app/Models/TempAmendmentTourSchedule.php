<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempAmendmentTourSchedule extends Model
{
    use HasFactory;

    protected $table = 'temp_amendment_tour_schedule';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'tour_id',
        'tour_number',
        'date',
        'guide',
        'vehical',
        'driver',
        'hotel',
        'hotel_booking_status',
        'special_requirement',
        'amended_count',
        'created_at',
    ];

    public $timestamps = false;

    public function tourDetails() {
        return $this->hasOne( Tour::class, 'id', 'tour_id' );
    }

    public function guideDetails() {
        return $this->hasOne( Guide::class, 'id', 'guide' );
    }

    public function vehicalDetails() {
        return $this->hasOne( Vehical::class, 'id', 'vehical' );
    }

    public function driverDetails() {
        return $this->hasOne( Driver::class, 'id', 'driver' );
    }

    public function hotelDetails() {
        return $this->hasOne( Hotel::class, 'id', 'hotel' );
    }

    public function confirmationDetails() {
        return $this->hasOne( ConfirmatonVoucher::class, 'tour_schedule_id', 'id' );
    }

    public function roomDetails() {
        return $this->hasMany( TourRoomMap::class, 'tour_schedule_id', 'id' );
    }

    public function reservationDetails() {
        return $this->hasOne( ReservationVoucher::class, 'tour_schedule_id', 'id' );
    }

}
