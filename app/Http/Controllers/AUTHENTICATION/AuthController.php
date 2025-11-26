<?php

namespace App\Http\Controllers\AUTHENTICATION;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    # GET HALAMAN LOGIN
    public function index()
    {
        $data['data_config_app']     = DB::table('data_config_app')->where('id', 28)->limit(1)->first();
        $data['data_activities_log'] = DB::table('data_activities_log')->get();
        return view('authentication_page.login_admin', $data);
    }
    # CEK LOGIN
    public function ceklogin(REQUEST $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->status_account == 'Tidak Aktif') {
                Auth::logout();
                $output = [
                    'status'  => false,
                    'message' => 'akun login anda belum aktif'
                ];
                return response()->json($output, 200);
            } else {
                DB::table('users')->where('email', $request->email)->update([
                    'last_login' => date('Y-m-d H:i:s',)
                ]);
                if (Auth::user()->roles == 'Superadmin') {
                    $output = [
                        "status"  => true,
                        'message' => 'success',
                        "url"     => route('admin.dashboard'),
                    ];
                } elseif (Auth::user()->roles == 'OPS HO') {
                        $output = [
                            "status"  => true,
                            'message' => 'success',
                            "url"     => route('ops.dashboard'),
                        ];
                } elseif (Auth::user()->roles == 'Admin') {
                    $output = [
                        "status"  => true,
                        'message' => 'success',
                        "url"     => route('user.dashboard'),
                    ];
                } elseif (Auth::user()->roles == 'BOD') {
                    $output = [
                        "status"  => true,
                        'message' => 'success',
                        "url"     => route('bod.dashboard'),
                    ];
                } elseif (Auth::user()->roles == 'DEPO SA') {
                    $output = [
                        "status"  => true,
                        'message' => 'success',
                        "url"     => route('depo.sa.dashboard'),
                    ];
                } elseif (Auth::user()->roles == 'SND SM') {
                    $output = [
                        "status"  => true,
                        'message' => 'success',
                        "url"     => route('snd.sm.dashboard'),
                    ];
                } elseif (Auth::user()->roles == 'Akunting') {
                    $output = [
                        "status"  => true,
                        'message' => 'success',
                        "url"     => route('akunting.dashboard'),
                    ];
                } else {
                    $output = [
                        'status'  => false,
                        'message' => 'roles akun login tidak valid'
                    ];
                }
                return response()->json($output, 200);
            }
        } else {
            $output = [
                'status'  => false,
                'message' => 'akun login tidak valid'
            ];
            return response()->json($output, 200);
        }
    }
    # LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
