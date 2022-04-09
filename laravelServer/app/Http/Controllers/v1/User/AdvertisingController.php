<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\User\AdvertisingCollection;
use App\Models\Advertising;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
    public function index()
    {
        return new AdvertisingCollection(Advertising::where('is_show','yes')->get());
    }
}
