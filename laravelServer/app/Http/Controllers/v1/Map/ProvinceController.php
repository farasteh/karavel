<?php

namespace App\Http\Controllers\v1\Map;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Map\ProvinceCollection;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ProvinceCollection(Province::orderBy('title')->get());
    }
}
