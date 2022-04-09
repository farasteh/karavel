<?php

namespace App\Http\Resources\v1\Member\MemberRequest;

use App\Http\Resources\v1\Company\statusList;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Company\Company;
use Hekmatinasser\Verta\Verta ;

class Advertizing extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //dd($this->Status($this->pivot->status) )
        return [
            'id'           => $this->id ,
            'title'        => $this->title  ,
            'company'      => new  Company( $this->company) ,
            'craeted'      => Verta::instance($this->pivot->created_at)->format((' j %B Y ')),
            'comment'      => $this->pivot->comment  ,
            'status'       => new statusList($this->StatusResume($this->pivot->status))   ,
            'file'         => $this->pivot->file ,
            'base_resume'  => $this->pivot->base_resume ,
        ];
    }
}
