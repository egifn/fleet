<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\File_Upload;
use Carbon\carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Activities_log;

class BbmAkuntingController extends Controller
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

        $query = DB::table('dt_tr_bbm')
            ->select(
                    'dt_tr_bbm.id',
                    'dt_tr_bbm.kode_bbm',
                    'dt_tr_bbm.tanggal_bbm',
                    'dt_tr_bbm.waktu_bbm',
                    'dt_tr_bbm.no_polisi',
                    'dt_tr_bbm.code_branch',
                    'dt_tr_bbm.perusahaan',
                    'dt_tr_bbm.week',
                    'dt_tr_bbm.salesman',
                    'dt_tr_bbm.segmen',
                    'dt_tr_bbm.tipe',
                    'dt_tr_bbm.jenis_bbm',
                    'dt_tr_bbm.harga_perliter',
                    'dt_tr_bbm.liter_qty',
                    'dt_tr_bbm.biaya_bbm',
                    'dt_tr_bbm.kilometer',
                    'dt_tr_bbm.ratio_actual',
                    'dt_tr_bbm.ratio_ideal',
                    'dt_tr_bbm.keterangan_bbm',
                    'dt_tr_bbm.no_vocer',
                    'dt_tr_bbm.id_user_input',
                    'dt_file_upload.kode',
                    'dt_file_upload.description',
                    'dt_file_upload.filename',
                    'dt_tr_bbm_spbu.biaya_bbm as biaya_bbm_spbu'

                )
            ->join('dt_branch', 'dt_tr_bbm.code_branch', '=', 'dt_branch.name_branch')
            ->leftJoin('dt_file_upload', 'dt_tr_bbm.kode_bbm', '=', 'dt_file_upload.kode')
            ->leftJoin('dt_tr_bbm_spbu', function($join) {
                $join->on('dt_tr_bbm.no_polisi', '=', 'dt_tr_bbm_spbu.no_polisi')
                     ->on('dt_tr_bbm.tanggal_bbm', '=', 'dt_tr_bbm_spbu.tgl_bbm');
            });
            $query->where('dt_branch.code_branch', $depo)->whereBetween('dt_tr_bbm.tanggal_bbm', [$tanggalAwal, $tanggalAkhir]);
            $data['dt_bbm'] = $query->get();

        $query = DB::table('dt_tr_bbm')
            ->select(
                    DB::raw('SUM(dt_tr_bbm.biaya_bbm) as total'),
                    DB::raw('SUM(dt_tr_bbm_spbu.biaya_bbm) as total_spbu')
                )
            ->join('dt_branch', 'dt_tr_bbm.code_branch', '=', 'dt_branch.code_branch')
            ->leftJoin('dt_file_upload', 'dt_tr_bbm.kode_bbm', '=', 'dt_file_upload.kode')
            ->leftJoin('dt_tr_bbm_spbu', 'dt_tr_bbm.no_polisi', '=', 'dt_tr_bbm_spbu.no_polisi');
            $query->where('dt_branch.code_branch', $depo)->whereBetween('dt_tr_bbm.tanggal_bbm', [$tanggalAwal, $tanggalAkhir]);
            $data['total_biaya'] = $query->first();

        $query = DB::table('dt_tr_bbm_spbu_saldo')
                ->select('dt_tr_bbm_spbu_saldo.tanggal','dt_tr_bbm_spbu_saldo.code_branch',
                         'dt_tr_bbm_spbu_saldo.sisa_saldo','dt_tr_bbm_spbu_saldo.top_up_saldo',
                         'dt_tr_bbm_spbu_saldo.saldo_akhir','dt_tr_bbm_spbu_saldo.created_at');
                $query->where('dt_tr_bbm_spbu_saldo.code_branch', '030')->orderBy('dt_tr_bbm_spbu_saldo.created_at', 'desc');
                $data['saldo'] = $query->first();

        

        return view('app_page.bbm_akunting.index', $data);
    }
}
