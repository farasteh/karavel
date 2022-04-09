<?php

namespace App\Http\Resources\v1\Site;

use App\Http\Resources\v1\Advertising\PossibilityCollection;
use App\Http\Resources\v1\Job\CategoryWorkCollection;
use App\Http\Resources\v1\Site\job;
use App\Http\Resources\v1\Job\JobCategory;
use App\Http\Resources\v1\Map\City;
use App\Http\Resources\v1\Site\province;
use App\Http\Resources\v1\Possibilities\Age;
use App\Http\Resources\v1\Possibilities\AgeCollection;
use App\Http\Resources\v1\Possibilities\CooperationType;
use App\Http\Resources\v1\Possibilities\Document;
use App\Http\Resources\v1\Possibilities\FildStudy;
use App\Http\Resources\v1\Possibilities\Gender;
use App\Http\Resources\v1\Possibilities\HistoryJob;
use App\Http\Resources\v1\Possibilities\Money;
use App\Http\Resources\v1\Possibilities\MoneyCollection;
use App\Http\Resources\v1\Possibilities\Soldier;
use App\Http\Resources\v1\Possibilities\Language;
use App\Http\Resources\v1\Possibilities\LanguageCollection;
use App\Http\Resources\v1\User\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Admin\Advertising\behavioralSkillCollection;


class Advertising extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'title'             => $this->title,
            'TimeUp'            => $this->TimeUp,
            'TimeDown'          => $this->TimeDown,
            'comment'           => $this->comment,
            'money'             => new Money($this->Money),
            'HistoryJop'        => new HistoryJob($this->historyJop),
            'document'          => new Document($this->Document),
            'FildStudy'         => $this->FildStudy,
            'Gender'            => new Gender($this->Gender),
            'Soldier'           => new Soldier($this->soldier),
            'CooperationType'   => new CooperationType($this->Cooperation_Type),
            'job'               => new job($this->Job),
            'category'          => new JobCategory($this->CategoryJob),
            'work_category'     => new CategoryWorkCollection($this->categoryWorks),
            'province'          => new province($this->Province),
            'city'              => new City($this->City),
            'language'          => new LanguageCollection($this->languagess) ,
            'Company'           => new CompanyAdvertising($this->Company),
            'liked_users'       => $this->LikedAds->pluck('id'),
            'resumes'           => new resumeCollection($this->baseResumes) ,
            'posibilities'      => new PossibilityCollection( $this->posibilities) ,
            'behavioralskills'  => new behavioralSkillCollection( $this->behavioralSkills) ,
            'created_at'       => Verta::instance($this->created_at)->formatDifference() ,
            'location'         => $this->location ,
            'age'              => new Age($this->Age),
            'special'          => $this->advertisingSpeciala ,
            'create_time'      =>  $this->created_at
        ];
    }
}
