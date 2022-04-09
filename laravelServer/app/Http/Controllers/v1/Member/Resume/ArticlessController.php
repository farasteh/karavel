<?php

namespace App\Http\Controllers\v1\Member\Resume;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Member\Resume\ArticlesCollection;
use App\Models\ArticleResume;
use Illuminate\Http\Request;

class ArticlessController extends Controller
{
    public function index()
    {
        return new ArticlesCollection(ArticleResume::where('base_resume',auth()->user()->BaseResume->id)->orderBy('index','ASC')->get());
    }

    public function destroy($id)
    {
        $recordstudy = ArticleResume::find($id)->delete() ; 
        return response()->json( [ 'data' => [  'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ]], 200 );
    }
}
