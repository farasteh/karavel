<?php

namespace App\Http\Controllers\v1\Job;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Job\JobCategoryCollection;
use App\Models\CategoryJob;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function ListCategory($idJob)
    {
        return new JobCategoryCollection(CategoryJob::where('id_job',$idJob)->get());
    }

    public function ListAll()
    {
        return new JobCategoryCollection(CategoryJob::all());
    }
}
