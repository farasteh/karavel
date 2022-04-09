<?php

namespace App\Http\Controllers\v1\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Site\Member\Base;
use App\Http\Resources\v1\Site\staffCollection;
use App\Models\BaseResume;
use App\Models\Company;
use App\Notifications\company\SMS\SendRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class StaffController extends Controller
{

    public function index(Request $request) {
        $req = $request->all() ;
        if($req)
        {
           if(isset($req['Job']) && isset($req['Job1'])  && isset($req['province']) ){
               $staffs = BaseResume::where('job' , $req['Job'])
                   ->where('category_job' , $req['Job1'])
                   ->where('province' , $req['province'])->orderBy('created_at' , 'desc')->get();
               return new staffCollection($staffs);
           }
        }
        $staffs = BaseResume::orderBy('created_at', 'desc')->take(40)->get();
        return new staffCollection($staffs);
    }

    public function store($companyId , $resumeId)  {
        $company = Company::find($companyId) ;
        $checkIfExist = $company->resumes()->find(($resumeId));
        if($checkIfExist == null)
        {
            DB::beginTransaction();

            try {
                $company->resumes()->attach($resumeId);
                DB::commit();

                $dataSMS = ['mobile' => $company->mobile];
                Notification::send('sadas',new SendRequestNotification($dataSMS));

                return response()->json([ 'data' => [ 'success' => true, 'message' => __('massage.success_db') ]], 200 );
            }catch (\Exception $e){
                DB::rollBack();
                return response()->json([ 'data' => [ 'error' => true, 'message' => __('massage.error_db') ]], 500 );
            }
        }
        return response()->json([ 'data' => [ 'success' => true, 'message' => __('massage.duplicate_resume_company_db') ]], 200 );

    }

    public function getSimailar($id) {
        $staff = BaseResume::find($id);
        $similarStaffs = BaseResume::where('job' , $staff->job)
            ->where('category_job' , $staff->category_job)
            ->where('province' , $staff->province)
            ->where('id' , '!=' , $staff->id)->orderBy('created_at' , 'desc')->get() ;
        return new staffCollection($similarStaffs);
    }
}
