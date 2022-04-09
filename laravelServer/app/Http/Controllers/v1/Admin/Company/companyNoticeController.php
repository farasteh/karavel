<?php

namespace App\Http\Controllers\v1\Admin\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyNotice;

class companyNoticeController extends Controller
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
        $validated = $request->validate([
            'company_id' => 'required',
            'expire_time' => 'required'
        ]);
        try {
            CompanyNotice::create([
                'company_id'   => $request->company_id,
                'expire_time'  => $request->expire_time,
            ]);

            return response()->json(['data' => [ 'success' => true, 'message' => __('massage.success_db') ]], 200 );
        }catch (\Exception $e){
            return response()->json(['data' =>[ 'error' => true, 'message' => __('massage.error_db') ]], 500 );
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        try {
            $notice = CompanyNotice::where('company_id', $id)->first();
            $notice->update([
               'expire_time'  => $request->expire_time
            ]);
            return response()->json(['data' => [ 'success' => true, 'message' => __('massage.success_db') ]], 200 );
        }catch (\Exception $e){
            return response()->json(['data' =>[ 'error' => true, 'message' => __('massage.error_db') ]], 500 );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $notice = CompanyNotice::where('company_id', $id)->first();
            $notice->delete();
            return response()->json(['data' => [ 'success' => true, 'message' => __('massage.success_db') ]], 200 );
        }catch (\Exception $e){
            return response()->json(['data' =>[ 'error' => true, 'message' => __('massage.error_db') ]], 500 );
        }
    }
}
