<?php

namespace App\Http\Controllers\v1\Member\Resume;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Member\Resume\RecordJobCollection;
use App\Http\Resources\v1\Member\Resume\RecordStudyCollection;
use App\Models\RecordJob;
use App\Models\RecordStudy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordStudyController extends Controller
{
    public function index()
    {
        return new RecordStudyCollection(RecordStudy::where('base_resume',auth()->user()->BaseResume->id)->orderBy('index' , 'ASC')->get());
    }
    public function store(Request $request)
    {

        foreach ($request->items as $value){
            $CreateRecordStudy[] = [
                'base_resume'      =>$value['base_resume'],
                'document'         =>$value['document'],
                'Field_Study'      =>$value['Field_Study'],
                'orientation'      =>$value['orientation'],
                'institutes'       =>$value['institutes'],
                'title_institutes' =>$value['title_institutes'],
                'average'          =>$value['average'],
                'province'         =>$value['province'],
                'city'             =>$value['city'],
                'entering_year'    =>$value['entering_year'],
                'year_departure'   =>$value['year_departure'],
                'Studying'         =>$value['studying'],
                'index'            => 0 ,
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ];
        }

        RecordStudy::insert($CreateRecordStudy);

//
        return response()->json([ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $i = 0;
        foreach ($request->items as $value){

            $data[] = [
                'id'               =>$value['id'],
                'document'         =>$value['document'],
                'Field_Study'      =>$value['Field_Study'],
                'orientation'      =>$value['orientation'],
                'institutes'       =>$value['institutes'],
                'title_institutes' =>$value['title_institutes'],
                'average'          =>$value['average'],
                'province'         =>$value['province'],
                'city'             =>$value['city'],
                'entering_year'    =>$value['entering_year'],
                'year_departure'   =>$value['year_departure'],
                'Studying'         =>$value['Studying'],
                'index'            => $i ,
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ];
            DB::table('record_studies')->where('id',$data[$i]['id'])->update($data[$i]);
            $i++;
        }



        return response()->json( ['data' => [ 'message' => 'تغییرات شما با موفقیت ثبت شد.' ]], 200 );

    }

    public function UpdateCreateRecordStudy(Request $request)
    {
        // dd($request->all());
        // $year = '/^13\d{2}$/';
        // $decimal = '/^\d{2}([.,]\d+)?$/';
        // $validated = $request->validate([
        //     'document'             => ['required'],
        //     'Field_Study'          => ['required'],
        //     'orientation'          => ['required'],
        //     'institutes'           => ['required'],
        //     'title_institutes'     => ['required'],
        //     'average'              => ['required' ],
        //     'province'             => ['required'],
        //     'city'                 => ['required'],
        //     'entering_year'        => ['required' ]
        // ]);
        $base_resume = auth()->user()->BaseResume->id ; 
        $i = 0;
        $CreateRecordStudy = array();
        foreach ($request->items as $value) {
            if (isset($value['type']) && $value['type'] == 'create'){
                $CreateRecordStudy[] = [
                    'base_resume'      =>$base_resume,
                    'document'         =>$value['document'],
                    'Field_Study'      =>$value['Field_Study'],
                    'orientation'      =>$value['orientation'],
                    'institutes'       =>$value['institutes'],
                    'title_institutes' =>$value['title_institutes'],
                    'average'          =>$value['average'],
                    'province'         =>$value['province'],
                    'city'             =>$value['city'],
                    'entering_year'    =>$value['entering_year'],
                    'year_departure'   =>$value['year_departure'],
                    'Studying'         =>$value['Studying'],
                    'index'            => $i,
                    'created_at'       => Carbon::now(),
                    'updated_at'       => Carbon::now(),
                ];
            }else{
                $data[] = [
                    'id'               =>$value['id'],
                    'document'         =>$value['document'],
                    'Field_Study'      =>$value['Field_Study'],
                    'orientation'      =>$value['orientation'],
                    'institutes'       =>$value['institutes'],
                    'title_institutes' =>$value['title_institutes'],
                    'average'          =>$value['average'],
                    'province'         =>$value['province'],
                    'city'             =>$value['city'],
                    'entering_year'    =>$value['entering_year'],
                    'year_departure'   =>$value['year_departure'],
                    'Studying'         =>$value['Studying'],
                    'index'            => $i,
                    'updated_at'       => Carbon::now(),
                ];
                DB::table('record_studies')->where('id',$data[$i]['id'])->update($data[$i]);
            }
            $i++;
        }
        if(!empty($CreateRecordStudy)) {
            RecordStudy::insert($CreateRecordStudy);
        }
        return response()->json(['data' => ['success' => true, 'message' => 'تغییرات شما با موفقیت ثبت شد.' ]], 200 );
    }

    public function destroy($id)
    {
        $recordstudy = RecordStudy::find($id)->delete() ;
        return response()->json( [ 'data' => [  'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ]], 200 );
    }

}
