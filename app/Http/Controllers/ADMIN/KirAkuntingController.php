<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class KirAkuntingController extends Controller
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

        $query = DB::table('dt_tr_kir')
                ->join('dt_branch','dt_tr_kir.code_branch','=','dt_branch.name_branch');
                $query->where('dt_tr_kir.status', 'Selesai')->where('dt_branch.code_branch', $depo)->whereBetween('dt_tr_kir.tanggal_kir', [$tanggalAwal, $tanggalAkhir]);
                $data['dt_kir'] = $query->get();

        $query = DB::table('dt_tr_kir')
            ->select(
                    DB::raw('SUM(dt_tr_kir.biaya_kir) as total')
                )
            ->join('dt_branch', 'dt_tr_kir.code_branch', '=', 'dt_branch.name_branch');
            $query->where('dt_tr_kir.status', 'Selesai')->where('dt_branch.code_branch', $depo)->whereBetween('dt_tr_kir.tanggal_kir', [$tanggalAwal, $tanggalAkhir]);
            $data['total_biaya'] = $query->first();
        
        return view('app_page.kir_akunting.index',$data);
    }
}
