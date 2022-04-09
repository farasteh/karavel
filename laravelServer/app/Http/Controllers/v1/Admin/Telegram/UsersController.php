<?php

namespace App\Http\Controllers\v1\Admin\Telegram;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Admin\Telegram\userCollection;
use App\Models\BaseResume;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public  function index () {
        $users  = BaseResume::all() ;
        return new userCollection($users) ;
    }
}
