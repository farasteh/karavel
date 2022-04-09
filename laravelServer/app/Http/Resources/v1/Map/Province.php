<?php

namespace App\Http\Resources\v1\Map;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Map\CityCollection;

class Province extends JsonResource
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
            'id'        => $this->id,
            'title'     => $this->title,
            'text'          => $this->title,
            'center'    => $this->center,
            'cities'    => new CityCollection($this->cities),
        ];
    }
}
