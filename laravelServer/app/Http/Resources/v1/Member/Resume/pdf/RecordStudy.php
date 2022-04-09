<?php

namespace App\Http\Resources\v1\Member\Resume\pdf;

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
            'document'           => $this->getDocument,
            'Field_Study'        => $this->Field_Study,
            'orientation'        => $this->orientation,
            'institutes'         => $this->getInstitute,
            'title_institutes'   => $this->title_institutes,
            'average'            => $this->average,
            'province'           => $this->getProvince,
            'city'               => $this->getCity,
            'entering_year'      => $this->entering_year,
            'year_departure'     => $this->year_departure,
            'Studying'           => $this->Studying,
        ];
    }
}
