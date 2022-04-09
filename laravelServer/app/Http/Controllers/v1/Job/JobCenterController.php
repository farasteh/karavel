<?php

namespace App\Http\Controllers\v1\Job;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Job\JobCenterCollection;
use App\Models\JobCenter;
use Illuminate\Http\Request;

class JobCenterController extends Controller
{
    public function index()
    {
        return new JobCenterCollection(JobCenter::all());
    }
}
