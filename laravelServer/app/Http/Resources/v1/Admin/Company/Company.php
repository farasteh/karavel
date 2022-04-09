<?php

namespace App\Http\Resources\v1\Admin\Company;

use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Admin\Advertising\AdvertisingCollection;
use App\Models\Province ;
use App\Http\Resources\v1\Map\Province as provinceResource;
use App\Http\Resources\v1\Possibilities\ActivityCompanyIdCollection;

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
            'logo'             => $this->logo,
            'address_site'     => $this->address_site,
            'Activity_id'      => new ActivityCompanyIdCollection($this->activityCompanies),
            'Employee_count'   => $this->Employee_count,
            'Phone'            => $this->Phone,
            'comment'          => $this->comment,
            'city'             => $this->city_id,
            'province'         => $this->province_id ,
            'banner'           => $this->banner,
            'year'             => $this->stablish_year,
            'mobile'           => $this->mobile ,
            'date'             =>  Verta::instance($this->created_at)->format((' j %B Y '))
        ];
    }
}
