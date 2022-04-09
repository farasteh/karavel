<?php

namespace App\Http\Resources\v1\Admin\Telegram;

use Illuminate\Http\Resources\Json\JsonResource;

class company extends JsonResource
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
            'id'        => $this->id ,
            'name'      => $this->name
        ];
    }
}