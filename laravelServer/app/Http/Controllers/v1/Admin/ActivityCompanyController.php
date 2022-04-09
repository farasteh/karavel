<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityCompany;
use Illuminate\Http\Request;
use App\Http\Resources\v1\Possibilities\ActivityCompanyCollection;
use App\Http\Resources\v1\Possibilities\ActivityCompany as ActivityCompanyResourse;

class ActivityCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ActivityCompanyCollection(ActivityCompany::all());
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

        $activityCompany = ActivityCompany::create([
            'title' => $request['title']
        ]);
        return response()->json( [ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.'  , 'activity' => new ActivityCompanyResourse($activityCompany)]], 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActivityCompany  $activityCompany
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityCompany $activityCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActivityCompany  $activityCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(ActivityCompany $activityCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActivityCompany  $activityCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActivityCompany $activityCompany)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $activityCompany->update([
            'title'  => $request['title'],
        ]);

        return response()->json( [ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ]], 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivityCompany  $activityCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityCompany $activityCompany)
    {
        $activityCompany->delete();
        return response()->json( [ 'data' => [ 'message' => 'با موفقیت رکورد شما حذف شد.' ]], 200 );
    }
}
