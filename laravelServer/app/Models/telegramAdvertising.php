<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class telegramAdvertising extends Model
{
    use HasFactory;

    protected  $fillable = ['advertising' , 'status'];

    public function davertisings () {
        return $this->belongsTo(Advertising::class, 'advertising');
    }
}
