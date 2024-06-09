<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourRoomModificationHistory extends Model
{
    use HasFactory;

    protected $table = 'tour_room_modification_history';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'tour_id',
        'tour_schedule_id',
        'modification_count',
        'last_modify_date',
    ];

    public $timestamps = false;
}
