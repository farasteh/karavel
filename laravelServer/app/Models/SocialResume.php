<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialResume extends Model
{
    use HasFactory ,SoftDeletes ;

    public function getSocial()
    {
        return $this->hasOne(SocialNetwork::class , 'id' , 'social_network');
    }
}
