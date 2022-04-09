<?php

namespace App\Http\Controllers\v1\Certificates;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Certificates\CertificatesCollection;
use App\Models\Certificates;
use Illuminate\Http\Request;

class CertificatesController extends Controller
{
    public function index()
    {
        return new CertificatesCollection(Certificates::all());
    }
}
