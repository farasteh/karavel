<?php

namespace App\Http\Resources\v1\Admin\Company;

use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\v1\Admin\Advertising\AdvertisingCollection;
use App\Models\Province ;
use App\Http\Resources\v1\Map\Province as provinceResource;
use App\Http\Resources\v1\Possibilities\ActivityCompanyIdCollection;


class CompanyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return $this->collection->map(function ($item) {
            return [
                'advertisings' => new AdvertisingCollection($item->advertisings),
                'id' => $item->id,
                'name_fa' => $item->name,
                'name_en' => $item->name_en,
                'province' => new provinceResource(Province::find($item->province_id)),
                'logo' => $item->logo,
                'notice'       => $item->noticed($item->companyNotice) ,
                'expire_time'  => $item->noticedTime($item->companyNotice) ,
                'today_time'   => Verta::now()->format('Y-m-d H:m:s'),
                'date'         => Verta::instance($item->created_at)->format((' j %B Y ')) ,
                'views'        => $item->views
            ];
        });
    }

}
