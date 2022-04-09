<?php

namespace App\Http\Controllers\v1\Job;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Job\JobCollection;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function List()
    {
        return new JobCollection(Job::orderBy('index','desc')->get());
    }

    public  function  getJobs() {
        $jobs = Job::select('jobs.*')
            ->join("advertisings", "advertisings.job_id", "=", "jobs.id")
            ->groupBy('jobs.id')
            ->get();
        return new JobCollection( $jobs ) ;
    }
}
