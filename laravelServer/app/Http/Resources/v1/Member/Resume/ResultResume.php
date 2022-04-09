<?php

namespace App\Http\Resources\v1\Member\Resume;

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
            'gens'               => $this->gens,
            'email '             => $this->email ,
            'mobile'             => $this->mobile,
            'phone'              => $this->phone,
            'site'               => $this->site,
            'province'           => $this->getProvince,
            'city'               => $this->getCity,
            'address'            => $this->address ,
            'comment'            => $this->comment ,
            'birth_date '        => $this->birth_date ,
            'soldier'            => $this->getSoldier ,
            'marital_status'     => $this->marital_status ,
            'record_jobs'        => $this->recordjobs , 
            'record_studies'     => $this->recordStudies,
            'certificates'       => $this->certificates ,
            'languages'          => $this->languages ,
            'exprimentas'        => $this->exprimentas ,
            'honors'             => $this->honors ,
            'articles'           => $this->articles ,
            'projects'          => $this->projects ,
        ];
    }
}
