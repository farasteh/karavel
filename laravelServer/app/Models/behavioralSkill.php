<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class behavioralSkill extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'title',
    ];
    protected $table = 'behavioral_skills';

    public function advertisings()
    {
        return $this->belongsToMany(Advertising::class  , 'advertising_behavioral_skills' , 'advertising', 'behavioral_skill' );
    }
}
