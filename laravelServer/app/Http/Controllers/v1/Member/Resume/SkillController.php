<?php

namespace App\Http\Controllers\v1\Member\Resume;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Member\Resume\ExperimentalResumeCollection as exCollection;
use App\Models\CertificatesResume;
use App\Models\ExperimentalResume;
use App\Models\HonorsResume;
use App\Models\LangaugeResume;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SkillController extends Controller
{
    public function store(Request $request)
    {
        $base_resume = auth()->user()->BaseResume->id ; 
        /*** Insert ExperimentalResume ******/
        DB::beginTransaction();
        try {
        $i = 0;
        $CreateRecordlangauge = array();
        foreach ($request['UpdateLanguge']['items'] as $value) {
            if($value['lang_id'] != null || $value['lang_id'] != '') {
                if (isset($value['type']) && $value['type'] == 'create') {
                    $CreateRecordlangauge[] = [
                        'base_resume' => $base_resume,
                        'read' => $value['read'],
                        'write' => $value['write'],
                        'say' => $value['say'],
                        'listen' => $value['listen'],
                        'lang_id' => $value['lang_id'],
                        'index' => $i,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                } else {
                    $data[] = [
                        'id' => $value['id'],
                        'read' => $value['read'],
                        'write' => $value['write'],
                        'say' => $value['say'],
                        'listen' => $value['listen'],
                        'lang_id' => $value['lang_id'],
                        'index' => $i,
                        'updated_at' => Carbon::now(),
                    ];
                    DB::table('langauge_resumes')->where('id', $data[$i]['id'])->update($data[$i]);
                }
                $i++;
            }
        }
        if(!empty($CreateRecordlangauge)) {
            LangaugeResume::insert($CreateRecordlangauge);
        }

        $iExperimenta  = 0;
        $CreateRecordExperimenta = array();
        foreach ($request['UpdateLoadExperimenta']['items'] as $value) {
            if(($value['name'] != null || $value['name'] != '') && ($value['level'] != null || $value['level'] != '')) {
                if (isset($value['type']) && $value['type'] == 'create') {
                    $CreateRecordExperimenta[] = [
                        'base_resume' => $base_resume,
                        'name' => $value['name'],
                        'level' => $value['level'],
                        'index' => $iExperimenta,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                } else {
                    $dataEx[] = [
                        'id' => $value['id'],
                        'name' => $value['name'],
                        'level' => $value['level'],
                        'index' => $iExperimenta,
                        'updated_at' => Carbon::now(),
                    ];
                    DB::table('experimental_resumes')->where('id', $dataEx[$iExperimenta]['id'])->update($dataEx[$iExperimenta]);
                }
                $iExperimenta++;
            }
        }

        if(!empty($CreateRecordExperimenta)) {
            ExperimentalResume::insert($CreateRecordExperimenta);
        }

        $iCertificatesResume  = 0;
        $CreateRecordCertificatesResume= array();

        foreach ($request['CertificatesResume']['items'] as $value) {
            if($value['certificate'] != '' || $value['certificate'] != '') {
                if (isset($value['type']) && $value['type'] == 'create') {
                    $CreateRecordCertificatesResume[] = [
                        'base_resume' => $base_resume,
                        'certificate' => $value['certificate'],
                        'title' => $value['title'],
                        'Institute' => $value['Institute'],
                        'date' => $value['date'],
                        'index' => $iCertificatesResume,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                } else {
                    $dataCer[] = [
                        'id' => $value['id'],
                        'certificate' => $value['certificate'],
                        'title' => $value['title'],
                        'Institute' => $value['Institute'],
                        'date' => $value['date'],
                        'index' => $iCertificatesResume,
                        'updated_at' => Carbon::now(),
                    ];
                    DB::table('certificates_resumes')->where('id', $dataCer[$iCertificatesResume]['id'])->update($dataCer[$iCertificatesResume]);
                }
                $iCertificatesResume++;
            }
        }
        if(!empty($CreateRecordCertificatesResume)) {
            CertificatesResume::insert($CreateRecordCertificatesResume);
        }

        $iHonorsResumee  = 0;
        $CreateRecordHonorsResume= array();
        foreach ($request['HonorsResume']['items'] as $value) {
            if(($value['title'] != null || $value['title'] != '') && ($value['date'] != null || $value['date'] != '')) {
                if (isset($value['type']) && $value['type'] == 'create') {
                    $CreateRecordHonorsResume[] = [
                        'base_resume' => $base_resume,
                        'title' => $value['title'],
                        'date' => $value['date'],
                        'index' => $iHonorsResumee,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                } else {
                    $dataHou[] = [
                        'id' => $value['id'],
                        'title' => $value['title'],
                        'date' => $value['date'],
                        'index' => $iHonorsResumee,
                        'updated_at' => Carbon::now(),
                    ];
                    DB::table('honors_resumes')->where('id', $dataHou[$iHonorsResumee]['id'])->update($dataHou[$iHonorsResumee]);
                }
                $iHonorsResumee++;
            }
        }
        if(!empty($CreateRecordHonorsResume)) {
            HonorsResume::insert($CreateRecordHonorsResume);
        }
            DB::commit();
            return response()->json([ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );

        }catch (\Exception $e){
            DB::rollBack();
            return response()->json([ 'data' => [ 'error' => true, 'message' => 'فرم شما با خطا مواجه شد لطفا دوباره تلاش کنید.' ]], 500 );

        }
    }

    public function LoadExperimentalResume()
    {

        return new exCollection(ExperimentalResume::where('base_resume',auth()->user()->BaseResume->id)->orderBy('index' , 'ASC')->get());
    }
}
