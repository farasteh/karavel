<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{


    public function index()
    {
        // write something to check

        return view('layout');
    }
}
