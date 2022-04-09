<?php

namespace App\Http\Resources\v1\Advertising;

use App\Http\Resources\v1\Job\CategoryWorkCollection;
use App\Http\Resources\v1\Job\JobCategoryCollection;
use App\Http\Resources\v1\Job\JobCollection;
use App\Http\Resources\v1\User\UserCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Admin\Advertising\behavioralSkillCollection;
use App\Http\Resources\v1\Advertising\PossibilityCollection;

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
        return [
            'id'               => $this->id,
            'title'            => $this->title,
            'province'         => $this->province,
            'city'             => $this->city,
            'Activity_id'      => $this->Activity_id,
            'Cooperation_type' => $this->CooperationType,
            'money'            => $this->money,
            'HistoryJop'       => $this->HistoryJop,
            'Document'         => $this->document,
            'Gender'           => $this->gender,
            'Soldier'          => $this->Soldier,
            'fild_study'       => $this->FildStudy,
            'TimeUp'           => $this->TimeUp,
            'TimeDown'         => $this->TimeDown,
            'comment'          => $this->comment,
            'status'           => $this->is_show,
            'social'           => $this->posibilities->pluck('id'),
            'job'              => $this->job_id,
            'category_id'      => $this->category_id,
            'work_category_id' => $this->advertingJob->pluck('id'),
            'is_show_comment'  => $this->is_show_comment,
            'lang_id'          => $this->languagess->pluck('id') ,
            'is_show'          => $this->is_show,
            'behavioralSkill'  => $this->behavioralSkills->pluck('id') ,
            'company_id'       => $this->company_id,
            'location'         => $this->location ,
            'age'              => $this->age_id
//            'user'             => new UserCollection($this->Users),
        ];
    }

    public function with($request)
    {
        return [
            'success' => true
        ];
    }
}
