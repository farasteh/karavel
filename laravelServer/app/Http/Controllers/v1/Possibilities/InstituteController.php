<?php

namespace App\Http\Controllers\v1\Possibilities;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Possibilities\InstitutesCollection;
use App\Models\Institute;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    public function Institute()
    {
        return new InstitutesCollection(Institute::all());

    }
}
