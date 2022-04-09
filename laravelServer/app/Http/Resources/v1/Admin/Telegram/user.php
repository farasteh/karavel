<?php

namespace App\Http\Resources\v1\Admin\Telegram;

use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;

class user extends JsonResource
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
            'id'        => $this->id,
            'name'      => $this->name ,
            'last_name' => $this->last_name ,
            'gender'    => $this->gender ,
            'job'       => new job($this->getjob) ,
            'category'  => new category($this->getCategoty) ,
            'province'  => new province($this->getProvince) ,
            'city'      => new city($this->getCity) ,
            'birhdate'  => $this->getBirthDate() ,
            'rank'      => $this->getResumePercent() ,
            'telegram'  => $this->telegram ? true : false ,
            'created'   => $this->created_at->toDateString(),
            'type'      => 'user'
        ];
    }

    public function getBirthDate() {
        $birthdate = null ;
        if($this->birth_date) {
            $v1 = Verta::now();
            $v = Verta::parse($this->birth_date);
            $birthdate = $v->diffYears($v1);
        }
        return $birthdate ;
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
