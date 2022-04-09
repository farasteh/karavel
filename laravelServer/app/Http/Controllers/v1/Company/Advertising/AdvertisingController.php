<?php

namespace App\Http\Controllers\v1\Company\Advertising;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisingRequest;
use App\Http\Resources\v1\Advertising\Advertising as AdvertisingResourse;
use App\Http\Resources\v1\Advertising\AdvertisingCollection;
use App\Http\Resources\v1\Company\Advertising\AdvertisingCollection as Advertisingcoll;
use App\Models\Advertising;
use App\Notifications\company\SMS\createEditAdvertising;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
      //  dd(Advertising::where('user_id',auth()->user()->id)->get())

        return new Advertisingcoll(Advertising::where('company_id',auth()->user()->Company->id)->orderBy('updated_at' , 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisingRequest $request)
    {
        DB::beginTransaction();
        try
        {

            $data = [
                'company_id'      =>  auth()->user()->Company->id ,
                'title'           => $request['title'],
                'job_id'          => $request['job'],
                'category_id'     => $request['category_id'],
                'city'            => $request['city'],
                'province'        => $request['province'],
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
                'lang_id'         => $request['lang_id'],
                'location'        => $request['location'] ,
                'age_id'          => $request['age']
            ];
            $advertising = Advertising::create($data);
            $advertising->behavioralSkills()->sync($request['behavioralSkill']);
            $advertising->posibilities()->sync($request['social']);
            $advertising->advertingJob()->sync($request['work_category_id']);
            $advertising->languagess()->sync($request['lang_id']);


            $message = 'آژانس ' .  auth()->user()->Company->name . ' آگهی '. $advertising->title . " را ثبت نمود. برای بررسی لطفا به پنل خود مراجعه کنید ." . ' karavel.ir ' ;
            $dataSMS = ['message' => $message ];
            Notification::send('sadas',new createEditAdvertising($dataSMS));
            DB::commit();
            return response()->json( ['data' =>[ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );

        }
        catch (\Exception $e){
            DB::rollBack();
            return response()->json(['data' => ['error' => true , 'massage' => __('massage.error_db') ]], Response::HTTP_INTERNAL_SERVER_ERROR);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $advertising
     * @return \Illuminate\Http\Response
     */
    public function show($advertising)
    {
//        return Advertising::find($advertising);
        return new AdvertisingResourse(Advertising::withTrashed()->find($advertising));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisingRequest $request, $id)
    {
        DB::beginTransaction();
        try
        {

        Advertising::where( 'id', $id )->update([
            'title'           => $request['title'],
            'job_id'          => $request['job'],
            'category_id'     => $request['category_id'],
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
            'is_show'         => '',
            'location'        => $request['location'] ,
            'age_id'          => $request['age']
        ]);
        $advertising = Advertising::where( 'id', $id )->first();
        $advertising->behavioralSkills()->sync($request['behavioralSkill']);
        $advertising->posibilities()->sync($request['social']);
        $advertising->advertingJob()->sync($request['work_category_id']);
        $advertising->languagess()->sync($request['lang_id']);

        $message = 'آژانس ' .  auth()->user()->Company->name . ' آگهی '. $advertising->title . "را ویرایش نمود. برای بررسی لطفا به پنل خود مراجعه کنید ." . ' karavel.ir ' ;
        $dataSMS = ['message' => $message ];
        Notification::send('sadas',new createEditAdvertising($dataSMS));
        DB::commit();

        return response()->json( [  'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ], 200 );

        }
        catch (\Exception $e){
            DB::rollBack();
            return response()->json(['data' => ['error' => true , 'massage' => __('massage.error_db') ]], Response::HTTP_INTERNAL_SERVER_ERROR);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertising = Advertising::where( 'id', $id )->first();

        $advertising->delete();
        return response()->json( ['data' => [ 'message' => 'با موفقیت رکورد شما حذف شد.' ]], 200 );
    }

    public  function GetArchieved() {
        return new Advertisingcoll(Advertising::where('company_id',auth()->user()->Company->id)->onlyTrashed()->orderBy('created_at' , 'desc')->get());
    }

    public  function restore($id) {
        Advertising::withTrashed()->find($id)->restore();
        return response()->json( [  'success' => true, 'message' => 'آگهی انتخابی با موفقیت بازگردانده شد.' ], 200 );
    }
}
