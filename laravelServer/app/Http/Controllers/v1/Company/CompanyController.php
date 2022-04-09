<?php

namespace App\Http\Controllers\v1\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Resources\v1\Company\Company as CompanyResource;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\v1\Job\JobCollection ;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        auth()->user()->id;
        $data = [
            'user_id'        => auth()->user()->id,
            'name'           => $request->name_fa,
            'name_en'        => $request->name_en,
            'comment'        => $request->comment,
            'Phone'          => $request->phone,
            'logo'           => $request->logo,
            'address_site'   => $request->site,
            'province_id'    => $request->province,
            'Employee_count' => $request->count,
            'city_id'        => $request->city ,
            'banner'         => $request->banner,
            'stablish_year'  => $request->year,
            'mobile'         => auth()->user()->mobile,
        ];

        $company = Company::create($data);
        $company->activityCompanies()->sync($request->ActivityCompany);
        return response()->json([ 'success' => true, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ], 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return
     */
    public function show($id)
    {
        return new CompanyResource(Company::where('user_id',auth()->user()->id)->first());

    }

    public function getCompany()
    {
        return new CompanyResource(Company::where('user_id',auth()->user()->id)->first());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            'banner'         => $request->banner,
            'stablish_year'  => $request->year,
        ]);
        $company = Company::where( 'id', $id )->first();
        $company->activityCompanies()->sync($request->Activity_id);
        return response()->json(['data' => [  'success' => true, 'message' => 'اطلاعات شما با موفقیت ویرایش گردید.' ]], 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function Upload()
    {
        return 'fffff';
    }

    public  function  getJobs( $id) {

        $jobs = Job::select('jobs.*')
            ->join("advertisings", "advertisings.job_id", "=", "jobs.id")
            ->where('advertisings.company_id' , $id)
            ->groupBy('jobs.id')
            ->get();


//        $jobs = DB::table('advertisings')
//            ->join('jobs', 'jobs.id', '=', 'advertisings.job_id')
//            ->where('advertisings.company_id' , $id)
//            ->groupBy('jobs.id')
//            ->get();
        return new JobCollection( $jobs ) ;
    }
}
