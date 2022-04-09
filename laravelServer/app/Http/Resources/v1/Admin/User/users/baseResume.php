<?php

namespace App\Http\Resources\v1\Admin\User\users;

use Illuminate\Http\Resources\Json\JsonResource;

class baseResume extends JsonResource
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
            'id'      =>  $this->id ,
            'name'          => $this->name ,
            'last_name'     => $this->last_name
        ];
    }
}
