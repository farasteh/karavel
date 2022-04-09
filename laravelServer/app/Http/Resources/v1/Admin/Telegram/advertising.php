<?php

namespace App\Http\Resources\v1\Admin\Telegram;

use Illuminate\Http\Resources\Json\JsonResource;

class advertising extends JsonResource
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
            'id'            => $this->id ,
            'title'         => $this->title ,
            'company'       => new company($this->company ),
            'province'      => new province($this->Province) ,
            'city'          => new city($this->City) ,
            'job'           => new job($this->Job) ,
            'category'      => new category($this->CategoryJob) ,
            'telegram'      => $this->telegram ? true : false  ,
            'created'       => $this->created_at->toDateString(),
            'type'          => 'advertising'
        ];
    }
}
