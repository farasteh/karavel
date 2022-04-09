<?php

namespace App\Http\Resources\v1\Member\MemberRequest;

use App\Http\Resources\v1\Company\Company;
use App\Http\Resources\v1\Company\statusList;
use App\Models\resumeStatus;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;

class Statuse extends JsonResource
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
            'id'           => $this->id ,
            'date'         => Verta::instance($this->pivot->created_at)->format((' j %B Y ')),
            'comment'      => $this->pivot->comment  ,
            'status'       => new statusList(resumeStatus::find($this->pivot->status)),
        ];
    }
}
