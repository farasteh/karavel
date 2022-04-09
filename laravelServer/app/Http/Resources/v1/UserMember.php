<?php

namespace App\Http\Resources\v1;

use App\Http\Requests\BaseResume;
use App\Http\Resources\v1\Member\Resume\Base;
use Illuminate\Http\Resources\Json\JsonResource;

class UserMember extends JsonResource
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
            'id'      => $this->id,
            'name'    => $this->name,
            'email'   => $this->email,
            'role'    => $this->role,
            'member' => new Base($this->BaseResume),
        ];
    }
}
