<?php

namespace App\Http\Resources\v1\User;

use App\Http\Resources\v1\Company\Company;
use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'Company' => new Company($this->Company),
        ];
    }
}
