<?php

namespace App\Http\Resources\v1\Member\Resume\pdf;

use Illuminate\Http\Resources\Json\JsonResource;

class Social extends JsonResource
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
            'id'  => $this->id ,
            'social_network' => $this->getSocial , 
            'link'  => $this->link  
        ];
    }
}
