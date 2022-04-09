<?php

namespace App\Http\Resources\v1\Admin\User\users;

use App\Models\ResumeSmsLog;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Admin\Job\Job ;
use App\Http\Resources\v1\Admin\User\users\advertisingCollection ;
use Illuminate\Http\Resources\Json\ResourceCollection;

class baseResumes extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $logs = ResumeSmsLog::where('base_id' , $this->id)->get();
        return [
            'id'              => $this->id,
            'name'            => $this->name,
            'last_name'       => $this->last_name,
            'job'             => $this->getjob,
            'category_job'    => $this->getCategoty,
            'created_at'      => Verta::instance($this->created_at)->formatDifference() ,
            'province'        => $this->getProvince ,
            'city'            => $this->getCity ,
            'advertisings'    => new advertisingCollection ( $this->advertizings ) ,
            'rank'            => $this->getResumePercent() ,
            'logs'             => new logCollection($logs)
        ];
    }

    public  function getResumePercent() {
        $rank = 20 ;
        if($this->image)
            $rank += 5 ;
        if($this->image)
            $rank += 15 ;
        if($this->recordStudies->count() != 0)
            $rank += 5 ;
        if($this->recordStudies->count() > 1)
            $rank += 5 ;
        if($this->recordjobs->count() != 0)
            $rank += 10 ;
        if($this->recordjobs->count() > 1)
            $rank += 10 ;
        if ( $this->languages->count() != 0)
            $rank += 10 ;
        if ( $this->articles->count() != 0)
            $rank += 5 ;
        if ( $this->projects->count() != 0)
            $rank += 5 ;
        if ( $this->honors->count() != 0)
            $rank += 5 ;
        if ( $this->certificates->count() != 0)
            $rank += 5 ;
        return $rank ;
    }
}
