<?php

namespace App\Http\Resources\v1\User;

use App\Http\Resources\v1\Job\JobCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class Advertising extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'Job' => new JobCollection($this->Job),
            'CategoryJob' => $this->CategoryJob,
            'WorkCategory' => $this->WorkCategory,
        ];
    }
}
