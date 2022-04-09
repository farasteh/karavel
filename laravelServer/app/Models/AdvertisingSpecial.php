<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisingSpecial extends Model
{
    use HasFactory;
    protected $table  = 'advertising_specials';
    protected $fillable = ['advertising_id'];
}
