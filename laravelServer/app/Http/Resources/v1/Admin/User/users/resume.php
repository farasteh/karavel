<?php

namespace App\Http\Resources\v1\Admin\User\users;

use App\Models\resumeStatus;
use App\Models\BaseResume ;
use App\Models\Advertising ;
use App\Models\SmsLog;
use Hekmatinasser\Verta\Verta;
use App\Http\Resources\v1\Admin\User\users\baseResume  as baseResource;
use App\Http\Resources\v1\Admin\User\users\advertising as advertisingResource;
use App\Http\Resources\v1\Admin\User\users\status;
use Illuminate\Http\Resources\Json\JsonResource;

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
        $resume = BaseResume::find($this->base_resume) ;
        $advertising = Advertising::withTrashed()->find($this->advertising) ;
        $status = resumeStatus::find($this->status);
        $logs = SmsLog::all()->where('user_id' , $advertising->company->user->id)
            ->where('advertising_id' , $advertising->id)
            ->where('base_id' , $resume->id )->sortByDesc('created_at')->take('2');
        return [
            'resume'           =>  new baseResource($resume) ,
            'advertising'      =>  new advertisingResource($advertising) ,
            'status'           =>  new status($status),
            'company'          => new company($advertising->company),
            'created_at'       => Verta::instance($this->created_at)->formatDifference() ,
            'logs'             => new logCollection($logs)
        ];
    }
}
