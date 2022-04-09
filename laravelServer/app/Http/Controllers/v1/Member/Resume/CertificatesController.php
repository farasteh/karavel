<?php

namespace App\Http\Controllers\v1\Member\Resume;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Member\Resume\CertificatesResumeCollection;
use App\Models\CertificatesResume;
use Illuminate\Http\Request;

class CertificatesController extends Controller
{
    public function index()
    {
        return new CertificatesResumeCollection(CertificatesResume::where('base_resume',auth()->user()->BaseResume->id)->orderBy('index' , 'ASC')->get());
    } 
    public function destroy($id)
    {
        $recordstudy = CertificatesResume::find($id)->delete() ; 
        return response()->json( [ 'data' => [  'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ]], 200 );
    }

}
