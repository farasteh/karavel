<?php

namespace App\Http\Controllers\v1\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Site\Company\ComapnyNoticeCollection;
use App\Models\Advertising;
use App\Models\BaseResume;
use App\Models\Company;
use App\Models\CompanyNotice;
use App\Notifications\company\SMS\ResumeSentNotification;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    public function getCount()
    {
        $data = [
            'base'         => BaseResume::count() ,
            'company'      => Company::count() ,
            'activeAds'    => Advertising::where('is_show' , 'yes')->count() ,
            'applied'      => DB::table('advertizing_resumes')->where('status' , 4)->get()->count() ,
        ] ;
        return $data ;
    }

    public function getNoticedCompany() {
        $companies = CompanyNotice::all()
            ->where('expire_time' , '>' , Verta::now()->format('Y-m-d H:m:s'))
            ->sortByDesc('created_at')->take(6);
        return new ComapnyNoticeCollection($companies);
    }
}
