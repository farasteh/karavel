<?php

namespace App\Http\Resources\v1\Member\Resume\pdf;

use Illuminate\Http\Resources\Json\JsonResource;

class Certificates extends JsonResource
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
            'certificate'     => $this->certificate,
            'title'           =>$this->title,
            'Institute'       => $this->Institute,
            'date'            => $this->date,
        ];
    }
}
