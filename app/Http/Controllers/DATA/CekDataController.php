<?php

namespace App\Http\Controllers\DATA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

USE Illuminate\Support\Facades\DB;

class CekDataController extends Controller
{
    public function cek_email(REQUEST $request)
    {
        $cek = DB::table('users')->where('email', $request->email)->count();
        if ($cek == 0) {
            $data = [
                "status"  => true,
                "message" => "available"
            ];
        }else
        {
            $data = [
                "status"  => false,
                "message" => "notavailable"
            ];
        }
        return json_encode($data);
    }
}
