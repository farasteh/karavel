<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Gender;
use App\Models\resumeStatus;

class BaseResume extends Model
{
    use HasFactory,SoftDeletes;
    protected $table  = 'base_resumes';
    protected $fillable = [
        'user_id',
        'image',
        'name',
        'last_name',
        'job',
        'category_job',
        'work_job',
        'gender',
        'marital_status',
        'soldier',
        'birth_date',
        'email',
        'phone',
        'mobile',
        'site',
        'province',
        'city',
        'comment',
        'address',
        'file'
    ];

    public function socialNetwork()
    {
        return $this->belongsToMany(SocialNetwork::class)->withPivot('link');
    }

    public function user()
    {
        return $this->hasOne(User::class , 'id' , 'user_id');
    }

    public function advertizings()
    {
        return $this->belongsToMany(Advertising::class , 'advertizing_resumes', 'base_resume' , 'advertising' )
            ->withPivot( 'status'  , 'file')->withTimestamps();
    }
    public function fileAdvertizings()
    {
        return $this->belongsToMany(Advertising::class , 'advertizing_resumes', 'base_resume' , 'advertising' )
            ->where('file' ,  '!=' , 'null')
            ->withPivot( 'status'  ,'file')->withTimestamps();
    }
    public function statusLists()
    {
        return $this->belongsToMany(Advertising::class , 'resume_status_lists', 'base_resume' , 'advertising' )
            ->withPivot( 'status' , 'comment'  )->withTimestamps();
    }

    public function LikeAdvertizings()
    {
        return $this->belongsToMany(Advertising::class , 'favourite_advertisings', 'base_resume_id' , 'advertising_id' )
        ->where('is_show' , 'yes')->orderBy('created_at' , 'desc');
    }

    public function ADStatus($id)
    {
        return resumeStatus::find($id);
    }

    public function certificates() {
        return $this->hasMany(CertificatesResume::class , 'base_resume' , 'id');
    }
    public function recordStudies() {
        return $this->hasMany(RecordStudy::class , 'base_resume' , 'id')->orderBy('index' , 'asc');
    }
    public function recordjobs() {
        return $this->hasMany(RecordJob::class , 'base_resume' , 'id')->orderBy('index' , 'asc');
    }
    public function languages() {
        return $this->hasMany(LangaugeResume::class , 'base_resume' , 'id')->orderBy('index' , 'asc');
    }
    public function exprimentas() {
        return $this->hasMany(ExperimentalResume::class , 'base_resume' , 'id')->orderBy('index' , 'asc');
    }
    public function honors() {
        return $this->hasMany(HonorsResume::class , 'base_resume' , 'id')->orderBy('index' , 'asc');
    }
    public function articles() {
        return $this->hasMany(ArticleResume::class , 'base_resume' , 'id')->orderBy('index' , 'asc');
    }
    public function projects() {
        return $this->hasMany(ProjectsResume::class , 'base_resume' , 'id')->orderBy('index' , 'asc');
    }
    public function Socials() {
        return $this->hasMany(SocialResume::class , 'base_resume' , 'id')->orderBy('index' , 'asc');
    }

    public function gens()
    {
        return $this->hasOne(Gender::class , 'id' , 'gender');
    }
    public function getjob()
    {
        return $this->hasOne(Job::class , 'id' , 'job');
    }
    public function getCategoty () {
        return $this->hasOne(CategoryJob::class , 'id' , 'category_job');
    }
    public function getSoldier()
    {
        return $this->hasOne(Soldier::class , 'id' , 'soldier');
    }
    public function getProvince()
    {
        return $this->hasOne(Province::class , 'id' , 'province');
    }
    public function getCity()
    {
        return $this->hasOne(City::class , 'id' , 'city');
    }

    public function telegram () {
        return $this->hasOne(telegramUser::class, 'base_resume');
    }

    public function avatar($name)
    {
        if($name == null || $name == '')
        {
            if($this->gender == 2)
                return url('public/images/company/no-photo.jpg') ;
            return url('public/images/company/no-photo.jpg') ;
        }
        return  url('public/images/company/'. $name);

    }
    public function companies()
    {
        return $this->belongsToMany(Company::class , 'company_resumes', 'base_resume' , 'company' )
            ->withTimestamps();
    }

    public function contact_status() {
        if($this->disable_contact == 1)
            return true;
        else
            return false;
    }
    public function sms_status() {
        if($this->disable_sms == 1)
            return true;
        else
            return false;
    }
}
