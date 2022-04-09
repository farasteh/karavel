<?php

namespace App\Http\Resources\v1\Admin\Advertising;

use Illuminate\Http\Resources\Json\ResourceCollection;

class behavioralSkillCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  $this->collection->map(function ($item){
            return[
                'id'      => $item->id,
                'title'   => $item->title,
            ];
        });
    }
}
