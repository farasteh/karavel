<?php

namespace App\Http\Controllers\v1\Admin\Advertising;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Admin\Advertising\AdvertisingCollection;
use App\Http\Resources\v1\Advertising\Advertising as AdvertisingResourse;
use App\Models\Advertising;
use App\Models\BaseResume;
use App\Notifications\Member\SMS\SendSMSOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\company\SMS\AcceptRejectNotification;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AdvertisingCollection
     */
    public function index()
    {
        return new AdvertisingCollection(Advertising::orderBy('created_at' , 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new AdvertisingResourse(Advertising::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {

        try
        {
            $advertising = Advertising::find($id) ;
            $advertising->update([
                'is_show'           => $request['is_show'],
                'is_show_comment'   => $request['comment'],
            ]);

            $baseResumes = BaseResume::where('job' , $advertising->job_id)
                ->where('category_job' , $advertising->category_id )->where('disable_sms' , 0)->pluck('mobile')->toArray();
            $offerDataSMS = [ 'baseResumes' => $baseResumes , 'advertising' => $advertising->title];
            Notification::send('sadas',new SendSMSOffer($offerDataSMS));

            $mobile  = $advertising->company->user->mobile;
            $dataSMS = ['mobile' => $mobile , 'advertising_title' => $advertising->title , 'is_show' => $advertising->is_show];
            Notification::send('sadas',new AcceptRejectNotification($dataSMS));

            return response()->json( ['data' =>[ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ]], 200 );

        }
        catch (\Exception $e){

            return response()->json(['data' => ['error' => true , 'massage' => __('massage.error_db') ]], Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAds(Request $request, $id)
    {


        Advertising::where( 'id', $id )->update([
            'title'           => $request['title'],
            'job_id'          => $request['job'],
            'category_id'     => $request['category_id'],
//            'work_category_id'=> $request['Job2'],
            'province'        => $request['province'],
            'city'            => $request['city'],
            'CooperationType' => $request['Cooperation_type'],
            'money'           => $request['money'],
            'HistoryJop'      => $request['HistoryJop'],
            'document'        => $request['Document'],
            'gender'          => $request['Gender'],
            'Soldier'         => $request['Soldier'],
            'FildStudy'       => $request['fild_study'],
            'TimeUp'          => $request['TimeUp'],
            'TimeDown'        => $request['TimeDown'],
            'comment'         => $request['comment'],
            'is_show'         => $request['is_show'],
            'location'        => $request['location'] ,
            'age_id'             => $request['age']
        ]);
        $advertising = Advertising::where( 'id', $id )->first();
        $advertising->behavioralSkills()->sync($request['behavioralSkill']);
        $advertising->posibilities()->sync($request['social']);
        $advertising->advertingJob()->sync($request['work_category_id']);
        $advertising->languagess()->sync($request['lang_id']);
        return response()->json( [  'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ], 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
