<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\Controller;
use App\Models\ReportUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $report_user = DB::table('base_resumes')
            ->join('users', 'users.id', '=', 'base_resumes.user_id')
            ->select('users.id')
            ->first();
        try {
            ReportUser::create([
                'id_user_report'    => $report_user->id,
                'id_user'           => auth()->user()->id,
            ]);
            return response()->json(['data' => [ 'success' => true, 'message' => __('massage.success_db') ]], 200 );
        }catch (\Exception $e){
            return response()->json(['data' =>[ 'error' => true, 'message' => __('massage.error_db') ]], 500 );
        }

    }
}
