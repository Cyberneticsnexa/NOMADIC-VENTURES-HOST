<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;
    protected $table = 'guide';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'full_name',
        'nic',
        'address',
        'contact_no',
        'is_active',
        'created_at',
        'updated_at',
    ];

    public function guideLanguage() {
        return $this->hasMany( GuideLanguageMap::class, 'guide_id', 'id' );
    }
}
