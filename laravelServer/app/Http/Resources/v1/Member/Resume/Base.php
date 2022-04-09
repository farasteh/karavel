<?php

namespace App\Http\Resources\v1\Member\Resume;

use App\Models\BaseResume;
use Illuminate\Http\Resources\Json\JsonResource;

class Base extends JsonResource
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
            'id'              => $this->id,
            'user_id'         => $this->user_id,
            'image'           => $this->image,
            'name'            => $this->name,
            'last_name'       => $this->last_name,
            'job'             => $this->job,
            'category_job'    => $this->category_job,
            'gender'          => $this->gender,
            'marital_status'  => $this->marital_status,
            'soldier'         => $this->soldier,
            'birth_date'      => $this->birth_date,
            'email'           => $this->email,
            'mobile'          => $this->mobile ,
            'phone'           => $this->phone,
            'site'            => $this->site,
            'province'        => $this->province,
            'city'            => $this->city,
            'comment'         => $this->comment,
            'address'         => $this->address,
            'file'            => $this->file,
            'rank'            => $this->getResumePercent() ,
            'contact_status'  => $this->contact_status(),
            'sms_status'      => $this->sms_status(),
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
