<?php

namespace App\Http\Resources\v1\Site\Member;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\BaseResume;
use App\Http\Resources\v1\Job\CategoryWork;
use App\Http\Resources\v1\Job\Job;
use App\Http\Resources\v1\Job\JobCategory;
use App\Http\Resources\v1\Map\City;
use App\Http\Resources\v1\Map\Province;
use App\Http\Resources\v1\Possibilities\CooperationType;
use App\Http\Resources\v1\Possibilities\Money;
use Hekmatinasser\Verta\Verta;
use App\Http\Resources\v1\Site\CompanyAdvertising;
use App\Http\Resources\v1\Site\Member\resumeCollection;


class AdvertisingCollection extends ResourceCollection
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
                'id'                => $item->id,
                'title'             => $item->title,
                'CooperationType'   => new CooperationType($item->Cooperation_Type),
                'job'               => new Job($item->Job),
                'category'          => new JobCategory($item->CategoryJob),
                'province'          => new Province($item->Province),
                'city'              => new City($item->City),
                'Company'           => new CompanyAdvertising($item->Company),
                'resumes'           => $item->baseResumes->pluck('id') ,
                'created_at'        => Verta::instance($item->created_at)->formatDifference()
            ];
        });
    }
}
