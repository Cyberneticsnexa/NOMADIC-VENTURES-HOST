<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tour';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'tour_number',
        'guest_name',
        'country',
        'no_of_visiter',
        'arrivel_date',
        'departure_date',
        'agent',
        'status',
        'created_at',
        'updated_at',
    ];

    public function countryDetails() {
        return $this->hasOne( Country::class, 'id', 'country' );
    }

    public function agentDetails() {
        return $this->hasOne( Agent::class, 'id', 'agent' );
    }

    public function statusDetails() {
        return $this->hasOne( TourStatus::class, 'id', 'status' );
    }

    public function tourScheduleDetails() {
        return $this->hasMany( TourSchedule::class, 'tour_id', 'id' );
    }

    public function reservationDetails() {
        return $this->hasMany( ReservationVoucher::class, 'tour_id', 'id' );
    }

}
