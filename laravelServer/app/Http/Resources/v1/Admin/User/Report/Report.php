<?php

namespace App\Http\Resources\v1\Admin\User\Report;

use App\Http\Middleware\CheckBlocked;
use Illuminate\Http\Resources\Json\JsonResource;

class Report extends JsonResource
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
            'id'          => $this->id,
            'name'        => $this->name,
            'count'       => $this->count,
            'blocked'     => checkBlockUser($this->blocked_until),
        ];
    }
}
