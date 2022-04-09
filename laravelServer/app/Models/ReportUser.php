<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportUser extends Model
{
    use HasFactory;
    protected $table  = 'report_users';
    protected $fillable = [
        'id_user',
        'id_user_report',
        'comment',
    ];

    public function User()
    {
        return $this->hasOne(User::class,'id','id_user_report');
    }
}
