<?php

namespace App\Http\Resources\v1\Site\Company;

use App\Models\CompanyNotice;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;

class ComapnyNotice extends JsonResource
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
            'id'        => $this->id ,
            'time'      =>$this->expire_time ,
            'company'   => new Comapnysm($this->company)
        ];
    }
}
