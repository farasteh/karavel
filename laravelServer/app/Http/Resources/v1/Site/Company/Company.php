<?php

namespace App\Http\Resources\v1\Site\Company;

use App\Http\Resources\v1\Possibilities\ActivityCompanyIdCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Site\AdvertisingCollection ;

class Company extends JsonResource
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
            'id'               => $this->id,
            'name_fa'          => $this->name,
            'name_en'          => $this->name_en,
            'province'         => $this->province_id,
            'Activity_id'      => new ActivityCompanyIdCollection($this->activityCompanies),
            'Employee_count'   => $this->Employee_count,
            'Phone'            => $this->Phone,
            'logo'             => $this->Logo($this->logo),
            'address_site'     => $this->address_site,
            'comment'          => $this->comment,
            'city'             => $this->city_id,
            'banner'           => $this->Banner($this->banner),
            'year'             => $this->stablish_year,
            'advertisings'     => new AdvertisingCollection($this->advertisings)
        ];

    }
}
