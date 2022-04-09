<?php

namespace App\Http\Resources\v1\Job;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\v1\Job\JobCategoryCollection;
class JobCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
    public function with($request)
    {
        return [
            'success' => true
        ];
    }
}
