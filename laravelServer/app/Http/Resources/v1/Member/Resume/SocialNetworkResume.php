<?php

namespace App\Http\Resources\v1\Member\Resume;

use Illuminate\Http\Resources\Json\JsonResource;

class SocialNetworkResume extends JsonResource
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
            'base_resume'  =>$this->base_resume , 
            'social_network' => $this->social_network , 
            'link'  => $this->link  
        ];
    }
}
