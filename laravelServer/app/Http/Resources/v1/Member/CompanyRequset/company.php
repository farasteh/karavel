<?php

namespace App\Http\Resources\v1\Member\CompanyRequset;

use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;

class company extends JsonResource
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
            'id'           => $this-> id ,
            'craeted'      => Verta::instance($this->pivot->created_at)->format((' j %B Y ')),
            'name'         => $this->name ,
            'name_en'      => $this->name_en,
            'phone'        => $this->Phone ,
            'user'         => $this->user->name
        ];
    }
}
