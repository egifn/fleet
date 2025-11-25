<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InfoBarcodeController extends Controller
{
    public function view()
    {
        $data['dt_info_barcode'] = DB::table('dt_keluar_masuk')->get();

        return view('app_page.info_barcode.index',$data);
    }
}
