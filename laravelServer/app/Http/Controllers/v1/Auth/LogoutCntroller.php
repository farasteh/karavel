<?php

namespace App\Http\Controllers\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutCntroller extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
