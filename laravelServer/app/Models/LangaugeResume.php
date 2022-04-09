<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LangaugeResume extends Model
{
    use HasFactory , SoftDeletes;
    public function getLanguage()
    {
        return $this->hasOne(Language::class , 'id' , 'lang_id');
    }
}
