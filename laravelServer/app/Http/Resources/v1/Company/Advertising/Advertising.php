<?php

namespace App\Http\Resources\v1\Company\Advertising;

use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Company\Advertising\statusCollection;
use App\Http\Resources\v1\Company\Advertising\status;
class Advertising extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       //return new statusCollection($this->baseResumes->groupBy('id')) ;

        return [
            'id'               => $this->id,
            'title'            => $this->title,
            'comment'          => $this->comment,
            'status'           => $this->is_show,
            'company_id'       => $this->company_id,
            'resumes'          => new statusCollection($this->baseResumes),
            'job_id'           => $this->job_id ,
            'created_at'       => Verta::instance($this->created_at)->format((' j %B Y '))
//            'user'             => new UserCollection($this->Users),
        ];
    }
}
