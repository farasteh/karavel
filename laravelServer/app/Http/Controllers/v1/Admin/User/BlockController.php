<?php

namespace App\Http\Controllers\v1\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ResumeNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class BlockController extends Controller
{
    public function update(Request $request, $id)
    {
        $blocked = null;

        if($request->blocked == "true"){
            $blocked = Carbon::now();
        }
        try {
//        MAIL_FROM_ADDRESS=null
//            $user = auth()->user();
//
//            Notification::send($user ,new ResumeNotification());

            User::where( 'id' , $id )->update(['blocked_until' => $blocked]);
            return response()->json(['data' => [  'success' => true, 'message' => __('massage.success_db') ]], 200 );
        }catch (\Exception $e){

            return response()->json(['data' => [  'success' => true, 'message' => __('massage.error_db')  ]], 500 );
        }
    }
}
