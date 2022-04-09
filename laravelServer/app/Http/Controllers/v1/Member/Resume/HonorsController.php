<?php

namespace App\Http\Controllers\v1\Member\Resume;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Member\Resume\HonorsCollection;
use App\Models\HonorsResume;
use Illuminate\Http\Request;

class HonorsController extends Controller
{
    public function index()
    {
        return new HonorsCollection(HonorsResume::where('base_resume',auth()->user()->BaseResume->id)->orderBy('index','ASC')->get());
    }
    public function destroy($id)
    {
        $recordstudy = HonorsResume::find($id)->delete() ; 
        return response()->json( [ 'data' => [  'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ]], 200 );
    }
}
