<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InfoUtilitasController extends Controller
{
    public function view()
    {
        $data['dt_utilitas'] = DB::table('dt_tr_utilitas')
                ->join('dt_branch','dt_tr_utilitas.code_branch','=','dt_branch.code_branch')
                ->select('dt_tr_utilitas.id','dt_tr_utilitas.kode_utilitas','dt_tr_utilitas.tanggal_utilitas','dt_tr_utilitas.waktu_utilitas',
                        'dt_tr_utilitas.no_polisi','dt_tr_utilitas.code_branch','dt_branch.name_branch','dt_tr_utilitas.perusahaan','dt_tr_utilitas.week','dt_tr_utilitas.salesman',
                        'dt_tr_utilitas.jugs_sps','dt_tr_utilitas.segmen','dt_tr_utilitas.kapasitas','dt_tr_utilitas.ritase_ideal_perhari','dt_tr_utilitas.ritase_real','dt_tr_utilitas.volume_penjualan_real',
                        'dt_tr_utilitas.ritase_real_perhari','dt_tr_utilitas.lost_ritase','dt_tr_utilitas.lost_volume','dt_tr_utilitas.volume_ideal','dt_tr_utilitas.keterangan','dt_tr_utilitas.id_user_input')
                ->get();

        return view('app_page.info_utilitas.index',$data);
    }
}
