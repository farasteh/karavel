<?php

namespace App\Http\Resources\v1\Admin\Advertising;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Hekmatinasser\Verta\Verta;
use App\Http\Resources\v1\Admin\Company\Company;

class AdvertisingCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Collection
     */
    public function toArray($request): \Illuminate\Support\Collection
    {
        return  $this->collection->map(function ($item){
            return[
                'id'        => $item->id,
                'title'     => $item->title,
                'status'    => $item->Status($item->is_show),
                'special'   => $item->Specials($item->advertisingSpeciala),
                'Company'   => new Company($item->Company),
                'created_at'=> Verta::instance($item->created_at)->formatDifference() ,
                'views'     => $item->views
            ];
        });
    }
}
