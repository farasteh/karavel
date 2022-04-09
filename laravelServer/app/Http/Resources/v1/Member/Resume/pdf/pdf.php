<?php

namespace App\Http\Resources\v1\Member\Resume\pdf;

use Illuminate\Http\Resources\Json\JsonResource;

class pdf extends JsonResource
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
            'number'         => $this->number,
            'name'           => $this->name,
        ];
    }
}
