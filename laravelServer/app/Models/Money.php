<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Money extends Model
{
    use HasFactory,SoftDeletes;

    protected $table  = 'money';
    protected $fillable = ['title'];
}
