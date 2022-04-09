<?php

namespace App\Http\Resources\v1\Site\Company;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Comapnysm extends JsonResource
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
            'id'               => $this->id,
            'name_fa'          => $this->name,
            'name_en'          => $this->name_en,
            'logo'             => $this->Logo($this->logo),
        ];
    }
}
