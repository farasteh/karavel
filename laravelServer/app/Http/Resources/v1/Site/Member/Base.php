<?php

namespace App\Http\Resources\v1\Site\Member;

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
            'name'            => $this->name,
            'last_name'       => $this->last_name,
            'email'           => $this->email,
            'mobile'          => $this->mobile ,
        ];
    }
}
