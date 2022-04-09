<?php

namespace App\Http\Resources\v1\Company\Staff\resume;

use App\Http\Resources\v1\Admin\Telegram\category;
use App\Http\Resources\v1\Map\City;
use App\Http\Resources\v1\Site\job;
use App\Http\Resources\v1\Site\province;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;

class resume extends JsonResource
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
            'id'             => $this->id,
            'name'            => $this->name,
            'last_name'       => $this->last_name,
            'job'             => new job($this->getjob) ,
            'category'        => new category($this->getCategoty) ,
            'province'        => new province($this->getProvince) ,
            'city'            => new city($this->getCity) ,
            'craeted'         => Verta::instance($this->pivot->created_at)->format((' j %B Y '))
        ];
    }
}
