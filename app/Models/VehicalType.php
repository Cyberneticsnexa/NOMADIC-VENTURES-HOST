<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicalType extends Model
{
    use HasFactory;

    protected $table = 'vehical_type';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'vehical_type',
        'is_active',
        'created_at',
        'updated_at',
    ];
}
