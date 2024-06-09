<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmatonVoucher extends Model
{
    use HasFactory;

    protected $table='confirmaton_voucher';
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
        'confirmation_no',
        'created_at',
        'updated_at',
    ];

    public function hotelDetails() {
        return $this->hasOne( Hotel::class, 'id', 'hotel_id' );
    }
    public function tourScheduleDetails() {
        return $this->hasOne( TourSchedule::class, 'id', 'tour_schedule_id' );
    }
}
