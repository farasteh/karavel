<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertizingResume extends Model
{
    use HasFactory;

    public function statusLists() {
        return $this->hasMany(resumeStatusList::class , 'adResuem' ) ;
    }
}
