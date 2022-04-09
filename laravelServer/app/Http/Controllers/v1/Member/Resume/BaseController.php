<?php

namespace App\Http\Controllers\v1\Member\Resume;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Member\Resume\Base as BaseResource;
use App\Http\Requests\BaseResume as BaseResumeRequest;
use App\Http\Requests\BaseResumeRequest as BasResumeUpdateInsert;
use App\Models\BaseResume;
use App\Models\CategoryJob;
use App\Models\Job;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Model\SocialResume;
use App\Http\Resources\v1\Member\Resume\pdf\ResultResume;
use Illuminate\Support\Facades\Validator;
use PDF;
use App\Models\pdfResume;
class BaseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return
     */

    public function index()
    {
        return new BaseResource(BaseResume::where('user_id',auth()->user()->id)->first());
    }

    /**
     * @param BaseResumeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BaseResumeRequest $request)
    {
        $cat = $request['category_job'] ;
        if($request['job'] == 1 &&  is_string ( $cat )){
            $job = CategoryJob::create([
                'id_job'  => $request['job']  ,
                'title'   => $cat
            ]) ;
           $cat = $job->id ;
        }
        $data = [
            'user_id'           => auth()->user()->id,
            'image'             => $request['image'],
            'name'              => $request['name'],
            'last_name'         => $request['last_name'],
            'gender'            => $request['gender'],
            'marital_status'    => $request['marital_status'],
            'soldier'           => $request['soldier'],
            'job'               => $request['job'],
            'category_job'      => $cat,
            'birth_date'        => $request['birth_date'],
            'email'             => $request['email'],
            'mobile'            => auth()->user()->mobile,
        ];
        BaseResume::create($data);

        return response()->json([ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );
    }

    /**
     * @param $id
     * @return BaseResource
     */
    public function show($id)
    {

        return new BaseResource(BaseResume::find($id));
    }

    /**
     * @param BaseResumeRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BaseResumeRequest $request, $id)
    {
        BaseResume::where( 'id', $id )->update([
            'image'             => $request['image'],
            'name'              => $request['name'],
            'last_name'         => $request['last_name'],
            'gender'            => $request['gender'],
            'marital_status'    => $request['marital_status'],
            'soldier'           => $request['soldier'],
            'job'               => $request['job'],
            'category_job'      => $request['category_job'],
            'birth_date'        => $request['birth_date'],
            'email'             => $request['email'],
            'phone'             => $request['phone'],
            'site'              => $request['site'],
            'province'          => $request['province'],
            'city'              => $request['city'],
            'address'           => $request['address'],
            'comment'           => $request['comment'],
        ]);

        $socialNetworkResume = array();
        $socialNetworkResumeIndex = 0  ;
        return response()->json( [ 'data' => [  'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ]], 200 );

    }

    /**
     * @param Request $request
     */
    public function updateResume(Request $request)
    {
        dd($request);
    }

    /**
     * @return ResultResume
     */
    public function result()
    {
        return new ResultResume(BaseResume::where('user_id',auth()->user()->id)->first());
    }

    /**
     * @param $id
     * @return ResultResume
     */
    public function resultPdf($id)
    {

        return new ResultResume(BaseResume::where('id', $id)->first());
    }

    public function resultPdfOptions(Request $request)  {
        $pdf = pdfResume::where('base_resume' , $request['base_id'] )->where('pdf_theme' , $request['themeNumber'] )->first();
        return $pdf;
    }
    /**
     * @param Request $request
     * @return mixed
     */
    public function pdfMaker(Request $request)
    {

        $pdf = PDF::loadView('pdfs.theme' , ['data' => $request->all()]);

        return $pdf->stream('document.pdf');

    }

    /**
     * @param BasResumeUpdateInsert $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function InsertUpdateResume(BasResumeUpdateInsert $request, $id)
    {


       DB::beginTransaction();
        try {
            $cat = $request->base['category_job'] ;
            $baseRes = BaseResume::where('id', $id)->first();
            if( $baseRes->job == 1 ){
                if($request->base['job'] == 1 && is_string ( $cat )) {
                    $categor = CategoryJob::where('id_job' , 1)->find($baseRes->category_job);
                    if($categor)
                    {
                        $categor->update([
                            'title'   => $request->base['category_job']
                        ]) ;
                        $cat = $categor->id;
                    }
                }
                else if ($request->base['job'] != 1) {
                    $categor = CategoryJob::where('id_job' , 1)->find($baseRes->category_job);
                    $categor->delete();
                }
            }

            else if($baseRes->job != 1){
                if($request->base['job'] == 1 && is_string ( $cat )) {
                    $job = CategoryJob::create([
                        'id_job'  => $request->base['job']  ,
                        'title'   => $cat
                    ]) ;
                    $cat = $job->id ;
                }
            }
            $dataBase = [
                'image'             => $request->base['image'],
                'name'              => $request->base['name'],
                'last_name'         => $request->base['last_name'],
                'gender'            => $request->base['gender'],
                'marital_status'    => $request->base['marital_status'],
                'soldier'           => $request->base['soldier'],
                'job'               => $request->base['job'],
                'category_job'      => $cat,
                'birth_date'        => $request->base['birth_date'],
                'email'             => $request->base['email'],
                'phone'             => $request->base['phone'],
                'site'              => $request->base['site'],
                'province'          => $request->base['province'],
                'city'              => $request->base['city'],
                'address'           => $request->base['address'],
                'comment'           => $request->base['comment'],
                'updated_at'        => Carbon::now(),
            ];
            $baseRes->update($dataBase);
            $socialNetworkResume = array();
            $socialNetworkResumeIndex = 0  ;
            foreach ($request['socailNetworkResumes']['items'] as $value) {
                if(($value['social_network'] != null || $value['social_network'] != '') && ($value['link'] != null || $value['link'] != '')) {
                    if (isset($value['type'])) {
                        $socialNetworkResume[] = [
                            'base_resume' => $id,
                            'social_network' => $value['social_network'],
                            'link' => $value['link'],
                            'index' => $socialNetworkResumeIndex,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ];
                    } else {
                        $socialresume[] = [
                            'id' => $value['id'],
                            'social_network' => $value['social_network'],
                            'link' => $value['link'],
                            'index' => $socialNetworkResumeIndex,
                            'updated_at' => Carbon::now(),
                        ];
                        \App\Models\SocialResume::where('id', $socialresume[$socialNetworkResumeIndex]['id'])->update($socialresume[$socialNetworkResumeIndex]);
                    }
                    $socialNetworkResumeIndex++;
                }
            }
            if(!empty($socialNetworkResume)) {
                \App\Models\SocialResume::insert($socialNetworkResume);
            }

            DB::commit();
            return response()->json([ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );

        }catch (\Exception $e){
            DB::rollBack();
            return response()->json([ 'data' => [ 'error' => true, 'message' => 'فرم شما با خطا مواجه شد لطفا دوباره تلاش کنید.' ]], 500 );

        }
    }


    public function disableContacts(){
        $baseResume = BaseResume::where('user_id',auth()->user()->id)->first();
        if($baseResume->disable_contact == 1)
        {
            $baseResume->disable_contact = 0  ;
            $baseResume->save();
            return response()->json( [ 'data' => [  'success' => true, 'message' => 'اطلاعات تماس شما به کارفرمایان نمایش داده میشود.' ]], 200 );
        }
        else
        {
            $baseResume->disable_contact = 1;
            $baseResume->save();
            return response()->json( [ 'data' => [  'success' => true, 'message' => 'اطلاعات تماس شما به کارفرمایان نمایش داده نمیشود' ]], 200 );
        }
    }


    public function disableSms(){

        $baseResume = BaseResume::where('user_id',auth()->user()->id)->first();
        if($baseResume->disable_sms == 1)
        {
            $baseResume->disable_sms = 0  ;
            $baseResume->save();
            return response()->json( [ 'data' => [  'success' => true, 'message' => 'ارسال اس ام اس برای شما فعال شد.' ]], 200 );
        }
        else
        {
            $baseResume->disable_sms = 1;
            $baseResume->save();
            return response()->json( [ 'data' => [  'success' => true, 'message' => 'ارسال اس ام اس برای شما غیرفعال شد.' ]], 200 );
        }
    }
}
