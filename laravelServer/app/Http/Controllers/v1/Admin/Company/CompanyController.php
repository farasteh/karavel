<?php

namespace App\Http\Controllers\v1\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Admin\Company\Company as CompanyResource;
use Illuminate\Http\Request;
use App\Http\Resources\v1\Admin\Company\CompanyCollection;
use App\Models\Company ;
class CompanyController extends Controller
{

    public  function  index () {
        return new CompanyCollection( Company::orderBy('created_at' , 'DESC')->get() );
    }

    public function show($id) {
        return new CompanyResource( Company::find($id));
    }

    public function update(Request $request, $id)
    {

        Company::where( 'id', $id )->update([
            'name'           => $request->name_fa,
            'name_en'        => $request->name_en,
            'comment'        => $request->comment,
            'Phone'          => $request->Phone,
            'logo'           => $request->logo,
            'address_site'   => $request->address_site,
            'province_id'    => $request->province,
            'Employee_count' => $request->Employee_count,
            'city_id'        => $request->city ,
            'banner'         => $request->banner ,
            'stablish_year'  => $request->year,
        ]);
        $company = Company::where( 'id', $id )->first();
        $company->activityCompanies()->sync($request->Activity_id);
        return response()->json(['data' => [  'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ]], 200 );
    }
}
