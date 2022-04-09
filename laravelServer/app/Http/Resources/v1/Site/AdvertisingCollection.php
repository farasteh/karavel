<?php

namespace App\Http\Resources\v1\Site;

use App\Http\Resources\v1\Job\CategoryWork;
use App\Http\Resources\v1\Job\CategoryWorkCollection;
use App\Http\Resources\v1\Job\Job;
use App\Http\Resources\v1\Job\JobCategory;
use App\Http\Resources\v1\Map\City;
use App\Http\Resources\v1\Map\Province;
use App\Http\Resources\v1\Possibilities\CooperationType;
use App\Http\Resources\v1\Possibilities\Money;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\v1\Possibilities\HistoryJob;
use App\Models\BaseResume;

class AdvertisingCollection extends ResourceCollection
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
                'id'                => $item->id,
                'title'             => $item->title,
                'money'             => new Money($item->Money),
                'CooperationType'   => new CooperationType($item->Cooperation_Type),
                'job'               => new Job($item->Job),
                'category'          => new JobCategory($item->CategoryJob),
                'work_category'     => $item->categoryWorks->pluck('id'),
                'province'          => new Province($item->Province),
                'city'              => new City($item->City),
                'Company'           => new CompanyAdvertising($item->Company),
                'HistoryJop'        => new HistoryJob($item->historyJop),
                'liked_users'       => $item->LikedAds->pluck('id'),
                'resumes'           => $item->baseResumes->pluck('id'),
                'created_at'        => Verta::instance($item->created_at)->formatDifference(),
                'created'           => $item->created_at->toDateString(),
                'special'           => $item->Specials($item->advertisingSpeciala),
            ];
        });
    }
}
