<?php

namespace App\Http\Controllers\v1\Member\Resume;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Member\Resume\RecordJobCollection;
use App\Models\RecordJob;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordJobController extends Controller
{
    public function index()
    {
        return new RecordJobCollection(RecordJob::where('base_resume',auth()->user()->BaseResume->id)->orderBy('index' , 'ASC')->get());

    }
    public function store(Request $request)
    {
        foreach ($request->items as $value){
            $CreateRecordStudy[] = [
                'base_resume'           =>$value['base_resume'],
                'job_side'              =>$value['job_side'],
                'job'                   =>$value['job'],
                'center_job'            =>$value['center_job'],
                'title_center_job'      =>$value['title_center_job'],
                'cooperation_type'      =>$value['cooperation_type'],
                'group_levels'          =>$value['group_levels'],
                'province'              =>$value['province'],
                'city'                  =>$value['city'],
                'start'                 =>$value['start'],
                'end'                   =>$value['end'],
                'working'               =>$value['working'],
                'comment'               =>$value['comment'],
                'index'                 => 0 ,
                'satisfying'            =>$value['satisfying'],
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now(),
            ];
        }

        RecordJob::insert($CreateRecordStudy);


        return response()->json([ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );

    }

    public function update(Request $request,$id)
    {
        $i = 0;
        foreach ($request->items as $value){

            $data[] = [
                'id'               =>$value['id'],
                'job_side'         =>$value['job_side'],
                'job'              =>$value['job'],
                'center_job'       =>$value['center_job'],
                'title_center_job' =>$value['title_center_job'],
                'cooperation_type' =>$value['cooperation_type'],
                'group_levels'     =>$value['group_levels'],
                'province'         =>$value['province'],
                'city'             =>$value['city'],
                'start'            =>$value['start'],
                'end'              =>$value['end'],
                'comment'          =>$value['comment'],
                'index'            => $i ,
                'satisfying'       =>$value['satisfying'],
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ];
            DB::table('record_jobs')->where('id',$data[$i]['id'])->update($data[$i]);
            $i++;
        }


        return response()->json( ['data' => [ 'message' => 'تغییرات شما با موفقیت ثبت شد' ]], 200 );

    }
    public function UpdateCreateRecordJobs(Request $request)
    {
        $base_resume = auth()->user()->BaseResume->id ; 
        $i = 0;
        $CreateRecordStudy = array();
        foreach ($request->items as $value) {
            if (isset($value['type']) && $value['type'] == 'create'){
                $CreateRecordStudy[] = [
                    'base_resume'           =>$base_resume,
                    'job_side'              =>$value['job_side'],
                    'job'                   =>$value['job'],
                    'center_job'            =>$value['center_job'],
                    'title_center_job'      =>$value['title_center_job'],
                    'cooperation_type'      =>$value['cooperation_type'],
                    'group_levels'          =>$value['group_levels'],
                    'province'              =>$value['province'],
                    'city'                  =>$value['city'],
                    'start'                 =>$value['start'],
                    'end'                   =>$value['end'],
                    'working'               =>$value['working'],
                    'comment'               =>$value['comment'],
                    'satisfying'            =>$value['satisfying'],
                    'index'                 => $i ,
                    'created_at'            => Carbon::now(),
                    'updated_at'            => Carbon::now(),
                ];
            }else{
                $data[] = [
                    'id'               =>$value['id'],
                    'job_side'         =>$value['job_side'],
                    'job'              =>$value['job'],
                    'center_job'       =>$value['center_job'],
                    'title_center_job' =>$value['title_center_job'],
                    'cooperation_type' =>$value['cooperation_type'],
                    'group_levels'     =>$value['group_levels'],
                    'province'         =>$value['province'],
                    'city'             =>$value['city'],
                    'start'            =>$value['start'],
                    'end'              =>$value['end'],
                    'comment'          =>$value['comment'],
                    'working'          =>$value['working'],
                    'satisfying'       =>$value['satisfying'],
                    'index'            => $i ,
                    'created_at'       => Carbon::now(),
                    'updated_at'       => Carbon::now(),
                ];
                DB::table('record_jobs')->where('id',$data[$i]['id'])->update($data[$i]);
            }
            $i++;
        }
        if(!empty($CreateRecordStudy)) {
            RecordJob::insert($CreateRecordStudy);
        }
        return response()->json(['data' => ['success' => true, 'message' => 'تغییرات شما با موفقیت ثبت شد.' ]], 200 );
    }

    public function destroy($id)
    {
        $recordstudy = RecordJob::find($id)->delete() ;
        return response()->json( [ 'data' => [  'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ]], 200 );
    }
}
