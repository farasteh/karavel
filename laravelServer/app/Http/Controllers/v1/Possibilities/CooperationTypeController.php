<?php

namespace App\Http\Controllers\v1\Possibilities;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Possibilities\CooperationTypeCollection;
use App\Models\CooperationType;
use Illuminate\Http\Request;

class CooperationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return new CooperationTypeCollection(CooperationType::all());

    }


}
