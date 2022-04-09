<?php

namespace App\Http\Resources\v1\Member\Resume;

use Illuminate\Http\Resources\Json\JsonResource;

class RecordStudy extends JsonResource
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
            'id'                 => $this->id,
            'base_resume'        => $this->base_resume,
            'document'           => $this->document,
            'Field_Study'        => $this->Field_Study,
            'orientation'        => $this->orientation,
            'institutes'         => $this->institutes,
            'title_institutes'   => $this->title_institutes,
            'average'            => $this->average,
            'province'           => $this->province,
            'city'               => $this->city,
            'entering_year'      => $this->entering_year,
            'year_departure'     => $this->year_departure,
            'Studying'           => $this->checkStuding(),

        ];
    }

}
