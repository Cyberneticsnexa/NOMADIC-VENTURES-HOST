<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenceImage extends Model
{
    use HasFactory;

    protected $table = 'licence_image';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'driver_id',
        'front_image_name',
        'back_image_name',
        'created_at',
        'updated_at',
    ];
}
