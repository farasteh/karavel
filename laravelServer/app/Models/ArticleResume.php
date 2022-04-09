<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleResume extends Model
{
    use HasFactory , SoftDeletes;

    public function getEffect()
    {
        return $this->hasOne(Effect::class , 'id' , 'effect');
    }
}
