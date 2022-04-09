<?php

namespace App\Http\Resources\v1\Member\Resume;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ExperimentalResumeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return [
        //     'id'                => $this->id,
        //     'name'              => $this->name,
        //     'level'             => $this->level,
        //     'base_resume'        => $this->base_resume,
        // ];
        return parent::toArray($request);
    }
}
