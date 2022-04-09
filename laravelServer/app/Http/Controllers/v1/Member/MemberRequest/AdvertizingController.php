<?php

namespace App\Http\Controllers\v1\Member\MemberRequest;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Member\MemberRequest\StatuseAdvertizing;
use Illuminate\Http\Request;
use App\Models\BaseResume;
use App\Models\Advertising;
use App\Http\Resources\v1\Member\MemberRequest\AdvertizingCollection ;
use App\Http\Resources\v1\Member\MemberRequest\Advertizing as advertizingResource ;

class AdvertizingController extends Controller
{
    public function getAdvertizing()
    {
        $baseResume = BaseResume::where('user_id',auth()->user()->id)->first();
        return new  AdvertizingCollection($baseResume->advertizings);
    }

    public function showAdvertizing(Advertising $advertising) {
        return new StatuseAdvertizing($advertising);
    }
}

