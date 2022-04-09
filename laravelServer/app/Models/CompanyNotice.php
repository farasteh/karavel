<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyNotice extends Model
{
    use HasFactory;

    protected $table  = 'company_notices';
    protected $fillable = ['company_id' , 'expire_time'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
