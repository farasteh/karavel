<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Admin\Panel\CountDataPanel;
use Illuminate\Http\Request;
use App\Models\BaseResume ;
use App\Models\Company ;
use App\Models\Advertising ;
use Illuminate\Support\Facades\DB;



class AdminPanelController extends Controller
{
    public function getCountDatas() {
        $data = [
            'base'         => BaseResume::count() ,
            'company'      => Company::count() ,
            'activeAds'    => Advertising::where('is_show' , 'yes')->count() ,
            'notSeenAds'    => Advertising::where('is_show' , ' ')->count() ,
            'noAds'         => Advertising::where('is_show' , 'no')->count() ,
            'resumes'      => DB::table('advertizing_resumes')->count() ,
        ] ;
        return $data ;

    }
}
