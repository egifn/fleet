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

class BbmForkliftAkuntingController extends Controller
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

        $query = DB::table('dt_tr_bbm_forklift')
                ->select('dt_tr_bbm_forklift.id','dt_tr_bbm_forklift.kode_bbm','dt_tr_bbm_forklift.tanggal_bbm','dt_tr_bbm_forklift.waktu_bbm',
                        'dt_tr_bbm_forklift.no_forklift','dt_tr_bbm_forklift.code_branch','dt_tr_bbm_forklift.perusahaan','dt_tr_bbm_forklift.week','dt_tr_bbm_forklift.salesman',
                        'dt_tr_bbm_forklift.segmen','dt_tr_bbm_forklift.tipe','dt_tr_bbm_forklift.jenis_bbm','dt_tr_bbm_forklift.harga_perliter','dt_tr_bbm_forklift.liter_qty','dt_tr_bbm_forklift.biaya_bbm',
                        'dt_tr_bbm_forklift.hour','dt_tr_bbm_forklift.ratio_actual','dt_tr_bbm_forklift.ratio_ideal','dt_tr_bbm_forklift.keterangan_bbm',
                        'dt_tr_bbm_forklift.no_vocer','dt_tr_bbm_forklift.id_user_input','dt_file_upload.kode','dt_file_upload.description','dt_file_upload.filename')
                ->join('dt_branch','dt_tr_bbm_forklift.code_branch','=','dt_branch.name_branch')
                ->leftJoin('dt_file_upload','dt_tr_bbm_forklift.kode_bbm','=','dt_file_upload.kode');
                $query->where('dt_branch.code_branch', $depo)->whereBetween('dt_tr_bbm_forklift.tanggal_bbm', [$tanggalAwal, $tanggalAkhir]);
                $data['dt_bbm'] = $query->get();

        $query = DB::table('dt_tr_bbm_forklift')
            ->select(
                    DB::raw('SUM(dt_tr_bbm_forklift.biaya_bbm) as total')
                )
            ->join('dt_branch', 'dt_tr_bbm_forklift.code_branch', '=', 'dt_branch.name_branch')
            ->leftJoin('dt_file_upload', 'dt_tr_bbm_forklift.kode_bbm', '=', 'dt_file_upload.kode');
            $query->where('dt_branch.code_branch', $depo)->whereBetween('dt_tr_bbm_forklift.tanggal_bbm', [$tanggalAwal, $tanggalAkhir]);
            $data['total_biaya'] = $query->first();

        return view('app_page.bbm_forklift_akunting.index', $data);
    }
}
