<?php

namespace App\Models;

use App\Http\Resources\v1\Site\resume;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\behavioralSkill;
use App\Models\resumeStatus;
use Illuminate\Support\Facades\DB;

class Advertising extends Model
{
    use HasFactory,SoftDeletes;
    protected $table  = 'advertisings';
    protected $fillable = [
        'user_id',
        'title',
        'job_id',
        'category_id',
        'work_category_id',
        'city',
        'CooperationType',
        'money',
        'HistoryJop',
        'document',
        'gender',
        'Soldier',
        'FildStudy',
        'TimeUp',
        'TimeDown',
        'comment',
        'is_show',
        'province',
        'possibilities',
        'is_show_comment' ,
        'company_id' ,
        'location' ,
        'age_id'
    ];


    public  function Cooperation_Type()
    {
        return $this->hasOne(CooperationType::class,'id','CooperationType');
    }
    public function Money()
    {
        return $this->hasOne(Money::class,'id','money');
    }
    public function User()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function languagess() {
        return $this->belongsToMany(Language::class , 'advertising_languages' , 'advertising' , 'language') ;
    }

    public function Age()
    {
        return $this->belongsTo(Age::class,'age_id');
    }
    public  function  company(){
        return $this->belongsTo(Company::class);
    }
    public function StatusResume($id)
    {
        return resumeStatus::find($id);
    }
    public function Job()
    {
        return $this->belongsTo(Job::class,'job_id');
    }

    public function historyJop()
    {
        return $this->belongsTo(HistoryJop::class,'HistoryJop');
    }

    public function Document()
    {
        return $this->belongsTo(Document::class,'document');
    }

    public function Gender()
    {
        return $this->belongsTo(Gender::class,'gender');
    }

    public function CategoryJob()
    {
        return $this->belongsTo(CategoryJob::class,'category_id');
    }

    public function WorkCategory()
    {
        return $this->belongsTo(CategoryWork::class,'work_category_id');
    }

    public function Province()
    {
        return $this->belongsTo(Province::class,'province');
    }


    public function soldier()
    {
        return $this->belongsTo(Soldier::class,'Soldier');
    }

    public function City()
    {
        return $this->belongsTo(City::class,'city');
    }

    public function categoryWorks()
    {
        return $this->belongsToMany(CategoryWork::class , 'job_advertisings' , 'id_advertising' , 'id_work_category' );
    }

    public function baseResumes()
    {

        return $this->belongsToMany(BaseResume::class , 'advertizing_resumes' , 'advertising' , 'base_resume' )
            ->withPivot( 'status' , 'money')->withTimestamps();
    }
    public function statusLists()
    {
        return $this->belongsToMany(BaseResume::class , 'resume_status_lists' , 'advertising' , 'base_resume' )
            ->withPivot( 'status' , 'comment' , 'Companycomment')->withTimestamps();
    }
    public function LikedAds()
    {
        return $this->belongsToMany(BaseResume::class , 'favourite_advertisings' , 'advertising_id' , 'base_resume_id' );

    }
    public function unreadCount()
    {
        return $this->baseResumes()->wherePivot('status' , 1 )->count();
    }

    public function behavioralSkills()
    {
        return $this->belongsToMany(behavioralSkill::class  , 'advertising_behavioral_skills' , 'advertising', 'behavioral_skill' );
    }
    public function posibilities()
    {
        return $this->belongsToMany(Possibility::class  , 'advertising_posibilities' , 'advertising', 'possibility' );
    }

    public function StatusRseume()
    {

    }
    public function advertingJob(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(CategoryWork::class , 'job_advertisings' , 'id_advertising' , 'id_work_category');
    }
    public function Status($type)
    {
        if($type == ''){
            return [
                'title' => 'Pending',
                'comment' => 'آگهی هنوز تایید نشده و در دست بررسی می باشد.'
            ];
        }

        if($type == 'yes'){
            return [
                'title' => 'yes',
                'comment' => 'آگهی تایید شده '
            ];
        }

        if($type == 'no'){
            return [
                'title' => 'no',
                'comment' => 'آگهی تایید نشده '
            ];
        }
    }

    public function advertisingSpeciala()
    {
        return $this->hasOne(AdvertisingSpecial::class,'advertising_id','id');
    }
    public function Specials($id): bool
    {

        if(empty($id)){
            return false;
        }
        return true;
    }

    public function telegram () {
        return $this->hasOne(telegramAdvertising::class, 'advertising');
    }

}
