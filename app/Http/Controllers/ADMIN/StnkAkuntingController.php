<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class StnkAkuntingController extends Controller
{
    public function view(Request $request)
    {
        $depo = $request->input('penempatan');
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $data['dt_branch'] = DB::table('dt_branch')
        ->whereNotNull('code_branch') // Pastikan data valid
        ->orderBy('name_branch', 'ASC')
        ->get();

        $query = DB::table('dt_tr_stnk')
                ->select('dt_tr_stnk.id','dt_tr_stnk.kode_stnk','dt_tr_stnk.tanggal_stnk','dt_tr_stnk.waktu_stnk',
                        'dt_tr_stnk.no_polisi','dt_tr_stnk.code_branch','dt_tr_stnk.perusahaan',
                        'dt_tr_stnk.jenis','dt_tr_stnk.segmen','dt_tr_stnk.tipe','dt_tr_stnk.no_rangka','dt_tr_stnk.no_mesin','dt_tr_stnk.bulan_exp_stnk',
                        'dt_tr_stnk.tgl_pajak_stnk','dt_tr_stnk.biaya_stnk','dt_tr_stnk.id_user_input')
                ->join('dt_branch','dt_tr_stnk.code_branch','=','dt_branch.name_branch');
                $query->where('dt_tr_stnk.status', 'Selesai')->where('dt_branch.code_branch', $depo)->whereBetween('dt_tr_stnk.tanggal_stnk', [$tanggalAwal, $tanggalAkhir]);
                $data['dt_stnk'] = $query->get();

        $query = DB::table('dt_tr_stnk')
            ->select(
                    DB::raw('SUM(dt_tr_stnk.biaya_stnk) as total')
                )
            ->join('dt_branch', 'dt_tr_stnk.code_branch', '=', 'dt_branch.name_branch');
            $query->where('dt_tr_stnk.status', 'Selesai')->where('dt_branch.code_branch', $depo)->whereBetween('dt_tr_stnk.tanggal_stnk', [$tanggalAwal, $tanggalAkhir]);
            $data['total_biaya'] = $query->first();

        return view('app_page.stnk_akunting.index',$data);
    }
}
