<?php

namespace App\Http\Controllers\v1\Job;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Job\CategoryWorkCollection;
use App\Models\CategoryWork;
use Illuminate\Http\Request;

class CategoryWorkController extends Controller
{
    public function ListCategory($idCategory)
    {
        return new CategoryWorkCollection(CategoryWork::where('categry_job_id',$idCategory)->get());
    }

    public function ListAll()
    {
        return new CategoryWorkCollection(CategoryWork::all());
    }
}
