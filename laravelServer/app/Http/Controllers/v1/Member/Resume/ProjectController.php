<?php

namespace App\Http\Controllers\v1\Member\Resume;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Member\Resume\ProjectCollection;
use App\Models\ArticleResume;
use App\Models\ProjectsResume;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        return new ProjectCollection(ProjectsResume::where('base_resume',auth()->user()->BaseResume->id)->orderBy('index','ASC')->get());
    }
    public function store(Request $request)
    {
        $base_resume = auth()->user()->BaseResume->id ; 
        DB::beginTransaction();
        try {
            $i = 0;
            $Project = array();
            foreach ($request['Project']['items'] as $value) {
                if($value['title'] != null || $value['title'] != '') {
                    if (isset($value['type']) && $value['type'] == 'create') {
                        $Project[] = [
                            'base_resume' => $base_resume,
                            'title' => $value['title'],
                            'company' => $value['company'],
                            'link' => $value['link'],
                            'comment' => $value['comment'],
                            'date' => $value['date'],
                            'index' => $i,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ];
                    } else {
                        $data[] = [
                            'id' => $value['id'],
                            'title' => $value['title'],
                            'company' => $value['company'],
                            'link' => $value['link'],
                            'comment' => $value['comment'],
                            'date' => $value['date'],
                            'index' => $i,
                            'updated_at' => Carbon::now(),
                        ];
                        DB::table('projects_resumes')->where('id', $data[$i]['id'])->update($data[$i]);
                    }
                    $i++;
                }
            }
            if (!empty($Project)) {
                ProjectsResume::insert($Project);
            }

            $iArticles = 0;
            $Articles = array();
            foreach ($request['Articles']['items'] as $value) {
                if(($value['effect'] != null || $value['effect'] != '') && ($value['title'] != null || $value['title'] != '')) {
                    if (isset($value['type']) && $value['type'] == 'create') {
                        $Articles[] = [
                            'base_resume' => $base_resume,
                            'effect' => $value['effect'],
                            'title' => $value['title'],
                            'publisher' => $value['publisher'],
                            'link' => $value['link'],
                            'comment' => $value['comment'],
                            'date' => $value['date'],
                            'index' => $iArticles,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ];
                    } else {
                        $dataArticles[] = [
                            'id' => $value['id'],
                            'effect' => $value['effect'],
                            'title' => $value['title'],
                            'publisher' => $value['publisher'],
                            'link' => $value['link'],
                            'comment' => $value['comment'],
                            'date' => $value['date'],
                            'index' => $iArticles,
                            'updated_at' => Carbon::now(),
                        ];
                        DB::table('article_resumes')->where('id', $dataArticles[$iArticles]['id'])->update($dataArticles[$iArticles]);
                    }
                    $iArticles++;
                }
            }
            if (!empty($Articles)) {
                ArticleResume::insert($Articles);
            }
            DB::commit();
            return response()->json(['data' => ['success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.']], 200);
        }
        catch (\Exception $e){
            DB::rollBack();
            return response()->json([ 'data' => [ 'error' => true, 'message' => 'فرم شما با خطا مواجه شد لطفا دوباره تلاش کنید.' ]], 500 );

        }
    }

    public function destroy($id)
    {
        $recordstudy = ProjectsResume::find($id)->delete() ;
        return response()->json( [ 'data' => [  'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ]], 200 );
    }
}
