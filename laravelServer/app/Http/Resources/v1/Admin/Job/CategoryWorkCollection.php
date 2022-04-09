<?php

namespace App\Http\Resources\v1\Admin\Job;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryWorkCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function toArray($request)
    {
        return  $this->collection->map(function ($item){
            return[
                'title' => $item->title,
                'id' => $item->id,
            ];
        });
    }
}
