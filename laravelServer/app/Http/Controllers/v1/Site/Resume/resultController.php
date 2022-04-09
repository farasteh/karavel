<?php

namespace App\Http\Controllers\v1\Site\Resume;

use App\Http\Controllers\Controller;
use App\Models\BaseResume;
use App\Models\pdfResume;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Member\Resume\pdf\ResultResume;

class resultController extends Controller
{
    public function get($id) {
        $base  = BaseResume::find($id) ;
        return new ResultResume($base);
    }
}
