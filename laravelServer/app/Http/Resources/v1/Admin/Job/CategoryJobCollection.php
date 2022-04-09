<?php

namespace App\Http\Resources\v1\Admin\Job;

use Illuminate\Http\Resources\Json\ResourceCollection;


class CategoryJobCollection extends ResourceCollection
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
               'title' => $item->title,
               'id' => $item->id,
               'CategoryWork' => new CategoryWorkCollection($item->CategoryWork),
           ];
        });
    }
}
