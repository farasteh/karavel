<?php

namespace App\Http\Controllers\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required',
        ]);
        try {
           User::where( 'id', auth()->user()->id)->update(['password'  => bcrypt($request->password),]);
            return response()->json(['data' => [ 'success' => true, 'message' => __('massage.success_db') ]], 200 );
        }catch (\Exception $e){
            return response()->json(['data' =>[ 'error' => true, 'message' => __('massage.error_db') ]], 500 );
        }
    }
}
