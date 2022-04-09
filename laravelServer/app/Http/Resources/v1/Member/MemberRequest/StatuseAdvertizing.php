<?php

namespace App\Http\Resources\v1\Member\MemberRequest;

use App\Http\Resources\v1\Admin\Advertising\behavioralSkillCollection;
use App\Http\Resources\v1\Advertising\PossibilityCollection;
use App\Http\Resources\v1\Company\ResmeStatusListCollection;
use App\Http\Resources\v1\Company\statusList;
use App\Http\Resources\v1\Job\CategoryWork;
use App\Http\Resources\v1\Job\Job;
use App\Http\Resources\v1\Job\JobCategory;
use App\Http\Resources\v1\Map\City;
use App\Http\Resources\v1\Map\Province;
use App\Http\Resources\v1\Possibilities\CooperationType;
use App\Http\Resources\v1\Possibilities\Document;
use App\Http\Resources\v1\Possibilities\FildStudy;
use App\Http\Resources\v1\Possibilities\Gender;
use App\Http\Resources\v1\Possibilities\HistoryJob;
use App\Http\Resources\v1\Possibilities\Money;
use App\Http\Resources\v1\Possibilities\Soldier;
use App\Http\Resources\v1\Site\CompanyAdvertising;
use App\Models\AdvertizingResume;
use App\Models\BaseResume;
use App\Models\resumeStatusList;
use Illuminate\Http\Resources\Json\JsonResource;

class StatuseAdvertizing extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $baseResume = BaseResume::where('user_id',auth()->user()->id)->first();
        $adresume = resumeStatusList::where('base_resume' , $baseResume->id)->where('advertising' , $this->id)->get();
        return [
            'id'                => $this->id,
            'title'             => $this->title,
            'TimeUp'            => $this->TimeUp,
            'TimeDown'          => $this->TimeDown,
            'comment'           => $this->comment,
            'money'             => new Money($this->Money),
            'HistoryJop'        => new HistoryJob($this->historyJop),
            'document'          => new Document($this->Document),
            'FildStudy'         => new FildStudy($this->fildStudy),
            'Gender'            => new Gender($this->Gender),
            'Soldier'           => new Soldier($this->soldier),
            'CooperationType'   => new CooperationType($this->Cooperation_Type),
            'job'               => new Job($this->Job),
            'category'          => new JobCategory($this->CategoryJob),
            'work_category'     => new CategoryWork($this->WorkCategory),
            'province'          => new Province($this->Province),
            'city'              => new City($this->City),
            'Company'           => new CompanyAdvertising($this->Company),
            'liked_users'       => $this->LikedAds->pluck('id'),
            'resumes'           => $this->baseResumes->pluck('id'),
            'posibilities'      => new PossibilityCollection( $this->posibilities) ,
            'behavioralskills'  => new behavioralSkillCollection( $this->behavioralSkills),
            'status'            => new ResmeStatusListCollection($adresume),
        ];
    }
}
