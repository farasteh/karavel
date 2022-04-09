<?php

namespace App\Http\Resources\v1\Company;

use App\Http\Resources\v1\Company\Advertising\statusCollection;
use App\Http\Resources\v1\Company\statusList;
use App\Http\Resources\v1\Company\statusListCollection;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;

class ResmeStatusList extends JsonResource
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
            'comment'       =>$this->comment ,
            'Companycomment' => $this->Companycomment ,
            'status'        => $this->status  ,
            'created_at'     =>  Verta::instance($this->created_at)->format((' j %B Y ')),
        ];
    }
}
