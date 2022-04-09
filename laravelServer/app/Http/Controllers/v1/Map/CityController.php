<?php

namespace App\Http\Controllers\v1\Map;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Map\CityCollection;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function List($id)
    {
        return new CityCollection(City::where('province_id',$id)->get());

    }
    public function ListAll()
    {
        return new CityCollection(City::all());
    }
}
