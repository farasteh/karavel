<?php

namespace App\Http\Controllers\v1\Possibilities;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Possibilities\ActivityCompanyCollection;
use App\Models\ActivityCompany;
use Illuminate\Http\Request;

class ActivityCompanyController extends Controller
{

    public function index()
    {
        return new ActivityCompanyCollection(ActivityCompany::all());


    }
}
