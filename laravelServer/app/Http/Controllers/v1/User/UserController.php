<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\User\User;
use App\Http\Resources\v1\UserMember;
use Illuminate\Http\Request;
use App\Http\Resources\v1\User\Admin;

class UserController extends Controller
{
    public function user()
    {
        if(auth()->user()->tokenCan('Company')){
            $function = 'Company';
        }elseif (auth()->user()->tokenCan('Member')){
            $function = 'Member';
        }else{
            $function = 'Admin';
        }
        return $this->$function();
    }

    public function Company()
    {
        return new User(auth()->user());
    }
    public function Admin()
    {
        return new Admin(auth()->user());
    }

    public function Member()
    {
        return new UserMember(auth()->user());
    }
}
