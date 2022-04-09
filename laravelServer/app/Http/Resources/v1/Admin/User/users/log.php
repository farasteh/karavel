<?php

namespace App\Http\Resources\v1\Admin\User\users;

use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;

class log extends JsonResource
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
            'date'   =>  Verta::instance($this->created_at)->formatDifference()
        ];
    }
}
