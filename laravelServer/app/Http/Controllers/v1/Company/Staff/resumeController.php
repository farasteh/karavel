<?php

namespace App\Http\Controllers\v1\Company\Staff;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Resources\v1\Company\Staff\resume\resumeCollection;

class resumeController extends Controller
{
    public function getResumeRequest() {
        $company = Company::where('user_id',auth()->user()->id)->first();
        return new resumeCollection($company->resumes);
    }
}
