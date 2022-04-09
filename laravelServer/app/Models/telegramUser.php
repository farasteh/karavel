<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class telegramUser extends Model
{
    use HasFactory;
    protected  $fillable = ['base_resume' , 'status'];

    public function resumes () {
        return $this->belongsTo(BaseResume::class, 'base_resume');
    }
}
