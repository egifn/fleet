<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class Activities_log
{
    public static function addToLog($subject, $data, $status)
    {
		$agent = new Agent;

        $device   = $agent->device();
        $browser  = $agent->browser();
        $platform = $agent->platform();

    	DB::table('data_activities_log')->insert([
			'subject'  => $subject,
			'url'      => Request::fullUrl(),
			'method'   => Request::method(),
			'ip'       => Request::ip(),
			'agent'    => Request::header('user-agent'),
			'device'   => $device,
			'browser'  => $browser,
			'platform' => $platform,
			'user_id'  => auth()->check() ? auth()->user()->id : 0,
			'data'     => $data,
			'status'   => $status,
		]);
    }

}