<?php

namespace App\Http\Resources\v1\Site;

use App\Http\Resources\v1\Possibilities\ActivityCompany;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyAdvertising extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this->Banner($this->banner));

        return [
            'id'               => $this->id,
            'name_fa'          => $this->name,
            'name_en'          => $this->name_en,
            'site'             => $this->address_site,
            'Activity'         => new ActivityCompany($this->Activity),
            'Employee_count'   => $this->Employee_count,
            'logo'             => $this->Logo($this->logo),
            'banner'           => $this->Banner($this->banner),
            'year'             => $this->stablish_year,
            'phone'            => $this->Phone
        ];
    }
}
