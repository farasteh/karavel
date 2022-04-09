<?php

namespace App\Http\Resources\v1\Member\Resume;

use Illuminate\Http\Resources\Json\JsonResource;

class Project extends JsonResource
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
            'base_resume'     => $this->base_resume,
            'title'            => $this->title,
            'company'           =>$this->company,
            'link'             => $this->link,
            'comment'          => $this->comment,
            'date'          => $this->date,
        ];
    }
}
