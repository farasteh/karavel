<?php

namespace App\Http\Controllers\v1\Site\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company ;
use App\Http\Resources\v1\Site\Company\Company as companyResource;
use App\Http\Resources\v1\Site\Company\CompanyCollection;

class CompanyController extends Controller
{
    public  function get($id) {
        $company = Company::find($id);
        $company->increment('views');
        return new companyResource($company) ;
    }
}
