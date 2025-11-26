<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ActivitieslogController extends Controller
{
    public function view()
    {
        $data['data_activities_log'] = DB::table('data_activities_log')
            ->join('users', 'data_activities_log.user_id', '=', 'users.id')
            ->select('data_activities_log.*', 'users.name')
            ->orderBy('created_at', 'DESC')
            ->get();
            
        return view('app_page.administrator.activities_log',$data);
    }
}
