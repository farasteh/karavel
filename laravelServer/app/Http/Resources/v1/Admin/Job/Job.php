<?php

namespace App\Http\Resources\v1\Admin\Job;

use Illuminate\Http\Resources\Json\JsonResource;

class Job extends JsonResource
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
            'id'          => $this->id,
            'title'       => $this->title,
            'image'       => $this->image,
            'CategoryJob' => new CategoryJobCollection($this->CategoryJobs)
        ];
    }
}
