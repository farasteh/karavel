<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecordStudy extends Model
{
    use HasFactory  , SoftDeletes;

    public function checkStuding()
    {
        if( $this->Studying == 1)
            return true; 
        return false ;
    }
    public function getDocument()
    {
        return $this->hasOne(Document::class , 'id' , 'document');
    }
    public function getInstitute()
    {
        return $this->hasOne(Institute::class , 'id' , 'institutes');
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
