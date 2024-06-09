<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehical extends Model
{
    use HasFactory;

    protected $table = 'vehical';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'vehical_model',
        'vehical_no',
        'vehical_type',
        'is_active',
        'created_at',
        'updated_at',
    ];

    public function vehicalTypeDetails() {
        return $this->hasOne( VehicalType::class, 'id', 'vehical_type' );
    }
}
