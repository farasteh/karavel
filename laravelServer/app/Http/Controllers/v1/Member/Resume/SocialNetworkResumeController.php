<?php

namespace App\Http\Controllers\v1\Member\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\v1\Member\Resume\SocialNetworkResumeCollection;
use App\Models\SocialResume;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SocialNetworkResumeController extends Controller
{
    public function index()
    {
        return new SocialNetworkResumeCollection(SocialResume::where('base_resume' , auth()->user()->BaseResume->id)->orderBy('index', 'ASC')->get());
    }
     
    public function store( Request $request) {
        //
    }
    public function updateResume(Request $request)
    {
        $socialNetworkResume = array();  
        $socialNetworkResumeIndex = 0  ;  
        foreach ($request['socailNetworkResumes']['items'] as $value) {
            if ( isset($value['type']) && $value['type'] == 'create') {
                $socialNetworkResume[] = [
                    'base_resume'      => $value['base_resume'] , 
                    'social_network'   => $value['social_network']  , 
                    'link'             => $value['link']  , 
                    'index'            => $socialNetworkResumeIndex,
                    'created_at'       => Carbon::now(), 
                    'updated_at'       => Carbon::now()
                ];
            }
            else { 
                $socialresume[] = [
                    'id'                    =>$value['id'],
                    'social_network'        =>$value['social_network'],
                    'link'                  =>$value['link'],
                    'index'                 => $socialNetworkResumeIndex,
                    'updated_at'            => Carbon::now(),
                ];
                SocialResume::where('id',$socialresume[$socialNetworkResumeIndex]['id'])->update($socialresume[$socialNetworkResumeIndex]);
            }
            $socialNetworkResumeIndex ++ ; 
        }

        if(!empty($socialNetworkResume)) {
            SocialResume::insert($socialNetworkResume);
        }
        return response()->json([ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );
    }

    public function destroy($id)
    {
        $socialresume = SocialResume::find($id)->delete() ;
        return response()->json([ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );
    }
}