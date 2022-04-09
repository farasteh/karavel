<?php

namespace App\Http\Controllers\v1\Member\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExperimentalResume;



class ExperimentalController extends Controller
{
  
    public function destroy($id)
    {
        $recordstudy = ExperimentalResume::find($id)->delete() ; 
        return response()->json( [ 'data' => [  'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ]], 200 );
    }
}
