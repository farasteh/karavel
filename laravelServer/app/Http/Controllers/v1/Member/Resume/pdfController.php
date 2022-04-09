<?php

namespace App\Http\Controllers\v1\Member\Resume;

use App\Http\Controllers\Controller;
use App\Models\pdfThemes;
use App\Http\Resources\v1\Member\Resume\pdf\pdfCollection;
use Illuminate\Http\Request;
use App\Models\pdfResume;
class pdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return new pdfCollection(pdfThemes::all());
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
     * @param  \App\Models\pdfThemes  $pdfThemes
     * @return \Illuminate\Http\Response
     */
    public function show(pdfThemes $pdfThemes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pdfThemes  $pdfThemes
     * @return \Illuminate\Http\Response
     */
    public function edit(pdfThemes $pdfThemes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pdfThemes  $pdfThemes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pdfThemes $pdfThemes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pdfThemes  $pdfThemes
     * @return \Illuminate\Http\Response
     */
    public function destroy(pdfThemes $pdfThemes)
    {
        //
    }

   
}
