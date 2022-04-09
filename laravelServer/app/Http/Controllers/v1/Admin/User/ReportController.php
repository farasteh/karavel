<?php

namespace App\Http\Controllers\v1\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Admin\User\Report\Report;
use App\Http\Resources\v1\Admin\User\Report\ReportCollection;
use App\Models\ReportUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $data = DB::table('report_users')
            ->join('users', 'report_users.id_user_report', '=', 'users.id')
            ->groupBy('id_user_report')
            ->select(DB::raw('(SELECT COUNT(*) FROM report_users AS report WHERE report.id_user_report = report_users.id_user_report) AS count,users.*'))
            ->get();

        return new ReportCollection($data);
    }

}
