<?php

namespace App\Http\Resources\v1\Member\Resume;

use Illuminate\Http\Resources\Json\JsonResource;

class RecordJob extends JsonResource
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
            'id'                   => $this->id,
            'base_resume'          => $this->base_resume,
            'job_side'             => $this->job_side,
            'job'                  => $this->job,
            'center_job'           =>$this->center_job,
            'title_center_job'     => $this->title_center_job,
            'cooperation_type'     => $this->cooperation_type,
            'group_levels'         => $this->group_levels,
            'province'             => $this->province,
            'city'                 => $this->city,
            'start'                => $this->start,
            'end'                  => $this->end,
            'comment'              => $this->comment,
            'working'              => $this->checkWorking(),
            'satisfying'            =>$this->checkSatisfying(),

        ];
    }
}
