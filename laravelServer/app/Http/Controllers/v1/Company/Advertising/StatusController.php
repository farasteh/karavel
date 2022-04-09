<?php

namespace App\Http\Controllers\v1\Company\Advertising;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseResume;
use App\Notifications\Member\SMS\ChangeStatusNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Advertising;
use App\Http\Resources\v1\Company\Advertising\statusCollection;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\v1\Company\resumeStatusCollection;
use App\Http\Resources\v1\Company\resumeStatus;
use App\Models\AdvertizingResume;
use App\Models\resumeStatusList;
use Illuminate\Support\Facades\Notification;
use App\Models\BaseResume as Base;

class StatusController extends Controller
{
    public function getResumes(Advertising $Advertising)
    {

        return new statusCollection($Advertising->baseResumes);

    }
    public function getSpecificResume($Adv , $id) {
        $adresume = AdvertizingResume::where('base_resume' , $id)->where('advertising' , $Adv)->first();
        return new resumeStatus($adresume);

    }
    public function changeStatus(Advertising $Advertising , Request $request)
    {
        try {

            $base = Base::find($request->resume);
            $status = \App\Models\resumeStatus::find($request->status);
            $Advertising->baseResumes()->updateExistingPivot($request->resume,
                [
                    'status' => $request->status,
                ]);


            $data = [
                'status' => $request->status,
                'comment' => $request->comment,
                'Companycomment' => $request->Companycomment,
                'advertising' => $Advertising->id,
                'base_resume' => $request->resume,
                'created_at' => Carbon::now()
            ];

            DB::table('resume_status_lists')->insert($data);

            $dataSMS = ['mobile' => $base->mobile, 'advertising_title' => $Advertising->title, 'status' => $status->title];
            Notification::send('sadas', new ChangeStatusNotification($dataSMS));

            return response()->json(['success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.'], 200);
        } catch (\Exception $e) {
            return response()->json(['data' => ['error' => true , 'massage' => __('massage.error_db') ]], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
