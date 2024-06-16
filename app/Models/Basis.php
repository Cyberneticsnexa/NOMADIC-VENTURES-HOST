<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basis extends Model
{
    use HasFactory;

    protected $table='basis';
    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'title',
        'code',
        'is_active',
        'created_at',
        'updated_at',
    ];
}
