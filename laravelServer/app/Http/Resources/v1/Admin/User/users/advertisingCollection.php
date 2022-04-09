<?php

namespace App\Http\Resources\v1\Admin\User\users;

use App\Models\resumeStatus;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\v1\Admin\User\users\company;

class advertisingCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return  $this->collection->map(function ($item){
            $status = resumeStatus::find( $item->pivot->status );
            return[
                'id'                => $item->id,
                'title'             => $item->title,
                'status'            => new status( $status ) ,
                'file'              => $item->pivot->file ,
                'company'           => new company($item->company),
                'created_at'        => Verta::instance($item->pivot->created_at)->formatDifference(),
            ];
        });
    }
}
