<?php

namespace App\Http\Resources\v1\Company\Advertising;

use App\Models\BaseResume;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Company\statusList;
use Verta ;

class status extends JsonResource
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
            'id'              => $this->id,
            'user_id'         => $this->user_id,
            'name'            => $this->name,
            'last_name'       => $this->last_name,
            'email'           => $this->email,
            'status'          =>  $this->pivot->status ,
            'file'            => $this->pivot->file ,
            'sendDate'        =>  Verta::instance($this->pivot->created_at)->format((' j %B Y ')),
            'comment'         => $this->pivot->comment ,
            'Companycomment'  => $this->pivot->Companycomment ,
            'image'           => $this->image  ,
            'rank'            => $this->getResumePercent()
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
