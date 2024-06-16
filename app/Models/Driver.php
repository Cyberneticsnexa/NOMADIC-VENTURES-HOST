<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'driver';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'full_name',
        'nic_no',
        'contact_no',
        'date_of_birth',
        'licence_no',
        'address',
        'is_active',
        'created_at',
        'updated_at',
    ];

    public function licenceImages() {
        return $this->hasOne( LicenceImage::class, 'driver_id', 'id' );
    }

}
