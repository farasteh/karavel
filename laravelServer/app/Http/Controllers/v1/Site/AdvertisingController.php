<?php

namespace App\Http\Controllers\v1\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Site\AdvertisingCollection;
use App\Http\Resources\v1\Site\Advertising as AdvertisingResource;
use App\Models\Advertising;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index(Request $request)
    {
        $req = $request->all() ;
//
        $advertisings = Advertising::where('is_show','yes');
        if($req)
        {
            if ( isset($req['date']) )
            {
                if ( $req['date'] && $req['date'] == 'month')
                {
                    $advertisings = Advertising::select('advertisings.*')->orderBy('created_at' , 'desc')
                    ->leftJoin('advertising_specials'  , 'advertising_specials.advertising_id' , 'advertisings.id')
                    ->where('is_show','yes')
                    ->where('advertisings.created_at' , '>'  , Carbon::now()->subMonth())
                    ->orWhere('advertising_specials.advertising_id' , '>'  ,'0')->get();
                    return new AdvertisingCollection($advertisings);
                }

                else if($req['date'] && $req['date'] == 'before')
                    $advertisings = $advertisings->where('created_at' , '<='  , Carbon::now()->subMonth());
            }

            if ( isset($req['Job']) )
                if ( $req['Job'])
                    $advertisings = $advertisings->where('job_id' , $req['Job']) ;
            if ( isset($req['Job1']) )
                if( $req['Job1'] )
                    $advertisings = $advertisings->where('category_id' , $req['Job1']) ;
//            if($req['model14'])
//            {
//                if( ! in_array(null , $req['model14'] ))
//                    $advertisings = Advertising::select('advertisings.*')
//                        ->join("job_advertisings", "job_advertisings.id_advertising", "=", "advertisings.id")
//                        ->whereIn('job_advertisings.id_work_category' , $req['model14'])
//                        ->groupBy('advertisings.id');
//            }
            if ( isset($req['province']) )
                if($req['province'])
                    $advertisings = $advertisings->where('province' , $req['province']) ;
        }
        return new AdvertisingCollection($advertisings->orderBy('created_at' , 'desc')->get());
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return
     */
    public function  show($id)
    {
        $advertiisng = Advertising::find($id) ;
        $advertiisng->increment('views');
        return new AdvertisingResource($advertiisng);

    }

    public function getSimailar($id) {
        $advertising = Advertising::find($id);
        $ads = Advertising::where('is_show' , 'yes')
            ->where('job_id' , $advertising->job_id)
            ->where('category_id' , $advertising->category_id)
            ->where('province' , $advertising->province)
            ->where('id' , '!=' , $advertising->id)->orderBy('created_at' , 'desc')->get() ;
        return new AdvertisingCollection($ads);
    }

    public function getByCity($id) {
        $advertisings = Advertising::where('province' , $id)->orderBy('created_at' , 'desc')->get() ;
        return new AdvertisingCollection($advertisings);
    }
}
