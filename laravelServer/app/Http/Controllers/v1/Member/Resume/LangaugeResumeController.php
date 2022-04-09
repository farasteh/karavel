<?php

namespace App\Http\Controllers\v1\Member\Resume;

use App\Http\Controllers\Controller;
use App\Models\LangaugeResume;
use App\Http\Resources\v1\Member\Resume\LangaugeResumeCollection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LangaugeResumeController extends Controller
{
    public function index()
    {
        return new LangaugeResumeCollection(LangaugeResume::where('base_resume',auth()->user()->BaseResume->id)->orderBy('index' , 'ASC')->get());

    }
    public function store(Request $request)
    {
        foreach ($request->items as $value){
            $CreateRecordStudy[] = [
                'base_resume'           =>$value['base_resume'],
                'read'                  =>$value['read'],
                'write'                 =>$value['write'],
                'say'                   =>$value['say'],
                'listen'                =>$value['listen'],
                'lang_id'               =>$value['lang_id'],
                'index'                 => 0,
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now(),
            ];
        }

        LangaugeResume::insert($CreateRecordStudy);


        return response()->json([ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );

    }

    public function update(Request $request,$id)
    {
        $i = 0;
        foreach ($request->items as $value){

            $data[] = [
                'id'               =>$value['id'],
                'read'             =>$value['read'],
                'write'            =>$value['write'],
                'say'              =>$value['say'],
                'listen'           =>$value['listen'],
                'lang_id'          =>$value['lang_id'],
                'index'            => 0,
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ];
            DB::table('langauge_resumes')->where('id',$data[$i]['id'])->update($data[$i]);
            $i++;
        }


        return response()->json( ['data' => [ 'message' => 'تغییرات شما با موفقیت ثبت شد' ]], 200 );

    }

    public function destroy($id)
    {
        $recordstudy = LangaugeResume::find($id)->delete() ; 
        return response()->json( [ 'data' => [  'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ]], 200 );
    }
}
