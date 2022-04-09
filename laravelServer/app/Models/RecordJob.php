<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecordJob extends Model
{
    use HasFactory  , SoftDeletes;

    public function checkWorking()
    {
        if( $this->working == 1)
            return true;
        return false;
    }
    public function checkSatisfying()
    {
        if( $this->satisfying == 1)
            return true;
        return false;
    }

    public function getJob ()
    {
        return $this->hasOne(Job::class , 'id' , 'job');
    }
    public function getCenterJob ()
    {
        return $this->hasOne(JobCenter::class , 'id' , 'center_job');
    }
    public function getCooperationType()
    {
        return $this->hasOne(CooperationType::class , 'id' , 'cooperation_type');
    }
    public function getGroupLevels()
    {
        return $this->hasOne(GroupLevel::class , 'id' , 'group_levels');
    }
    public function getProvince()
    {
        return $this->hasOne(Province::class , 'id' , 'province');
    }
    public function getCity()
    {
        return $this->hasOne(City::class , 'id' , 'city');
    }
}
