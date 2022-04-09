<?php

namespace App\Http\Controllers\v1\Member\Favorites;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use Illuminate\Http\Request;
use App\Models\BaseResume;
use App\Http\Resources\v1\Site\Member\AdvertisingCollection;

class FavoriteControllers extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function dislike(Advertising $advertising)
    {
        $base_resume = BaseResume::where( 'user_id',auth()->user()->id)->first();
        $base_resume->LikeAdvertizings()->detach($advertising);
        return response()->json([ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );
    }

    public function like(Advertising $advertising)
    {
        $base_resume = BaseResume::where( 'user_id', auth()->user()->id)->first() ;
        $data = $base_resume->LikeAdvertizings()->find($advertising);
        if($data == null)
            $base_resume->LikeAdvertizings()->attach($advertising);
        return response()->json([ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );
    }

    public function getAll()
    {
        $base_resume = BaseResume::where( 'user_id',auth()->user()->id)->first();
        return new AdvertisingCollection($base_resume->LikeAdvertizings);
    }
}
