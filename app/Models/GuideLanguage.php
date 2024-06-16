<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideLanguage extends Model
{
    use HasFactory;
    protected $table = 'guide_language';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'language',
        'is_active',
        'created_at',
        'updated_at',
    ];

   
}
