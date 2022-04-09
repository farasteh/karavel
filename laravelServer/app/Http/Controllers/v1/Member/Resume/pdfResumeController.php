<?php

namespace App\Http\Controllers\v1\Member\Resume;

use App\Http\Controllers\Controller;
use App\Models\pdfResume;
use Illuminate\Http\Request;

class pdfResumeController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pdfResume  $pdfResume
     * @return \Illuminate\Http\Response
     */
    public function show(pdfResume $pdfResume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pdfResume  $pdfResume
     * @return \Illuminate\Http\Response
     */
    public function edit(pdfResume $pdfResume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pdfResume  $pdfResume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pdfResume $pdfResume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pdfResume  $pdfResume
     * @return \Illuminate\Http\Response
     */
    public function destroy(pdfResume $pdfResume)
    {
        //
    }

    public function change(Request $request) {
        $pdf = pdfResume::where('base_resume' , auth()->user()->BaseResume->id )->where('pdf_theme' , $request['themeNumber'] )->first();
        if($pdf == null) {
            $pdfResume  = new pdfResume() ; 
            $pdfResume->base_resume = auth()->user()->BaseResume->id ; 
            $pdfResume->pdf_theme = $request['themeNumber'] ; 
            $pdfResume->options = json_encode( $request['changes']) ;
            $pdfResume->save();
        }
        else  {
            $pdf->update(['options' => json_encode( $request['changes'])]);
        }
        return response()->json([ 'data' => [ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );
    }

    public function getOptions(Request $request)
    {
        $pdf = pdfResume::where('base_resume' , auth()->user()->BaseResume->id )->where('pdf_theme' , $request['themeNumber'] )->first();
        return $pdf;
    }
}
