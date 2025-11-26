<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Activities_log;


class WelcomeController extends Controller
{
    public function index()
    {
        $data['data_config_app'] = DB::table('data_config_app')->where('id',28)->limit(1)->first();
        $data['data_activities_log'] = DB::table('data_activities_log')->get();
        
        return view('welcome',$data);
    }
}
