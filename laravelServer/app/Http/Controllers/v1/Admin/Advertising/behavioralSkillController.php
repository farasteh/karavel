<?php

namespace App\Http\Controllers\v1\Admin\Advertising;

use App\Http\Controllers\Controller;
use App\Models\behavioralSkill;
use Illuminate\Http\Request;
use App\Http\Resources\v1\Admin\Advertising\behavioralSkillCollection;
use App\Http\Resources\v1\Admin\Advertising\behavioralSkill as behavioralSkillResourse;


class behavioralSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new behavioralSkillCollection(behavioralSkill::all()) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $behavioralSkill = behavioralSkill::create([
            'title' => $request['title']
        ]);
        return response()->json( [ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.'  , 'skill' => new behavioralSkillResourse($behavioralSkill)]], 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\behavioralSkill  $behavioralSkill
     * @return \Illuminate\Http\Response
     */
    public function show(behavioralSkill $behavioralSkill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\behavioralSkill  $behavioralSkill
     * @return \Illuminate\Http\Response
     */
    public function edit(behavioralSkill $behavioralSkill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\behavioralSkill  $behavioralSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, behavioralSkill $behavioralSkill)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $behavioralSkill->update([
            'title'  => $request['title'],
        ]);

        return response()->json( [ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ]], 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\behavioralSkill  $behavioralSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(behavioralSkill $behavioralSkill)
    {
        $behavioralSkill->delete();
        return response()->json( [ 'data' => [ 'message' => 'با موفقیت رکورد شما حذف شد.' ]], 200 );
    }
}
