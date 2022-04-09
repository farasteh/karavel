<?php

namespace App\Http\Controllers\v1\Member\CompanyRequest;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Member\CompanyRequset\companyCollection;
use App\Models\BaseResume;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getCompanies() {
        $resume = BaseResume::where('user_id',auth()->user()->id)->first();
        return new companyCollection($resume->companies);
    }
}
