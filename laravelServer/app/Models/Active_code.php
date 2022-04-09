<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Active_code extends Model
{
    use HasFactory;
    protected $table = 'active_codes';
    protected $fillable = ['token','mobile' , 'code' , 'time_at'];

    public function scopeVerifyCode($query , $code,  $token)
    {

    }

}
