<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideLanguageMap extends Model
{
    use HasFactory;
    protected $table = 'guide_language_map';

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'id',
        'guide_id',
        'language_id',
        
    ];
    public $timestamps=false;

    public function guideLanguageName() {
        return $this->hasOne( GuideLanguage::class, 'id', 'language_id' );
    }
}
