<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory,SoftDeletes;

    protected $table  = 'companies';
    protected $fillable = [
        'user_id',
        'name',
        'name_en',
        'province_id',
        'logo',
        'Employee_count',
        'Phone',
        'address_site',
        'comment',
        'city_id' ,
        'banner' ,
        'mobile'
    ];

    public function Logo($name)
    {
        if($name == null || $name == '')
        {
            return url('public/images/company/no-company.png') ;
        }
        return  url('public/images/company/'. $name);

    }
    public function Banner($name)
    {
        if($name == null || $name == '')
        {
            return url('public/images/company/header.jpg') ;
        }
        return  url('public/images/company/'. $name);

    }


    public function Activity()
    {
        return $this->hasOne(ActivityCompany::class,'id','Activity_id');
    }

    public function user()
    {
        return $this->hasOne(User::class , 'id' , 'user_id');
    }

    public function activityCompanies()
    {
        return $this->belongsToMany(Job::class  , 'job_companies' , 'company', 'job' );
    }
    public  function advertisings() {
        return $this->hasMany(Advertising::class)->where('is_show' , 'yes')->orderBy('created_at' , 'desc') ;
    }

    public function companyNotice()
    {
        return $this->hasOne(CompanyNotice::class,'company_id','id');
    }
    public function noticed($id): bool
    {
        if(empty($id)){
            return false;
        }
        return true;
    }

    public function noticedTime($id)
    {
        if(!empty($id)){
            return $id->expire_time;
        }
        return null;
    }

    public function resumes()
    {
        return $this->belongsToMany(BaseResume::class , 'company_resumes', 'company' , 'base_resume' )
            ->withTimestamps();
    }
}
