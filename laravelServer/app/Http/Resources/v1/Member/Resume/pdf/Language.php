<?php

namespace App\Http\Resources\v1\Member\Resume\pdf;

use Illuminate\Http\Resources\Json\JsonResource;

class Language extends JsonResource
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
            'id'              => $this->id,
            'read'            => $this->read,
            'write'           => $this->write,
            'say'             => $this->say,
            'listen'          => $this->listen,
            'lang_id'         => $this->getLanguage
        ];
    }
}
