<?php

namespace App\Http\Resources\v1\Possibilities;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityCompanyId extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->id;    
    }
}
