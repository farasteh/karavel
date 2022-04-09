<?php

namespace App\Http\Resources\v1\Site;

use App\Models\Money;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Possibilities\Money as moneyResource ;

class resume extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $money = Money::find($this->pivot->money);
        return [
            'id'     =>     $this->id ,
            'money'  =>     new moneyResource($money)
        ];
    }
}
