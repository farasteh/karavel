<?php

namespace App\Http\Controllers\v1\Member\Favorites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BaseResume ;

class LikedAdsController extends Controller
{
    public function like(Request $request)
    {
        $base = BaseResume::where( 'user_id',auth()->user()->id)->first() ;
        $ad = $request['advertizing'] ;
        $base->LikeAdvertizings()->attach($ad);
        return response()->json([ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );
    }

    public function dislike(Request $request)
    {
        $base = BaseResume::where( 'user_id',auth()->user()->id)->first() ;
        $ad = $request['advertizing'] ;
        $base->LikeAdvertizings()->detach($ad);
        return response()->json([ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );
    }
}
