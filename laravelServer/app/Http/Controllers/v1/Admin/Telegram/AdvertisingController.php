<?php

namespace App\Http\Controllers\v1\Admin\Telegram;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Admin\Telegram\advertisingCollection;
use App\Http\Resources\v1\Admin\Telegram\userCollection;
use App\Models\Advertising;
use App\Models\BaseResume;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdvertisingController extends Controller
{
    public  function index () {
        $advertisings = Advertising::all() ;
        $users  = BaseResume::all() ;
        return [
            'advertisings' => new advertisingCollection($advertisings) ,
            'users' => new userCollection($users),
        ];

    }
}
