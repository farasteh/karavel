<?php

namespace App\Http\Controllers\v1\Admin\Job;

use App\Http\Controllers\Controller;
use App\Models\CategoryWork;
use Illuminate\Http\Request;

class CategryWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $data = $request->validate([
            'jobs' => 'required',
            'id_job' => 'required',
        ]);

        CategoryWork::create([
            'title' => $request['jobs'],
            'categry_job_id' => $request['id_job'],
        ]);

        return response()->json( [ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'jobs' => 'required',
        ]);

        CategoryWork::where( 'id', $id )->update([
            'title'  => $request['jobs'],
        ]);

        return response()->json( [ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ]], 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ct = new CategoryWork();
        $ct->findOrFail( $id );
        $ct::where( 'id', $id )->delete();

        return response()->json( [ 'data' => [ 'message' => 'با موفقیت رکورد شما حذف شد.' ]], 200 );
    }
}
