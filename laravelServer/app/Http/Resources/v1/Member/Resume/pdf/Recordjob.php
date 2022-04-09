<?php

namespace App\Http\Resources\v1\Member\Resume\pdf;

use Illuminate\Http\Resources\Json\JsonResource;

class Recordjob extends JsonResource
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
            'job_side'             => $this->job_side,
            'job'                  => $this->getJob,
            'center_job'           =>$this->getCenterJob,
            'title_center_job'     => $this->title_center_job,
            'cooperation_type'     => $this->getCooperationType,
            'group_levels'         => $this->getGroupLevels,
            'province'             => $this->getProvince,
            'city'                 => $this->getCity,
            'start'                => $this->start,
            'end'                  => $this->end,
            'comment'              => $this->comment,
            'working'              => $this->working,
            'satisfying'           => $this->checkSatisfying(),
        ];
    }
}
