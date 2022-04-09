<?php

namespace App\Http\Controllers\v1\Company\Advertising;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\v1\Admin\Advertising\behavioralSkillCollection;
use App\Http\Resources\v1\Admin\Advertising\behavioralSkill as behavioralSkillResourse;
use App\Models\behavioralSkill;


class behavioralSkillController extends Controller
{
    public function index()
    {
       
        return new behavioralSkillCollection(behavioralSkill::all()) ;
    }
}
