<?php

namespace App\Http\Resources\v1\Member\Resume\pdf;
use App\Http\Resources\v1\Member\Resume\pdf\ArticleCollection;
use App\Http\Resources\v1\Member\Resume\pdf\CertificatesCollection;
use App\Http\Resources\v1\Member\Resume\pdf\LanguageCollection;
use App\Http\Resources\v1\Member\Resume\pdf\RecordjobCollection;
use App\Http\Resources\v1\Member\Resume\pdf\RecordStudyCollection;
use App\Http\Resources\v1\Member\Resume\pdf\SocialCollection;

use Illuminate\Http\Resources\Json\JsonResource;

class ResultResume extends JsonResource
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
            'id'                 => $this->id,
            'image'              => $this->image,
            'name'               => $this->name,
            'last_name'          => $this->last_name,
            'job'                => $this->getjob,
            'cat'                => $this->getCategoty,
            'gens'               => $this->gens,
            'email'             => $this->email ,
            'mobile'             => $this->mobile,
            'phone'              => $this->phone,
            'site'               => $this->site,
            'province'           => $this->getProvince,
            'city'               => $this->getCity,
            'address'            => $this->address ,
            'comment'            => $this->comment ,
            'birth_date'        => $this->birth_date ,
            'soldier'            => $this->getSoldier ,
            'marital_status'     => $this->marital_status ,
            'record_jobs'        => new RecordjobCollection($this->recordjobs) ,
            'record_studies'     => new RecordStudyCollection($this->recordStudies),
            'certificates'       => new CertificatesCollection ($this->certificates) ,
            'languages'          => new LanguageCollection($this->languages) ,
            'exprimentas'        => $this->exprimentas ,
            'honors'             => $this->honors ,
            'articles'           => new ArticleCollection($this->articles) ,
            'projects'           => $this->projects ,
            'social_networks'    => new SocialCollection ($this->Socials ) ,
            'rank'               => $this->getResumePercent() ,
            'companies'          => $this->companies->pluck('id'),
            'contact_status'     => $this->contact_status()
        ];
    }

    public  function getResumePercent() {
        $rank = 20 ;
        if($this->image)
            $rank += 5 ;
        if($this->image)
            $rank += 15 ;
        if($this->recordStudies->count() != 0)
            $rank += 5 ;
        if($this->recordStudies->count() > 1)
            $rank += 5 ;
        if($this->recordjobs->count() != 0)
            $rank += 10 ;
        if($this->recordjobs->count() > 1)
            $rank += 10 ;
        if ( $this->languages->count() != 0)
            $rank += 10 ;
        if ( $this->articles->count() != 0)
            $rank += 5 ;
        if ( $this->projects->count() != 0)
            $rank += 5 ;
        if ( $this->honors->count() != 0)
            $rank += 5 ;
        if ( $this->certificates->count() != 0)
            $rank += 5 ;
        return $rank ;
    }
}
