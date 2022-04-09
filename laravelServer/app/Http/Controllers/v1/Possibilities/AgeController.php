<?php

namespace App\Http\Controllers\v1\Possibilities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\v1\Possibilities\AgeCollection ;
use App\Models\Age ;

class AgeController extends Controller
{
    public function index()
    {
        return new AgeCollection(Age::all());

    }
}
