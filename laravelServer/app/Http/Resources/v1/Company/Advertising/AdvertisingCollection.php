<?php

namespace App\Http\Resources\v1\Company\Advertising;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Verta;

class AdvertisingCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}