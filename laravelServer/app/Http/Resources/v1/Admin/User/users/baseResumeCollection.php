<?php

namespace App\Http\Resources\v1\Admin\User\users;

use Illuminate\Http\Resources\Json\ResourceCollection;

class baseResumeCollection extends ResourceCollection
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
